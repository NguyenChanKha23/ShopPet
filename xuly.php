<?php include_once('./connect.php'); ?>

<?php


// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$id_role = trim($_POST['id_role']);


if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($password)) {
array_push($errors, "Password is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM account WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="dangky.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO account (username, password, email, fullname,id_role) VALUES ('$username','$password','$email','$fullname', '$id_role')";
echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="dangky.php";</script>';
header('Location: login.php');

if (mysqli_query($conn, $sql)){
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Họ và Tên: ".$_POST['fullname']."<br/>";
echo "Vai trò: ".$_POST['id_role']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangky.php";</script>';
}
}
}
?>