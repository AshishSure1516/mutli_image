<?php
$conn=mysqli_connect('localhost', 'root', '', 'product');
if(isset($_POST['btn']))
{
    $bookname=$_POST['bname'];
    $file_name=$_FILES['file_name']['name'];
    $file_size=$_FILES['file_name']['size'];
    $file_type=$_FILES['file_name']['type'];
    $file_temp_loc=$_FILES['file_name']['tmp_name'];
    $file_store='upload/'.$file_name;
    $extn=substr($file_name,strlen($file_name)-4, strlen($file_name));
    $allowed_extn=array(".jpg", ".png");

    if(!in_array($extn, $allowed_extn))
    {
        echo "<script>alert('Invalid format: only jpg/png format allowed');</script>";
    }
    else
    {
        move_uploaded_file($file_temp_loc,$file_store);
        $sql="insert into bimage (bname, bookimage) values('$bookname', '$file_name')";
        $result=mysqli_query($conn, $sql);
        if($result)
        {
            echo "<script>alert('Image Inserted Successfully');</script>";
        }
        else
        {
            echo "<script>alert('Image Not Inserted');</script>";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <input type="text" name="bname">    
    <input type="file" name="file_name">
        <button type="submit" name="btn">Add</button>
    </form>
</body>
</html>