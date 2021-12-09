<?php
    session_start();
    $auxArray = array($_GET['id'] => $_GET['qta']);
    
      $_SESSION['cart'] = array_merge($_SESSION['cart'], $auxArray);
    header('Location: ../../index.php');
?>