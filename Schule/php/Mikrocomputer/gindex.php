
<!DOCTYPE html> 
<html lang="de">
    <head>
        <title>Like a BOSS</title>
        <style type="text/css">
        /* GLOBAL */
        body {
            font-family: sans-serif;
        }
        hr {
            text-align: center;
            width: 680px;
        }

        /* PANNEL */
        #pannel {
            /* Grund Einstellungen */
            width: 700px;
            height: auto;
            background-color: #FEFFED;
            border: 1px solid black;
            margin: 20px 20px 20px 20px; 
            padding: 20px 20px 20px 20px;
            
            border-collapse: collapse;
        }
        #pannel p {
            /* Remove Spaces */
            margin: 0px 0px 0px 0px; 
            padding: 0px 0px 0px 0px;

        }
        #pannel #up td {
        /*  border: 1px solid red; */
            width: 120px;
            height: auto;
        }
        #pannel #down td {
            width: 250px;
            height: auto;
        }
        
        /* APPLY */
        #apply {
            /* Grund Einstellungen */
            width: 700px;
            height: auto;
            background-color: #FEFFED;
            border: 1px solid black;
            margin: 20px 20px 20px 20px; 
            padding: 20px 20px 20px 20px;

            border-collapse: collapse;
        }
        #apply #blue {
            color: blue;
        }
        #apply p {
            /* Remove Spaces */
            margin: 0px 0px 0px 0px; 
            padding: 0px 0px 0px 0px;

        }
        #apply #fett {
            font-weight: bold;
            font-size: 20px;
            padding: 5px 0px 5px 0px;

        }

            /* On Error */
        #red {
            color: red;
            border-collapse: collapse;
        }

            /* a blink test 
            by https://developer.mozilla.org/de/docs/Web/CSS/CSS_Animations/Using_CSS_animations
            and https://blog.ppedv.de/post/css-transform-drehen-flippen-kippen-ohne-js */
        div#anni {
            transform-origin: 0 0 0;
            animation: myanni 5s infinite alternate;
        }
        @keyframes myanni {
            from {
                margin-left: 40%;
                transform: rotate(45deg);
            }
            50% {transform-origin: 0 0 0;}
            to {
                margin-left: 0%;
                transform: rotate(0deg);
            }
        }
        </style>
        <?php
        // Also submit ist TRUE wenn überall etwas enthalten ist.
            $submit = false;
            if(!empty($_GET["nachnamen"]) && 
            !empty($_GET["vorname"]) && 
            !empty($_GET["email"]) && 
            !empty($_GET["stiftleisten"]) &&
            !empty($_GET["cpu"]) &&
            (!empty($_GET["ram"]) || 
            !empty($_GET["rom"])
            )) {$submit = true;}
        ?>
    </head>
    <body>
        <?php if(!$submit) { ?>
        <div id="pannel">
            <form action="" method="get">
                <h1>Angebotserstellung f&uuml;r Mikrocomputer
                </h1>
                <hr>
                <h4>Geben Sie Ihre pers&ouml;nliche Daten an:
                </h4>
                    <table id="up">
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["nachnamen"]) && isset($_GET["submit"])) ? '<p>Bitte Nachnamen angeben!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Nachnamen:
                                </p>
                            </td>
                             <td>
                                <input type="text" name="nachnamen" size="15" value="<?php echo (empty($_GET["nachnamen"])) ? '': $_GET["nachnamen"]; ?>">
                            </td>
                        </tr>
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["vorname"]) && isset($_GET["submit"])) ? '<p>Bitte Vorname angeben!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Vorname: 
                                </p>
                            </td>
                            <td>
                                <input type="text" name="vorname" size="15" value="<?php echo (empty($_GET["vorname"])) ? '': $_GET["vorname"]; ?>">
                            </td>
                        </tr>
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["email"]) && isset($_GET["submit"])) ? '<p>Bitte E-Mail Adresse angeben!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>E-Mail Adresse: 
                                </p>
                            </td>
                            <td>
                                <input type="email" name="email" size="15" value="<?php echo (empty($_GET["email"])) ? '': $_GET["email"]; ?>">
                            </td>
                        </tr>
                    </table>
                    <table id="down">
                        <tr>
                            <hr>
                            <h4>W&auml;hlen Sie die gew&ouml;nschten Komponenten aus:
                            </h4>
                        </tr>
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["stiftleisten"]) && isset($_GET["submit"])) ? '<p>Bitte eines ausw&auml;hlen!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Mikrocomputer ohne Stiftleisten: 
                                </p>
                            </td>
                            <td>
                                <input type="radio" name="stiftleisten" value="add" <?php echo (!empty($_GET["stiftleisten"]) ? (($_GET["stiftleisten"] == "add") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Mikrocomputer mit Stiftleisten: 
                                </p>
                            </td>
                            <td>
                                <input type="radio" name="stiftleisten" value="remove" <?php echo (!empty($_GET["stiftleisten"]) ? (($_GET["stiftleisten"] == "remove") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["cpu"]) && isset($_GET["submit"])) ? '<p>Bitte eines ausw&auml;hlen!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>CPU 12MHz 
                                </p>
                            </td>
                            <td>
                                <input type="radio" name="cpu" value="12" <?php echo (!empty($_GET["cpu"]) ? (($_GET["cpu"] == "12") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>CPU 18MHz 
                                </p>
                            </td>
                            <td>
                                <input type="radio" name="cpu" value="18" <?php echo (!empty($_GET["cpu"]) ? (($_GET["cpu"] == "18") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                         <tr id="red">
                            <td colspan="2">
                                <?php echo (empty($_GET["ram"]) && empty($_GET["rom"]) && isset($_GET["submit"])) ? '<p>Bitte eines ausw&auml;hlen!<p>': '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>RAM 64KB 
                                </p>
                            </td>
                            <td>
                                <input type="checkbox" name="ram" value="add" <?php echo (!empty($_GET["ram"]) ? (($_GET["ram"] == "add") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>ROM 64KB  
                                </p>
                            </td>
                            <td>
                                <input type="checkbox" name="rom" value="add" <?php echo (!empty($_GET["rom"]) ? (($_GET["rom"] == "add") ? 'checked': '') : ''); ?>>
                            </td>
                        </tr>
                    </table>
                <hr>
                <br>
                <p>
                    <input type="hidden" name="submit" value="true">
                    <input type="reset" value="Abbrechen">
                    <input type="submit" value="Absenden">
                </p>
            </form>
        </div>
        <?php } else { ?>
        <div id="apply">
            <h1 id="blue">Angebot Mikrocomputer
            </h1>
            <hr>
            <p id="fett">Sehr geehrter Herr <?php echo $_GET["vorname"], " ", $_GET["nachnamen"];?>,
            </p>
            <p>wir bedanken uns f&uuml;r Ihre Nachfrage und bieten wie folgt an:
            </p>
            <br>
            <!--
                -- Preise --
            Mikrocomputer ohne Stiftleisten: 106.- €
            Mikrocomputer mit Stiftleisten: 116.- €
            CPU 12 MHz: 15.- €
            CPU 18 MHz: 20.- €
            RAM: 10.- € 
            ROM: 12.- € -->
            <?php 
            $gesamtkosten = 0;

            if(!empty($_GET["stiftleisten"]) && ($_GET["stiftleisten"] == "add")) {
                echo '<p>Mikrocomputer 106.- &euro;</p>';
                $gesamtkosten += 106;
            }
            if(!empty($_GET["stiftleisten"]) && ($_GET["stiftleisten"] == "remove")) {
                echo '<p>Mikrocomputer 116.- &euro;</p>';
                $gesamtkosten += 116;
            }
            if(!empty($_GET["cpu"]) && ($_GET["cpu"] == "12")) {
                echo '<p>Mikroprozessor 15.- &euro;</p>';
                $gesamtkosten += 15;
            }
            if(!empty($_GET["cpu"]) && ($_GET["cpu"] == "18")) {
                echo '<p>Mikroprozessor 20.- &euro;</p>';
                $gesamtkosten += 20;
            }
    
            if(!empty($_GET["ram"]) && ($_GET["ram"] == "add")) {
                echo '<p>RAM Speicher 10.- &euro;</p>';
                $gesamtkosten += 10;
            }
            if(!empty($_GET["rom"]) && ($_GET["rom"] == "add")) {
                echo '<p>ROM Speicher 12.- &euro;</p>';
                $gesamtkosten += 12;
            }
            ?>
            <br>
            <p id="fett">Gesamtkosten: <?php echo $gesamtkosten;?>.- &euro;
            </p>
            <br>
            <p>Wir w&uuml;rden uns freuen, Ihren gesch&auml;teb Auftrag zu erhalten.
            </p>
            <p><div id="anni">Ihre MC-Profi GmbH</div>
            </p>
        </div>
        <?php } ?>
    </body>
</html>
