<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     
    <div class="container text-center">    
         <div class="row">
        
            <?php
                $con=mysqli_connect('localhost','root','','product');
                $sql="select * from new_image";
                $rs=mysqli_query($con,$sql);
                while($rw=mysqli_fetch_array($rs))
                {
                    $bname=$rw['image_id'];
                    $bookimage=$rw['image_name'];
            ?>

            <div class="col-lg-3 mb-2 col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/<?php echo $bookimage; ?>" /> 
                     <div class="card-body">
                        <h5 class="card-title"><?php echo $bname; ?></h5>
                    </div>
                </div>   
            </div>     
<?php
}
?>
    </div>
</div>

</body>
</html>
