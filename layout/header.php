<header class="site-header sticky-top">
         <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <a class="navbar-brand " href="#">Pimp My Quack</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                  <?php
                    echo "<a class='nav-link' href='/saw-lab/index.php'>Home <span class='sr-only'>(current)</span></a>"
                  ?>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/saw-lab/listaArticoli.php"> Articoli </a>
                  </li>

                  <?php
                     if (!(isset($_SESSION['logged']))){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='formRegister.php'>Register</a>";
                        echo "</li>";

                        echo "<a class='nav-link' href='formLogin.php'>Login</a>";
                        echo "<li class='nav-item'>";
                        echo "</li> ";
                     }

                  ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php
                      if(isset($_SESSION['logged'])){
                        echo "<a class='nav-link fas fa-shopping-cart' href='/saw-lab/cart/listaCarrello.php'>Cart</a>";
                        echo "<a class='nav-link fas fa-user-cog' href='/saw-lab/show_profile.php'>".$_SESSION['nome']."</a>";
                        echo "<a class='nav-link fas fa-sign-out-alt' href='/saw-lab/API/logout.php'>Logout</a>";
                      }
                    ?>
                </form>
              </div>


        </nav>
</header>