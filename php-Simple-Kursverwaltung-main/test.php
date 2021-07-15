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
            $sql = "SELECT * FROM `kurse`;";
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
                <th>thema_id</th>
                <th>kursleiter_id</th>
                <th>preis_id</th>
                <th>kurs_start</th>
                <th>kurs_end</th>
                <th>kurs_max</th>
                <th>kurs_time</th>
                <th>raum_id</th>
            </tr>
            
            <?php
                if($result) 
                while($rows = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>".$rows[0]."</td>";
                        
                        $sql2 = "SELECT thema_vaule FROM thema WHERE thema_id = ".$rows[1];
                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_fetch_row($result2);
                        echo "<td>".$rows2[0]."</td>";
                        
                        $sql2 = "SELECT kursleiter_vorname FROM kursleiter WHERE kursleiter_id = ".$rows[2];
                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_fetch_row($result2);
                        echo "<td>".$rows2[0]."</td>";
                        
                        $sql2 = "SELECT preis_vaule FROM preise WHERE preis_id = ".$rows[3];
                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_fetch_row($result2);
                        echo "<td>".$rows2[0]."</td>";
                        
                        echo "<td>".$rows[4]."</td>
                        <td>".$rows[5]."</td>
                        <td>".$rows[6]."</td>
                        <td>".$rows[7]."</td>"; 
                        
                        $sql2 = "SELECT raum_vaule FROM raum WHERE raum_id = ".$rows[8];
                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_fetch_row($result2);
                        echo "<td>".$rows2[0]."</td>";
                        
                      echo "
                      </tr>
                    ";
                }
            ?>
	</table>
    </body>
</html>