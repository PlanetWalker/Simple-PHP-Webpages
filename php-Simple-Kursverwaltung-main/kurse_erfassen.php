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
        <h1>Kurse erfassen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Kurse ausw&auml;hlen</td>
                    <td>
                        <select name="kurs">
                            <option value="0">--</option>
                            <?php 
                                $sql = "SELECT * FROM `thema`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    echo "<option value=".$rows[0].">".$rows[1]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kursleiter ausw&auml;hlen</td>
                    <td>
                        <select name="kursleiter">
                            <option value="0">--</option>
                            <?php
                                $sql = "SELECT * FROM `kursleiter`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    echo "<option value=".$rows[0].">".$rows[2]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Preis ausw&auml;hlen</td>
                    <td>
                        <select name="preis">
                            <option value="0">--</option>
                            <?php
                                $sql = "SELECT * FROM `preise`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    echo "<option value=".$rows[0].">".$rows[1]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Beginn</td>
                    <td><input type="date" name="start"/></td>
                </tr>
                <tr>
                    <td>Ende</td>
                    <td><input type="date" name="end"/></td>
                </tr>
                <tr>
                    <td>Max Teilnehmer</td>
                    <td><input type="number" name="max" min="1"/></td>
                </tr>
                <tr>
                    <td>Beginn Zeit</td>
                    <td><input type="time" name="time"/></td>
                </tr>
                <tr>
                    <td>Raum ausw&auml;hlen</td>
                    <td>
                        <select name="raum">
                            <option value="0">--</option>
                            <?php
                                $sql = "SELECT * FROM `raum`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    echo "<option value=".$rows[0].">".$rows[1]."</option>";
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
                $kurs = $_POST['kurs']; 
                $kursleiter = $_POST['kursleiter'];
                $preis = $_POST['preis'];
                $start = $_POST['start'];
                $end = $_POST['end'];
                $max = $_POST['max'];
                $time = $_POST['time']; 
                $raum = $_POST['raum'];


                $sql = "INSERT INTO `kurse` VALUES ('', '$kurs', '$kursleiter', '$preis', '$start', '$end', '$max', '$time', '$raum');";
                $result = mysqli_query($conn, $sql);
                echo ($result) ? "<p>Wurde gespeichert!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";

            }
        ?>
    </body>
</html>