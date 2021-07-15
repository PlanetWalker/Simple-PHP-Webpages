<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "kurse";
    $conn = @mysqli_connect($host, $user, $password, $database);
    echo ($conn) ?
                    "<script>console.log('Verbindung - Erfolgreich :)')</script>"
                :
                    "<script>console.log('Verbindung - Fehlgeschlagen :(')</script>";




?>