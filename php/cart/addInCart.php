<?php
    session_start();
    $auxArray = array($_GET['id'] => $_GET['q']);
    if( array_key_exists($_GET['id'],$_SESSION['cart']) )
      $_SESSION['cart'][strval($_GET['id'])] += $_GET['q'];
    else
      $_SESSION['cart'] = $_SESSION['cart']+$auxArray;

    header('Location: ../../index.php');
?>