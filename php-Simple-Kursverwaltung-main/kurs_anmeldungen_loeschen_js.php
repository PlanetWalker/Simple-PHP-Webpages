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
        <h1>Informiren Sie sich über die Anmeldungen!</h1>
        <form action="#" method="POST">
            <table>
            <tr>
                <td>Kurs_ID</td>
                    <td>
                        <select name="kursid">
                            <option value="0">--</option>
                            <?php
                                $sql = "SELECT * FROM `kurse` WHERE `kurs_id`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    if(isset($_POST['kursid']) && $rows[0] == $_POST['kursid']) {
                                    echo "<option value=".$rows[0]." selected >".$rows[0]."</option>";
                                    } else
                                    echo "<option value=".$rows[0].">".$rows[0]."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Senden"/></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {
        ?>

        <br />
        <form action="#" method="POST">
            <table>
                <tr>
                    <th>Kurs-Nr</th>
                    <th>Vorname</th>
                    <th>Nachnahme</th>
                    <th>Als</th>     
                    <th></th>
                </tr>

                <?php
                    $kursid = $_POST['kursid'];
                    $sql = "
                        SELECT * FROM `anmeldung` WHERE `kurs_id` = $kursid;
                    ";
                    $result = mysqli_query($conn, $sql);

                    if($result)
                        while($rows = mysqli_fetch_array($result)) {
                        echo '<tr>
                                <td id="left">'.$rows['kurs_id'].'</td>
                                <td id="left">'.$rows['user_vorname'].'</td>
                                <td id="center">'.$rows['user_nachname'].'</td>
                                <td id="center">'.$rows['user_beitritt'].'</td>
                                <td><button type="submit" name="delete" value="'.$rows['user_id'].'">L&ouml;schen</button></td>
                            </tr>
                        ';
                    }
                }
                if(isset($_POST['delete'])) {
                var bestaetigung = window.confirm('Wirklich L&ouml;schen?');

                    if(bestaetigung) {

                        $userid = $_POST['delete'];
                        $sql = "
                            DELETE FROM `anmeldung` WHERE `user_id` = $userid;
                        ";
                        $result = mysqli_query($conn, $sql);

                        echo ($result) ? "<p>Kursteilnehmer wurde Gel&ouml;scht!</p>" : "<p>Etwas ist Fehlgeschlagen</p>";
                     
                    }

                }
            ?>
            </table>
        </form>
    </body>
</html>