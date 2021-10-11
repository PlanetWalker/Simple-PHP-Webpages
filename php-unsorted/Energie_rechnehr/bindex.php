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
        if (empty($_GET["anschlusswert"])) {
        echo "<div id=\"abfrage\">";
            echo "<h2>Energiekostenberechnung für elektrische Verbraucher</h2>";
            echo "<h3>Geben Sie Ihre Verbrauchswerde an:</h3>";
            echo "<form action=\"index.php\" method=\"get\">";
               echo "<p>";
                   echo "Anschlusswert des Verbraucher in Watt (60): ";
                    echo "<input type=\"text\" name=\"anschlusswert\" size=\"4\">";
                echo "</p>";
                echo "<p>";
                    echo "Durchschnittliche Einschalzeit am Tag in Stunden (10)? ";
                    echo "<input type=\"text\" name=\"durchschnittlich\" size=\"4\">";
                echo "</p>";
                echo "<p>";
                    echo "Preis pro Killowattstunde in Euro (0.33): ";
                    echo "<input type=\"text\" name=\"killowattstunde\" size=\"4\">";
                echo "</p>";
                echo "<hr>";
                echo "<p id=\"submit\">";
                    echo "<input type=\"submit\" value=\"Absenden\">";
                echo "</p>";
            echo "</form>";
        echo "</div>";
        } else {
        echo "<div id=\"antwort\">";
            echo "<h3>Erbebnis</h3>";
            
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
            
        echo "</div>";
        }
        ?>
    </body>
</html>