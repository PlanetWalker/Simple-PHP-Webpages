<!DOCTYPE html>
<html lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>Servermitglieder</title>
        <?php
        if (!isset($_SESSION['UID'])) {
            header("Location: ../");
            exit();
        }
        ?>
    </head>
    <body>
        <h1>Servermitglieder</h1>
        <h2>Hier kann man die Mitgliederliste sehen.</h2>
        <p><?php if (isset($_GET["member"])) { echo 'Es ist villeicht ein Fehler aufgetreten: '; echo $_GET["member"];}; ?></p>
        <form action="" method="get">
            <button type="submit" name="mode" value="menu">Back</button>
        </form>
        <br>
        <table>
            <tr>
                <td>ID:</td>
                <td>Name:</td>
                <td>Discord:</td>
                <td>Beschreibung:</td>
                <td>Protokoll:</td>
                <td>Timestamp:</td>
            </tr>
            <?php
                $tabelle = array();
                $sql = "SELECT * FROM `mitglieder` WHERE `member_id` ORDER BY `member_id` ASC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    array_push($tabelle, $row);
                }
                $check = mysqli_num_rows($result);

                if ($check > 0) {
                    foreach ($tabelle as $row) {
                        $UID = $row['member_id'];
                        $sql = "SELECT * FROM `mitglieder` WHERE `member_id`='$UID'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        // DATA
                        $name = $row['member_name'];
                        $discord = $row['member_discord'];
                        $beschreibung = $row['member_beschreibung'];
                        $protokoll = $row['member_protokoll'];
                        $timestamp = $row['timestamp'];

                        echo '
                        <tr>
                            <form action="mitglieder/editmitglieder.php" method="POST">
                                <td>'.$UID.'</td>
                                <input type="hidden" name="userid" value="'.$UID.'">
                                <td>'.$name.'</td>
                                <td>'.$discord.'</td>
                                <td>'.$beschreibung.'</td>
                                <td>'.$protokoll.'</td>
                                <td>'.$timestamp.'</td>
                                <td><button type="submit" name="edit">EDIT</button><td>
                                <td><button type="submit" name="delete">DELETE</button><td>
                            </form>
                        </tr>
                        ';
                    }
                }
            ?>
            <form action="mitglieder/addmember.php" method="POST">
                <tr>
                    <td><p>X</p></td>
                    <td><input type="text" name="name" placeholder="Name"></td>
                    <td><input type="text" name="discord" placeholder="Discord"></td>
                    <td><input type="text" name="beschreibung" placeholder="Beschreibung"></td>
                    <td><input type="text" name="protokoll" placeholder="Protokoll"></td>
                    <td><button type="submit" name="add">ADD</button></td>
                </tr>
            </form>
        </table>
    </body>
</html>
