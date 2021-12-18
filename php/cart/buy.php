<?php
session_start();
$conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO
$cartList = implode(',', array_keys($_SESSION['cart']));
$stmt = mysqli_prepare($conn,"UPDATE valuta SET haComprato=1 WHERE idArticolo IN(?)");
mysqli_stmt_bind_param($stmt, 's', $cartList);
mysqli_stmt_execute($stmt); 
$result=mysqli_stmt_get_result($stmt);
if(!$result){
    $string = array("msg" => "Qualcosa e' andato storto :( ","mysqlDbg" => "err: ".mysqli_close($conn));
    return json_encode($string);
}
unset($_SESSION['cart']);
$string = array("msg" => "Acquistato con successo!");
return json_encode($string);
?>