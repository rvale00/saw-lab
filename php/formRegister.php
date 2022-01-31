<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script>
            function checkInput(result){
              
              if(result.empty != undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.empty+"</div>");     
              }
              if(result.email != undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.email+"</div>");
              }
              if(result.email2 != undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.email2+"</div>");
              }   
              if(result.noAffRow!=undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.noAffRow+"</div>");
              }
              if(result.noAffRow2!=undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.noAffRow2+"</div>");
              }
              if(result.noPsw!=undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.noPsw+"</div>");
              }
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
                body: "name="+ userfname+ "&surname="+ userlname + "&email=" 
                       + usermail + "&psw=" + userpsw + "&cPsw=" + usercpsw ,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    checkInput(result);
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
        <div class="container"id="alert"></div>
        <div class="form-floating">
          <input type="text" class="form-control bg-error" id="fname" name="name" placeholder="Rino" >
          
          <label for="floatingInput" >Nome*</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="lname" name="surname" placeholder="Pape" >
         
          <label for="floatingInput">Cognome*</label>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" >
         
          <label for="floatingInput">Email*</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="psw" name="psw" placeholder="Password" >
         
          <label for="floatingPassword">Password*</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="cPsw" name="cPsw" placeholder="Re Password" >
  
          <label for="floatingPassword">Conferma password*</label>
        </div>
        



        <button type="submit" class="w-100 btn btn-lg btn-primary"> Registrati </button>
        <a href="../index.php"> Torna alla home</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
        </form>

    </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>

</html>
