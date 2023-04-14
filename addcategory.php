<?php
include 'connect.php';
if (!empty($_POST)) {
    $CategoryName = $_POST['categoryname'];
    $query = "INSERT INTO category(`categoryname`) VALUES ('$CategoryName')";
    mysqli_query($conn, $query);
    header("Location: admin.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/banhang/login-register.css">
    <title></title>
</head>

<body>
    <div class="form-login">
        <h3>Thêm danh mục</h3>
        <form class="form-login__container" action="" method="post">
            <input type="text" name="categoryname" placeholder="Tên danh mục" required>
            <input type="submit" value="Thêm">
        </form>
    </div>
</body>

</html>