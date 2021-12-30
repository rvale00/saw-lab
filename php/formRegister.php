<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script>
            function checkInput(result){
              
              if(result.fname != undefined){
                      $('#fname').css({ "border": '#FF0000 1px solid'});
                      $('#fnameErr').html(result.fname);
                     
              }else{
                      $('#fname').removeAttr("style");
                      $('#fnameErr').empty();              
              }
              if(result.lname != undefined){
                      $('#lname').css({ "border": '#FF0000 1px solid'});
                      $('#lnameErr').html(result.lname);
                      
              }else{
                      $('#lname').removeAttr("style");
                      $('#lnameErr').empty();              
              }
              if(result.email != undefined){
                      $('#email').css({ "border": '#FF0000 1px solid'});
                      $('#emailErr').html(result.email);
                     
              }else{
                      $('#email').removeAttr("style");
                      $('#emailErr').empty();              
              }
              //controllo campi vuoti password
              if(result.psw != undefined){
                $('#psw').css({ "border": '#FF0000 1px solid'});
                $('#pswErr').html(result.psw);
               
              }else{
                $('#psw').removeAttr("style");
                $('#pswErr').empty();              
              }
              if(result.cPsw != undefined){
                $('#cPsw').css({ "border": '#FF0000 1px solid'});
                $('#cPswErr').html(result.cPsw);
               
              }else{
                $('#cPsw').removeAttr("style");
                $('#cPswErr').empty();

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


            function register(){
              var usermail = document.getElementsByName("email")[0].value;
              var userpsw = document.getElementsByName("psw")[0].value;
              var usercpsw = document.getElementsByName("cPsw")[0].value;
              var userfname = document.getElementsByName("name")[0].value;
              var userlname = document.getElementsByName("surname")[0].value;
              //non obbligatori
              var reg = document.getElementsByName("reg")[0].value;
              var citta = document.getElementsByName("citta")[0].value;
              var ind = document.getElementsByName("ind")[0].value;
              var cap = document.getElementsByName("cap")[0].value;
            fetch('register.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "name="+ userfname+ "&surname="+ userlname + "&email=" \
                       + usermail + "&psw=" + userpsw + "&cPsw=" + usercpsw + "&reg=" \
                       + reg + "&citta=" + citta + "&indirizzo=" + ind + "&cap=" + cap,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    //alert(JSON.stringify(result));
                    checkInput(result);
                    if(result.noAffRow!=undefined){
                      $('#alertDiv').append("<div class='alert alert-danger'> \
                        "+result.noAffRow+" \
                      </div> ");
                      $('#form').reset();
                    }
                    //se non ci sono stati errori allora:
                    if(result.ok!=undefined){
                      $('#regForm').html("<h1>"+result.ok+"</h1> \
                                          <a class='btn btn-primary' href='formLogin.php'> Accedi </a>");
                    }
                    
                });
            }

            $(document).ready(function(){
                $("#formRegister").submit(function(e){
                    e.preventDefault();
                    register();
                });
            });
        </script>
        
        <link rel="stylesheet" href="css/form.css">
    </head>

    <body class="text-center">
    
    <main class="form-signin" id="regForm">
      <form id="formRegister">
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        
        <h1 class="h3 mb-3 fw-normal">Please register</h1>
        <div id="alertDiv"></div>
        <div class="form-floating">
          <input type="text" class="form-control bg-error" id="fname" name="name" placeholder="Rino">
          <p id="fnameErr" ></p>
          <label for="floatingInput" >Nome*</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="lname" name="surname" placeholder="Pape">
          <p id="lnameErr" ></p>
          <label for="floatingInput">Cognome*</label>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          <p id="emailErr" ></p>
          <label for="floatingInput">Email*</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="psw" name="psw" placeholder="Password">
          <p id="pswErr" ></p>
          <label for="floatingPassword">Password*</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="cPsw" name="cPsw" placeholder="Re Password">
          <p id="cPswErr" ></p>
          <label for="floatingPassword">Conferma password*</label>
        </div>
        
        <p id="nopsw" ></p>


        <button type="submit" class="w-100 btn btn-lg btn-primary"> Registrati </button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>
    
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>

</html>
