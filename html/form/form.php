<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
    $name = $surname = $email = $password = $cpassword = " ";
    $filename = "user.txt";
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

        $toWrite = $name . " " . $surname . " " . $email . " " . $password . "\n";

        if (!$handle = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            exit;
        }
        if (fwrite($handle, $toWrite) === FALSE) {
            echo "Cannot write to file ($filename)";
            exit;
        }
        fclose($handle);
        echo '<h1> registrato con successo </h1>';

    }

?>

</body>
</html>
