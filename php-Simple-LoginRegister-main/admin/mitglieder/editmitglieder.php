<?php
    if(isset($_POST['delete'])) {
        include '../includes/mysql.php';

        $uid = mysqli_real_escape_string($conn, $_POST['userid']);

        //errors
        if (empty($uid)) {
            header("Location: ../index.php?mode=mitglieder&member=empty");
            exit();
        } else {
            //Registrierung
            $sql = "DELETE FROM `mitglieder` WHERE `member_id` = ' $uid '";
            $result = mysqli_query($conn, $sql);
            header("Location: ../index.php?mode=mitglieder&member=successful");
            exit();
        }
    } else if(isset($_POST['edit'])) {
        header("Location: ../index.php?mode=mitglieder&member=failed");
        exit();
    } else {
        header("Location: ../index.php?mode=mitglieder&member=unknown-error");
        exit();
    }
?>
