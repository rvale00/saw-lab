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
        ?>
        <header class="site-header sticky-top py-1">
         <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
              <a class="navbar-brand" href="#">Pimp My Duck</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>

                  <?php
                     if (!(isset($_SESSION['logged']))){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='php/formRegister.php'>Register</a>";
                        echo "</li>";

                        echo "<a class='nav-link' href='php/formLogin.php'>Login</a>";
                        echo "<li class='nav-item'>";
                        echo "</li> ";
                     }

                  ?>

                  <li class="navtem dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <?php
                      if(isset($_SESSION['logged'])){
                        echo "<a class='nav-link' href='php/personalArea.php'>".$_SESSION['nome']."</a>";
                        echo "<a class='nav-link' href='php/logout.php'>Logout</a>";
                      }
                ?>
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                  <button type="button" class="btn btn-outline-warning">Search</button>
                </form>
              </div>
            </nav>
         </header>

         <main>
            <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-warning">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                  <h1 class="display-4 fw-normal">PIMP MY QUACK</h1>
                  <p class="lead fw-normal">Customize your programming ducks</p>
                  <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                </div>
              </div>
         </main>

          <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-dark ">
            <div class="col-md-4 d-flex align-items-center">
              <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
              </a>
              <span class="text-muted">&copy; 2021 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
              <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
              <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
              <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
            </ul>
          </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
