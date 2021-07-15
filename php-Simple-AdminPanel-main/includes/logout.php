<?php
    if (isset($_POST['logout'])) {
        session_start();
		$comment = "log out";
        session_unset();
        session_destroy();
        header("Location: ../");
        //exit();
    }
?>
