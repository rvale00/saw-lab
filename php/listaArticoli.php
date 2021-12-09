<!DOCTYPE html>
<html lang="it">
<head>
    <title>Lista articoli</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<?php

    include ("layout/header.php");
    include("../db/connect.php");

    //$conn = connectDB("localhost","USERNAME","PASSWORD","startSaw");//VALE
    $conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO
    $query = "SELECT * FROM startSawArticoli;";
    $result = mysqli_query($conn, $query);

        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }else {
            while($row = mysqli_fetch_array($result)){
                


                echo "<div class='card' style='width:400px'>";
                printf('<img src="data:image/png;base64,%s" />', $row['Immagine']);
                    echo"<div class='card-body'>";
                        echo"<h4 class='card-title'>".$row['Titolo']."</h4>";
                        echo"<p class='card-text'>".$row['Descrizione']."</p>";
                        echo"<a href='articolo.php?id=".$row['IdArticolo']."' class='btn btn-primary'>See Profile</a>";
                        echo"<a href='cart/addInCart.php?id=".$row['IdArticolo']."' class='btn btn-primary'>Add to cart</a>";
                        
                    echo"</div>";
                echo"</div>";
            }

        }
        
        mysqli_close($conn);

        include ("layout/footer.php");

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>