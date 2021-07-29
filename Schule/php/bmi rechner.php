<!DOCTYPE html>
<html>
    <head>
        <title>***-FITT</title>
        <meta author="***-FITT"/>
        <style type="text/css">
            body {
                font-family: Arial;
                background-color: white;
                margin: 10px auto auto 50px;
                padding: 1px 5px 2px 10px;
                border:1px solid black;
                width: 700px;
            }
            span {
                font-weight: bold;
                
            }
            #right {
                                   
                padding-right: 15px;
                text-align: right;
            }
            
            #schluss {          
                text-align: right;
                padding-right: 100px;    
            }
            
            h2 {
                font-size: large;
            }
        </style>
    </head>
    <body>
        <h1>***-FITT</h1>
        <table>
            <tr>
                <td>
                    <p>Fit for Fun</p>
                </td>
                <td style="position:absolute; left:150px; top:87px;">
                    <img src="https://contents.mediadecathlon.com/p1248562/k$01448487cc01f6437afa685728065895/sq/Hantel-10-kg-Krafttraining.jpg" width="auto" height="50" alt="" title="" />  
                </td>
            </tr>  
        </table> 
        <table>
            <tr>
                <td style="vertical-align:bottom; position: relative;">
                    <h2>Ihr Spezialist f&uuml;r k&ouml;rperliche Fittness</h2> 
                </td>  
                <td style="position:absolute; left:450px; top:31px;">
                    <img src="https://i.pinimg.com/600x315/82/1f/73/821f734b10a472f673189e567eee8dfd.jpg" width="auto" height="150" alt="" title="" />
                </td>
            </tr>
        </table>
        <br />  
        <hr />
        <?php if(!(isset($_GET['submit']) && isset($_GET['hight']) && isset($_GET['kg']) && (!($_GET['hight'] <= 0) && !($_GET['kg'] <= 0)))) { ?>
        <h2>Lassen Sie Ihren Body Mass Index berechnen.</h2>
        <form action="" method="GET">
            <table>
                <tr>
                    <?php echo (isset($_GET['hight'])) ? '<td><p style="color:red">Fehler</p></td>' : '' ; ?>
                    <td>K&ouml;rpergr&ouml;&szlig;e in cm:</td>
                    <td><input type="text" name="hight" placeholder="160" value="<?php echo (isset($_GET['hight'])) ? $_GET['hight'] : '' ; ?>"/></td>
                </tr> 
                <tr>
                    <?php echo (isset($_GET['kg'])) ? '<td><p style="color:red">Fehler</p></td>' : '' ; ?>
                    <td>Gewicht in kg:</td>
                    <td><input type="text" name="kg" placeholder="60" value="<?php echo (isset($_GET['kg'])) ? $_GET['kg'] : '' ; ?>"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="BMI berechnen" /></td>
                </tr>
            </table>
        </form>   
        <?php } else { 
        $hight = $_GET['hight'];
        $kg = $_GET['kg'];
                              
        $bmi = round($kg / (($hight/100) * ($hight/100)), 2);   
        $uebergewicht = false;             
        $untergewichtig = false;
        $normalgewicht = false;
        switch(true) {
            case $bmi<20:
                $untergewichtig = true;
                break;  
            case $bmi>26:    
                $uebergewicht = true;
                break;
            default:      
                $normalgewicht = true;
                break;
        }
        ?> 
        <h2>Ihr Body Mass Index betr&auml;gt <?php echo $bmi; ?></h2>
        <br />
        <h2><?php echo ($uebergewicht) ? '
                                Sie sind &uuml;bergewichtig und sollten mehr Fitniss betreiben.<br />
                                Kommen Sie zu uns. Wir beraten Sie gerne!
                                ' : ''; 
                  echo ($untergewichtig) ? '
                                Achtung - Sie sind untergewichtig!
                                ' : '';
                 echo ($normalgewicht) ? '
                                Prima - Ihr Gewicht ist ideal!
                                ' : '';
                                ?>
        </h2>
        <p id="schluss">Ihr <span>***-FITT</span> Fit for Fun-Team</p>
        <?php }?>
        <br />      
        <br />
        <p id="right">&copy; Max Mustermann</p>
    </body>
</html>