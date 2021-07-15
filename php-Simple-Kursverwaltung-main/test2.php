<html>
    <head>
        <?php include_once('mysql.php'); ?>
        <title></></title>

        <meta charset="UTF-8">
    
        <link href="style.css" rel="stylesheet"/>
        <style type="text/css">
        </style>
    </head>
    <body>
        <a href="../"><button>Zurück</button></a><br />
        <h1>Kurspreis Hinzuf&uuml;gen</h1>
        <?php 
            $sql = "
                SELECT *
                FROM `kurse`
                JOIN thema ON thema.thema_id = kurse.thema_id
                JOIN kursleiter ON kursleiter.kursleiter_id = kurse.kursleiter_id
                JOIN preise ON preise.preis_id = kurse.preis_id
                JOIN raum ON raum.raum_id = kurse.raum_id
                WHERE `kurs_id`;
            ";
            $result = @mysqli_query($conn, $sql);
            if($result == TRUE) {
                $numbers = mysqli_num_rows($result);
                
                echo "<h2>Es sind $numbers Datens&auml;tze vorhanden</h2>";
            } else {
                echo "<h2>Es sind keine Datens&auml;tze vorhanden (Connection: Failed)</h2>";    
            }
        ?>
        <table>
            <tr>
                <th>kurs_id</th>
                <th>thema</th>
                <th>kursleiter</th>
                <th>preis</th>
                <th>kurs_start</th>
                <th>kurs_end</th>
                <th>kurs_max</th>
                <th>kurs_time</th>
                <th>raum</th>
            </tr>
            <?php
                if($result) 
                    while($rows = mysqli_fetch_array($result)) {
                    echo "<tr>
                        <td>".$rows['kurs_id']."</td>
                        <td>".$rows['thema_vaule']."</td>
                        <td>".$rows['kursleiter_vorname']."</td>
                        <td>".$rows['preis_vaule']."</td>
                        <td>".$rows['kurs_start']."</td>
                        <td>".$rows['kurs_end']."</td>
                        <td>".$rows['kurs_max']."</td>
                        <td>".$rows['kurs_time']."</td>
                        <td>".$rows['raum_vaule']."</td>
                      </tr>
                    ";
                }
            ?>
            
	</table>
    </body>
</html>