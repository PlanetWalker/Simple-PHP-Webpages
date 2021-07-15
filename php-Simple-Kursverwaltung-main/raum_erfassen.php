<!DOCTYPE html>
<html>
    <head>
        <?php include_once('mysql.php'); ?>
        <title></></title>

        <meta charset="UTF-8"/>
        
        <link href="style.css" rel="stylesheet"/>
        <style type="text/css">
        </style>
    </head>
    <body>
        <a href="../"><button>Zurück</button></a><br />
        <h1>Raum erfassen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Raum</td>
                    <td><input type="text" name="raum" placeholder="A1.0"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Daten speichern"/></td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit'])) {
                $raum = $_POST['raum'];
                $sql = "INSERT INTO `raum` VALUES ('','$raum');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Es wurde der Raum $raum hinzugef&uuml;gt!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";
                
            }
        ?>
    </body>
</html>