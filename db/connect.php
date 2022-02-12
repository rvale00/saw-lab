<?php

    function connectDB(){
        $hostname="localhost";
        $user="S4852454";
        $psw="CastelloDiSabbi4";
        $db="S4852454";
        
        $mysqli = mysqli_connect($hostname,$user,$psw,$db);
        if (mysqli_connect_errno()) {
            echo "<script>\n\tconsole.log(db error: " . mysqli_connect_error() . " - errno: " . mysqli_connect_errno() .")</script>\n";
            exit();
        }
        return $mysqli;
    }


?>
