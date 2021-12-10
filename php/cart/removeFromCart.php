<?php
    session_start();
    
    unset($_SESSION['cart'][strval($_GET['id'])]);

    header('Location: listaCarrello.php');
?>