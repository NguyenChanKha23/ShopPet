<?php
$IDCategoryReceive = $_GET['IDCategory'];
include 'connect.php';
$sqlSelect = "select * from category where category_id = $IDCategoryReceive";
$resultSelect = mysqli_query($conn, $sqlSelect);
$row = mysqli_fetch_array($resultSelect);
$CategoryName_old = $row["category_name"];
if (!empty($_POST)) {
    $CategoryName_new = $_POST['category_name'];
    $query = "UPDATE category SET category_name = '$CategoryName_new' WHERE category_id = $IDCategoryReceive";
    mysqli_query($conn, $query);
    header("Location: doantichhop/ShopPet/admin.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GK/login-register.css">
    <title>Document</title>
</head>

<body>
    <div class="form-login">
        <h3>Sửa thông tin danh mục</h3>
        <form class="form-login__container" action="" method="post">
            <input type="text" name="category_name" placeholder="Tên danh mục" value="<?= $CategoryName_old ?>" required>
            <input type="submit" value="Cập nhật">
        </form>
    </div>
</body>

</html>