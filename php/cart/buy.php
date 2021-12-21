<?php
session_start();

include("../../db/connect.php");
$conn = connectDB();

foreach ($_SESSION['cart'] as $artId => $qta) {
    $stmt = mysqli_prepare($conn,"INSERT INTO valuta (idArticolo,email,quantita,dataOra) VALUES (?,?,?,NOW())");
    mysqli_stmt_bind_param($stmt, 'ssi', $artId,$_SESSION['email'],$qta);
    mysqli_stmt_execute($stmt); 
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_affected_rows($conn) === 0){
        echo"query error";

        mysqli_close($conn);
        exit();
        
    }
}
$_SESSION['cart'] = array();
$string = "ok";
echo $string;
exit();
?>