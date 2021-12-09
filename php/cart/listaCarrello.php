
<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Carrello</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <?php
            session_start();
            //header
            include ("../layout/header.php");
        ?>
        
        <?php
            include("../../db/connect.php");

            //$conn = connectDB("localhost","USERNAME","PASSWORD","startSaw");//VALE
            $conn = connectDB("localhost","root","turbofregna","startSaw"); //COZZO
            $cartList = implode(',', $_SESSION['cart']);
            if(empty($_SESSION['cart'])){
                echo "carrello vuoto";
                exit();
            }
            $query = "SELECT * FROM startSawArticoli WHERE idArticolo IN (" . $cartList . ");";
            echo $query;
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
                            echo"</div>";
                        echo"</div>";
                    }
                    foreach($_SESSION['cart'] as $x => $x_value) {
                        echo "Id=" . $x . ", Qta=" . $x_value;
                        echo "<br>";
                      }
                }
                
                mysqli_close($conn);

        ?>

        <?php
            //footer
            include ("../layout/footer.php");
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
