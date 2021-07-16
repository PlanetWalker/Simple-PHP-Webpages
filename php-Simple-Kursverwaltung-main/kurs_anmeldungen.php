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
                                    if(isset($_POST['kurs']) && $rows[0] == $_POST['kurs']) {
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
        <table>
            <tr>
                <th>Kurs-Nr</th>
                <th>Vorname</th>
                <th>Nachnahme</th>
                <th>Als</th>
            </tr>
            
        <?php
                $kursid = $_POST['kursid'];
                $sql = "
                    SELECT * FROM `anmeldung` WHERE `user_id` = $kursid;
                ";
                $result = mysqli_query($conn, $sql);

                if($result) 
                    while($rows = mysqli_fetch_array($result)) {
                    echo '<tr>
                        <td id="left">'.$rows['kurs_id'].'</td>
                        <td id="left">'.$rows['user_vorname'].'</td>
                        <td id="center">'.$rows['user_nachname'].'</td>  
                        <td id="center">'.$rows['user_beitritt'].'</td>
                      </tr>
                    ';
                }
            }
        ?>
        </table>
    </body>
</html>