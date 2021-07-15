<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Login</title>
		<meta name="author" content="name" />
		<meta name="description" content="Admin Portal" />
		<meta name="keywords" content="admin, administration, portal, hub," />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<link rel="stylesheet" href="includes/style.css"/>
    </head>
    <body>
        <?php
            if (isset($_SESSION['UID'])) {
                header("Location: ../");
                exit();
            } else { ?>
                    <h1> Bitte melde dich an um Zugriff auf das Panel zu bekommen.</h1>
                    <?php 
					if (isset($_GET["login"])) { 
						switch($_GET["login"]) {
							default:
								echo "<p class=\"warn\">Unknown Code: ". $_GET["login"] . "</p>"; 
								break;
							case "unknown-error":
								echo "<p class=\"warn\">Error 503: Sorry, das hätte nicht Passieren dürfen!</p>"; 
								break;
							case "succesful":
								echo "<p class=\"success\">Found 302: Passwort Richtig!</p>"; 
								break;
							case "wrong_password":
								echo "<p class=\"warn\">Achtung: Passwort ist nicht Richtig!</p>"; 
								break;
							case "empty":
								echo "<p class=\"warn\">Achtung: Passwort muss Eingegeben werden!</p>"; 
								break;
						}
					}
					?>
                    <form action="../" method="post">
                        <input type="password" name="password" placeholder="Passwort" required autofocus> </br>
                        <button type="submit" name="login" >Einloggen</button>
                    </form>
            <?php } ?>
    </body>
</html>
