<?php
    session_start();
    if (isset($_POST['submit'])) {
        include 'mysql.php';

        $USERNAME = mysqli_real_escape_string($conn, $_POST['username']);
        $PW = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($USERNAME) || empty($PW)) {
            header("Location: ../index.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM login WHERE user_name = '$USERNAME' ";
            $result = mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck < 1) {
                header('Location: ../index.php?login=notregistered');
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //$hashedPWchecked = password_verify($PW, $row['user_password']);
                    if(md5($PW) == $row['user_password']) {
                        $hashedPWchecked = true;
                    } else $hashedPWchecked = false;
                    if ($hashedPWchecked == false) {
                        header('Location: ../index.php?login=error');
                        exit();
                    } elseif ($hashedPWchecked == true){
                        $_SESSION['UID'] = $row['user_id'];
                        header('Location: ../index.php?login=succesful');
                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: ../index.php?login=unknown-error");
        exit();
    }
?>
