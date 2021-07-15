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
        <h1>Kurspreis Suchen</h1>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Preis von</td>
                    <td><input type="text" name="von" placeholder="1.0"/></td>
                </tr>
                <tr>
                    <td>Preis bis</td>
                    <td><input type="text" name="bis" placeholder="1.0"/></td>
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
                     
                    $start_time_stamp = mktime($start_time[0], $start_time[1], 0, 0, 0, 0);
                    $end_time_stamp = mktime($end_time[0], $end_time[1], 0, 0, 0, 0);
                     
                    $time_difference = $end_time_stamp - $start_time_stamp;
                     
                    return $time_difference;  
                }

                $von = $_POST['von'];
                $von = str_replace(",",".",$von);
                $von = floatval($von);
                $von = round($von, 2);

                $bis = $_POST['bis'];
                $bis = str_replace(",",".",$bis);
                $bis = floatval($bis);
                $bis = round($bis, 2);

                 
                $sql = "
                    SELECT *
                    FROM `kurse`
                    JOIN thema ON thema.thema_id = kurse.thema_id
                    JOIN kursleiter ON kursleiter.kursleiter_id = kurse.kursleiter_id
                    JOIN preise ON preise.preis_id = kurse.preis_id
                    JOIN raum ON raum.raum_id = kurse.raum_id
                    WHERE preise.preis_vaule + kursleiter.kursleiter_honorar BETWEEN $von AND $bis;
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