<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
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
              }
              /*if(result.nopsw != undefined){
                      $('#psw').css({ "border": '#FF0000 1px solid'});
                      $('#cPsw').css({ "border": '#FF0000 1px solid'});
                      $('#nopsw').html(result.nopsw);
              }else{
                      $('#psw').removeAttr("style");
                      $('#cPsw').removeAttr("style");
                      $('#nopsw').empty();              
              }*/
            }


            function register(){
              var usermail = document.getElementsByName("email")[0].value;
              var userpsw = document.getElementsByName("psw")[0].value;
              var usercpsw = document.getElementsByName("cPsw")[0].value;
              var userfname = document.getElementsByName("name")[0].value;
              var userlname = document.getElementsByName("surname")[0].value;
            fetch('register.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "name="+ userfname+ "&surname="+ userlname + "&email=" + usermail + "&psw=" + userpsw + "&cPsw=" + usercpsw,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    checkInput(result);
                    //alert(JSON.stringify(result));
                    

                    //document.getElementById('regForm').innerHTML = "<h1>Account registrato con successo</h1> \
                      //                                               <a class='btn btn-primary' href='formLogin.php'> Accedi </a>";
                    
                });
            }
        </script>
        
        <link rel="stylesheet" href="css/form.css">
    </head>

    <body class="text-center">
    
    <main class="form-signin" id="regForm">
      
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        
        <h1 class="h3 mb-3 fw-normal">Please register</h1>

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

        <div class="form-floating">
          <input type="text" class="form-control" id="reg" name="reg" placeholder="Regione">
          <label for="floatingInput">Regione</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="citta" name="citta" placeholder="Citta'">
          <label for="floatingInput">Citta'</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="ind" name="ind" placeholder="Indirizzo">
          <label for="floatingInput">Indirizzo</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="cap" name="cap" placeholder="Cap">
          <label for="floatingInput">Cap</label>
        </div>


        <a type="button" onclick="register()" class="w-100 btn btn-lg btn-primary">Sign in</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </main>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>

</html>
