<?php
session_start();

include("../../db/connect.php");
//si controlla se l'utente ha inserito i dati di spedizione
$ind = $_SESSION['ind'];
if(!$ind){
    echo json_encode(array("ind"=>"Non e' stato inserito l'indirizzo di consegna"));
    exit();
}
//si effettua l'acquisto
$conn = connectDB();
foreach ($_SESSION['cart'] as $artId => $qta) {
    $stmt = mysqli_prepare($conn,"INSERT INTO compra (idArticolo,email,quantita,dataOra) VALUES (?,?,?,NOW())");
    mysqli_stmt_bind_param($stmt, 'ssi', $artId,$_SESSION['email'],$qta);
    mysqli_stmt_execute($stmt); 
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_affected_rows($conn) === 0){
        echo json_encode(array("error"=>"errore"));
        mysqli_close($conn);
        exit();
        
    }
}
$_SESSION['cart'] = array();
echo json_encode(array("ok"=>"Acquistato con successo"));
exit();
?>