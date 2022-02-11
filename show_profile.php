<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
        <script src="js/fetchData.js"></script>
        <script>


            $(document).ready(function(){
                $("#cCredForm").submit(function(e){
                    e.preventDefault();
                    changeCred();
                });
            });

        </script>
    </head>
    
    <body class="text-center">
    <?php
      include("utilPHP/private.php");
    ?>
        <main class="form-signin" id="credForm">

        <form id="cCredForm">

            <?php

                include("db/connect.php");
                //session_start();
                $conn = connectDB();
            
                $emailSession=$_SESSION['email'];
                $query = "SELECT * FROM utente WHERE email='$emailSession'";
                $res = mysqli_query($conn, $query);
                if(!$res){
                    echo"query error: ". mysqli_error($conn);
                
                    mysqli_close($conn);
                    exit();

                }
                $row = mysqli_fetch_array($res);
            ?>

        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        <div class="container"id="alert"></div>
        <div class="form-floating">
          <input type="text" class="form-control" type="text" id="fname" name="firstname" value=" <?php echo htmlspecialchars($row['_name']) ?>">
          <label for="floatingInput">Nome</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="lname" name="lastname" value="<?php echo htmlspecialchars($row['_surname']) ?>">
          <label for="floatingInput">Cognome</label>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']) ?>">
          <label for="floatingInput">Email </label>
        </div>

        
        <button type="submit" class="w-100 btn btn-lg btn-primary"> Conferma modifiche </button>
        <a href="index.php"> Torna alla home</a>
        <a href='formCPass.php'> Cambia Password </a>
        <a href='formASpedizione.php'> Aggiungi indirizzo di spedizione </a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
        </form>
        </main>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>
</html>