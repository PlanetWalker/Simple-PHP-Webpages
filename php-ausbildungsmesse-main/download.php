<html>
    <head>
        <title>Datamanagement</title>
        <meta name="author" content="</>"/>
        <meta name="copyright" content="KeksGauner"/>
        <meta name="description" content="Datenmanagement System f&uuml;r die Ausbildungsmesse!"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- CSS -->
        <link href="./css/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="./css/bootstrap.min.css" rel="stylesheet" />

        <link rel="icon" href="#"/>
    </head>

    <body>
		<div class="centered">
			<h1>Datenmanagement by TAI 12</h1>
			<?php 
				if(isset($_GET['error'])) {
					echo '
						<div class="alert alert-danger" role="alert">
							<strong>Error!</strong> 
							' . $_GET['error'] . '
						</div>
					';
				}
				if(isset($_GET['file'])) {
					echo '
						<div class="alert alert-success" role="alert">
						<strong>File Downloaded!</strong> 
						Wenn der download nicht startet
						<a href=""./download.php?token='.$_GET['token'].'"">hier</a>
						klicken
						</div>
					';
				}
			?>
			<form action="includes/download.php" method="POST">
				<table>
					<tr><th>Token</th></tr>
					<tr><td><input type="text" placeholder="" name="token" value="<?php echo (isset($_GET["token"]))?$_GET["token"]:"";?>"/></td></tr>
					<tr><td><input type="submit" value="Absenden!" name="predownload"/></td></tr>
				</table>
			</form>
			<?php 
				if(isset($_GET['name'])) {
					echo
						'<form action="includes/download.php" method="POST">'.
							'<input type="hidden" name="token" value="'. $_GET["token"] .'"/>'.
							'<table>'.
								'<tr><th>Download</th></tr>'.
								'<tr><td><input type="submit" value="'.$_GET["name"].'" name="download"/></td></tr>'.
							'</table>'.
						'</form>';
				} 
			?>
		</div>
    </body>
</html>