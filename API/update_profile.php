<?php
    include("../db/connect.php");
    session_start();
    $conn = connectDB();

    $name = $surname = $email = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"])){
            echo json_encode(array("empty" => "Campi obbligatori vuoti"));
            exit();
        }else{
            $name = $_POST["firstname"];
            $surname = $_POST["lastname"];
            $email = $_POST["email"];
        }
        $emailSession = $_SESSION['email'] ;

        $stmt = mysqli_prepare($conn,"UPDATE utente SET email=?,_name=?, _surname=? WHERE email=?");
        mysqli_stmt_bind_param($stmt, 'ssss', $email,$name,$surname,$emailSession);
        mysqli_stmt_execute($stmt); 
        $res=mysqli_stmt_get_result($stmt);
        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("error"=>"errore"));
            mysqli_close($conn);
            exit();
            
        }
        //si aggiornano le variabili di sessione
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $name;
        echo json_encode(array("ok"=>"Aggiornato con successo"));
        mysqli_close($conn);
    }

?>  
        