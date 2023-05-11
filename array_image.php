
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Image</title>
</head>
<body>

    <fieldset border=1>
    <form method="POST" id="form" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="">
        <input type="submit" name="btn" value="submit">
    </form>
    </fieldset>

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
        $sqlVal=" ";
        $uploadsDir = "image_array/";
        $allowedFileType = array('jpg','png','jpeg');
        
        if (!empty(array_filter($_FILES['files']['name']))) 
        {
            foreach($_FILES['files']['name'] as $id=>$val)
            {
                $fileName        = $_FILES['files']['name'][$id];
                $tempLocation    = $_FILES['files']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                if(in_array($fileType, $allowedFileType))
                {
                    if(move_uploaded_file($tempLocation, $targetFilePath))
                    {
                        $sqlVal.=$fileName;
                    } 
                }
                    $sql="insert into array_image  (image) values ('$sqlVal')";
                    $run=mysqli_query($conn, $sql);
                    if($run) 
                    { 
                        $response = array( "status" => "alert-success","message" => "Files successfully uploaded.");
                    }
                }
            }
        }
    
                 
?>