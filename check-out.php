<?php include('./header.php')?>


<?php 
    if(isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $country = $_POST['country'];
        $province = $_POST['province'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_SESSION['username'];
        $total = $_GET['total'];
        $sql_checkout = "insert into checkout (username, checkout_fullname, checkout_country, checkout_province, checkout_address, checkout_email, checkout_phone, checkout_total) value ('". $username ."','" .$fullname. "','". $country ."','". $province ."','".$address."','".$email."',".$phone.",".$total.")";
        $query_checkout = mysqli_query($conn, $sql_checkout);
        $sql_get_checkout_id = "SELECT MAX(checkout_id) AS checkout_id_this FROM checkout";
        $query_get_checkout_id = mysqli_query($conn, $sql_get_checkout_id);
        while($row_get_checkout_id = mysqli_fetch_assoc($query_get_checkout_id)) {
                $checkout_id =  $row_get_checkout_id['checkout_id_this'];
        }
        echo "<script>console.log('Debug Objects: " . $checkout_id . "' );</script>";
        if ($query_checkout) {
            echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Check out successfully!!');
                        </script>");
            foreach($_SESSION['cart'] as $key=>$value) {
            $item[]=$key;
            echo 'key'.$key;
            }
            $str=implode(",",$item);
            $sql="SELECT * from product WHERE product_id in (".$str.")";
            $ketqua=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($ketqua)) {
                $sql_order_item = "insert into order_item(checkout_id, product_name, quantity) value (". $checkout_id .",'". $row['product_name'] ."',". $_SESSION['cart'][$row['product_id']] .")";
                $query_order_item = mysqli_query($conn,$sql_order_item);
                
                
            }
            $_SESSION['cart'] = null;
        }
    }
?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
     <?php

    ?>
    <table class="table header-border table-hover verticle-middle" id="product_table">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">#</th>
                <th style="width: 25%" scope="col">Infomation</th>
                <th style="width: 35%" scope="col-5">Product</th>
                <th style="width: 15%" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql_bill = "Select * from checkout where username = '".$_SESSION['username']."'";
                $result_bill = mysqli_query($conn, $sql_bill);
                if (mysqli_num_rows($result_bill) >0) {
                    while($row_bill = mysqli_fetch_assoc($result_bill)) {
            ?>  
            <tr>
                <th><?php echo $row_bill['checkout_id']?></th>
                <td data-toggle="popover-hover" data-img="">
                    <p><?php echo $row_bill['checkout_fullname']?></p>
                    <p><?php echo $row_bill['checkout_phone']?></p>
                    <p><?php echo $row_bill['checkout_email']?></p>
                    <p><?php echo $row_bill['checkout_address']?></p>
                    <p><?php echo $row_bill['checkout_province']?></p>
                    <p><?php echo $row_bill['checkout_country']?></p>
                </td>
                <td>
                    <?php 
                        $sql_item = "select * from order_item where checkout_id = ". $row_bill['checkout_id'];
                        $result_item = mysqli_query($conn,$sql_item);
                        if (mysqli_num_rows($result_item) > 0) {
                            while($row_item = mysqli_fetch_assoc($result_item)) {
                    ?>
                    <p><?php echo $row_item['product_name'] ?> X <?php echo $row_item['quantity'] ?></p>
                    <?php 
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php echo $row_bill['checkout_status'] ?>
                </td>
                
            </tr>
            <?php 
                    }
                }
             ?>
            
        </tbody>
    </table>



    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="your-bill.php" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Biiling Details</h4>
                        <form action="your-bill.php" method="get">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="fir">Full Name<span>*</span></label>
                                    <input type="text" name="fullname" id="fullname" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Country<span>*</span></label>
                                    <input type="text" name="country" id="cun" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Town / City<span>*</span></label>
                                    <input type="text" name="province" id="town" required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Street Address<span>*</span></label>
                                    <input type="text" name="address" id="street" class="street-first" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email Address<span>*</span></label>
                                    <input type="text" name="email" id="email" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" name="phone" id="phone" required>
                                </div>
                            </div>
                    </div>

                    

                    <div class="col-lg-6">
                    <?php 
                    echo($username);
                        if(isset($_GET['total'])) {

                        
                    ?>
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php
                                        foreach($_SESSION['cart'] as $key=>$value) {
                                            $item[]=$key;
                                        }
                                        $str=implode(",",$item);
                                        $sql="SELECT * from product WHERE product_id in (".$str.")";
                                        $ketqua=mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($ketqua)) {
                                    ?>
                                    <li class="fw-normal"><?php echo $row['product_name']?>&ensp;<i class="fa fa-times"></i>&ensp;<?php echo $_SESSION['cart'][$row['product_id']]?> 
                                        <span><?php echo $_SESSION['cart'][$row['product_id']]*$row['product_price'];?>đ</span>
                                    </li>
                                    
                                    <li class="fw-normal">Subtotal <span><?php echo $_GET['total']?>đ</span></li>
                                    <input type="hidden" name="total" value="<?php echo $_GET['total']?>">
                                    <li class="total-price">Total <span><?php echo $_GET['total']?>đ</span></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" name="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                    else {
                        echo "Mua gì đó đi";
                    } 
                    ?>

                    </div>

                       
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
<?php include('./footer.php')?>