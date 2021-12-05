
<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Homepage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <?php
            session_start();
            include ("php/layout/header.php");
        ?>
        
        
         <main>
            <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-warning">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                  <h1 class="display-4 fw-normal">PIMP MY QUACK</h1>
                  <p class="lead fw-normal">Customize your programming ducks</p>
                  <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                </div>
              </div>
         </main>

         <?php
            include ("php/layout/footer.php");
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
