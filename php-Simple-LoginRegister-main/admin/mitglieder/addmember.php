<?php
    if(isset($_POST['add'])) {
        include '../includes/mysql.php';

        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $discord = mysqli_real_escape_string($conn, $_POST['discord']);
        $beschreibung = mysqli_real_escape_string($conn, $_POST['beschreibung']);
        $protokoll = mysqli_real_escape_string($conn, $_POST['protokoll']);

        //errors
        if (empty($username)) {
            header("Location: ../index.php?mode=mitglieder&member=empty");
            exit();
        } else {
            //Registrierung
            $sql = "INSERT INTO `mitglieder`(`member_name`, `member_discord`, `member_beschreibung`, `member_protokoll`) VALUES ('$username', '$discord', '$beschreibung', '$protokoll')";
            $result = mysqli_query($conn, $sql);
            header("Location: ../index.php?mode=mitglieder&member=successful");
            exit();
        }
    } else {
        header("Location: ../index.php?mode=mitglieder&member=unknown-error");
        exit();
    }
?>
