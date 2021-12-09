<?php
    session_start();
    array_push($_SESSION['cart'],$_GET['id']);
?>