<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Homepage</title>
    </head>
    <body>
    
        <h1>My Beautiful Homepage!</h1>

        <a href="php/form.php"> Login/register </a>
        <br>
        <?php
        session_start();
        if($_SESSION['logged']){
            echo " <a href='areaPersonale.php'> area personale </a>";
            echo "<br>";
            echo " <a href='logout.php'> logout </a>";
        }
        
        ?>
        <br>
        <form action="ricerca.php" method='GET'>
            <label>Cerca</label>
            <input type="text" id="search" name="search">
        </form>
    </body>
</html>
