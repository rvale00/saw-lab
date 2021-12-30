<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Cambio password</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script>
            function checkPass(result){
              if(result.old != undefined){
                $('#old').css({ "border": '#FF0000 1px solid'});
                $('#oldErr').html(result.old);
               
              }else{
                $('#old').removeAttr("style");
                $('#oldErr').empty();              
              }
              if(result.new != undefined){
                $('#new').css({ "border": '#FF0000 1px solid'});
                $('#newErr').html(result.old);
               
              }else{
                $('#new').removeAttr("style");
                $('#newErr').empty();              
              }
              if(result.cpsw != undefined){
                $('#cnew').css({ "border": '#FF0000 1px solid'});
                $('#cnewErr').html(result.new);
               
              }else{
                $('#cnew').removeAttr("style");
                $('#cnewErr').empty();

                //se entrambi i campi hanno del contenuto confronto che siano uguali
                if(result.samepsw != undefined){
                      $('#new').css({ "border": '#FF0000 1px solid'});
                      $('#cnew').css({ "border": '#FF0000 1px solid'});
                      $('#samepswErr').html(result.samepsw);
                      
                }else{ 
                      $('#new').removeAttr("style");
                      $('#cnew').removeAttr("style");
                      $('#samepswErr').empty();   
                }              
              }
            }
            function cPsw(){
              var oldPsw = document.getElementsByName("old")[0].value;
              var newPsw = document.getElementsByName("new")[0].value;
              var newCPsw = document.getElementsByName("cnew")[0].value;
            fetch('cambiaPassword.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "old=" + oldPsw + "&new=" + newPsw + "&cnew=" + newCPsw,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    //alert(JSON.stringify(result));
                    checkPass(result);
                    //alert(JSON.stringify(result));
                    if(result.db1!=undefined){
                      $('#alertDiv').append("<div class='alert alert-danger'> "+result.db1+" </div> ");
                      $('#formAddr').reset();
                    }
                    if(result.no!=undefined){
                      $('#alertDiv').append("<div class='alert alert-danger'> "+result.no+" </div> ");
                      $('#formAddr').reset();
                    }
                    //se non ci sono stati errori allora:
                    if(result.ok!=undefined){
                      $('#formAddr').html("<h1>"+result.ok+"</h1>");
                    }
                    
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
      <div id="alertDiv"></div>
      <form id="formAddr">
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        <h1 class="h3 mb-3 fw-normal">Cambia password</h1>

        <div class="form-floating"  id="floatingPassword">
        <input type="password" class="form-control"  id="old" name="old" placeholder="Password">
        <p id="oldErr"></p>  
        <label for="floatingInput">Password attuale</label>
        </div>
    
        <div class="form-floating"  id="floatingPassword">
        <input type="password" class="form-control" id="new" name="new" placeholder="Password">
        <p id="newErr" ></p>
        <label for="floatingInput">Nuova password</label>
        </div>
        <div class="form-floating"  id="floatingPassword">
        <p id="cnewErr" ></p>
        <input type="password" class="form-control" id="cnew" name="cnew" placeholder="Password">
        <label for="floatingPassword"> Conferma nuova password</label>
        </div>
            
        <p id="samepswErr" ></p>

        <button type="submit" class="w-100 btn btn-lg btn-primary">Cambia Password</button>
        <a href="../index.php"> Torna alla home</a>
        <a href="personalArea.php"> Area utente</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
      </form>
    </main>
    
    
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>