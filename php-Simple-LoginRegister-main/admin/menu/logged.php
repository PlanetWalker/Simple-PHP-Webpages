<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Übersicht</title>
    </head>
    <body>
        <h1>Übersicht</h1>
        <h2>Klicke auf die Unteren Knöpfe, um in das gewünschte pannel zu kommen.</h2>
        <p><?php if (isset($_GET["login"])) { echo 'Login info: '; echo $_GET["login"];}; ?></p>
        <?php
            echo "<p> Willkommen ",  $username,  " du hast ",  $rank,  " Rechte. </p>";
            switch($rank) {
                case "owner":
                    echo '
                    <form action="" method="get">
                        <button type="submit" name="mode" value="profil">Profileinstellungen</button>
                        <button type="submit" name="mode" value="groups">Gruppen & Profile</button>
                        <button type="submit" name="mode" value="team">Teammitglieder</button>
                        <button type="submit" name="mode" value="mitglieder">Servermitglieder</button>
                    </form>
                        ';
                    break;
                case "moderator":
                    echo '
                        <p>moderator</p>  
                        ';
                    break;
                case "supporter":
                    echo '
                        <p>Supporter</p>  
                        ';
                    break;
                default:
                    break;
            }
        ?>
        <form action="includes/logout.php" method="post">
              <button type="submit" name="logout">Logout</button>
        </form>
    </body>
</html>
