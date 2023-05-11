<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="" method="post" enctype="multipart/form-data">
            Select Image Files to Upload:
            <input type="file" name="files[]" multiple >
            <input type="submit" name="btn" value="UPLOAD">
        </form>

</body>
</html>

<?php
$conn=mysqli_connect('localhost', 'root', '', 'product');
if(!$conn)
{
    echo "connection failed";
}

if (isset($_POST['btn'])) 
{
    $file='';
    $file_temp='';
    $location="image_array/";
    $data='';
    foreach($_FILES['files']['name'] as $key=>$val)
    {
        $file= $_FILES['files']['name'][$key];
        $file_temp= $_FILES['files']['tmp_name'][$key];
        
        if(in_array($fileType, $allowedFileType))
        {
            if(move_uploaded_file($file_temp,$location.$file))
            {
                $sql="insert into array_image(image) values ('$file')";
                $run=mysqli_query($conn, $sql);
            } 
        }

   /*      move_uploaded_file($file_temp,$location.$file);
        // $data.=$file;
        $sql="insert into array_image(image) values ('$file')";
        $run=mysqli_query($conn, $sql); */
                 
    }
    if($run)
                {
                echo "Image Uploaded Successfully";
                }  
    
}
        
?>