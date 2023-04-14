<?php
$IDCategoryReceive = $_GET['IDCategory'];
include 'connect.php';
if (!empty($_POST)) {
    $folder = 'uploads/';
    $ProductName = $_POST['productname'];
    $Brand = $_POST['brand'];
    $State = $_POST['state'];
    $Price = $_POST['price'];
    $Cpu = $_POST['cpu'];
    $Vga = $_POST['vga'];
    $Ram = $_POST['ram'];
    $Harddisk = $_POST['harddisk'];
    $Display = $_POST['display'];
    $Guarantee = $_POST['guarantee'];
    $Describe  = $_POST["description"];
    $Image = $_FILES['avatar']['name'];
    $Image_temp = $_FILES['avatar']['name_temp'];
    
    $query = "INSERT INTO `products` (`id_category`, `productname`, `brand`, `state`, `price`, `cpu`, `vga`, `ram`, `harddisk`, `display`, `guarantee`, `description`, `avatar`) 
            VALUES ('$IDCategoryReceive', '$ProductName', '$Brand', '$State', '$Price' , '$Cpu', '$Vga', '$Ram', '$Harddisk', '$Display', '$Guarantee', '$Describe', '" . $folder . $Image . "' )";
    $result = mysqli_query($conn, $query);
    move_uploaded_file($Image_temp, $folder . $Image);
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
    <title>Document</title>
</head>

<body>
    <div class="form-login">
        <h3>Thêm sản phẩm</h3>
        <form class="form-login__container" action="" method="post" enctype="multipart/form-data">
            <input type="text" name="productname" placeholder="Tên hàng hóa" required>
            <input type="text" name="brand" placeholder="Hãng" required>
            <input type="text" name="state" placeholder="Số lượng" required>
            <input type="text" name="price" placeholder="Giá" required>
            <input type="text" name="cpu" placeholder="Cpu" required>
            <input type="text" name="vga" placeholder="Vga" required>
            <input type="text" name="ram" placeholder="Ram" required>
            <input type="text" name="harddisk" placeholder="Ổ cứng" required>
            <input type="text" name="display" placeholder="Màng hình" required>
            <input type="text" name="guarantee" placeholder="Thời gian bảo hành" required>
            <input type="text" name="description" placeholder="Mô Tả">
            <input type="file" name="avatar" placeholder="Hình Ảnh">
            <input type="submit" value="Thêm">
        </form>
    </div>
</body>

</html>