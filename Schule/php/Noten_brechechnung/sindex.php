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
            #abfrage {
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
        <div id="abfrage">
            <h2>Die Note wird nach dem IHK-Schluessel berechnet:</h2>
            <form action="auswert_get.php" method="get">
               <p>
                   Wie viele Punkte waren erreichbar?<br>
                    <input type="text" name="maxpoints" size="10">
                </p>
                <p>
                    Wie viele Punkte haben Sie erreicht?<br>
                    <input type="text" name="currentpoints" size="10">
                </p>
                <p id="submit">
                    <input type="submit" value="Absenden">
                    <input type="reset" value="Abbrechen">
                </p>
            </form>
        </div>
    </body>
</html>