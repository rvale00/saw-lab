<!DOCTYPE html>
<html lang="it">
<head>
    <title>Personalizza la tua papera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28ff0f2fac.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        session_start();
        include ("layout/header.php");
        include("db/connect.php");
    ?>

    <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-warning">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img class="card-img-top" src="img/logo.png" alt="Card image" style="width:100%">
            <h2>Questa pagina è ancora in costruzione.</h2>
            <p class="lead fw-normal">Qui potrai realizzare la papera più adatta a te! Tu la crei noi te la spediamo!</p>
            
        </div>
    </div>


    <?php
        include ("layout/footer.php");
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>