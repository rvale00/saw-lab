<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Area personale</title>
    </head>
    <body>
    
        <h1>My Beautiful Homepage!</h1>
        
        <?php
        include("../db/connect.php");
        session_start();
        //$conn = connectDB("localhost","USERNAME","PASSWORD","startSaw"); //VALE
        $conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO

        $emailSession=$_SESSION['email'];
        $query = "SELECT * FROM utenti WHERE email='$emailSession'";
        $res = mysqli_query($conn, $query);
        if(!$res){
            echo"query error: ". mysqli_error($conn);

            mysqli_close($conn);
            exit();
            
        }
        $row = mysqli_fetch_array($res);
        ?>
        <form action="personalArea.php" method="post">
        <fieldset>
        <legend>Modify</legend>
        <Label><strong>Nome</strong></Label>
        <input type="text" id="fname" name="name" value="<?php echo $row['_name'] ?>" >
        <br>
        <Label><strong>Cognome</strong></Label>
        <input type="text" id="lname" name="surname" value="<?php echo $row['_surname'] ?>">
        <br>
        <Label><strong>E-mail</strong></Label>
        <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>">
        <br>
        <input type="submit" >
        <a href="../index.php"> Torna alla home</a>
        <a href='cambiaPassword.php'> Cambia Password </a>
        </fieldset>
        </form>

        <?php
        $name = $surname = $email = " ";
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
            
            mysqli_real_escape_string($conn, $name);
            mysqli_real_escape_string($conn, $surname);
            mysqli_real_escape_string($conn, $email);
            $query = "UPDATE utenti SET email='".$email."',_name='".$name."', _surname='".$surname."' WHERE email='$emailSession' ;";
            $res = mysqli_query($conn, $query);
            $_SESSION['email'] = $email; 
            if(!$res){
                echo"query error: ". mysqli_error($conn);
    
                mysqli_close($conn);
                exit();
                
            }
            echo "Modify applied";
            mysqli_close($conn);


        }

        ?>  

    </body>
</html>