<?php include_once('./connect.php'); ?>
<?php include('./header.php')?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<form method="post" action="dangky.php" class="form">

<h2>Đăng ký thành viên</h2>

Username: <input type="text" name="username" value="" required>

Password: <input type="text" name="password" value="" required/>

Email: <input type="email" name="email" value="" required/>

Họ và Tên: <input type="text" name="fullname" value="" required/>

<!-- <select name="id_role">
    <?php
        $kq = mysqli_query($conn, "SELECT * FROM account nd, vaitro vt WHERE nd.id_role = vt.id");
        while ($rowCheck = mysqli_fetch_array($kq)) {
            if ($rowCheck['id_role'] == $role) {
                echo '<option value="'.$rowCheck['id_role'].'" selected>'.$rowCheck['role'].'</option>';
            }else {
                echo '<option value="'.$rowCheck['id_role'].'">'.$rowCheck['role'].'</option>';
            }
        }
    ?>
</select> -->

<input type="submit" name="dangky" value="Đăng Ký"/>
<?php require 'xuly.php';?>
<div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
</form>

</body>
</html>