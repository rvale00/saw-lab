<?php
    
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
        $conn = connectDB();
        mysqli_real_escape_string($conn, $email);
        $email=trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        $stmt = mysqli_prepare($conn,"SELECT * FROM utenti WHERE email=?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt); 
        $res=mysqli_stmt_get_result($stmt);

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
                $_SESSION['cart'] = array();
                $_SESSION['logged'] = true; 
                echo "logged";
                
            }else{
                echo "wrong cred";
            }

        }else{
            echo "wrong cred";
        }

    }
    

?>