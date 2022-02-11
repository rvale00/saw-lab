<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Cambio password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
        <script src="js/fetchData.js"></script>
    <script> 
            $(document).ready(function(){
                $("#formAddr").submit(function(e){
                    e.preventDefault();
                    cPsw();
                });
            });
        </script>
    </head>

  <body class="text-center">
    <?php
      include("utilPHP/private.php");
    ?>
    
    <main class="form-signin" id="cpForm">
      <div id="alert"></div>
      <form id="formAddr">
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        <h1 class="h3 mb-3 fw-normal">Cambia password</h1>

        <div class="form-floating"  id="floatingPassword">
        <input type="password" class="form-control"  id="old" name="old" placeholder="Password" required>
        <label for="floatingInput">Password attuale</label>
        </div>
    
        <div class="form-floating"  id="floatingPassword">
        <input type="password" class="form-control" id="new" name="new" placeholder="Password" minlength="12" title="La password deve contenere 12 caratteri." required>
        <label for="floatingInput">Nuova password</label>
        </div>
        <div class="form-floating"  id="floatingPassword">
        <input type="password" class="form-control" id="cnew" name="cnew" placeholder="Password" minlength="12" title="La password deve contenere 12 caratteri." required>
        <label for="floatingPassword"> Conferma nuova password</label>
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary">Cambia Password</button>
        <a href="index.php"> Torna alla home</a>
        <a href="show_profile.php"> Area utente</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
      </form>
    </main>
    
    
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>