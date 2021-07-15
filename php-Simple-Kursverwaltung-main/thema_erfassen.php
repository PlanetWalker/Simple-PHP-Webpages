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
        <h1>Thema Erfassen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Thema erfassen</td>
                    <td><input type="text" name="thema" placeholder="php"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Daten speichern"/></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {

                $thema = $_POST['thema'];

                $sql = "INSERT INTO `thema` VALUES ('', '$thema');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Thema \"$thema\" wurde hinzugef&uuml;gt!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";

            }
        ?>
    </body>
</html>