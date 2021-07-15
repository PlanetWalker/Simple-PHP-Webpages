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
            #head {
                margin: 15px 30px 10px 16px;
                border: 1px solid black;
                width: 500px;
                height: 100px
            }
            #head h1 {
                margin: 35px auto auto 73px;
                color: blue;
                font-size: 35px
            }
            #antwort {
                padding-left: 20px;
                margin: auto auto 15px 16px;
                border: 2px dotted black;
                width: 400px;
                height: 272px
            }
            #submit {
                padding-top: 30px;
                text-align: center;
                    
            }
            
        </style>
    </head>
    <body>
        <div id="head">
            <h1>Notenberechnung</h1>
        </div>
        <div id="antwort">
            <h2>Erbebnis</h2>
            <?php
                /* Alle Variablen abrufen */
                $currentpoints = $_GET["currentpoints"];
                $maxpoints = $_GET["maxpoints"];

                // Rechnungen
                $prozent = (100 * $currentpoints)/$maxpoints;
				
            if ($prozent >= 100 && $prozent >= 87) {
				$note = 1;
			} else
			if ($prozent >= 85 && $prozent >= 74) {
				$note = 2;
			} else
			if ($prozent >= 73 && $prozent >= 59) {
				$note = 3;
			} else
			if ($prozent >= 58 && $prozent >= 41) {
				$note = 4;
			} else
			if ($prozent >= 40 && $prozent >= 6) {
				$note = 5;
			} else
			if ($prozent >= 5 && $prozent >= 0) {
				$note = 6;
			} else {
				$note = 0; // Default
			}
			
			
                echo "<p>Sie haben ", $currentpoints, " Punkte von ", $maxpoints, " erreicht</p>";
                echo "<h3>Das sind ", $prozent, " % und entspricht der ", $note, "!</h3>";
            ?>
        </div>
    </body>
</html>