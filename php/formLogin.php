<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Login form</title>
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
              if(result.error != undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.error+"</div>");
              }      
              if(result.wCred!=undefined){
                $("#alert").html("<div class='alert alert-danger' role='alert'>"+result.wCred+"</div>");
              }
            }

            function login(){
              var usermail = document.getElementsByName("email")[0].value;
              var userpsw = document.getElementsByName("psw")[0].value;
            fetch('login.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "email=" + usermail + "&psw=" + userpsw,
                }).then(function (response) { 
                    return response.json();
                }).then(function (result) {
                    alert(JSON.stringify(result));
                    checkInput(result);
                    if(result.ok !=undefined)
                    $('#loginForm').html("<h1>"+result.ok+"</h1> \
                                          <a class='btn btn-primary' href='../index.php'> Torna alla home </a>");
                    
                });
            }
            $(document).ready(function(){
                $("#formlogin").submit(function(e){
                    e.preventDefault();
                    login();
                });
            });

        </script>
    </head>

  <body class="text-center">
    
    <main class="form-signin" id="loginForm">
        
    <form id="formlogin">
        <img class="mb-4" src="/saw-lab/img/logo.png" alt="" width="170" height="100">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="container" id="alert"></div>
        
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="psw" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-primary"> Login </button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
    </main>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>


</html>