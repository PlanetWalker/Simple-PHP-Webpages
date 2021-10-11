<!DOCTYPE html>
<html>

<head>
    <title>Bundestag</title>

    <meta charset="UTF-8">
    <meta name="description" content="Bundestags Quiz">
    <meta name="author" content="<keksgauner/>">
    <meta name="keywords" content="Bundestag, Tai, Tai11, 11, Anwendung, Quiz, Fragen, Antworten, Wer wird Million&auml;r">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/style.css"/>
    
    <?php
    function checkbox($a, $b) {
        if($a == $b) {
            echo 'checked="" ';
        }
        if(isset($_POST['send'])) {
            echo 'disabled="" ';
        }
    }

    // Database infos
    $host = "localhost";
    $user = "umfrage";
    $password = "";
    $database = "umfrage";          
    
    // Prüfen ob conn klappt
    $conn = @mysqli_connect($host, $user, $password, $database);

    // -- Beginning --
    if (false) {
        // Create Database
        $sql = "CREATE TABLE IF NOT EXISTS `bundestag` (
                `user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `user_name` varchar(256) NOT NULL,
                `user_punktzahl` int(20) NOT NULL
                );";
        mysqli_query($conn, $sql);
    }
    (isset($_POST['send'])) ? $points = '0' : '';
    ?>
</head>

<body>
    <h1><strong>Bundestag - Quiz</strong></h1>
    <h3>Fragen und Antwortmöglichkeiten zur Bundestagswahl</h3>
    
    <form method="post" action="">
    <th>Bitte beantworten Sie <b>alle</b> Fragen!<br/></th>
    
    <br/><br/>
    <div class="frage">
    <?php
    (isset($_POST['F1'])) ? $F1 = $_POST['F1']:$F1 = 0;
    if(isset($_POST['send'])) {
        if($F1 == 2) {
            $points++;
            echo "<tr>Frage 1 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 1 &#x1F6AB;</tr><br>"; 
    }
    ?>	

	<!-- ------------------------------------------------------ ANFANG ------------------------------------------------------ -->

    <tr>1) Wie oft findet die Bundestagswahl statt?<br/></tr>                          
    <tr><td><input value="1" type="radio" name="F1" <?php  checkbox($F1, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Alle 5 Jahre</span></td><br/></tr>                                
    <tr><td><input value="2" type="radio" name="F1" <?php  checkbox($F1, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Alle 4 Jahre</span></td><br/></tr> 
    <tr><td><input value="3" type="radio" name="F1" <?php  checkbox($F1, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Alle 3 Jahre</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F1" <?php  checkbox($F1, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Alle 2 Jahre</span></td><br/></tr>
    <tr><td><input value="5" type="radio" name="F1" <?php  checkbox($F1, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">J&auml;hrlich</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F2_1'])) ? $F2_1 = $_POST['F2_1']:$F2_1 = 0;
    (isset($_POST['F2_2'])) ? $F2_2 = $_POST['F2_2']:$F2_2 = 0;
    (isset($_POST['F2_3'])) ? $F2_3 = $_POST['F2_3']:$F2_3 = 0;
    (isset($_POST['F2_4'])) ? $F2_4 = $_POST['F2_4']:$F2_4 = 0; 
    (isset($_POST['F2_5'])) ? $F2_5 = $_POST['F2_5']:$F2_5 = 0;
    if(isset($_POST['send'])) {
        if($F2_1 == 1 && $F2_4 == 4 && $F2_2 != 2 && $F2_3 != 3 && $F2_5 != 5){
            $points++;
            echo "<tr>Frage 2 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        }
        else
            echo "<tr>Frage 2 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>2) Wo kann gew&auml;hlt werden? (mehrere Antworten m&ouml;glich)<br/></tr>
    <tr><td><input value="1" type="checkbox" name="F2_1" <?php  checkbox($F2_1, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Wahllokal</span></td><br/></tr>
    <tr><td><input value="2" type="checkbox" name="F2_2" <?php  checkbox($F2_2, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Bundestag</span></td><br/></tr>
    <tr><td><input value="3" type="checkbox" name="F2_3" <?php  checkbox($F2_3, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Rathaus</span></td><br/></tr>
    <tr><td><input value="4" type="checkbox" name="F2_4" <?php  checkbox($F2_4, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Briefwahl</span></td><br/></tr> 
    <tr><td><input value="5" type="checkbox" name="F2_5" <?php  checkbox($F2_5, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Online</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F3'])) ? $F3 = $_POST['F3']:$F3 = 0;
    if(isset($_POST['send'])) {
        if($F3 == 3){
            $points++;
            echo "<tr>Frage 3 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        }
        else
            echo "<tr>Frage 3 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>3) Wer darf bei der Bundestagswahl seine Stimme abgeben?<br/></tr>
    <tr><td><input value="1" type="radio" name="F3" <?php  checkbox($F3, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">alle Erwachsenen, die in Deutschland wohnen</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F3" <?php  checkbox($F3, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">alle deutschen Staatsb&uuml;rger</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F3" <?php  checkbox($F3, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">alle deutschen Staatsb&uuml;rger &uuml;ber 18 Jahre </span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F3" <?php  checkbox($F3, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">alle deutschen Staatsb&uuml;rger &uuml;ber 21 Jahre</span></td><br/></tr>  
    <tr><td><input value="5" type="radio" name="F3" <?php  checkbox($F3, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">alle nat&uuml;rlichen Personen &uuml;ber 18 jahren</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F4'])) ? $F4 = $_POST['F4']:$F4 = 0;
    if(isset($_POST['send'])) {
        if($F4 == 2) {
            $points++;
            echo "<tr>Frage 4 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 4 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>4) Wer w&auml;hlt die Bundeskanzlerin oder den Bundeskanzler?<br/></tr>
    <tr><td><input value="1" type="radio" name="F4" <?php  checkbox($F4, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Die wahlberechtigen B&uuml;rger in Deutschland</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F4" <?php  checkbox($F4, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Die Abgeordneten des Bundestags</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F4" <?php  checkbox($F4, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Der Bundespr&auml;sident</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F4" <?php  checkbox($F4, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Die B&uuml;rger</span></td><br/></tr>       
    <tr><td><input value="5" type="radio" name="F4" <?php  checkbox($F4, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Der Bundesrat</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F5'])) ? $F5 = $_POST['F5']:$F5 = 0;
    if(isset($_POST['send'])) {
        if($F5 == 2) {
            $points++;
            echo "<tr>Frage 5 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 5 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>5) Wie heißt die Bundeskanzlerin oder der Bundeskanzler? (Stand: 15.09.2021)<br/></tr>
    <tr><td><input value="1" type="radio" name="F5" <?php  checkbox($F5, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Eva D&ouml;hla</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F5" <?php  checkbox($F5, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Angela Merkel</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F5" <?php  checkbox($F5, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Markus Söder</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F6'])) ? $F6 = $_POST['F6']:$F6 = 0;
    if(isset($_POST['send'])) {
        if($F6 == 2) {
            $points++;
            echo "<tr>Frage 6 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 6 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>6) Muss jeder Wahlberechtigte w&auml;hlen gehen?<br></tr>
    <tr><td><input value="1" type="radio" name="F6" <?php  checkbox($F6, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ja, die Teilname an der Wahl ist Pflicht</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F6" <?php  checkbox($F6, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Nein, die Teilnahme an der Wahl ist freiwillig</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F6" <?php  checkbox($F6, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ja, allerdings nur, wenn er auch in Deutschland lebt</span></td><br/></tr> 
    <tr><td><input value="4" type="radio" name="F6" <?php  checkbox($F6, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ja, aber nur die Staatsb&uuml;rger, deren Wohnzitz innerhalb der BRD liegt</span></td><br/></tr>
    </div>
        
    <div class="frage">
    <?php
    (isset($_POST['F7'])) ? $F7 = $_POST['F7']:$F7 = 0;
    if(isset($_POST['send'])) {
        if($F7 == 2) {
            $points++;
            echo "<tr>Frage 7 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 7 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>7) Wie viele Stimmen hat jeder Wahlberechtigte?<br/></tr>
    <tr><td><input value="1" type="radio" name="F7" <?php  checkbox($F7, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">eine</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F7" <?php  checkbox($F7, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">zwei</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F7" <?php  checkbox($F7, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">drei</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F8'])) ? $F8 = $_POST['F8']:$F8 = 0;
    if(isset($_POST['send'])) {
        if($F8 == 2) {
            $points++;
            echo "<tr>Frage 8 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 8 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>8) Wie viel Prozent der Stimmen muss eine Partei mindestens bekommen, um in den Bundestag einziehen zu d&uuml;rfen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F8" <?php  checkbox($F8, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">1 Prozent</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F8" <?php  checkbox($F8, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">5 Prozent</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F8" <?php  checkbox($F8, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">10 Prozent</span></td><br/></tr>
    </div>
   
    <div class="frage">
    <?php
    (isset($_POST['F9'])) ? $F9 = $_POST['F9']:$F9 = 0;
    if(isset($_POST['send'])) {
        if($F9 == 3) {
            $points++;
            echo "<tr>Frage 9 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 9 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>9) Wie lange vor der Wahl d&uuml;rfen die Parteien mit Plakaten Werbung f&uuml;r sich und Ihre Politiker machen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F9" <?php  checkbox($F9, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Das ganze Jahr</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F9" <?php  checkbox($F9, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Einen Monat vor der Wahl</span></td><br/></tr> 
    <tr><td><input value="3" type="radio" name="F9" <?php  checkbox($F9, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Sechs Wochen vor der Wahl</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F10'])) ? $F10 = $_POST['F10']:$F10 = 0;
    if(isset($_POST['send'])) {
        if($F10 == 4) {
            $points++;
            echo "<tr>Frage 10 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 10 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>10) Wie alt muss man sein, um Bundespr&auml;sident zu werden?<br/></tr>
    <tr><td><input value="1" type="radio" name="F10" <?php  checkbox($F10, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">18 Jahre</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F10" <?php  checkbox($F10, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">21 Jahre</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F10" <?php  checkbox($F10, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">30 Jahre</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F10" <?php  checkbox($F10, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">40 Jahre</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F11'])) ? $F11 = $_POST['F11']:$F11 = 0;
    if(isset($_POST['send'])) {
        if($F11 == 3) {
            $points++;
            echo "<tr>Frage 11 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 11 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>11) Wie m&uuml;ssen die gew&auml;hlten Politiker im Parlament abstimmen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F11" <?php  checkbox($F11, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">ihren Wahlversprechen entsprechend</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F11" <?php  checkbox($F11, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">nach dem Willen der Partei</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F11" <?php  checkbox($F11, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">nach ihrem eigenem Gewissen</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F12'])) ? $F12 = $_POST['F12']:$F12 = 0;
    if(isset($_POST['send'])) {
        if($F12 == 2) {
            $points++;
            echo "<tr>Frage 12 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 12 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>12) Was ist kein allgemeiner Grundsatz f&uuml;r Wahlen in Deutschland?<br/></tr>
    <tr><td><input value="1" type="radio" name="F12" <?php  checkbox($F12, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Die Wahl ist frei: Kein W&auml;hler wird &uuml;berwacht oder gezwungen</span></td><br/></tr>     
    <tr><td><input value="2" type="radio" name="F12" <?php  checkbox($F12, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Die Wahl ist &ouml;ffentlich: Jeder tut kund, welche Partei er gew&auml;hlt hat</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F12" <?php  checkbox($F12, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Die Wahl ist gleich: Jede Stimme z&auml;hlt gleich viel</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F13'])) ? $F13 = $_POST['F13']:$F13 = 0;
    if(isset($_POST['send'])) {
        if($F13 == 1) {
            $points++;
            echo "<tr>Frage 13 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 13 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>13) Wer oder Was kann mit der Erststimme gew&auml;hlt werden?<br/></tr>
    <tr><td><input value="1" type="radio" name="F13" <?php  checkbox($F13, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Einzelne Personen</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F13" <?php  checkbox($F13, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Parteien</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F13" <?php  checkbox($F13, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Koalitionen</span></td><br/></tr> 
    <tr><td><input value="4" type="radio" name="F13" <?php  checkbox($F13, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Allianzen</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F14'])) ? $F14 = $_POST['F14']:$F14 = 0;
    if(isset($_POST['send'])) {
        if($F14 == 2) {
            $points++;
            echo "<tr>Frage 14 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 14 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>14) Wer oder Was kann mit der Zweitstimme gew&auml;hlt werden?<br/></tr>
    <tr><td><input value="1" type="radio" name="F14" <?php  checkbox($F14, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Einzelne Personen</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F14" <?php  checkbox($F14, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Parteien</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F14" <?php  checkbox($F14, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Koalitionen</span></td><br/></tr>  
    <tr><td><input value="4" type="radio" name="F14" <?php  checkbox($F14, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Allianzen</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F15'])) ? $F15 = $_POST['F15']:$F15 = 0;
    if(isset($_POST['send'])) {
        if($F15 == 1) {
            $points++;
            echo "<tr>Frage 15 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 15 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>15) Was ist eine Koalition?<br/></tr>
    <tr><td><input value="1" type="radio" name="F15" <?php  checkbox($F15, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Eine Koalition (von lateinisch coalitio ‚Zusammenwachsen', ‚Vereinigung', ‚Zusammenschluss') in der Politik ist ein temporäres Bündnis politischer Parteien, politischer Gruppierungen und Parlamentsfraktionen. Parteien koalieren in vielen Staaten miteinander, um eine stabile Regierung zu bilden.</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F15" <?php  checkbox($F15, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Die Koalition (Lahmarschia machnixus), auch Koala genannt ist ein baumbewohnender Beutelsäuger in Australien. Sie ist neben dem Känguru das am weitesten verbreitete Symbol Australiens. Im Gegensatz zu diesen besteht eine Koalition aus vielen Tieren, bewegt sich nicht hüpfend vorwärts und ist daher nicht dem Hiphop zuzuordnen.</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F15" <?php  checkbox($F15, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Eine Koalition (von lateinisch coalitio ‚Zusammenwachsen', ‚Vereinigung', ‚Zusammenschluss') in der Politik ist ein permanentes Bündnis politischer Personen, politischer Gruppierungen und Parlamentsfraktionen. Parteien koalieren in vielen Staaten miteinander, um eine stabile Regierung zu bilden.</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F16'])) ? $F16 = $_POST['F16']:$F16 = 0;
    if(isset($_POST['send'])) {
        if($F16 == 3) {
            $points++;
            echo "<tr>Frage 16 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 16 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>16) Was ist das Parlament?<br/></tr>
    <tr><td><input value="1" type="radio" name="F16" <?php  checkbox($F16, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ein Gebäude, in dem die Kanzlerin/ der Kanzler wohnt</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F16" <?php  checkbox($F16, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Das oberste Gericht</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F16" <?php  checkbox($F16, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Die politische Volksvertretung</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F16" <?php  checkbox($F16, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ein Gesetzbuch</span></td><br/></tr>

    </div>
    <div class="frage">
    <?php
    (isset($_POST['F17'])) ? $F17 = $_POST['F17']:$F17 = 0;
    if(isset($_POST['send'])) {
        if($F17 == 3) {
            $points++;
            echo "<tr>Frage 17 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 17 &#x1F6AB;</tr><br>"; 
    }
    ?>
    <tr>17) Wer gehört nicht zur Bundesversammlung?<br/></tr>
    <tr><td><input value="1" type="radio" name="F17" <?php  checkbox($F17, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Prominente</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F17" <?php  checkbox($F17, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ehemalige Politiker</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F17" <?php  checkbox($F17, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Landesparlamente</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F17" <?php  checkbox($F17, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Mitglieder der Volksvertretung</span></td><br/></tr>
    <tr><td><input value="5" type="radio" name="F17" <?php  checkbox($F17, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Sportler und Künstler</span></td><br/></tr>
    </div> 
     
    <div class="frage">
    <?php
    (isset($_POST['F18'])) ? $F18 = $_POST['F18']:$F18 = 0;
    if(isset($_POST['send'])) {
        if($F18 == 3) {
            $points++;
            echo "<tr>Frage 18 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 18 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>18) Wie viel Wahlkreise gibt es in Deutschland?<br/></tr>
    <tr><td><input value="1" type="radio" name="F18" <?php  checkbox($F18, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">221</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F18" <?php  checkbox($F18, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">269</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F18" <?php  checkbox($F18, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">299</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F18" <?php  checkbox($F18, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">301</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F19'])) ? $F19 = $_POST['F19']:$F19 = 0;
    if(isset($_POST['send'])) {
        if($F19 == 4) {
            $points++;
            echo "<tr>Frage 19 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 19 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>19) Ab wie viel Prozent ist die absolute Mehrheit?<br/></tr>
    <tr><td><input value="1" type="radio" name="F19" <?php  checkbox($F19, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">48%</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F19" <?php  checkbox($F19, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">51%</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F19" <?php  checkbox($F19, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">55%</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F19" <?php  checkbox($F19, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">50%</span></td><br/></tr>
    </div>    

    <div class="frage">
    <?php
    (isset($_POST['F20'])) ? $F20 = $_POST['F20']:$F20 = 0;
    if(isset($_POST['send'])) {
        if($F20 == 3) {
            $points++;
            echo "<tr>Frage 20 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 20 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>20) Wo hat der Bundestag seinen Sitz?<br/></tr>
    <tr><td><input value="1" type="radio" name="F20" <?php  checkbox($F20, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Hamburg</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F20" <?php  checkbox($F20, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Bremen</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F20" <?php  checkbox($F20, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Berlin</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F20" <?php  checkbox($F20, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Fankfurt</span></td><br/></tr>
    </div>
      
    <div class="frage">
    <?php
    (isset($_POST['F21'])) ? $F21 = $_POST['F21']:$F21 = 0;
    if(isset($_POST['send'])) {
        if($F21 == 4) {
            $points++;
            echo "<tr>Frage 21 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 21 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>21) Welche Personen d&uuml;rfen nicht w&auml;hlen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F21" <?php  checkbox($F21, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">K&ouml;rperlich Behinderte</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F21" <?php  checkbox($F21, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Personen ab 80 Jahren</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F21" <?php  checkbox($F21, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Personen ab 90 Jahren</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F21" <?php  checkbox($F21, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Keine Antwort ist richtig</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F22'])) ? $F22 = $_POST['F22']:$F22 = 0;
    if(isset($_POST['send'])) {
        if($F22 == 2) {
            $points++;
            echo "<tr>Frage 22 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 22 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>22) Wer zählt zu den ehemaligen Bundeskanzlern?<br/></tr>
    <tr><td><input value="1" type="radio" name="F22" <?php  checkbox($F22, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Markus S&ouml;der</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F22" <?php  checkbox($F22, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Konrad Adenauer</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F22" <?php  checkbox($F22, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Fank-Walter Steinmeier</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F22" <?php  checkbox($F22, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Annegret Kramp-Karrenbauer</span></td><br/></tr>
    </div>  

    <div class="frage">
    <?php
    (isset($_POST['F23'])) ? $F23 = $_POST['F23']:$F23 = 0;
    if(isset($_POST['send'])) {
        if($F23 == 3) {
            $points++;
            echo "<tr>Frage 23 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 23 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>23) Wann war die erste Bundestagswahl?<br/></tr>
    <tr><td><input value="1" type="radio" name="F23" <?php  checkbox($F23, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">16. August 1949</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F23" <?php  checkbox($F23, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">11. Mai 1949</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F23" <?php  checkbox($F23, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">14. August 1949</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F23" <?php  checkbox($F23, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">22. Juli 1949</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F24'])) ? $F24 = $_POST['F24']:$F24 = 0;
    if(isset($_POST['send'])) {
        if($F24 == 4) {
            $points++;
            echo "<tr>Frage 24 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 24 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>24) Wie viele Sitze hat der Bundestag mindestens?<br/></tr>
    <tr><td><input value="1" type="radio" name="F24" <?php  checkbox($F24, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">612</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F24" <?php  checkbox($F24, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">540</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F24" <?php  checkbox($F24, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">730</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F24" <?php  checkbox($F24, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">598</span></td><br/></tr>  
    <tr><td><input value="5" type="radio" name="F24" <?php  checkbox($F24, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">567</span></td><br/></tr>
    </div>   

    <div class="frage">
    <?php
    (isset($_POST['F25'])) ? $F25 = $_POST['F25']:$F25 = 0;
    if(isset($_POST['send'])) {
        if($F25 == 5) {
            $points++;
            echo "<tr>Frage 25 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 25 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>25) Wann findet die Bundestagswahl 2021 statt?<br/></tr>
    <tr><td><input value="1" type="radio" name="F25" <?php  checkbox($F25, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">01. September 2021</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F25" <?php  checkbox($F25, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">22. September 2021</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F25" <?php  checkbox($F25, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">15. September 2021</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F25" <?php  checkbox($F25, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">19. September 2021</span></td><br/></tr>
    <tr><td><input value="5" type="radio" name="F25" <?php  checkbox($F25, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">26. September 2021</span></td><br/></tr>
    </div>     

    <div class="frage">
    <?php
    (isset($_POST['F26'])) ? $F26 = $_POST['F26']:$F26 = 0;
    if(isset($_POST['send'])) {
        if($F26 == 3) {
            $points++;
            echo "<tr>Frage 26 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 26 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>26) Wie lange ist ein Bundeskanzler im Normalfall mindestens im Amt?<br/></tr>
    <tr><td><input value="1" type="radio" name="F26" <?php  checkbox($F26, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">drei Jahre</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F26" <?php  checkbox($F26, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">acht Jahre</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F26" <?php  checkbox($F26, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">vier Jahre</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F26" <?php  checkbox($F26, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">f&uuml;nf jahre</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F27'])) ? $F27 = $_POST['F27']:$F27 = 0;
    if(isset($_POST['send'])) {
        if($F27 == 1) {
            $points++;
            echo "<tr>Frage 27 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 27 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>27) Wie lange war die l&auml;ngste Amtszeit eines Bundeskanzlers?<br/></tr>
    <tr><td><input value="1" type="radio" name="F27" <?php  checkbox($F27, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">16 Jahre</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F27" <?php  checkbox($F27, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">12 Jahre</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F27" <?php  checkbox($F27, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">20 Jahre</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F27" <?php  checkbox($F27, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">24 Jahre</span></td><br/></tr>
    </div> 

    <div class="frage">
    <?php
    (isset($_POST['F28'])) ? $F28 = $_POST['F28']:$F28 = 0;
    if(isset($_POST['send'])) {
        if($F28 == 2) {
            $points++;
            echo "<tr>Frage 28 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 28 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>28) Wie viele Bundeskanzler gab es in Deutschland von 1949 bis heute?<br/></tr>
    <tr><td><input value="1" type="radio" name="F28" <?php  checkbox($F28, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">8</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F28" <?php  checkbox($F28, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">9</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F28" <?php  checkbox($F28, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">10</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F28" <?php  checkbox($F28, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">11</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F29'])) ? $F29 = $_POST['F29']:$F29 = 0;
    if(isset($_POST['send'])) {
        if($F29 == 4) {
            $points++;
            echo "<tr>Frage 29 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 29 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>29) Wie lange haben die Wahllokale ge&ouml;ffnet?<br/></tr>
    <tr><td><input value="1" type="radio" name="F29" <?php  checkbox($F29, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">9.00 Uhr bis 18.00 Uhr</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F29" <?php  checkbox($F29, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">7.00 Uhr bis 19.00 Uhr</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F29" <?php  checkbox($F29, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">6.00 Uhr bis 20.00 Uhr</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F29" <?php  checkbox($F29, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">8.00 Uhr bis 18.00 Uhr</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F30'])) ? $F30 = $_POST['F30']:$F30 = 0;
    if(isset($_POST['send'])) {
        if($F30 == 2) {
            $points++;
            echo "<tr>Frage 30 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 30 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>30) Wer war die erste Bundeskanzlerin?<br/></tr>
    <tr><td><input value="1" type="radio" name="F30" <?php  checkbox($F30, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Annegret Kramp-Karrenbauer</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F30" <?php  checkbox($F30, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Angela Merkel</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F30" <?php  checkbox($F30, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Annalena Baerbock</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F30" <?php  checkbox($F30, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Antje Huber</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F31'])) ? $F31 = $_POST['F31']:$F31 = 0;
    if(isset($_POST['send'])) {
        if($F31 == 4) {
            $points++;
            echo "<tr>Frage 31 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 31 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>31) Was muss ich zum Wahlokal mitnehmen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F31" <?php  checkbox($F31, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Wahlbenachrichtigung</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F31" <?php  checkbox($F31, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Wahlbenachrichtigung und Führerschein</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F31" <?php  checkbox($F31, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Wahlbenachrichtigung und Personalausweis/Reisepass</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F31" <?php  checkbox($F31, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Wahlbenachrichtigung oder Personalausweis/Reisepass/Reisepass</span></td><br/></tr>
    <tr><td><input value="5" type="radio" name="F31" <?php  checkbox($F31, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Personalausweis/Reisepass</span></td><br/></tr>
    <tr><td><input value="6" type="radio" name="F31" <?php  checkbox($F31, 6); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Gar nichts</span></td><br/></tr>
    </div> 
    
    <div class="frage">
    <?php
    (isset($_POST['F32'])) ? $F32 = $_POST['F32']:$F32 = 0;
    if(isset($_POST['send'])) {
        if($F32 == 2) {
            $points++;
            echo "<tr>Frage 32 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 32 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>32) Wie kann man als Bürger bei der Wahl helfen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F32" <?php  checkbox($F32, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Man kann als Wahlhelfer beim Ausfüllen der Wahlzettel mitwirken und zusammen mit den Wählern die Kreuze setzen.</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F32" <?php  checkbox($F32, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Man kann als Wahlhelfer seine Gemeinde unterstützen, damit die Wahl reibungslos abläuft. Also organisatorische Unterstützung am Wahltag.</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F32" <?php  checkbox($F32, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Man kann als Wahlhelfer die Wahllokale putzen.</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F32" <?php  checkbox($F32, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Man kann als Wahlhelfer die älteren Personen zum Wahllokal fahren.</span></td><br/></tr>
    </div>
     
    <div class="frage">
    <?php
    (isset($_POST['F33'])) ? $F33 = $_POST['F33']:$F33 = 0;
    if(isset($_POST['send'])) {
        if($F33 == 3) {
            $points++;
            echo "<tr>Frage 33 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 33 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>33) Welche/n Bundeskanzler/in hatten wir vor Frau Merkel?<br/></tr>
    <tr><td><input value="1" type="radio" name="F33" <?php  checkbox($F33, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Konrad Adenauer</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F33" <?php  checkbox($F33, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Ludwig Erhard</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F33" <?php  checkbox($F33, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Gerhard Schröder</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F34'])) ? $F34 = $_POST['F34']:$F34 = 0;
    if(isset($_POST['send'])) {
        if($F34 == 4) {
            $points++;
            echo "<tr>Frage 34 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 34 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>34) Bei einer repr&auml;sentativen Demokratie...<br/></tr>
    <tr><td><input value="1" type="radio" name="F34" <?php  checkbox($F34, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">W&auml;hlt das Volk einen Kanzler</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F34" <?php  checkbox($F34, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">W&auml;hlt ein ausgew&auml;hler Personenkreis</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F34" <?php  checkbox($F34, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Wird ein Diktator gew&auml;hlt</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F34" <?php  checkbox($F34, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">W&auml;hlt das Volk Volksvertreter</span></td><br/></tr>
    </div> 

    <div class="frage">
    <?php
    (isset($_POST['F35_1'])) ? $F35_1 = $_POST['F35_1']:$F35_1 = 0;
    (isset($_POST['F35_2'])) ? $F35_2 = $_POST['F35_2']:$F35_2 = 0;
    (isset($_POST['F35_3'])) ? $F35_3 = $_POST['F35_3']:$F35_3 = 0;
    (isset($_POST['F35_4'])) ? $F35_4 = $_POST['F35_4']:$F35_4 = 0; 
    (isset($_POST['F35_5'])) ? $F35_5 = $_POST['F35_5']:$F35_5 = 0;
    (isset($_POST['F35_6'])) ? $F35_6 = $_POST['F35_6']:$F35_6 = 0;
    if(isset($_POST['send'])) {
        if($F35_1 == 1 && $F35_2 == 2 && $F35_3 == 3 && $F35_4 == 4 && $F35_5 == 5 && $F35_6 != 6){
            $points++;
            echo "<tr>Frage 35 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        }
        else
            echo "<tr>Frage 35 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>35) Markieren Sie alle Wahlgrunds&auml;tze! (mehrere Antworten m&ouml;glich)<br/></tr>
    <tr><td><input value="1" type="checkbox" name="F35_1" <?php  checkbox($F35_1, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Frei</span></td><br/></tr>
    <tr><td><input value="2" type="checkbox" name="F35_2" <?php  checkbox($F35_2, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Gleich</span></td><br/></tr>
    <tr><td><input value="3" type="checkbox" name="F35_3" <?php  checkbox($F35_3, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Geheim</span></td><br/></tr>
    <tr><td><input value="4" type="checkbox" name="F35_4" <?php  checkbox($F35_4, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Unmittelbar</span></td><br/></tr>
    <tr><td><input value="5" type="checkbox" name="F35_5" <?php  checkbox($F35_5, 5); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Allgemein</span></td><br/></tr>     
    <tr><td><input value="6" type="checkbox" name="F35_6" <?php  checkbox($F35_6, 6); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Uneingeschr&auml;nkt</span></td><br/></tr>
    </div>

    <div class="frage">
    <?php
    (isset($_POST['F36'])) ? $F36 = $_POST['F36']:$F36 = 0;
    if(isset($_POST['send'])) {
        if($F36 == 1) {
            $points++;
            echo "<tr>Frage 36 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 36 &#x1F6AB;</tr><br>";
    }
    ?>  
    <tr>36) Wie lautet die amtliche Bezeichnung eines Bundestagsabgeordneten?<br/></tr>
    <tr><td><input value="1" type="radio" name="F36" <?php  checkbox($F36, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Mitglied des deutschen Bundestages</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F36" <?php  checkbox($F36, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Fraktionsmitglied</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F36" <?php  checkbox($F36, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Palamentarier</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F36" <?php  checkbox($F36, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Berufspolitiker</span></td><br/></tr>
    </div> 

    <div class="frage">
    <?php
    (isset($_POST['F37'])) ? $F37 = $_POST['F37']:$F37 = 0;
    if(isset($_POST['send'])) {
        if($F37 == 4) {
            $points++;
            echo "<tr>Frage 37 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 37 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>37) Wie viele Abgeordnete sa&szlig;en in der letzten Wahlperiode (2017-2021) im deutschen Bundestag (Stand: Juli 2021)?<br/></tr>
    <tr><td><input value="1" type="radio" name="F37" <?php  checkbox($F37, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">566</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F37" <?php  checkbox($F37, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">630</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F37" <?php  checkbox($F37, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">865</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F37" <?php  checkbox($F37, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">709</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F38'])) ? $F38 = $_POST['F38']:$F38 = 0;
    if(isset($_POST['send'])) {
        if($F38 == 3) {
            $points++;
            echo "<tr>Frage 38 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        } else
            echo "<tr>Frage 38 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>38) Wer kann an den Sitzungen des Bundestages teilnehmen?<br/></tr>
    <tr><td><input value="1" type="radio" name="F38" <?php  checkbox($F38, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Nur Bundestags- und Regierungsmitglieder</span></td><br/></tr>
    <tr><td><input value="2" type="radio" name="F38" <?php  checkbox($F38, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Nur Bundestagsmitglieder</span></td><br/></tr>
    <tr><td><input value="3" type="radio" name="F38" <?php  checkbox($F38, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Grunds&auml;tzlich jeder</span></td><br/></tr>
    <tr><td><input value="4" type="radio" name="F38" <?php  checkbox($F38, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Nur Bundestagsmitglieder und Fachberater</span></td><br/></tr>
    </div>
    
    <div class="frage">
    <?php
    (isset($_POST['F39_1'])) ? $F39_1 = $_POST['F39_1']:$F39_1 = 0;
    (isset($_POST['F39_2'])) ? $F39_2 = $_POST['F39_2']:$F39_2 = 0;
    (isset($_POST['F39_3'])) ? $F39_3 = $_POST['F39_3']:$F39_3 = 0;
    (isset($_POST['F39_4'])) ? $F39_4 = $_POST['F39_4']:$F39_4 = 0;
    if(isset($_POST['send'])) {
        if($F39_1 != 1 && $F39_2 == 2 && $F39_3 == 3 && $F39_4 != 4){
            $points++;
            echo "<tr>Frage 39 <style=\"color:#00ff00\">&#10004;</style></tr><br>";
        }
        else
            echo "<tr>Frage 39 &#x1F6AB;</tr><br>";
    }
    ?>
    <tr>39) Bundestagsabgeordnete besitzen "Idemnit&auml;t". Was bedeutet das? (mehrere Antworten m&ouml;glich)<br/></tr>
    <tr><td><input value="1" type="checkbox" name="F39_1" <?php  checkbox($F39_1, 1); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Sie d&uuml;rfen nicht inhaftiert werden</span></td><br/></tr>
    <tr><td><input value="2" type="checkbox" name="F39_2" <?php  checkbox($F39_2, 2); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Sie d&uuml;rfen im Bundestag frei reden</span></td><br/></tr>
    <tr><td><input value="3" type="checkbox" name="F39_3" <?php  checkbox($F39_3, 3); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'true' : 'wahl';?>">Sie werden nicht f&uuml;r ihre politischen &Auml;u&szlig;erungen im Bundestag bestraft</span></td><br/></tr>
    <tr><td><input value="4" type="checkbox" name="F39_4" <?php  checkbox($F39_4, 4); ?> /> </td><td><span id="<?php echo (isset($_POST['send'])) ? 'false' : 'wahl';?>">Sie m&uuml;ssen sich nicht mehr ausweisen</span></td><br/></tr>
    </div>
    
    <!-- ------------------------------------------------------ Ende ------------------------------------------------------ -->

    <?php
    if(isset($_POST['send'])) {
        // Generiere Name
        do {
            $success = false;
            $name = "User_".random_int(0,20000);
            $sql = "SELECT * FROM `bundestag` WHERE `user_name` = '$name'";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            if($resultcheck > 0) {
                $success = true;
            }


        }
        while($success);

        // Hole daten
        $punktzahl = $points; 
        echo "<p style=\"color:green;font-size:30px;margin:20px 0px 0px 0px 0px\">Herzlichen Gl&uuml;ckwunsch $name zu $punktzahl Punkte/n</p>";
		if($points > 37) { // 1 | 100% - 96% = 39 - 37.44 -> ab 37 Punkten
			echo "<p style=\"color:green;font-size:20px;margin:0px\">Sie gl&auml;nzen mit Ihrem politischen Wissen!</p>";
			
		} else if($points > 31) { // 2 | 95% - 80% = 37.05 - 31.2 -> ab 31 Punkten
			echo "
			<p style=\"color:green;font-size:20px;margin:0px\"> 
				Ihnen macht niemand etwas vor!
			</p>";

		} else if($points > 23) { // 3 | 79% - 60% = 30.81 - 23.4 -> ab 23 Punkten
			echo "<p style=\"color:yellow;font-size:20px;margin:0px\">
				Politik scheint Sie zu interessieren!
			</p>";

		} else if($points > 18) { // 4 | 59% - 45% = 23.01 - 17.55 -> ab 18 Punkten
			echo "<p style=\"color:yellow;font-size:20px;margin:0px\">
				Nur weiter so, darauf k&ouml;nnen Sie aufbauen!
			</p>";

		} else if($points > 6) { // 5 | 44% - 16% = 17.16 - 6.24 -> ab 6 Punkten
			echo "<p style=\"color:red;font-size:20px;margin:0px\">
				Villeicht machen Sie den Test gleich nochmal!
			</p>";

		} else if($points > 0) { // 6 | 15% - 0% = 5.85 - 0 -> ab 0 Punkten
			echo "<p style=\"color:red;font-size:20px;margin:0px\">
				Das war leider nicht gut!
			</p>";
			
		}
        
		if ($conn) {                 
            // Füge daten hinzu
            $sql = "INSERT INTO `bundestag`
            (`user_name`, `user_punktzahl`) 
            VALUES 
            ('$name','$punktzahl');";
            mysqli_query($conn, $sql);
        
            echo '<script>console.log("Erfolgreich gesendet!");</script>';
            }                                                       
    }
    ?>

    <tr><td><?php  echo (isset($_POST['send'])) ? '':'<input type="submit" name="send" value="&Uuml;berpr&uuml;fen!"/>'; unset($_REQUEST); // This schould disable webpage work. ?></td>
        <td> </td><br/></tr>
        
    </form>
    <br />
	<h4>
        Links:<br />
        <a target="_blank" href="https://www.bpb.de/mediathek/599/erst-und-zweitstimme">Link 1: https://www.bpb.de/mediathek/599/erst-und-zweitstimme</a><br />
        <a target="_blank" href="https://www.bpb.de/mediathek/614/fuenf-prozent-huerde">Link 2: https://www.bpb.de/mediathek/614/fuenf-prozent-huerde</a><br />
        <a target="_blank" href="https://www.bpb.de/mediathek/618/ueberhang-und-ausgelichsmandate">Link 3: https://www.bpb.de/mediathek/618/ueberhang-und-ausgelichsmandate</a><br />
        <a target="_blank" href="https://www.bundeswahlleiter.de">Link 4: https://www.bundeswahlleiter.de</a><br />
        <a target="_blank" href="https://www.bundestagswahl-2021.de/wahlprogramme">Link 5: https://www.bundestagswahl-2021.de/wahlprogramme</a><br />
        <a target="_blank" href="https://www.tagesschau.de/inland/btw21/programmvergleich-start-107.html">Link 6: https://www.tagesschau.de/inland/btw21/programmvergleich-start-107.html</a><br />
        <a target="_blank" href="https://www.mdr.de/nachrichten/deutschland/wahlen/bundestagswahl/wahlprogramm-parteien-vergleich-100.html">Link 7: https://www.mdr.de/nachrichten/deutschland/wahlen/bundestagswahl/wahlprogramm-parteien-vergleich-100.html</a><br />
        <a target="_blank" href="https://www.mitmischen.de/bundestag-wissen/artikelseiten/die-wahl-zum-bundestag/wofuer-steht-welche-partei">Link 8: https://www.mitmischen.de/bundestag-wissen/artikelseiten/die-wahl-zum-bundestag/wofuer-steht-welche-partei</a><br />
        <a target="_blank" href="https://www.wahl-o-mat.de/bundestagswahl2021/app/main_app.html">Link 9: https://www.wahl-o-mat.de/bundestagswahl2021/app/main_app.html</a><br />
        <a target="_blank" href="https://wahl-kompass.de/de/statements">Link 10: https://wahl-kompass.de/de/statements</a><br />
        <a target="_blank" href="https://www.politische-bildung-brandenburg.de/wahlprogramme-im-vergleich">Link 11: https://www.politische-bildung-brandenburg.de/wahlprogramme-im-vergleich</a><br />
    </h4>
    <br />
        <?php
            if ($conn) {
                $sql = "SELECT * FROM `bundestag`";
                $result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);
                echo
					"<p>Das Quiz wurde $resultcheck mal bearbeitet</p>";
            }
          ?>
    <div contenteditable="false" class="resize"> <!-- It's not a bug. Its a feature -->
    <table>
            <th>Name</th>
            <th>Fragen Richtig</th>
        </tr>
        <?php
            if ($conn) {
                $sql = "SELECT * FROM `bundestag` ORDER BY `user_punktzahl` DESC";
                $result = mysqli_query($conn, $sql);
                if ($result == true) {
                    while ($row = mysqli_fetch_array($result)) {
						if($row['user_punktzahl'] > 0)
                        echo
                            "<tr><td>". $row['user_name'] .
                            "</td><td>". $row['user_punktzahl'] .
                            "</td></tr>";
                    } 
                }
            }
          ?>
    </table>
    </div>
    
</body>
</html>