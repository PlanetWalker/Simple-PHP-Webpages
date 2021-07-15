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
        <h1>Bitte melden Sie sich an.</h1>
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
                    <td>Strasse</td>
                    <td><input type="text" name="strasse" placeholder="Strasse, 1" /></td>
                </tr>
                <tr>
                    <td>PLZ</td>
                    <td><input type="number" min=0 max=9999 name="plz" placeholder="95032" /></td>
                </tr>
                <tr>
                    <td>Ort</td>
                    <td><input type="text" name="ort" placeholder="Hof" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="radio" name="beitritt" value="1" />Referent
                        <input type="radio" name="beitritt" value="2" />Teilnehmer
                    </td>
                </tr>
                <tr>
                    <td>Kurs ID</td>
                    <td>
                        <select name="kurs_id">
                            <option value="0">--</option>
                            <?php 
                                $sql = "SELECT * FROM `kurse`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    echo "<option value=".$rows[0].">".$rows[0]."</option>";
                                }
                            ?>
                        </select>
                    </td>
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
                
                $strasse = $_POST['strasse'];
                $plz = $_POST['plz'];
                $ort = $_POST['ort'];
                $beitritt = $_POST['beitritt'];
                if($beitritt == 1) {
                    $beitritt = 'Referent';
                } else if($beitritt = 2) {
                    $beitritt = 'Teilnehmer';
                } else 
                    $beitritt = 'NULL';

                $kurs_id = $_POST['kurs_id'];
                
                $sql = "INSERT INTO `anmeldung` VALUES ('', '$nachname', '$vorname', '$strasse', '$plz', '$ort', '$beitritt', '$kurs_id');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Erfolgreich im Kurs angemeldet!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";

            }
        ?>
    </body>
</html>