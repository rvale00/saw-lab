
<?php


    include("../db/connect.php");

    $name = $surname = $email = $password = $cpassword = $regione = $citta = $indirizzo = $cap = " ";
    $err = array();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $err += array("fname" => " e' necessario inserire il nome");
        }else{
            $name = $_POST["name"];
        }

        if(empty($_POST["surname"])){
            $err += array("lname" =>" e' necessario inserire il cognome");
        }else{
            $surname = $_POST["surname"];
        }

        if(empty($_POST["email"])){
            $err += array("email" =>" e' necessario inserire l'email");
        }else{
            $email = $_POST["email"];
        }

        if(empty($_POST["psw"])){
            $err += array("psw" =>" e' necessario inserire una password");
        }else{
            $password = $_POST["psw"];
        }

        if(empty($_POST["cPsw"])){
            $err += array("cPsw" =>" e' necessario confermare la password");
        }else{
            $cpassword = $_POST["cPsw"];
        }

        if($password != $cpassword){
            $err += array("nopsw" =>" le password non corrispondono.");
        }
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $err += array("email"=>"mail non valida");
        }
        
        

        //controlla se ci sono campi vuoti
        if (!empty($err)){
            echo json_encode($err);
            exit();
        }

        $conn = connectDB();

        
        mysqli_real_escape_string($conn, $name);
        $name=trim($name);
        //$newname = filter_var($name, FILTER_SANITIZE_STRING);

        mysqli_real_escape_string($conn, $surname);
        $surname=trim($surname);
        //$newsname = filter_var($surname, FILTER_SANITIZE_STRING);


        mysqli_real_escape_string($conn, $email);
        $password = trim($password);
        
        
        $hashedpsw = password_hash($password,PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn,"INSERT INTO utenti (email,psw,_name,_surname) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $email,$hashedpsw,$name,$surname);

        if(!mysqli_stmt_execute($stmt)){
            $err += array("email"=>"mail gia' usata");
            mysqli_close($conn);
            echo json_encode($err);
            exit();
        }

        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("noAffRow"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();
            
        }

        //è andato a buon fine
        $stmt = mysqli_prepare($conn,"INSERT INTO indirizzo (email) VALUES (?)");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("noAffRow"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();
            
        }

        echo json_encode(array("ok"=>"Registrato con successo!"));
        mysqli_close($conn);


    }

?>
