<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-out</title>
</head>

<body>

<?php
   session_start();
   if (isset($_SESSION['logged'])){
      session_destroy();
      echo "<p>Session close</p> ";
      header('Location: ../index.php');
   }else echo "sei ancora loggato"
?>
</body>
</html>