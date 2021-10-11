<?php

    
    $base_dir = "../upload.php"; // Where is the default site
    $password = "913"; // How schould be the Password
    if(isset($_POST['upload'])) {
    
    
        // check Password
       if(!(isset($_POST['uploadPassword']) && $_POST['uploadPassword'] == $password)) {    
           header("Location: $base_dir?error=WRONG_PASSWORD");
           exit();
       }   

       // isset File
       if($_FILES['uploadFile']["error"] != 0) {    
           header("Location: $base_dir?error=NO_FILE");
           exit();
       }    
       // isset File Name
       if(!isset($_POST['rename'])) {
           header("Location: $base_dir?error=NO_FILE_NAME");
           exit();
       }
    
       include_once("mysql.php");
    
       // Set Upload dir
       $target_dir = "../uploads/";                          
       $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);  
       $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));     
    
       $rename = preg_replace( '/[a-zA-Z- ]*: /', '_', mysqli_real_escape_string($conn, $_POST['rename']) . '.' . $fileType);  
       $new_target_file = $target_dir .  $rename;
    
    
       // Check if file already exists
       if (file_exists($target_file)) {
           header("Location: $base_dir?error=FILE_EXISTS");
           exit();
       } 

       // Check if new file already exists
       if (file_exists($new_target_file)) {
           header("Location: $base_dir?error=NEW_FILE_EXISTS");
           exit();
       } 
    
       // Allow certain file formats
       if($fileType != "apk" && $fileType != "txt") {
           header("Location: $base_dir?error=NOT_ALLOWED_TYPE");
           exit();
       }
    
       // Check file size
       if ($_FILES["uploadFile"]["size"] > 154857600) {
           header("Location: $base_dir?error=FILE_TO_BIG");
           exit();
       }
    
       // try to upload file
       if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $new_target_file)) {
           // Generiere Token
           $success = false;
           do {
               $token = random_int(0,20000);
               $sql = "SELECT * FROM `fm` WHERE `Token` = '$token'";
               $result = mysqli_query($conn, $sql);
               $resultcheck = mysqli_num_rows($result);
               if($resultcheck > 0) {
                   $success = true;
               }
           }
           while($success);

           // SQL INSERT
           $sql = "INSERT INTO `fm`(`Name`, `Token`) VALUES ('".$rename."','".$token."');";
           $result = mysqli_query($conn, $sql);
           if($result) {
               header("Location: $base_dir?file=".htmlspecialchars($rename). "&sql=true&token=".$token);
               exit();
           } else {  
               header("Location: $base_dir?&sql=false");
               exit();
           }
       } else {
           header("Location: $base_dir?error=INTERNAL_UPLOAD_ERROR");  
           exit();
       }
    } else {
        echo 'There is a INTERNAL_ERROR Click <a href="'.$base_dir.'?error=INTERNAL_ERROR">here</a> to go back';
        exit();
    }
?>