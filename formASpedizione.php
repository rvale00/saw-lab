<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Dati Spedizione</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link href="css/spedizione.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
        <script src="js/fetchData.js"></script>
    <script>          
            $(document).ready(function(){
                $("#formAddr").submit(function(e){
                    e.preventDefault();
                    aggSpedizione();
                });
            });

        </script>
    </head>

  <body class="text-center">
  <?php
      include("utilPHP/private.php");
  ?>
    
    <main class="form-signin" id="spedForm">
    <form id="formAddr">
        <div class="form-floating">
          <div id="alert"></div>
              <!--<input type="text" class="form-control" id="reg" name="reg" placeholder="Regione">-->
              <select class="form-control" id="reg" name="reg">
                <option value="Abruzzo">Abruzzo</option>
                <option value="Basilicata">Basilicata</option>
                <option value="Calabria">Calabria</option>
                <option value="Campania">Campania</option>
                <option value="Emilia-Romagna">Emilia-Romagna</option>
                <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia</option>
                <option value="Lazio">Lazio</option>
                <option value="Liguria">Liguria</option>
                <option value="Lombardia">Lombardia</option>
                <option value="Marche">Marche</option>
                <option value="Molise">Molise</option>
                <option value="Piemonte">Piemonte</option>
                <option value="Puglia">Puglia</option>
                <option value="Sardegna">Sardegna</option>
                <option value="Sicilia">Sicilia</option>
                <option value="Toscana">Toscana</option>
                <option value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                <option value="Umbria">Umbria</option>
                <option value="Valle d'Aosta">Valle d'Aosta</option>
                <option value="Veneto">Veneto</option>
              </select> 
              <p id="regErr" ></p>
              <label for="floatingInput">Regione</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="citta" name="citta" placeholder="Citta'" required>
          <p id="cittaErr" ></p>
          <label for="floatingInput">Citta'</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="ind" name="ind" placeholder="Indirizzo" required>
          <p id="indErr" ></p>
          <label for="floatingInput">Indirizzo</label>
        </div>

        <div class="form-floating">
          <input type="number" class="form-control" id="cap" name="cap" placeholder="Cap" required>
          <p id="capErr" ></p>
          <label for="floatingInput">Cap</label>
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary"> Invia </button>
        <a href="index.php"> Torna alla home</a>
        <a href="show_profile.php"> Area utente</a>


        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> 
    </form>      
    </main>
    
    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>