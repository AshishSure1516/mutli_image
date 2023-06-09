<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="1234.php" method="post" enctype="multipart/form-data">
            Select Image Files to Upload:
            <input type="file" name="files[]" multiple >
            <input type="submit" name="btn" value="UPLOAD">
        </form>

</body>
</html>

<?php 
// Create database connection
$conn= mysqli_connect('localhost', 'root', '', 'product');

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $db->connect_error);
} 
if(isset($_POST['btn']))
{ 
    // File upload configuration 
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames))
    { 
        foreach($_FILES['files']['name'] as $key=>$val)
        { 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes))
            { 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', NOW() ),"; 
                }
                else
                { 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }
            else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL))
        { 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $conn->query("insert into images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
            /* if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            }  */
        }
        /* else
        { 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }
    else{ 
        $statusMsg = 'Please select a file to upload.'; 
    }  */
} 
 
?>