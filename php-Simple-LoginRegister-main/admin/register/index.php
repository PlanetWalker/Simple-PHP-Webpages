<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>SignUP</title>
    </head>
    <body>
        <h1> Registrierung	</h1>
        <h2>Bitte beachte dass du hierfür einen Registrierungs-Code benötigst! <br><spam style="color: red;">ACHTUNG. Passwort wird mit einfachen md5 Verschlüsselt. Das ist nicht mehr Sicher!</spam></h2>
        <p><?php if (isset($_GET["signup"])) { echo 'Es ist ein Fehler aufgetreten: '; echo $_GET["signup"];}; ?></p>
        <form action="register.php" method="post">
            <input type="name"name="name" placeholder="Benutzername" required autofocus> <br>
            <input type="email" name="email" placeholder="E-Mail Adresse" required> <br>
            <input type="password" name="password" placeholder="Passwort" required>
            <input type="password" name="repeatpassword" placeholder="Passwort bestätigen" required> </br>
            <p>Bitte gib deinen Registrierungs-Code ein</p>
            <input type="text" name="code" placeholder="Registrierungscode" required> </br>
            <button type="submit" name="register" >Registrieren</button> </br>
            <a href="../index.php"><button type="button" >Zurück zum Login</button></a>
        </form>
    </body>
</html>
