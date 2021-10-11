<?php
    // get time for filename
    $time = date("H-m-s");
?>
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
    <script>
        function copyText() {
            /* Get the text field */
            var copyText = document.getElementById("copyInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
  
            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        }
    </script>
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
							<strong>File Uploaded!</strong> 
							Name: ' . $_GET['file'] . ' 
							Token: <input type="text" value="'. $_GET['token'] . '" id="copyInput" disabled>
							<button onclick="copyText()">COPY</button> 
							<a href="./download.php?token='.$_GET['token'].'">Download</a>
							</div>
						';
					}
				?>
			<form action="includes/upload.php" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<th>Name der Datei</th></tr>
						<tr><td><input type="text" placeholder="App_<?php echo $time?>" value="App_<?php echo $time?>" name="rename"/></td>
					</tr>
					<tr>
						<th>Datei</th>
					</tr>
					<tr><td><input type="file" name="uploadFile"/></td></tr>
					<tr><th>Upload Password</th></tr>
					<tr><td><input type="password" name="uploadPassword"/></td></tr>
					<tr><td><input type="submit" value="Absenden!" name="upload"/></td></tr>
				</table>
			</form>
        </div>
    </body>
</html>