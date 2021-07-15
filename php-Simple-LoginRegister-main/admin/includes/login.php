<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Login</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['UID'])) {
                header("Location: /");
                exit();
            } else { ?>
                    <h1> Bitte melde dich an</h1>
                    <h2>Um Zugriff auf das Panel zu bekommen. <br> <spam style="color: red;">ACHTUNG. Passwort ist mit einfachen md5 Verschlüsselt. Das ist nicht mehr Sicher!</spam></h2>
                    <p><?php if (isset($_GET["login"])) { echo 'Es ist ein Fehler aufgetreten: '; echo $_GET["login"];}; ?></p>
                    <p><?php if (isset($_GET["signup"])) { echo 'Es ging. Dein login ist: '; echo $_GET["signup"];}; ?></p>
                    <form action="includes/system.php" method="post">
                        <input type="text" name="username" placeholder="Benutzername" required autofocus>
                        <input type="password" name="password" placeholder="Passwort" required> </br>
                        <button type="submit" name="submit" >Einloggen</button>
                        
                        <a href="register"><button type="button" name = "register" >Registrieren</button></a>
                        <br>
                        <a href="../"><button type="button" name = "back" >Zurück zur Startseite</button></a>
                    </form>
            <?php } ?>

    </body>
</html>
