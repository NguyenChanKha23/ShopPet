<?php include 'connect.php' ?>
<?php include 'login-layout.php'?>
<?php session_start(); ?>

 <?php
  // nếu đã đăng nhập rồi thì trở về trang chủ 
  if (isset($_SESSION['username'])) {
    header('Location: index.php');
  }
  ?>

 <?php
  if (isset($_POST['submit']) && $_POST['username'] != null && $_POST['password'] != null) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // code...
    $sql = "SELECT * FROM account where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
      echo '<script type ="text/JavaScript">';
      echo 'alert("Tài khoản hoặc mật khẩu không đúng!! Mời đăng nhập lại!!!")';
      echo '</script>';
    } else {
      $row1 = mysqli_fetch_array($result);

      $_SESSION['ID_User'] = $row1['ID_User'];
      $_SESSION['username'] = $username;
      $_SESSION['fullname'] = $name;
      $_SESSION['role'] = $row1['id_role'];
      echo "<h2>Đăng nhập thành công</h2>";



      if ($_SESSION['role'] == 1) {
        header("Location: admin.php");
      } else {
        header("Location: index.php");
      }
    }
  }
  ?>

<?php mysqli_close($conn);?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
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
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="./login.php" method="POST">
                            <div class="group-input">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?php if(isset($username)) echo $username ?>">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password </label>
                                <input type="password" name="password" placeholder="password" id="pass" value="<?php if (isset($password)) echo $password ?>">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" name= "submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./dangky.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->


    <!-- Footer Section End -->

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