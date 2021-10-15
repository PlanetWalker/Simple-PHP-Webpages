<?php
    $base_dir = "../download.php"; // Where is the default site
    
    include_once("mysql.php");
    if(isset($_POST['predownload'])) {
        // isset Token
        if(!isset($_POST['token'])) {
            header("Location: $base_dir?error=NO_TOKEN");
            exit();
        }
    
        // Read Token                      
        $token = $_POST['token'];

        // Check the Token
        $sql = "SELECT * FROM `fm` WHERE `Token` = '$token'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck < 1) {
            header("Location: $base_dir?error=TOKEN_INVALID");  
            exit();
        }
        // Check SQL
        if($result) {
            while ($row = mysqli_fetch_row($result)) {
                header("Location: $base_dir?name=".htmlspecialchars($row[1])."&token=".$token."&sql=true");
                exit();
            }
        } else {  
            header("Location: $base_dir?error=NO_SQL"); // impossible to get there
            exit();
        }
    } else if(isset($_POST['download'])) {
        // isset Token
        if(!isset($_POST['token'])) {
            header("Location: $base_dir?error=NO_TOKEN");
            exit();
        }
        
        // Set Download dir
        $download_dir = "../uploads/";   
        // Read Token
        $token = $_POST['token'];

        // Check the Token
        $sql = "SELECT * FROM `fm` WHERE `Token` = '$token'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck < 1) {
            header("Location: $base_dir?error=TOKEN_INVALID");  
            exit();
        }
        // Check SQL
        if($result) {
            while ($row = mysqli_fetch_row($result)) {
               $filename = $download_dir . htmlspecialchars($row[1]);
            }
        } else {
            header("Location: $base_dir?error=NO_SQL"); // impossible to get there
            exit();
        }

        //Check if file exists
        if(file_exists($filename)) {

            //Define header information
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Content-Length: ' . filesize($filename));
            header('Pragma: public');

            //Clear system output buffer
            flush();

            //Read the size of the file
            readfile($filename);

            //Terminate from the script
            die();
            
            //Give feedback
            header("Location: $base_dir?file=successful&token=".$token);
            exit();
        } else {
            header("Location: $base_dir?error=FILENAME_NOT_EXIST");
            exit();
        }
    } else {
        echo 'There is a INTERNAL_ERROR Click <a href="'.$base_dir.'?error=INTERNAL_ERROR">here</a> to go back';
        exit();
    }
?>
