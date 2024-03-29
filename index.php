
<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Homepage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <?php
            session_start();
            //header
            include ("layout/header.php");
        ?>
        
        
         <main>
            <!--title-->
            <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-warning">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                <img class="card-img-top" src="img/logo.png" alt="Card image" style="width:100%">
                <p class="lead fw-normal">Customize your programming ducks</p>
                <a class="btn btn-outline-secondary" href="personalizza.php">Coming soon</a>
                </div>
            </div>


            
            <div class="container w-auto p-3 text-center">
                <?php
                    include("db/connect.php");
                    $conn = connectDB();
                    $stmt = mysqli_prepare($conn,"SELECT * FROM articolo ORDER BY idArticolo DESC LIMIT 2 ");
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if(!$result){
                        echo"query error";
                    
                        mysqli_close($conn);
                        exit();

                    }else {

                        echo "<div class='container w-auto p-3 text-center'>";
                            echo "<div class='row'>";
                        while($row = mysqli_fetch_array($result)){
                                echo "<div class='col-6 my-6'>";
                                    echo "<div class='card' style='width:400px'>";
                                    echo "<img src='".$row['Immagine']."'>" ;
                                        echo"<div class='card-body'>";
                                            echo"<h4 class='card-title'>".$row['Titolo']."</h4>";
                                            echo"<p class='card-text'>".$row['Descrizione']."</p>";
                                            echo"<p class='card-text'>€".$row['prezzo']."</p>";
                                            echo"<a href='articolo.php?id=".$row['IdArticolo']."' class='btn btn-primary'>Visualizza</a>";
                                        echo"</div>";
                                    echo"</div>";
                                echo"</div>";
                        
                        }
                        echo"</div>";
                        echo"</div>";
                    
                    }

                    mysqli_close($conn);
                ?>
            </div>
         </main>

        <?php
            //footer
            include ("layout/footer.php");
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
