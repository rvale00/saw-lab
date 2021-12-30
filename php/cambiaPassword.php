<?php


    include("../db/connect.php");

    $oldpsw = $newpsw = $newcpsw = " ";
    $err = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["old"])){
            $err += array("old"=>"e' necessario inserire la vecchia password");
            
        }else{
            $oldpsw = $_POST["old"];
        }
        if(empty($_POST["new"])){
            $err += array("new"=>"e' necessario inserire la password nuova");
            
        }else{
            $newpsw = $_POST["new"];
        }
        if(empty($_POST["cnew"])){
            $err += array("cnew"=>"e' necessario confermare la password");
            
        }else{
            $newcpsw = $_POST["cnew"];
        }
        if($newpsw != $newcpsw){
            $err += array("samepsw"=>"le password non coincidono");
        }
        if (!empty($err)){
            echo json_encode($err);
            exit();
        }

        $conn = connectDB();
        
        session_start();

        //prendiamo la vecchia password dell'utente
        $stmt = mysqli_prepare($conn,"SELECT psw FROM utenti WHERE email = ?;");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['email'] );
        mysqli_stmt_execute($stmt); 
        $result=mysqli_stmt_get_result($stmt);
        if(!$result){
            //$err += array("db1"=>"errore db");
            echo json_encode(array("db1"=>"errore db"));
            mysqli_close($conn);
            
            exit();
            
        }
        $row = mysqli_fetch_array($result);
        
        //verifichiamo che la password trovata corrisponda a quella inserita dall'utente
        if(password_verify($oldpsw,$row['psw'])){

            $newpsw = trim($newpsw);
            $newhashedpsw = password_hash($newpsw,PASSWORD_DEFAULT);

            //se la vecchia password inserita corrisponde a quella salvata sul db allora la aggiorniamo
            $stmt = mysqli_prepare($conn,"UPDATE utenti SET psw = ? WHERE email= ?; ");
            mysqli_stmt_bind_param($stmt, 'ss', $newhashedpsw,$_SESSION['email']);

            mysqli_stmt_execute($stmt);

            if(mysqli_affected_rows($conn) === 0){
                //$err += array("db"=>"errore db");
                echo json_encode(array("db1"=>"errore db"));
                mysqli_close($conn);
                exit();
            
            }

            echo json_encode(array("ok"=>"Password cambiata con successo!"));
        }else echo json_encode(array("no"=>"la password è sbagliata"));
       
        mysqli_close($conn);


    }

?>
