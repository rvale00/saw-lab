<?php


    include("../db/connect.php");

    $regione = $citta = $indirizzo = $cap = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["reg"]) || empty($_POST["citta"]) || empty($_POST["indirizzo"]) || empty($_POST["cap"])){
            echo json_encode(array("empty" => "Campi obbligatori vuoti"));
            exit(); 
        }else{
            $regione = $_POST["reg"];
            $citta = $_POST["citta"];
            $indirizzo = $_POST["indirizzo"];
            $cap = $_POST["cap"];
        }
   


        $conn = connectDB();
        
        session_start();

        mysqli_real_escape_string($conn, $regione);
        mysqli_real_escape_string($conn, $citta);
        mysqli_real_escape_string($conn, $indirizzo);
       // mysqli_real_escape_string($conn, $cap);

        $stmt = mysqli_prepare($conn,"UPDATE indirizzo SET regione=?,citta=?,indirizzo=?,cap=? WHERE email=?; ");
        mysqli_stmt_bind_param($stmt, 'sssis', $regione, $citta, $indirizzo, $cap, $_SESSION['email']);
 
        /*
        if(!mysqli_stmt_execute($stmt)){
            echo json_encode(array("email"=>"mail gia' usata"));
            mysqli_close($conn);
            exit();
        }*/

        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("noAffRow"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();   
        }

        echo json_encode(array("ok"=>"Indirizzo di consegna aggiunto!"));
       
        mysqli_close($conn);


    }

?>
