 <!DOCTYPE html>
<html lang="it">
<head>
    <title>Articolo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/iusuolbl4ctvv7k1e66puug9agp3qz3xonjoyqj7lzeujzp8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

<?php
    session_start();
    include ("layout/header.php");
    include("../db/connect.php");

    $id = $_GET['id'];

    $conn = connectDB();
    $stmt = mysqli_prepare($conn,"SELECT * FROM articoli WHERE IdArticolo=?");
    mysqli_stmt_bind_param($stmt, 's', $id);
    mysqli_stmt_execute($stmt); 
    $result=mysqli_stmt_get_result($stmt);

        if(!$result){
            echo"query error";

            mysqli_close($conn);
            exit();
            
        }else {

            $row = mysqli_fetch_array($result);
            echo "<div class='container w-auto p-3'>\n";
                echo "\t<div class='row'>\n";
                    echo "\t\t<div class=col-6 my-6'>\n";
                        echo "\t\t\t<h1>".$row['Titolo']."</h1>\n";
                        echo "<br>";
                        echo "<p>".$row['Descrizione']."</p>";
                        printf('<img src="data:image/png;base64,%s" />', $row['Immagine']);
                        echo "<p>".$row['prezzo']."</p>";
                        echo"<br>";

                        echo "<form action='cart/addInCart.php' method='get'>\n";
                        echo "<select name='q' id='q'>\n";
                        echo "<option value='1'>1</option>\n";
                        echo "<option value='2'>2</option>\n";
                        echo "<option value='3'>3</option>\n";
                        echo "</select>\n";
                        echo "<input type='hidden' name='id' value='".$id."'>\n";

                        if(!($_SESSION['logged']))
                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'> Add to cart</button>\n";
                        else
                            echo"<button type='submit' href='cart/addInCart.php?id=".$_GET['id']."' class='btn btn-primary'>Add to cart</button>\n";
                        echo "</form>\n";
                    echo "</div>";

                    
                    $stmt = mysqli_prepare($conn,"SELECT IdArticolo FROM valuta WHERE email=? AND IdArticolo=?");
                    mysqli_stmt_bind_param($stmt, 'ss', $_SESSION['email'], $id);
                    mysqli_stmt_execute($stmt); 
                    $result=mysqli_stmt_get_result($stmt);
                    
                    if(!$result){
                        echo"query error";
            
                        mysqli_close($conn);
                        exit();
                        
                    }else {
                        if(mysqli_num_rows($result) > 0){
                    
                            echo "\t\t<div class=col-6 my-6'>\n";
                            echo "<h1>Valuta il prodotto</h1>";
                            echo "<form action= '' method='get'>";
                            echo "   <h4><select name='v' id='v'>";
                            echo "       <option value='1'>1</option>";
                            echo "       <option value='2'>2</option>";
                            echo "       <option value='3'>3</option>";
                            echo "       <option value='4'>4</option>";
                            echo "       <option value='5'>5</option>";
                            echo "    </select>  / 5 </h4>";
                            
                            echo "   <textarea name='comment'>";
                            echo "       Inserisci qui il tuo commento";
                            echo "   </textarea>";
                            echo "   <script>";
                            echo"       tinymce.init({
                                       selector: 'textarea',
                                       //plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                                       //toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                                       toolbar_mode: 'floating',
                                       tinycomments_mode: 'embedded',
                                       tinycomments_author: 'Author name',
                                   });";
                            echo "   </script>";
                            echo "   <button type='submit'>Invia</button>";
                            echo "   </form>";
                        }
                    }


                    $stmt = mysqli_prepare($conn,"SELECT DISTINCT commento, valutazione FROM valuta WHERE IdArticolo=?");
                    mysqli_stmt_bind_param($stmt, 's', $id);
                    mysqli_stmt_execute($stmt); 
                    $result=mysqli_stmt_get_result($stmt);
                    
                    if(!$result){
                        echo"query error";
            
                        mysqli_close($conn);
                        exit();
                        
                    }else {
                        while($row = mysqli_fetch_array($result)){
                                if($row['valutazione']!=''){
                                    echo "<div class='card' style='width:400px'>";
                                        echo"<div class='card-body'>";
                                            echo"<h4 class='card-title'> valutazione:".$row['valutazione']."</h4>";
                                            echo"<p class='card-text'>".$row['commento']."</p>";
                                        echo"</div>";
                                    echo"</div>";
                                }
                        }
                    
                    }

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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
