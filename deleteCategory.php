<?php
$IDCategoryReceive = $_GET['IDCategory'];
include 'connect.php';
$query = "DELETE FROM category WHERE category_id = $IDCategoryReceive ";
mysqli_query($conn, $query);
header("Location: admin.php");
?>