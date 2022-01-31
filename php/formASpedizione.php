<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Cambio password</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
        </style>



    <script>
            function checkData(result){
              if(result.empty != undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.empty+"</div>");     
              }
              if(result.noAffRow!=undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.noAffRow+"</div>");
              }
            }
            function aggSpedizione(){
              var reg = document.getElementsByName("reg")[0].value;
              var citta = document.getElementsByName("citta")[0].value;
              var ind = document.getElementsByName("ind")[0].value;
              var cap = document.getElementsByName("cap")[0].value;
            fetch('aggiungiSpedizione.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "reg=" + reg + "&citta=" + citta + "&indirizzo=" + ind + "&cap=" + cap,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    //alert(JSON.stringify(result));
                    checkData(result);
                    if(result.ok!=undefined){
                      $('#spedForm').html("<h1>"+result.ok+"</h1> \
                                          <a class='btn btn-primary' href='../index.php'> Torna alla home </a>");
                    
                    }
                    
                });
            }
            $(document).ready(function(){
                $("#formAddr").submit(function(e){
                    e.preventDefault();
                    aggSpedizione();
                });
            });

        </script>
    </head>

  <body class="text-center">
    
    <main class="form-signin" id="spedForm">
    <form id="formAddr">
        <div class="form-floating">
          <div id="alertBox"></div>
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
        <a href="../index.php"> Torna alla home</a>
        <a href="personalArea.php"> Area utente</a>


        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> 
    </form>      
    </main>
    
    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>