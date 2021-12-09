<?php
function connectDB($server,$user,$psw,$db){ 
        $conn = mysqli_connect($server,$user,$psw,$db);
        if (mysqli_connect_errno()) {
            throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
        }
        echo "<script>console.log('connected')</script>";
        return $conn;
    }
?>