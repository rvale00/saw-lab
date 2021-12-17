<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php


    include("../db/connect.php");

    $name = $surname = $email = $password = $cpassword = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            echo "<p> e' necessario inserire il nome</p>";
            exit;
        }else{
            $name = $_POST["name"];
        }
        if(empty($_POST["surname"])){
            echo "<p> e' necessario inserire il cognome</p>";
            exit;
        }else{
            $surname = $_POST["surname"];
        }
        if(empty($_POST["email"])){
            echo "<p> e' necessario inserire l'email</p>";
            exit;
        }else{
            $email = $_POST["email"];
        }
        if(empty($_POST["psw"])){
            echo "<p> e' necessario inserire una password</p>";
            exit;
        }else{
            $password = $_POST["psw"];
        }
        if(empty($_POST["cPsw"])){
            echo "<p> e' necessario confermare la password</p>";
            exit;
        }else{
            $cpassword = $_POST["cPsw"];
        }
        if($password != $cpassword){
            echo "<p> le password non corrispondono.</p>";
            exit;
        }

        //$conn = connectDB("localhost","USERNAME","PASSWORD","startSaw");//VALE
        $conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO

        mysqli_real_escape_string($conn, $name);
        $name=trim($name);
        $newname = filter_var($name, FILTER_SANITIZE_STRING);
        mysqli_real_escape_string($conn, $surname);
        $surname=trim($surname);
        $newsname = filter_var($surname, FILTER_SANITIZE_STRING);
        mysqli_real_escape_string($conn, $email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
                    echo("$email is invalid");
                }
        $password = trim($password);
        $hashedpsw = password_hash($password,PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn,"INSERT INTO utenti (email,psw,_name,_surname) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $email,$hashedpsw,$name,$surname);

        mysqli_stmt_execute($stmt); 
        if(mysqli_affected_rows($conn) === 0){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }
        echo "Registered.";
        echo " <a href='formLogin.php'> Accedi </a>";
        mysqli_close($conn);


    }

?>

</body>
</html>
