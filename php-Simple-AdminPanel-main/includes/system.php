<?php
    //session_start();
    if (isset($_POST['login'])) {
        if (empty($_POST['password'])) {
			$comment = "try to Login but emty";
            header("Location: ../index.php?login=empty");
            //exit();
        } else {
            if (md5($_POST['password']) != "hashed passowrd") {
				$comment = "try to Login but wrong_password";
				
				$date = date("Y-m-d - H:i:s ");
				$myfile = file_put_contents('includes/passwords.txt',"". $date . $_POST['password']. "" .PHP_EOL , FILE_APPEND | LOCK_EX);
				fclose($myfile);
				
                header('Location: ../index.php?login=wrong_password');
                //exit();
            } else {
                $_SESSION['UID'] = "md5 Password";
				$comment = "Login is succesful";
                header('Location: ../index.php?login=succesful');
                //exit();
            }  
        }
    } else {
        header("Location: ../index.php?login=unknown-error");
        //exit();
    }
?>
