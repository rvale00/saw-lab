<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Homepage</title>
    </head>
    <body>
    
        <h1>My Beautiful Homepage!</h1>

        <a href="php/formLogin.php"> Login </a>

        <br>

        <?php
            session_start();
            if (!(isset($_SESSION['logged'])))
                echo "<a href='php/formRegister.php'> Register </a>";

            echo "<br>";

            if(isset($_SESSION['logged'])){
                echo " <a href='areaPersonale.php'> area personale </a>";
                echo "<br>";
                echo " <a href='php/logout.php'> logout </a>";
                echo "<br>";
                echo "<p> Ciao,".$_SESSION['nome']."</p>";
            }
        
        ?>
        <br>
        <form action="ricerca.php" method='GET'>
            <label>Cerca</label>
            <input type="text" id="search" name="search">
        </form>
    </body>
</html>
