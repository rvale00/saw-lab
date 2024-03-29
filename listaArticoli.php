<!DOCTYPE html>
<html lang="it">
<head>
    <title>Lista articoli</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
</head>

<body>

<?php
    session_start();
    include ("layout/header.php");
    include("db/connect.php");
    ?>
    <div class='container w-auto p-3 text-center'>
    <form action="./listaArticoli.php" method="get" >
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="src">        
      <button type="submit" class="btn btn-warning px-5">Search</button>
    </form>
    </div>
    <?php
    $conn = connectDB();

    if(isset($_GET['src'])){
        $stmt = mysqli_prepare($conn,"SELECT * FROM articolo WHERE Titolo LIKE ?");
        $get="%{$_GET['src']}%";
        mysqli_stmt_bind_param($stmt, 's', $get);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    
    else{
        $stmt = mysqli_prepare($conn,"SELECT * FROM articolo");
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

    }

        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }else {
            echo "<div class='container w-auto p-3 text-center'>";
            if(mysqli_num_rows($result) == 0){
                echo"<h2> Non ci sono articoli :( </h2>";
            }else{
                echo "<div class='row'>";
                while($row = mysqli_fetch_array($result)){
                    echo "<div class='col-6 my-6'>";
                        echo "<div class='card' style='width:400px'>";
                        echo "<img src='".$row['Immagine']."'>";
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
            }
            echo"</div>";

        }
        
        mysqli_close($conn);

        include ("layout/footer.php");

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>