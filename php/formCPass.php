<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Cambio password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script>
            function checkData(){
              if(result.psw != undefined){
                $('#oldpsw').css({ "border": '#FF0000 1px solid'});
                $('#oldpswErr').html(result.psw);
               
              }else{
                $('#oldpsw').removeAttr("style");
                $('#oldpswErr').empty();              
              }
              if(result.cPsw != undefined){
                $('#newpsw').css({ "border": '#FF0000 1px solid'});
                $('newpswErr').html(result.cPsw);
               
              }else{
                $('#newpsw').removeAttr("style");
                $('#newpswErr').empty();

                //se entrambi i campi hanno del contenuto confronto che siano uguali
                if(result.nopsw != undefined){
                      $('#psw').css({ "border": '#FF0000 1px solid'});
                      $('#cPsw').css({ "border": '#FF0000 1px solid'});
                      $('#nopsw').html(result.nopsw);
                      
                }else{ 
                      $('#psw').removeAttr("style");
                      $('#cPsw').removeAttr("style");
                      $('#nopsw').empty();   
                }              
              }
            }
            function cPsw(){
              var oldPsw = document.getElementsByName("oldpsw")[0].value;
              var newPsw = document.getElementsByName("newpsw")[0].value;
              var newCPsw = document.getElementsByName("newcpsw")[0].value;
            fetch('cambiaPassword.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "oldpsw=" + oldPsw + "&newpsw=" + newPsw + "&newcpsw=" + newCPsw,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    
                    //window.location.assign('/saw-lab/index.php');
                    
                });
            }
            $(document).ready(function(){
                $("#formAddr").submit(function(e){
                    e.preventDefault();
                    cPsw();
                });
            });


        </script>
    </head>

  <body class="text-center">
    
    <main class="form-signin">
      <form id="formAddr">
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        <h1 class="h3 mb-3 fw-normal">Cambia password</h1>

        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="oldpsw" placeholder="Password">
          <label for="floatingInput">Password attuale</label>
        </div>
    
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="newpsw" placeholder="Password">
          <label for="floatingInput">Nuova password</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="newcpsw" placeholder="Password">
          <label for="floatingPassword"> Conferma nuova password</label>
        </div>
    
        <button type="submit" class="w-100 btn btn-lg btn-primary">Cambia Password</button>
        <a href="../index.php"> Torna alla home</a>
        <a href="personalArea.php"> Area utente</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
      </form>
    </main>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>