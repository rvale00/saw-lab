<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Cambio password</title>
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
            function cPsw(){
              var oldPsw = document.getElementsByName("oldpsw")[0].value;
              var newPsw = document.getElementsByName("newpsw")[0].value;
              var newCPsw = document.getElementsByName("newcpsw")[0].value;
            fetch('cambiaPassword.php', {
                method: "post",
                headers: { "Content-type": "application/x-www-form-urlencoded" },
                body: "oldpsw=" + oldPsw + "&newpsw=" + newPsw + "&newcpsw=" + newCPsw,
                }).then(function (response) { 
                    console.log(response.statusText);
                    return response.text();
                }).then(function (result) {
                    alert(result);
                    //window.location.assign('/saw-lab/index.php');
                    
                });
            }


        </script>
    </head>

  <body class="text-center">
    
    <main class="form-signin">

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
    
        <!--<div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>-->
        <button class="w-100 btn btn-lg btn-primary" onclick="cPsw()">Cambia Password</button>


        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

    </main>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>


</html>