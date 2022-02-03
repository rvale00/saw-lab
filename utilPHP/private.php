<?php
          session_start();
          if(!isset($_SESSION['logged'])){
            echo"
                <div class='container'>
                <h1> Accesso consentito solo agli utenti registrati!</h1> \n
                <img src='https://media.giphy.com/media/CXwq57Bjaza3S/giphy.gif' class='img-rounded' alt='no quack quack qua'>\n
                <br> \n
                <a href='/saw-lab/index.php'> Torna alla home</a>
                <br>
                <a href='formLogin.php'> Accedi </a>
                <a href='formRegister.php'> Registrati</a>
                </div>     \n
                </body>\n
                </html>
                ";
            exit();
          }
?>