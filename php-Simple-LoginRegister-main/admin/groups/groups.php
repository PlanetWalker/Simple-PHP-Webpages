<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Unknown</title>
        <?php
        if (!isset($_SESSION['UID'])) {
            header("Location: ../");
            exit();
        }
        ?>
    </head>
    <body>
        <h1> Unknown	</h1>
        <h2>Noch nicht entwickelt</h2>
        <form action="" method="get">
            <button type="submit" name="mode" value="menu">Back</button>
        </form>
    </body>
</html>
