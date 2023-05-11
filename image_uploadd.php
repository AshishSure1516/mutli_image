<?php
$conn=mysqli_connect('localhost', 'root', '', 'product');
if (isset($_POST['btn'])) {
    $targetDir="images/";
    $image=$_FILES['files']['name'];
    $fileName=implode(",", $image);
    echo "<pre>";
    print_r $fileName;
    echo "</pre>";
if(!empty($image))
{
    foreach($image as $key=>$val)
    {
        $targetFilePath= $targetDir . $val;
        move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath);
    }
    $sql="insert into new_image(image_name) values ('$fileName')";
    $run=($conn, $sql)
    if($run)
    {
        /* $statement =$conn->prepare($query);
    $statement->execute(); */

    echo "Image Uploaded Successfully";
    }
}
}

?>