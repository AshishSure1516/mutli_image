<?PHP
$conn=mysqli_connect('localhost', 'root', '', 'product');
if(!$conn)
{
    echo "connection failed";
}
$i='';
$sql="select image from array_image";
$run=mysqli_query($conn,$sql);
$data=mysqli_fetch_array($run);
$res=$data['image'];
$res=explode(" ", $res);
$count=count($res)-1;
for ($i=0; $i <$count ; $i++) 
{ 
?>
    <img src="./image_array/<?php= $res[$i];?>" height="100px" width="100px"/>
<?php

    
    
}
echo "<p style='color:green;font-size:26px'>Total ".$count." images found.";
?>