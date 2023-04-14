<?php include_once('./connect.php'); ?>
<?php 
    if(isset($_POST['submit']) && $_POST['username'] != null && $_POST['password'] != null && $_POST['email'] != null && $_POST['fullname'] != null && $_POST['id_role'] != null) {
		$username = $_POST['username'];
		$password = $_POST['password'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $role = $_POST['id_role'];
	// code...
		$sql = "SELECT * FROM `account` where `username` = '$username' and `email` = '$email' ";
		echo "<br>";
		$result = mysqli_query($conn, $sql);

		// echo "sql: ".$sql;

        if (mysqli_num_rows($result) > 0) {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Username hoặc email đã tồn tại")';  
            echo '</script>'; 
		} else {
			$sqlInsert = "INSERT INTO `account` (username,password,email,fullname,id_role) VALUE ('" .$username. "', '" .$password. "', '" .$email. "', '" .$fullname. "', '" .$role. "')";
			$resultInsert = mysqli_query($conn, $sqlInsert);

            // sau khi đăng kí thành công, trở về rtang login để login
            header('Location: login.php');
		}
	} else {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Không được để trống!!!")'; 
        echo '</script>'; 
 
    }
  
?>
<!DOCTYPE html>
<html lang="zxx">



<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="register.php" method="post">

                            <div class="group-input">
                                <label for="username">Username</label>
                                <input type="username" name="username" placeholder="username" value="<?php if (isset($username)) echo $username ?>">
                            </div>

                            <div class="group-input">
                                <label for="pass">Password</label>
                                <input type="password" name="password" placeholder="password" value="<?php if (isset($password)) echo $password ?>">
                            </div>

                            <div class="group-input">
                                <label for="email">Email address</label>
                                <input type="email" name="email" placeholder="email" value="<?php if (isset($email)) echo $email ?>">
                            </div>

                            <div class="group-input">
                                <label for="name">Full name</label>
                                <input type="fullname" name="fullname" placeholder="fullname" value="<?php if (isset($fullname)) echo $fullname ?>">
                            </div>
                            
                            <select name="id_role">
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
                            </select>
                            
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    <script> 
        var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>