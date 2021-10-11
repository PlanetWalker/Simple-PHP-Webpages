<html>
    <head>
        <title>Like a BOSS</title>
        <style type="text/css">
            body {
                font-family: sans-serif;
                color:#333;
                background-image:url(bg_blue_h.jpg);
                background-repeat: repeat-y;
                width: 500px;
                height: 537px
            }
            #antwort {
                padding-left: 20px;
                margin: auto auto 15px 16px;
                border: 2px solid black;
                background-color: #FEFFED;
                width: 670px;
                height: 212px
            }
            #erg {
                padding-top: 2px;
                color: red;
                    
            }
            span {
                font-weight: bold;
            }
            
        </style>
    </head>
    <body>
        <div id="antwort">
            <h3>Erbebnis</h3>
            <?php
                /* Alle Variablen abrufen */
                $anschlusswert = $_GET["anschlusswert"];
                $durchschnittlich = $_GET["durchschnittlich"];
                $killowattstunde = $_GET["killowattstunde"];
            
                echo "<p><span>Ihre Verbraucherdaten wurden wie folgt angegeben:</span>
                <br>
                Leisung ", $anschlusswert, " Watt
                <br> 
                Zeit: von ", $durchschnittlich, " Stunden
                <br>
                Tarif: ", $killowattstunde ," Euro/kWh
                </p>";
            
                // Rechnungens
                $ergebnis = 0;
                $kWh = ($anschlusswert / $durchschnittlich) / 10;
                $ergebnis = $kWh * $killowattstunde;
				
			
                echo "<h3 id='erg'>Die Endergiekosten brtragen ", $ergebnis, " Euro.</h3>";
            ?>
        </div>
    </body>
</html>