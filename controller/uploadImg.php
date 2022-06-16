<?php

if(isset($_POST['submit'])){

    try 
    {
        $db = new PDO('mysql:host=localhost;dbname=batch16project;charset=utf8', 'root', ''); // represents the connection to the data base
    } catch(Exception $e)
    {
        die('error : '. $e->getMessage());
    }

    if(!empty($_FILES["uploadFile"]["name"])) {
        
        // Get file info 
        $fileName = $_FILES["uploadFile"]["name"]; 
        $fileLocation = $_FILES["uploadFile"]["tmp_name"];
        $folder = "../profile_images/" . basename($fileName);
       
        if (move_uploaded_file($fileLocation, $folder)) {
            header("Location: ../view/profileFormView.php");
            // echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        session_start();
        $_SESSION['folder'] = $folder;
        $_SESSION['fileName'] = $fileName;


    } else{
        echo 'Please select an image file to upload.'; 
    }
    
}


// Allow certain file formats 
// $allowTypes = array('jpg','png','jpeg','gif'); 

//     if(in_array($fileType, $allowTypes)){ 
//         $image = $_FILES['image']['tmp_name']; 
//         $imgContent = addslashes(file_get_contents($image)); 
    
//         // Insert image content into database 
//         $insert = $db->query("INSERT INTO users (profile_img) VALUES ('$imgContent')"); 
    
//         if($insert){ 
//             $status = 'success'; 
//             $statusMsg = "File uploaded successfully."; 
//         }else{ 
//             $statusMsg = "File upload failed, please try again."; 
//         }  
//     }else{ 
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
//     } 
// }else{ 
//     $statusMsg = 'Please select an image file to upload.'; 

// <form action="upload.php" method="post" enctype="multipart/form-data">
//     <label>Select Image File:</label>
//     <input type="file" name="image">
//     <input type="submit" name="submit" value="Upload">
// </form>

// If file upload form is submitted 
