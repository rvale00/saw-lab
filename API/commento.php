<?php
    
        include("../db/connect.php");
        session_start();
        $conn = connectDB();
        if(!$_POST['m']){
            $stmt = mysqli_prepare($conn,"INSERT INTO valuta (email,IdArticolo,valutazione,commento,modificato) VALUES (?,?,?,?,?); ");
            mysqli_stmt_bind_param($stmt, 'siisi',$_SESSION['email'],  $_POST['id'] ,$_POST['valutazione'], $_POST['commento'], $_POST['m']);
        }else{
            $stmt = mysqli_prepare($conn,"UPDATE valuta SET valutazione=?, commento=?, modificato=? WHERE email=? AND IdArticolo=?;");
            mysqli_stmt_bind_param($stmt, 'isisi',$_POST['valutazione'], $_POST['commento'], $_POST['m'], $_SESSION['email'], $_POST['id']);
        }
        mysqli_stmt_execute($stmt); 
        $res=mysqli_stmt_get_result($stmt);
        if(mysqli_affected_rows($conn) === 0){
            echo json_encode(array("error"=>"errore"));
            mysqli_close($conn);
            exit();
            
        }
        echo json_encode(array("ok"=>"commento aggiunto"));
        
        
    

?>