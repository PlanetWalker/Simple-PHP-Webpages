<?php
    $host = "localhost";
    $port = 3306;
    $user = "root";    
    $passwort = "";
    $dbname = "filer";
    

    @$conn = new mysqli($host, $user, $passwort, $dbname, $port);

    if ($conn->connect_error) {
        echo ("<script>console.log(\"Connection failed: " .$conn->connect_error ."\")</script>");
    } else
        echo ("<script>console.log(\"MySQL Connection Successful!\")</script>");
?>