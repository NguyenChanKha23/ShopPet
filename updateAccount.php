<?php
include 'connect.php';
$iduser = $_GET['ID_User'];

$sqlSelect = "SELECT * FROM account WHERE ID_User = $iduser";
$resultSelect = mysqli_query($conn, $sqlSelect);
$rowUser = mysqli_fetch_array($resultSelect);
$UserName_old = $rowUser["username"];
$Password_old = $rowUser["password"];
$Email_old = $rowUser["email"];
$Name_old = $rowUser["fullname"];
$Role_old = $rowUser["id_role"];
if (!empty($_POST)) {
    $UserName_new = $_POST["username"];
    $Password_new = $_POST["password"];
    $Email_new = $_POST["email"];
    $Name_new = $_POST["fullname"];
    $Role_new = $_POST["id_role"];
    $query = "UPDATE `account` 
            SET `username` = '$UserName_new', 
                `fullname` = '$Name_new', 
                `password` = '$Password_new', 
                `id_role` = '$Role_new' 
            WHERE `ID_User` = $iduser";
    mysqli_query($conn, $query);
    header("Location: acountmanager.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/code/login-register.css">
    <title>Document</title>
</head>

<body>
    <div class="form-login">
        <h3>Sửa thông tin người dùng</h3>
        <form class="form-login__container" action="" method="post">
            <input type="text" name="username" placeholder="Tên Người dùng mới" value="<?=$UserName_old?>" required>
            <input type="text" name="password" placeholder="Mật Khẩu mới" value="<?=$Password_old?>" required>
            <input type="text" name="email" placeholder="Email mới" value="<?=$Email_old?>" required>

            <input type="text" name="fullname" placeholder="Tên mới" value="<?=$Name_old?>" required>
            <select name="id_role">
            <?php
                $kq = mysqli_query($conn, "SELECT * FROM account AC, vaitro vt WHERE ac.id_role = vt.id");
                while ($rowCheck = mysqli_fetch_array($kq)) {
                    if ($rowCheck['id_role'] == $Role_old) {
                        echo '<option value="'.$rowCheck['id_role'].'" selected>'.$rowCheck['role'].'</option>';
                    }else {
                        echo '<option value="'.$rowCheck['id_role'].'">'.$rowCheck['role'].'</option>';
                    }
                }
            ?>
            </select>
            <input type="submit" value="Cập nhật">
        </form>
    </div>
</body>

</html>