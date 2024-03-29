<?php

    $password = $email = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["email"]) || empty($_POST["pass"])){
            echo json_encode(array("empty"=>"Campi vuoti."));
            exit;
        }else{
            $email = $_POST["email"];
            $password = $_POST["pass"];
        }
        include("../db/connect.php");
        $conn = connectDB();
        mysqli_real_escape_string($conn, $email);
        $email=trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        $stmt = mysqli_prepare($conn,"SELECT * FROM utente WHERE email=?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt); 
        $res=mysqli_stmt_get_result($stmt);

        if(!$res){
            echo json_encode(array("error"=>"mail gia' usata"));
            mysqli_close($conn);
            exit();
            
        }
        if(mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            if(password_verify($password,$row['psw'])){
                session_start();
                $_SESSION['nome'] = $row['_name'];
                $_SESSION['email'] = $email;
                $_SESSION['cart'] = array();
                $_SESSION['logged'] = true;

                echo json_encode(array("ok"=>"Accesso eseguito"));
                
            }else{
                echo json_encode(array("error"=>"Credenziali sbagliate"));
                mysqli_close($conn);
                exit();
            }

        }else{
            echo json_encode(array("error"=>"Credenziali sbagliate"));
            mysqli_close($conn);
            exit();
        }
        $_SESSION['ind'] = false;
        $conn = connectDB();       
        $stmt = mysqli_prepare($conn,"SELECT regione,citta,indirizzo,cap FROM indirizzo WHERE email=?");
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt); 
        $res=mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_array($res);
            //torna true se l'utente ha inserito i dati di consegna, false altrimenti
            $_SESSION['ind'] = (($row['regione'] != NULL) && ($row['citta'] != NULL) && ($row['indirizzo'] != NULL) && ($row['cap'] != NULL));
        }
        else{
            mysqli_close($conn);
            exit();
        }


    }
    mysqli_close($conn);

?>