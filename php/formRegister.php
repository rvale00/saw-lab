<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Registration form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
    </head>

    <body class="text-center">
    
    <main class="form-signin" id="regForm">
      
        <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        
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
