
<?php


    include("../db/connect.php");

    $name = $surname = $email = $password = $cpassword = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["email"]) || empty($_POST["psw"]) || empty($_POST["cPsw"])){
            echo json_encode(array("empty" => "Campi obbligatori vuoti"));
            exit();
        }else{
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $password = $_POST["psw"];
            $cpassword = $_POST["cPsw"];
        }

        if($password != $cpassword){
            echo json_encode(array("nopsw" =>"le password non corrispondono"));
            mysqli_close($conn);
            exit();
        }
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo json_encode(array("email"=>"mail non valida"));
            mysqli_close($conn);
            exit();
        }
        

        $conn = connectDB();

        $name=trim($name);
        $surname=trim($surname);
        if(strlen($password)<=12){
            echo json_encode(array("error"=>"La password deve essere lunga almeno 12 caratteri"));
            mysqli_close($conn);
            exit();
        }

        $hashedpsw = password_hash($password,PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn,"INSERT INTO utente (email,psw,_name,_surname) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $email,$hashedpsw,$name,$surname);

        if(!mysqli_stmt_execute($stmt)){
            echo json_encode(array("email2"=>"mail gia' usata"));
            mysqli_close($conn);
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
            echo json_encode(array("noAffRow2"=>"Errore durante la registrazione"));
            mysqli_close($conn);
            exit();
            
        }

        echo json_encode(array("ok"=>"Registrato con successo"));
        mysqli_close($conn);


    }

?>
