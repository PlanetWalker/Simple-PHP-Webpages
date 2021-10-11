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
            #abfrage {
                padding-left: 20px;
                margin: auto auto 15px 16px;
                border: 2px solid black;
                background-color: #FEFFED;
                width: 670px;
                height: 282px
            }
            #abfrage h2 {
                color: blue;
            }
            #submit {
                padding-top: 0px;
                text-align: left;
                    
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
		<?php 
        if (empty($_GET["anschlusswert"]) && empty($_GET["durchschnittlich"]) && empty($_GET["killowattstunde"])) {
        $anschlusswert = "";
        $durchschnittlich = "";
        $killowattstunde = "";
        } else {
        $anschlusswert = $_GET["anschlusswert"];
        $durchschnittlich = $_GET["durchschnittlich"];
        $killowattstunde = $_GET["killowattstunde"];
        }
        ?>
        <div id="abfrage">
            <h2>Energiekostenberechnung für elektrische Verbraucher</h2>
            <h3>Geben Sie Ihre Verbrauchswerde an:</h3>
            <form action="index.php" method="get">
               <p>
                   Anschlusswert des Verbraucher in Watt (60): 
                    <input type="text" name="anschlusswert" size="4" value="<?php echo $anschlusswert; ?>">
                </p>
                <p>
                    Durchschnittliche Einschalzeit am Tag in Stunden (10)? 
                    <input type="text" name="durchschnittlich" size="4" value="<?php echo $durchschnittlich; ?>">
                </p>
                <p>
                    Preis pro Killowattstunde in Euro (0.33): 
                    <input type="text" name="killowattstunde" size="4" value="<?php echo $killowattstunde; ?>">
                </p>
                <hr>
                <p id="submit">
                    <input type="submit" value="Absenden">
                    <!--<input type="reset" value="Abbrechen">-->
                </p>
            </form>
        </div>
		
		<?php 
        if (!empty($_GET["anschlusswert"]) && !empty($_GET["durchschnittlich"]) && !empty($_GET["killowattstunde"]))
        {
			?>
        <div id="antwort">
            <h3>Erbebnis</h3>
            <?php
                /* Alle Variablen abrufen */
            
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
		
		<?php 
        }
			?>
    </body>
</html>