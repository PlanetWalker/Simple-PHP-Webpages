<!DOCTYPE html> 
<html lang="de"> 
    <head>
		<?php 
        if (empty($_GET["anschlusswert"]) && empty($_GET["durchschnittlich"]) && empty($_GET["killowattstunde"])) {
       $anschlusswert = "";
        $durchschnittlich = "";
        $killowattstunde = "";
        } else {
        $anschlusswert = $_GET["anschlusswert"];
				$anschlusswert = str_replace(",",".",$anschlusswert);
            if($anschlusswert < 1) {
                //unset($_GET['anschlusswert']);
                $error_anschlusswert = "Syntax Falsch!";
            }
        $durchschnittlich = $_GET["durchschnittlich"];
				$durchschnittlich = str_replace(",",".",$durchschnittlich);
            if($durchschnittlich < 1) {
                //unset($_GET['durchschnittlich']);
                $error_durchschnittlich = "Syntax Falsch!";
            }
			
			
		$killowattstunde = $_GET["killowattstunde"];
				// replace , zu . da er nur mit . rechnen kann
				$killowattstunde = str_replace(",",".",$killowattstunde);
            if($killowattstunde < 0.001) {
                //unset($_GET['killowattstunde']);
                $error_killowattstunde = "Syntax Falsch!";
            }
        }
        ?>
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
                height: 352px
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
            #red {
                color: red;
                font-weight: bold;
                    
            }
            span {
                font-weight: bold;
            }
            
        </style>
    </head>
    <body>
        <div id="abfrage">
            <h2>Energiekostenberechnung f&uumlr elektrische Verbraucher</h2>
            <h3>Geben Sie Ihre Verbrauchswerde an:</h3>
            <form action="index.php" method="get">
               <p>
                   <?php if(isset($error_anschlusswert)) { echo "<span id='red'>", $error_anschlusswert,"<br> </span>"; } ?>
                   Anschlusswert des Verbraucher in Watt (60): 
                    <input type="text" name="anschlusswert" size="4" value="<?php echo $anschlusswert; ?>">
                </p>
                <p>
                   <?php if(isset($error_durchschnittlich)) { echo "<span id='red'>", $error_durchschnittlich,"<br> </span>"; } ?>
                    Durchschnittliche Einschalzeit am Tag in Stunden (10)? 
                    <input type="text" name="durchschnittlich" size="4" value="<?php echo $durchschnittlich; ?>">
                </p>
                <p>
                   <?php if(isset($error_killowattstunde)) { echo "<span id='red'>", $error_killowattstunde,"<br> </span>"; } ?>
                    Preis pro Killowattstunde in Euro (0,33): 
                    <input type="text" name="killowattstunde" size="4" value="<?php echo $killowattstunde; ?>">
                </p>
                <hr>
                <p id="submit">
				<input type="hidden" name="Versendet" value="1">
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
                Tarif: ", number_format($killowattstunde ,2 ,"," ,".") ," Euro/kWh
                </p>";
            
                // Rechnungens
                $ergebnis = 0;
                $kWh = ($anschlusswert / $durchschnittlich) / 10;
                $ergebnis = $kWh * $killowattstunde;
				
			
                echo "<h3 id='red'>Die Endergiekosten brtragen ", number_format($ergebnis ,2 ,"," ,"."), " Euro.</h3>";
            ?>
        </div>
		
		<?php 
        }
			?>
    </body>
</html>