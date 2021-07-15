<?php
    $user = "root";
    $pass = "";
    $host = "localhost";
    $dbname = "website";

    // Create connection
    $conn = new mysqli($host, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
