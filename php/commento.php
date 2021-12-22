<?php
    
        include("../db/connect.php");
        session_start();
        $conn = connectDB();

        $stmt = mysqli_prepare($conn,"UPDATE compra SET valutazione = ?, commento = ? WHERE IdArticolo=? AND email=?; ");
        mysqli_stmt_bind_param($stmt, 'isss', $_POST['valutazione'], $_POST['commento'], $_POST['id'] ,$_SESSION['email'] );
        mysqli_stmt_execute($stmt); 
        if(mysqli_affected_rows($conn) === 0){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }
        echo "ok";
        
    

?>