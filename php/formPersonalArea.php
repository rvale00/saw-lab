<!DOCTYPE html>
<html>
    <head lang="it">
        <title>Personal Area Form</title>
    </head>
    <body>
    
    <h1>My Beautiful Form!</h1>

    <form action="register.php" method="post">
    <fieldset>
        <legend>Register</legend>
        <Label><strong>Nome</strong></Label>
        <input type="text" id="fname" name="name">
        <br>
        <Label><strong>Cognome</strong></Label>
        <input type="text" id="lname" name="surname">
        <br>
        <Label><strong>E-mail</strong></Label>
        <input type="email" id="email" name="email">
        <br>
        <Label><strong>Password</strong></Label>
        <input type="password" id="psw" name="psw">
        <br>
        <Label><strong>Conferma password</strong></Label>
        <input type="password" id="cPsw" name="cPsw">
        <br>
        <input type="submit" >
    </fieldset>
    </form>

    </body>
</html>
