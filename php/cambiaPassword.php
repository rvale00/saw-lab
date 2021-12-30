<?php


    include("../db/connect.php");

    $oldpsw = $newpsw = $newcpsw = " ";
    $err = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["oldpsw"])){
            $err += array("old"=>"e' necessario inserire la vecchia password");
            exit;
        }else{
            $oldpsw = $_POST["oldpsw"];
        }
        if(empty($_POST["newpsw"])){
            $err += array("new"=>"e' necessario inserire la password nuova");
            exit;
        }else{
            $newpsw = $_POST["newpsw"];
        }
        if(empty($_POST["newcpsw"])){
            $err += array("cpsw"=>"e' necessario confermare la password");
            exit;
        }else{
            $newcpsw = $_POST["newcpsw"];
        }
        if($newpsw != $newcpsw){
            $err += array("samepsw"=>"le password non coincidono");
            exit;
        }
        if (!empty($err)){
            echo json_encode($err);
            exit();
        }

        $conn = connectDB();
        
        session_start();

        $stmt = mysqli_prepare($conn,"SELECT psw FROM utenti WHERE email = ?;");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['email'] );
        mysqli_stmt_execute($stmt); 
        $result=mysqli_stmt_get_result($stmt);
        if(!$result){
            $err += array("db"=>"errore db");
            mysqli_close($conn);
            echo json_encode($err);
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
                $err += array("db"=>"errore db");
                mysqli_close($conn);
                echo json_encode($err);
                exit();
            
            }else{
                echo json_encode(array("pswerr2"=>"la password non coincide con la password attuale"));
            }
            echo json_encode(array("ok"=>"Password cambiata con successo!"));
        }
       
        mysqli_close($conn);


    }

?>
