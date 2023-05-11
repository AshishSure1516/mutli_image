<?php
if(isset($_POST['btn']))
{
    $file_name=$_FILES['file_name']['name'];
    $file_size=$_FILES['file_name']['size'];
    $file_type=$_FILES['file_name']['type'];
    $file_temp_loc=$_FILES['file_name']['tmp_name'];
    $file_store='upload/'.$file_name;
    if(move_uploaded_file($file_temp_loc,$file_store))
    {
        echo "moved";
    }
    else
    {
        echo"not moved";
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
        <input type="file" name="file_name">
        <button type="submit" name="btn">Add</button>
    </form>
</body>
</html>