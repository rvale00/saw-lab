<?php
    
        include("../db/connect.php");
        session_start();
        $conn = connectDB();

        $stmt = mysqli_prepare($conn,"INSERT INTO valuta (email,IdArticolo,valutazione,commento) VALUES (?,?,?,?); ");
        mysqli_stmt_bind_param($stmt, 'siis',$_SESSION['email'],  $_POST['id'] ,$_POST['valutazione'], $_POST['commento'] );
        mysqli_stmt_execute($stmt); 
        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("error"=>"errore"));

            mysqli_close($conn);
            exit();
            
        }
        echo json_encode(array("ok"=>"commento aggiunto"));
        
        
    

?>