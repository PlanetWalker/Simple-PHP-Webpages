<html>
	<head>
		<title>Admin Portal</title>

		<meta name="author" content="name" />
		<meta name="description" content="Admin Portal" />
		<meta name="keywords" content="admin, administration, portal, hub," />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="includes/style.css"/>
	</head>
	<body>
		<h1 class="font"><u>Admin Control Panel</u></h1>
		<?php 
			if (isset($_GET["login"])) { 
				switch($_GET["login"]) {
					default:
						echo "<p class=\"warn\">Unknown Code: ". $_GET["login"] . "</p>"; 
						break;
					case "succesful":
						echo "<p class=\"success\">Erfolgreich eingeloggt - Willkommen!</p>"; 
						break;
				}
			}
		?>
		<table>

			<tr>
				<td><a href=""><img src="#" border="2px solid #FFF9F7" height="105px" width="150px" alt="MySQL" /></a></td>
				<td><p>Admin | Tolle beschreibung</p></td>
			</tr>
		</table>
		<br/>
		<form action="" method="get">
			<button type="submit" name="mode" value="list">IP LISTE</button>
        </form>
        <form action="../" method="post">
              <button type="submit" name="logout">Logout</button>
        </form>
	</body>
</html>