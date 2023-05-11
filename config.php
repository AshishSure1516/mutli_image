
<?php
// Create database connection
$conn= mysqli_connect('localhost', 'root', '', 'product');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>