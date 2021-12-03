<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
    function retriveInfoFile($filename){
        if ($file = fopen($filename, "r")) {
            while(!feof($file)) {
                $line = trim(fgets($file));
                $tkn = explode(' ', $line);
                echo $line . "<br>";
                echo $tkn[2] . " " . $tkn[3] ;
                if(($tkn[2] == $email) && ($tkn[3] == $password)){
                    echo "<p>Logged in.</p>";
                    fclose($file);
                    exit;
                }
             }
            echo "<p>Email or password not found, retry.</p>";
            fclose($file);
            exit;
        }
    }

    $password = $email = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["email"]) || empty($_POST["psw"])){
            echo "<p>Missing data, retry</p>";
            exit;
        }else{
            $email = $_POST["email"];
            $password = $_POST["psw"];
        }
        include("../db/connect.php");
        $conn = connectDB("localhost","USERNAME","PASSWORD","starSaw");
        mysqli_real_escape_string($conn, $email);

        $query = "SELECT * FROM starSawUser WHERE email = '" . $email . "'";
        $res = mysqli_query($conn,$query);
        if(!$res){
            echo"query error: ". mysqli_error($conn);

            mysqli_close($conn);
            exit();
            
        }
        if(mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            if(password_verify($password,$row['psw'])){
                session_start();
                $_SESSION['nome'] = $row['_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['logged'] = true; 
                echo"logged in.";
                header('Location: ../index.php');
            }else{
                echo "wrong cred";
            }

        }else{
            echo "wtf";
        }

    }
    

?>

</body>
</html>