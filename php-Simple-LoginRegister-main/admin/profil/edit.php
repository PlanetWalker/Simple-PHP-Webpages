<?php
    if(isset($_POST['save'])) {
        include '../includes/mysql.php';

        $ID = mysqli_real_escape_string($conn, $_POST['userid']);;
        $accountpassword = mysqli_real_escape_string($conn, $_POST['accountpassword']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //errors
        if (empty($accountpassword) || empty($ID) && (empty($email) || empty($password))) {
            header("Location: ../index.php?mode=profil&edit=empty");
            exit();
        } else {
            $sql = "SELECT * FROM login WHERE user_id = '$ID' ";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck < 1) {
                header('Location: ../index.php?mode=profil&edit=notregistered');
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //$hashedPWchecked = password_verify($PW, $row['user_password']);
                    if(md5($PW) == $row['user_password']) {
                        $hashedPWchecked = true;
                    } else $hashedPWchecked = false;
                    if ($hashedPWchecked == false) {
                        header('Location: ../index.php?mode=profil&edit=error');
                        exit();
                    } elseif ($hashedPWchecked != true){
                        header('Location: ../index.php?mode=profil&edit=error');
                        exit();
                    }
                }
            }

            if(!empty($email)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../index.php?mode=profil&edit=email");
                    exit();
                }
                $sql_ = "SELECT * FROM login WHERE user_email='$email'";
                $newresult = mysqli_query($conn, $sql_);
                $newresultcheck = mysqli_num_rows($newresult);
                if ($newresultcheck > 0) {
                    header("Location: ../index.php?mode=profil&edit=emailtaken");
                    exit();
                }
                $sqlemail = "`user_email`= '$email'";
            } else {
                $sqlemail = "";
            }

            if(!empty($password)) {
                if ($password != $_POST['repeatpassword']) {
                    header("Location: ../index.php?mode=profil&edit=nomatch");
                    exit();
                }
                if (strlen($password) < 5) {
                    header("Location: ../index.php?mode=profil&edit=length");
                    exit();
                }
                
                //Passwortverschlüsselung
                //$hashedpw = password_hash($password, PASSWORD_BCRYPT);
                $hashedpw = md5($password);
                $sqlhashedpw = "`user_password`= '$hashedpw'";
            } else {
                $sqlhashedpw = "";
            }
            //Registrierung
            $sql = "UPDATE `login` SET $sqlemail $sqlhashedpw WHERE `user_id` = '$ID'";
            $result = mysqli_query($conn, $sql);
            header("Location: ../index.php?mode=profil&edit=valid");
            exit();
           
        } 
    } else {
        header("Location: ../index.php?mode=profil&edit=unknown-error");
        exit();
    }
?>
