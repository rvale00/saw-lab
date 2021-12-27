<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/form.css">
        <script>
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
                    console.log(response.statusText);
                    return response.text();
                }).then(function (result) {
                    alert(result);
                    document.getElementById('regForm').innerHTML = "<h1>Account registrato con successo</h1> \
                                                                     <a class='btn btn-primary' href='formLogin.php'> Accedi </a>";
                    
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
          <input type="text" class="form-control" id="fname" name="name" placeholder="Rino">
          <label for="floatingInput">Name</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="lname" name="surname" placeholder="Pape">
          <label for="floatingInput">Surname</label>
        </div>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="psw" name="psw" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="cPsw" name="cPsw" placeholder="Re Password">
          <label for="floatingPassword">Confirm password</label>
        </div>

        <a type="button" onclick="register()" class="w-100 btn btn-lg btn-primary">Sign in</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </main>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>

</html>
