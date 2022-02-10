<?php


    include("../db/connect.php");

    $oldpsw = $newpsw = $newcpsw = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["old"]) || empty($_POST["new"]) || empty($_POST["cnew"])){
            echo json_encode( array("empty"=>"Campi obbligatori vuoti"));            
        }else{
            $oldpsw = $_POST["old"];
            $newpsw = $_POST["new"];
            $newcpsw = $_POST["cnew"];
        }
        if($newpsw != $newcpsw){
            echo json_encode( array("samepsw"=>"le password non coincidono"));
        }


        $conn = connectDB();
        
        session_start();

        //prendiamo la vecchia password dell'utente
        $stmt = mysqli_prepare($conn,"SELECT psw FROM utente WHERE email = ?;");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['email'] );
        mysqli_stmt_execute($stmt); 
        $result=mysqli_stmt_get_result($stmt);
        if(!$result){
            //$err += array("db1"=>"errore db");
            echo json_encode(array("db1"=>"errore db"));
            mysqli_close($conn);
            
            exit();
            
        }
        $row = mysqli_fetch_array($result);
        
        //verifichiamo che la password trovata corrisponda a quella inserita dall'utente
        if(password_verify($oldpsw,$row['psw'])){

            $newpsw = trim($newpsw);
            $newhashedpsw = password_hash($newpsw,PASSWORD_DEFAULT);

            //se la vecchia password inserita corrisponde a quella salvata sul db allora la aggiorniamo
            $stmt = mysqli_prepare($conn,"UPDATE utente SET psw = ? WHERE email= ?; ");
            mysqli_stmt_bind_param($stmt, 'ss', $newhashedpsw,$_SESSION['email']);

            mysqli_stmt_execute($stmt);

            if(mysqli_affected_rows($conn) === 0){
                //$err += array("db"=>"errore db");
                echo json_encode(array("db1"=>"errore db"));
                mysqli_close($conn);
                exit();
            
            }

            echo json_encode(array("ok"=>"Password cambiata con successo!"));
        }else echo json_encode(array("no"=>"la password è sbagliata"));
       
        mysqli_close($conn);


    }

?>
