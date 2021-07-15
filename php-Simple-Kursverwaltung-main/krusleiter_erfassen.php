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
        <h1>Kursleiter erfassen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Nachname</td>
                    <td><input type="text" name="nachname" placeholder="Nachname" /></td>
                </tr>
                <tr>
                    <td>Vorname</td>
                    <td><input type="text" name="vorname" placeholder="Vorname" /></td>
                </tr>
                <tr>
                    <td>Honorar</td>
                    <td><input type="text" name="honorar" placeholder="100.00" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Daten speichern"/></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $nachname = $_POST['nachname'];
                $vorname = $_POST['vorname'];
                
                $honorar = $_POST['honorar'];
                $honorar = str_replace(",",".",$honorar);
                $honorar = floatval($honorar);
                $honorar = round($honorar, 2);
                
                $sql = "INSERT INTO `kursleiter` VALUES ('', '$nachname', '$vorname', '$honorar');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Es wurde der Kursleiter \"$vorname $nachname\" mit einen Honorar \"$honorar\" hinzugef&uuml;gt!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";

            }
        ?>
    </body>
</html>