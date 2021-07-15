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
        <h1>Informiren Sie sich über unsere Kurspreise!</h1>
        <form action="#" method="POST">
            <table>
                <td>Kursbeginn ab:</td>
                <td>Jahr
                    <select name="jahr">
                        <option value="0">alle</option>
                        <?php 
                            $sql = "SELECT * FROM `kurse` order by `kurs_start` desc LIMIT 1;";
                            $result = @mysqli_query($conn, $sql);
                            $rows_start = mysqli_fetch_array($result);

                            $rows_start = explode("-", $rows_start['kurs_start']);

                            $sql = "SELECT * FROM `kurse` order by `kurs_start` ASC LIMIT 1;";
                            $result = @mysqli_query($conn, $sql);
                            $rows_stop = mysqli_fetch_array($result);
                            
                            $rows_stop = explode("-", $rows_stop['kurs_start']);
                            
                            for($current = $rows_start[0]; $current >= $rows_stop[0]; $current--) {
                                
                                if(isset($_POST['jahr']) && $current == $_POST['jahr']) {
                                    echo "<option value=".$current." selected >".$current."</option>";
                                } else
                                    echo "<option value=".$current.">".$current."</option>";
                            }
                        ?>
                    </select>
                    
                    Monat
                    <select name="monat">
                        <option value="0">alle</option>
                        <?php 

                            function get_month($time_o){
                                $time = explode("-", $time_o);
     
                                $time_stamp = mktime(0, 0, 0, (int) $time_o +1 , 0, 0);
                                $month = strftime("%B", $time_stamp);
                                return $month;  
                            }

                            for($current = 1; $current <= 12; $current++) {
                                
                                if(isset($_POST['monat']) && $current == $_POST['monat']) {
                                    echo "<option value=".$current." selected >".get_month($current)."</option>";
                                } else
                                    echo "<option value=".$current.">".get_month($current)."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Thema</td>
                    <td>
                        <select name="kurs">
                            <option value="0">--</option>
                            <?php 
                                $sql = "SELECT * FROM `thema`;";
                                $result = @mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($result)) {
                                    if(isset($_POST['kurs']) && $rows[0] == $_POST['kurs']) {
                                    echo "<option value=".$rows[0]." selected >".$rows[1]."</option>";
                                    } else
                                    echo "<option value=".$rows[0].">".$rows[1]."</option>";
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
                <th>Thema</th>
                <th>Beginn</th>
                <th>Ende</th>
                <th>Stunden</th>
                <th>Kursleiter</th>
                <th>Raum</th>
                <th>Preis pro UE</th>
                <th>Gesammt in Euro</th>
            </tr>
            
        <?php
                // Um die difference zurück zu bekommen
                function get_time_difference($start_time_o, $end_time_o){
                    $start_time = explode("-", $start_time_o);
                    $end_time = explode("-", $end_time_o);
                     
                    $start_time_stamp = mktime(0, 0, 0, $start_time[0], $start_time[1], $start_time[2]);
                    $end_time_stamp = mktime(0, 0, 0, $end_time[0], $end_time[1], $end_time[2]);
                     
                    $time_difference = $end_time_stamp - $start_time_stamp;
                     
                    return $time_difference;  
                }

                $kurs = $_POST['kurs'];
                $kurs = ($kurs == 0) ? 'kurse.thema_id': $kurs;

                $jahr = $_POST['jahr'];
                $jahr = ($jahr == 0) ? 'DATE_FORMAT(kurse.kurs_start,\'%Y\')': $jahr;

                $monat = $_POST['monat'];
                $monat = ($monat == 0) ? 'DATE_FORMAT(kurse.kurs_start,\'%m\')': $monat;

                 
                $sql = "
                    SELECT *
                    FROM `kurse`
                    JOIN thema ON thema.thema_id = kurse.thema_id
                    JOIN kursleiter ON kursleiter.kursleiter_id = kurse.kursleiter_id
                    JOIN preise ON preise.preis_id = kurse.preis_id
                    JOIN raum ON raum.raum_id = kurse.raum_id
                    WHERE kurse.thema_id = $kurs AND DATE_FORMAT(kurse.kurs_start,'%Y') = $jahr AND DATE_FORMAT(kurse.kurs_start,'%m') = $monat;
                ";
                $result = mysqli_query($conn, $sql);

                if($result) 
                    while($rows = mysqli_fetch_array($result)) {
                    echo '<tr>
                        <td id="left">'.$rows['kurs_id'].'</td>
                        <td id="left">'.$rows['thema_vaule'].'</td>
                        <td id="center">'.$rows['kurs_start'].'</td>
                        <td id="center">'.$rows['kurs_end'].'</td>
                        <td id="right">'.get_time_difference($rows['kurs_start'], $rows['kurs_end']).'</td>
                        <td id="left">'.$rows['kursleiter_vorname'].'</td>
                        <td id="center">'.$rows['raum_vaule'].'</td>
                        <td id="right">'.round($rows['preis_vaule'],2).' &euro;</td>
                        <td id="right">'.round($rows['preis_vaule'] + $rows['kursleiter_honorar'],2).' &euro;</td>
                      </tr>
                    ';
                }
            }
        ?>
        </table>
    </body>
</html>