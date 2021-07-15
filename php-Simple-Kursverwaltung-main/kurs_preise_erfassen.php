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
        <h1>Kurspreis Hinzuf&uuml;gen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Preis hinzuf&uuml;gen</td>
                    <td><input type="text" name="preis" placeholder="1.0"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Daten speichern"/></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {

                $preis = $_POST['preis'];
                $preis = str_replace(",",".",$preis);
                $preis = floatval($preis);
                $preis = round($preis, 2);

                $sql = "INSERT INTO `preise` VALUES ('', '$preis');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Es wurde der Preis \"$preis\" hinzugef&uuml;gt!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";

            }
        ?>
    </body>
</html>