<?php
    include("../db/connect.php");
    session_start();
    $conn = connectDB();

    $name = $surname = $email = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["email"])){
            echo json_encode(array("empty" => "Campi obbligatori vuoti"));
            exit();
        }else{
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
        }
        $emailSession = $_SESSION['email'] ;
        mysqli_real_escape_string($conn, $name);
        mysqli_real_escape_string($conn, $surname);
        mysqli_real_escape_string($conn, $email);
        $query = "UPDATE utenti SET email='".$email."',_name='".$name."', _surname='".$surname."' WHERE email='$emailSession' ;";
        $res = mysqli_query($conn, $query);
        $_SESSION['email'] = $email; 
        if(!$res){
            echo json_encode(array("error"=> mysqli_error($conn)));

            mysqli_close($conn);
            exit();
            
        }
        echo json_encode(array("ok"=>"Aggiornato con successo"));
        mysqli_close($conn);
    }

?>  
        