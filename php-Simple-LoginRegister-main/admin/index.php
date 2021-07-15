<?php
    session_start();
    if (isset($_SESSION['UID'])) {
        include 'includes/mysql.php';
        $ID = $_SESSION['UID'];
        $sql = "SELECT * FROM login WHERE user_id = '$ID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['user_name'];
        $rank = $row['user_rank'];

        if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];
        } else 
            $mode = 'menu';

        switch($mode) {
            case "profil";
                include 'profil/profil.php';
                break;
            case "groups";
                include 'groups/groups.php';
                break;
            case "team";
                include 'team/team.php';
                break;
            case "mitglieder";
                include 'mitglieder/mitglieder.php';
                break;
            case "menu":
                include 'menu/logged.php';
                break;
            default:
                include 'menu/logged.php';
                break;
        }
    } else {
        include 'includes/login.php';
    }
?>
