<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>

    <form method="POST" id="form" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="">
        <input type="submit" name="btn" value="submit">
    </form>

<?php
$conn=mysqli_connect('localhost', 'root', '', 'product');
if (isset($_POST['btn'])) 
{
    $image=$_FILES['files']['name'];
    $targetDir="images/";
    $fileName=implode(",", $image);
    
if(!empty($image))
{
    foreach($image as $key=>$val)
    {
        $targetFilePath= $targetDir . $val;
        move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath);
    }
    $sql="insert into new_image(image_name) values ('$fileName')";
    $run=mysqli_query($conn, $sql);
    if($run)
    {
    echo "Image Uploaded Successfully";
    }
}
}
?>
    


</body>
</html>