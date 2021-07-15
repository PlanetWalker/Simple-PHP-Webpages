<?php
    if (isset($_POST['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        unset($_COOKIE['user_id']);
        header("Location: ../");
        exit();
    }
?>
