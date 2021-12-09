<!DOCTYPE html>
<html lang="it">
<head>
    <title>Articolo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <script>
        function getOption() {
            selectElement = document.querySelector('#qta');
            output = selectElement.value;
            document.cookie = "qta="+output; 
    }
    </script>

</head>

<body>

<?php

    include ("layout/header.php");
    include("../db/connect.php");

    //$conn = connectDB("localhost","USERNAME","PASSWORD","startSaw");//VALE
    $conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO
    $query = "SELECT * FROM startSawArticoli WHERE IdArticolo=".$_GET['id'].";";
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
            echo "<select name='qta' id='qta'>";

            echo "<option onclick='getOption()' value='1'>1</option>";
            echo "<option onclick='getOption()'value='2'>2</option>";
            echo "<option onclick='getOption()'value='3'>3</option>";

            echo "</select>";
            echo"<a href='cart/addInCart.php?id=".$_GET['id']."&qta=".$_COOKIE['qta']."' class='btn btn-primary'>Add to cart</a>";
            
            
            
            
            /*echo "<a class='nav-link dropdown-toggle' href='http://example.com' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Dropdown</a>";
            echo "<div class='dropdown-menu' aria-labelledby='dropdown01'>";
            echo "  <a class='dropdown-item' href='#'>1</a>";
            echo "  <a class='dropdown-item' href='#'>2</a>";
            echo "  <a class='dropdown-item' href='#'>3</a>";
            echo "</div>";*/
        }
        
        mysqli_close($conn);

        include ("layout/footer.php");

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
