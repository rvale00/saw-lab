<?php


    include("../db/connect.php");

    $oldpsw = $newpsw = $newcpsw = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["oldpsw"])){
            echo "<p> e' necessario inserire la vecchia password</p>";
            exit;
        }else{
            $oldpsw = $_POST["oldpsw"];
        }
        if(empty($_POST["newpsw"])){
            echo "<p> e' necessario inserire la nuova password</p>";
            exit;
        }else{
            $newpsw = $_POST["newpsw"];
        }
        if(empty($_POST["newcpsw"])){
            echo "<p> e' necessario confermare la nuova password</p>";
            exit;
        }else{
            $newcpsw = $_POST["newcpsw"];
        }
        if($newpsw != $newcpsw){
            echo "<p> le password non corrispondono.</p>";
            exit;
        }

        $conn = connectDB();
        
        session_start();

        $stmt = mysqli_prepare($conn,"SELECT psw FROM utenti WHERE email = ?;");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['email'] );
        mysqli_stmt_execute($stmt); 
        $result=mysqli_stmt_get_result($stmt);
        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }
        $row = mysqli_fetch_array($result);
        if(password_verify($oldpsw,$row['psw'])){

            $newpsw = trim($newpsw);
            $newhashedpsw = password_hash($newpsw,PASSWORD_DEFAULT);


            $stmt = mysqli_prepare($conn,"UPDATE utenti SET psw = ? WHERE email= ?; ");
            mysqli_stmt_bind_param($stmt, 'ss', $newhashedpsw,$_SESSION['email']);

            mysqli_stmt_execute($stmt); 
            if(mysqli_affected_rows($conn) === 0){
                echo"query error";

                mysqli_close($conn);
                exit();
            
            }
        echo "Password cambiata con successo";
        }
       
        mysqli_close($conn);


    }

?>
