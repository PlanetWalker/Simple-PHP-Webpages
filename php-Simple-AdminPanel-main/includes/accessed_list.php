<html>
	<head>
		<title>Admin IP Liste</title>

		<meta name="author" content="name" />
		<meta name="description" content="Admin Portal" />
		<meta name="keywords" content="admin, administration, portal, hub," />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="includes/style.css"/>
	</head>
	<body>
		<h1 class="font"><u>Admin IP Liste</u></h1>
		<a href="../">BACK</a>
		<div contenteditable="false" class="resize"> <!-- It's not a bug. Its a feature -->
			<table class="list">
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Country</th>
					<th>IP</th>
					<th>vist_page</th>
					<th>user_os</th>
					<th>user_browser</th>
					<th>site</th>
					<th>comment</th>
					<th>user_agent</th>
				</tr>
				<?php
					include_once('mysql.php');
					if ($conn) {
						$sql = "SELECT * FROM `liste` ORDER BY `id` DESC";
						$result = mysqli_query($conn, $sql);
						if ($result == true) {
							while ($row = mysqli_fetch_array($result)) {
								switch($row['vist_page']) {
									default:
										echo "<tr>";
										break;
									case "login.php";
										echo "<tr class=\"warn\">";
										break;
									case "logged.php";
										echo "<tr class=\"success\">";
										break;
								}
								echo
								"<td>". $row['id'] .
								"</td><td>". $row['date'] .
								"</td><td>". $row['country'] .
								"</td><td>". $row['ip'] .
								"</td><td>". $row['vist_page'] .
								"</td><td>". $row['user_os'] .
								"</td><td>". $row['user_browser'] .
								"</td><td>". $row['site'] .
								"</td><td>". $row['comment'] .
								"</td><td>". $row['user_agent'] .
								"</td></tr>";
							} 
						}
					} else 
						echo
						"<tr><td>ERROR".
						"</td><td>ERROR". 
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td><td>ERROR".
						"</td></tr>";
				?>
			</table>
		</div>
	</body>
</html>