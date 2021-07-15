<?php
    if(isset($_POST['register'])) {
        include '../includes/mysql.php';

        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $code = mysqli_real_escape_string($conn, $_POST['code']);

        //errors
        if (empty($username) || empty($email) || empty($password) || empty($code)) {
            header("Location: index.php?signup=empty");
            exit();
        } else {
            //valid input characters
            if(!preg_match("/^[a-zA-Z0-9_-]*$/", $username)) {
                header("Location: index.php?signup=invalid");
                exit();
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: index.php?signup=email");
                    exit();
                } else {
                    $sql = "SELECT * FROM login WHERE user_name='$username'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    if ($resultcheck > 0) {
                        header("Location: index.php?signup=usertaken");
                        exit();
                    }
                    $sql_ = "SELECT * FROM login WHERE user_email='$email'";
                    $newresult = mysqli_query($conn, $sql_);
                    $newresultcheck = mysqli_num_rows($newresult);
                    if ($newresultcheck > 0) {
                        header("Location: index.php?signup=emailtaken");
                        exit();
                    } else {
                        if ($password != $_POST['repeatpassword']) {
                            header("Location: index.php?signup=nomatch");
                            exit();
                        } else {
                            $newsql = "SELECT * FROM securitycode WHERE code_code = '$code'";
                            $rslt = mysqli_query($conn, $newsql);
                            $checking = mysqli_num_rows($rslt);
                            if ($checking < 1) {
                                header("Location: index.php?signup=codefalse");
                                exit();
                            } else {
                                if (strlen($password) < 5) {
                                    header("Location: index.php?signup=length");
                                    exit();
                                } else {
                                    //Rank
                                    $coderow = mysqli_fetch_assoc($rslt);
                                    $rank = $coderow['code_rank'];
                                    if ($rank == null || $rank == '') {
                                        header("Location: index.php?signup=emtyrank");
                                        exit();
                                    }
                                    //Code Löschung
                                    $codesql = "DELETE FROM securitycode WHERE code_code='$code'";
                                    $coderesult = mysqli_query($conn, $codesql);
                                    //Passwortverschlüsselung
                                    //$hashedpw = password_hash($password, PASSWORD_BCRYPT);
                                    $hashedpw = md5($password);
                                    //Registrierung
                                    $sql = "INSERT INTO login (user_email, user_password, user_name, user_rank) VALUES ('$email','$hashedpw', '$username', '$rank')";
                                    $result = mysqli_query($conn, $sql);
                                    header("Location: ../index.php?signup=valid");
                                    exit();
                                }
                                
                            }
                        }
                    }
                }
           }
        } 
    } else {
        header("Location: index.php?signup=unknown-error");
        exit();
    }
?>
