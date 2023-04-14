<?php
$IDUserReceive = $_GET['ID_User'];
include 'connect.php';
$query = "DELETE FROM account WHERE ID_User = $IDUserReceive";
mysqli_query($conn, $query);
header("Location: acountmanager.php?ID_User=$IDUserReceive");
?>