<?php
$IDCategoryReceive = $_GET['IDCategory'];
$IDProductReceive = $_GET['IDProduct'];
include 'connect.php';
$query = "DELETE FROM product WHERE id = $IDProductReceive";
mysqli_query($conn, $query);
header("Location: productmanagement.php?IDCategory=$IDCategoryReceive");
?>