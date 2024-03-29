 <!DOCTYPE html>
<html lang="it">
<head>
    <title>Articolo</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/articolo.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/iusuolbl4ctvv7k1e66puug9agp3qz3xonjoyqj7lzeujzp8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>   

    <!-- default styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

<!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>

<!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>
<script src="js/fetchData.js"></script>

    <script>
            $(document).ready(function(){
                $('.valStar').rating({displayOnly: true, step: 1});
                $("#commento").submit(function(e){
                    e.preventDefault();
                    sendComment();
                });
            });

    </script>

    
</head>

<body>

<?php
    session_start();
    include ("layout/header.php");
    include("db/connect.php");

    $id = $_GET['id'];

    $conn = connectDB();
    //proietta articolo
    $stmt = mysqli_prepare($conn,"SELECT * FROM articolo WHERE IdArticolo=?");
    mysqli_stmt_bind_param($stmt, 's', $id);
    mysqli_stmt_execute($stmt); 
    $result=mysqli_stmt_get_result($stmt);

        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }else {

            $row = mysqli_fetch_array($result);
            echo "<div class='container w-auto p-3'>\n
            <div class='container' id='alert'></div>";
                echo "\t<div class='row'>\n";
                    echo "\t\t<div class='col-6 my-6'>\n";
                        echo "\t\t\t<h1>".$row['Titolo']."</h1>\n";
                        echo "<br>";
                        echo "<p>".$row['Descrizione']."</p>";
                        echo "<img src='".$row['Immagine']."'>" ;
                        echo "<h4 class='text-center'>".$row['prezzo']."€</h4>";
                        echo"<br>";

                        echo "<form action='cart/addInCart.php' method='get'>\n";
                        echo "<select name='q' id='q'>\n";
                        echo "<option value='1'>1</option>\n";
                        echo "<option value='2'>2</option>\n";
                        echo "<option value='3'>3</option>\n";
                        echo "</select>\n";
                        echo "<input type='hidden' name='id' value='".$id."'>\n";

                        if(!(isset($_SESSION['logged'])))
                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'> Aggiungi al carrello</button>\n";
                        else
                            echo"<button type='submit' href='cart/addInCart.php?id=".$_GET['id']."' class='btn btn-primary'>Aggiungi al carrello</button>\n";
                        echo "</form>\n";
                    echo "</div>";

                    echo "\t\t<div class='col-6 my-6 flex'>\n";
                    //controlla che l'articolo sia stato comprato per poter lasciare una recensione
                    $stmt = mysqli_prepare($conn,"SELECT IdArticolo FROM compra WHERE email=? AND IdArticolo=?");
                    mysqli_stmt_bind_param($stmt, 'ss', $_SESSION['email'], $id);
                    mysqli_stmt_execute($stmt); 
                    $result=mysqli_stmt_get_result($stmt);
                    
                    if(!$result){
                        echo"query error";
            
                        mysqli_close($conn);
                        exit();
                        
                    }else {
                        $stmt = mysqli_prepare($conn,"SELECT avg(valutazione) as media FROM valuta WHERE IdArticolo = ?");
                        mysqli_stmt_bind_param($stmt, 's', $id);
                        mysqli_stmt_execute($stmt); 
                        $resultMedia=mysqli_stmt_get_result($stmt);
                        $rowMedia = mysqli_fetch_array($resultMedia);
                        echo "<span> <h3>Media valutazione</h3> <input data-size='sm' value='".$rowMedia['media']."' class='valStar'> </span>";
                        if(mysqli_num_rows($result) > 0){
                            $modified = false;
                            //controlla se l'articolo e' stato recensito dall'utente
                            $stmt = mysqli_prepare($conn,"SELECT * FROM valuta WHERE email=? AND IdArticolo=?");
                            mysqli_stmt_bind_param($stmt, 'ss', $_SESSION['email'], $id);
                            mysqli_stmt_execute($stmt); 
                            $resultV=mysqli_stmt_get_result($stmt);
                        
                            //se vero, l'utente ha gia fatto una recensione
                            if(mysqli_num_rows($resultV) > 0){
                                $modified=true;
                                $rowV = mysqli_fetch_array($resultV);
                            }
                            echo "<h3>Valuta il prodotto</h3>";
                            echo "<form id='commento'>";
                            if(!$modified)
                                echo "<input  data-show-clear='false' data-show-caption='true' id='input-id' type='text' class='rating' data-size='sm' data-min='0' data-max='5' data-step='1' >"; 
                            else
                                echo "<input value='".$rowV['valutazione']."' data-show-clear='false' data-show-caption='true' id='input-id' type='text' class='rating' data-size='sm' data-min='0' data-max='5' data-step='1' >";                            
                            echo "   <textarea name='comment' class='container mt-1 mb-1 border-left border-right overflow-auto'>";
                            if(!$modified)
                                echo "Inserisci qui il tuo commento";
                            else
                                echo $rowV['commento'];
                            echo "</textarea>";
                            echo "<input type='hidden' value='".$modified."' id='mod' name='mod'>";
                            echo "<button type='submit' class='btn btn-primary' >Invia</button>";
                            echo "</form>";
                        }
                    }

                    echo "<div>";
                    echo "<h3> Valutazioni e commenti:</h3>";
                    //mostra recensioni sull'articolo
                    $stmt = mysqli_prepare($conn,"SELECT commento, valutazione, _name,modificato FROM valuta NATURAL JOIN utente WHERE IdArticolo = ?");
                    mysqli_stmt_bind_param($stmt, 's', $id);
                    mysqli_stmt_execute($stmt); 
                    $result=mysqli_stmt_get_result($stmt);
                    if(!$result){
                        echo"query error";
                        mysqli_close($conn);
                        exit();
                        
                    }
                    if(mysqli_num_rows($result) == 0){
                        echo"
                        <div>
                        <small class='second py-2 px-2 text-muted'> Non ci sono commenti per questo articolo </small>
                        </div>
                        ";
                    }

                    echo "<div id='showComments' class='container mt-5 border-left border-right overflow-auto'>";

                        while($row = mysqli_fetch_array($result)){
                                if($row['valutazione']!=''){
                                    echo"
                                    <div>
                                    <hr>
                                    <input data-size='xs' value='".$row['valutazione']."' displayOnly='true' class='valStar'>
                                    <p id='showComments' class='second py-2 px-2'>".htmlspecialchars($row['commento'])."</p>
                                    <span class='text2'>Da: ".htmlspecialchars($row['_name'])."</span>
                                    ";
                                    if($row['modificato'])
                                        echo"<span class='text2'><small class='second py-2 px-2 text-muted'><i>Modificato</i> </small></span>";
                                    echo"    
                                    <hr>
                                    </div>
                                    ";
                                }
                        }
                    
                    echo"</div>";
                    echo"</div>";
                    

                    echo "</div>";
                echo "</div>";
            echo "</div>";


            
        }

        
        mysqli_close($conn);


?> 





<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Non sei loggato</h4>
      </div>
      <div class="modal-body">
        <p>Per comprare l'articolo accedi o se non hai ancora un account crealo</p>
      </div>
      <div class="modal-footer">
        <a href="formLogin.php" class="btn btn-default">Accedi</a>
        <a href="formRegister.php" class="btn btn-default">Registrati</a>
        <a class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>

  </div>
</div>


<?php

        include ("layout/footer.php");

?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
