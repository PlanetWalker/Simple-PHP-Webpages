<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Profieleinstellungen</title>
        <?php
        if (!isset($_SESSION['UID'])) {
            header("Location: ../");
            exit();
        }
        ?>
    </head>
    <body>
        <h1>Profieleinstellungen</h1>
        <h2>Hier kannst du Einstellungen deines Profils verändern! <br><spam style="color: red;">ACHTUNG. Passwort wird mit einfachen md5 Verschlüsselt. Das ist nicht mehr Sicher!</spam></h2>
        <p><?php if (isset($_GET["edit"])) { echo 'Es ist villeicht ein Fehler aufgetreten: '; echo $_GET["edit"];}; ?></p>
        <form action="profil/edit.php" method="post">
            <input type="password" name="accountpassword" placeholder="Altes Passwort" required> <br>
            <p>Felder leer lassen die nicht verändert werden Sollen.</p>
            <input type="email" name="email" placeholder="E-Mail Adresse"> <br>
            <input type="password" name="password" placeholder="Passwort">
            <input type="password" name="repeatpassword" placeholder="Passwort bestätigen"> </br>
            <input type="hidden" name="userid" value="<?php echo $ID ?>"> </br>
            <button type="submit" name="save" value="save" >Speichern</button> </br>
        </form>
        <form action="" method="get">
            <button type="submit" name="mode" value="menu">Back</button>
        </form>
    </body>
</html>
