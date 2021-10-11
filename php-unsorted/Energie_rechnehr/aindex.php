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
            
        </style>
    </head>
    <body>
        <div id="abfrage">
            <h2>Energiekostenberechnung für elektrische Verbraucher</h2>
            <h3>Geben Sie Ihre Verbrauchswerde an:</h3>
            <form action="apply.php" method="get">
               <p>
                   Anschlusswert des Verbraucher in Watt (60): 
                    <input type="text" name="anschlusswert" size="4">
                </p>
                <p>
                    Durchschnittliche Einschalzeit am Tag in Stunden (10)? 
                    <input type="text" name="durchschnittlich" size="4">
                </p>
                <p>
                    Preis pro Killowattstunde in Euro (0.33): 
                    <input type="text" name="killowattstunde" size="4">
                </p>
                <hr>
                <p id="submit">
                    <input type="submit" value="Absenden">
                    <!--<input type="reset" value="Abbrechen">-->
                </p>
            </form>
        </div>
    </body>
</html>