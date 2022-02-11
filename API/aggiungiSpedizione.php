<?php


    include("../db/connect.php");

    $regione = $citta = $indirizzo = $cap = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["reg"]) || empty($_POST["citta"]) || empty($_POST["indirizzo"]) || empty($_POST["cap"])){
            echo json_encode(array("error" => "Campi obbligatori vuoti"));
            exit(); 
        }else{
            $regione = $_POST["reg"];
            $citta = $_POST["citta"];
            $indirizzo = $_POST["indirizzo"];
            $cap = $_POST["cap"];
        }
   


        $conn = connectDB();
        
        session_start();

        $stmt = mysqli_prepare($conn,"UPDATE indirizzo SET regione=?,citta=?,indirizzo=?,cap=? WHERE email=?; ");
        mysqli_stmt_bind_param($stmt, 'sssis', $regione, $citta, $indirizzo, $cap, $_SESSION['email']);
        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("error"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();   
        }
        
        $_SESSION['ind'] = true;
        echo json_encode(array("ok"=>"Indirizzo di consegna aggiunto!"));
       
        mysqli_close($conn);


    }

?>
