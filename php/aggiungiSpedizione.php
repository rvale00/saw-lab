<?php


    include("../db/connect.php");

    $regione = $citta = $indirizzo = $cap = " ";
    $err = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["reg"])){
            $err += array("reg" => " e' necessario inserire la regione");
        }else{
            $regione = $_POST["reg"];
        }

        if(empty($_POST["citta"])){
            $err += array("citta" =>" e' necessario inserire la citta'");
        }else{
            $citta = $_POST["citta"];
        }

        if(empty($_POST["indirizzo"])){
            $err += array("ind" =>" e' necessario inserire l'indirizzo di spedizione");
        }else{
            $indirizzo = $_POST["indirizzo"];
        }

        if(empty($_POST["cap"])){
            $err += array("cap" =>" e' necessario inserire il CAP");
        }else{
            $cap = $_POST["cap"];
        }

        if (!empty($err)){
            echo json_encode($err);
            exit();
        }

        $conn = connectDB();
        
        session_start();

        mysqli_real_escape_string($conn, $regione);
        mysqli_real_escape_string($conn, $citta);
        mysqli_real_escape_string($conn, $indirizzo);
        mysqli_real_escape_string($conn, $cap);
        /*aggiustare il database per questa query*/
        $stmt = mysqli_prepare($conn,"INSERT INTO indirizzo (email,regione,citta,indirizzo,cap) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssssi', $_SESSION['email'],$regione,$citta,$indirizzo,$cap);

        if(!mysqli_stmt_execute($stmt)){
            $err += array("email"=>"mail gia' usata");
            mysqli_close($conn);
            echo json_encode($err);
            exit();
        }

        if(mysqli_affected_rows($conn) === 0
        ){
            echo json_encode(array("noAffRow"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();
            
        }
        echo json_encode(array("ok"=>"Registrato con successo!"));
       
        mysqli_close($conn);


    }

?>
