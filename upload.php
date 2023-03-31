<?php
// Include the database configuration file
include 'dbconnection.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/"; //specifies the directory where the file is going to be placed
$fileName = basename($_FILES["file"]["name"]);//basename is used to return filename(S_FILES["file button name"]["name"]-it is use to get the name of the file.
$targetFilePath = $targetDir . $fileName;
$bookName = $_POST['bookName'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$author = $_POST['author'];
// $targetFilePath = $tragetDir.basename($_FILES["file"]["name"]); //specifies the path of the file to be uploaded
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//$filetype = .docx

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        //(, newlocation)
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){//[tmp_name]-Temporary address where the file is located before processing the upload request
            // Insert image file name into database
            //echo $_FILES["file"]["tmp_name"];
            $sql = "INSERT into upload (bookCover, bookName, price, genre, author) 
            VALUES ('".$fileName."','".$bookName."','".$price."','".$genre."','".$author."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header('location:Ahomepage.php');
            }else{
                $statusMsg = "Upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>