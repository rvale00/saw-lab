
<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Carrello</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <script>
            function buyCart(){
            fetch('buy.php', {
                method: "post", 
                }).then(function (response) { 
                    console.log(response.statusText);
                    return response.text();
                }).then(function (result) {
                    alert(result);
                    document.getElementById('cartList').innerHTML = "<h1>Acquistato con successo</h1> \
                                                                     <a class='btn btn-primary' href='../../index.php'> Torna alla home </a>";
                });
            }
        </script>
    </head>
    <body>
        
        <?php
            session_start();
            //header
            include ("../layout/header.php");

            include("../../db/connect.php");

            $conn = connectDB();
            $cartList = implode(',', array_keys($_SESSION['cart']));
            if(empty($_SESSION['cart'])){
                echo "carrello vuoto";
                exit();
            }

            $stmt = mysqli_prepare($conn,"SELECT * FROM articoli WHERE IdArticolo IN (?)");
            mysqli_stmt_bind_param($stmt, 's', $cartList);
            mysqli_stmt_execute($stmt); 
            $result=mysqli_stmt_get_result($stmt);
            echo $cartList;
            echo "<div id='cartList'>";
            echo "<h1> Carrello </h1>";
                if(!$result){
                    echo"query error";

                    mysqli_close($conn);
                    exit();
                    
                }else {
                    echo "<div class='container w-auto p-3 text-center'>";
                    echo "<div class='row'>";
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                        $i++;
                        echo $i;
                        echo "<div class='col-6 my-6'>";
                            echo "<div class='card' style='width:400px'>";
                            printf('<img src="data:image/png;base64,%s" />', $row['Immagine']);
                                echo"<div class='card-body'>";
                                    echo"<h4 class='card-title'>".$row['Titolo']."</h4>";
                                    echo"<p class='card-text'>".$row['Descrizione']."</p>";
                                    echo"<p class='card-text'>€".$row['prezzo']."</p>";
                                    echo"<a href='articolo.php?id=".$row['IdArticolo']."' class='btn btn-primary'>See Profile</a>";
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";
                        
    
                    }
                }
                
                echo "</div>";
                echo"<a onclick='buyCart()' class='btn btn-primary'> Acquista </a>";
                echo "</div>";
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
