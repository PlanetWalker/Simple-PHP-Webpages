<?php
    session_start();
	$vist_page = "index.php";
	$comment = "nothing special";
	
	if (isset($_POST['login'])) {
       include 'includes/system.php';
	   $vist_page = "system.php";
	} elseif (isset($_POST['logout'])) {
       include 'includes/logout.php';
	   $vist_page = "logout.php";
	} else
	
    if (isset($_SESSION['UID'])) {
        $ID = $_SESSION['UID'];
		if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];
        } else 
            $mode = 'menu';
		switch($mode) {
            case "list";
                include 'includes/accessed_list.php';
				$vist_page = "accessed_list.php";
                break;
            case "menu":
                include 'includes/logged.php';
				$vist_page = "logged.php";
                break;
            default:
                include 'includes/logged.php';
				$vist_page = "logged.php";
                break;
        }
    } else {
        include 'includes/login.php';
		$vist_page = "login.php";
    }
	include "includes/logger.php";
	echo "<p>Ihre IP-Addresse lautet: $ip<br>Diese wird gespeichert!<br><div class=\"warn\">Unauthorisierter Zugriff wird zu einer Polizeilichen-Anzeige gebracht!</div></p>";
	exit();
?>
