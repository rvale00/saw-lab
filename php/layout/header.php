<header class="site-header sticky-top">
         <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <a class="navbar-brand" href="#">Pimp My Quack</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                  <?php
                    echo "<a class='nav-link' href='/index.php'>Home <span class='sr-only'>(current)</span></a>"
                  ?>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/php/listaArticoli.php"> Articoli </a>
                  </li>

                  <?php
                     if (!(isset($_SESSION['logged']))){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='/php/formRegister.php'>Register</a>";
                        echo "</li>";

                        echo "<a class='nav-link' href='/php/formLogin.php'>Login</a>";
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
                        echo "<a class='nav-link' href='/php/cart/listaCarrello.php'>Cart</a>";
                        echo "<a class='nav-link' href='/php/personalArea.php'>".$_SESSION['nome']."</a>";
                        echo "<a class='nav-link' href='/php/logout.php'>Logout</a>";
                      }
                    ?>
                </form>
              </div>

              <form action="/php/listaArticoli.php" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="src">        
                <button type="submit" class="btn btn-outline-warning">Search</button>
              </form>
        </nav>
</header>