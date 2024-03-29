
<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Carrello</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
        <script src="../js/fetchData.js"></script>
        <script>
            $(document).ready(function(){
                $("#formCarrello").submit(function(e){
                    e.preventDefault();
                    buyCart();
                });
            });

        </script>
    </head>
    <body>
        <?php
            include("../utilPHP/private.php");
        ?>
        
        <?php
            //header
            include ("../layout/header.php");
            include("../db/connect.php");

            $conn = connectDB();
            $cartList = implode(',', array_keys($_SESSION['cart']));
            echo "<main class='form-signin  text-center' id='regForm'>";
            if(empty($_SESSION['cart'])){
                echo "<h1> Carrello vuoto</h1>";
                exit();
            }
            $art = str_repeat('?,', count(array_keys($_SESSION['cart'])) - 1) . '?';
            $stmt = mysqli_prepare($conn,"SELECT * FROM articolo WHERE IdArticolo IN ($art)");
            $types = str_repeat('s', count(array_keys($_SESSION['cart'])));
            mysqli_stmt_bind_param($stmt, $types, ...array_keys($_SESSION['cart']));
            mysqli_stmt_execute($stmt); 
            $result=mysqli_stmt_get_result($stmt);

            
            echo "<h1> Carrello </h1>";
            echo "<div class='container'id='alert'></div>";
                if(!$result){
                    echo"query error";

                    mysqli_close($conn);
                    exit();
                    
                }else {
                    
                    echo "<div class='container w-auto p-3 text-center'>";
                    echo "<form id='formCarrello'>";
                    echo "<div class='row'>";
                    while($row =  mysqli_fetch_array($result)){   
                            echo "<div class='col-6 '>";
                            echo "<div class='card' style='width:400px'>";
                            echo "<img src='".$row['Immagine']."'>" ;
                            echo"<div class='card-body'>";
                            echo"<h4 class='card-title'>".$row['Titolo']."</h4>";
                                echo"<p class='card-text'>".$row['Descrizione']."</p>";
                                echo"<p class='card-text'>€".$row['prezzo']."</p>";
                                echo"<p class='card-text'>Qta: ". $_SESSION['cart'][$row['IdArticolo']] ."</p>";
                                echo"<a href='removeFromCart.php?id=".$row['IdArticolo']."' class='btn btn-primary'> Rimuovi articolo </a>";
                            echo"</div>";
                            
                        echo"</div>";
                        echo"</div>"; 
                    }  
                echo"<button type='submit' class='w-100 btn btn-lg btn-primary'> Acquista </button>";   
                echo "</div>";
                echo"</form>";
                }
            echo "</div>";
            echo "</main>";   
                
                mysqli_close($conn);

        ?>

        <?php
            //footer
            include ("../layout/footer.php");
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
