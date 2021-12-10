<!DOCTYPE html>
<html lang="it">
<head>
    <title>Articolo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<?php

    include ("layout/header.php");
    include("../db/connect.php");

    $id = $_GET['id'];

    $conn = connectDB("localhost","USERNAME","PASSWORD","startSaw");//VALE
    //$conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO
    $query = "SELECT * FROM startSawArticoli WHERE IdArticolo=".$id.";";
    $result = mysqli_query($conn, $query);

        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }else {
            $row = mysqli_fetch_array($result);
            echo "<h1>".$row['Titolo']."</h1>";
            echo "<br>";
            echo "<p>".$row['Descrizione']."</p>"; 
            printf('<img src="data:image/png;base64,%s" />', $row['Immagine']);
            echo"<br>";

            echo "<form action='cart/addInCart.php' method='get'>";
            echo "<select name='qta' id='qta'>";
            echo "<option value='1'>1</option>";
            echo "<option value='2'>2</option>";
            echo "<option value='3'>3</option>";
            echo "</select>";
            echo "<input type='hidden' name='id' value='".$id."'";
            echo"<button type='submit' href='cart/addInCart.php?id=".$_GET['id']."&qta=".$_GET['qta']."' class='btn btn-primary'>Add to cart</button>";
            echo "</form>";
            
        }
        
        mysqli_close($conn);

        include ("layout/footer.php");

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
