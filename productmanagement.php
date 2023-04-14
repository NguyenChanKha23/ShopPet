
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Home</title>
</head>
<style> 
.table-bordered{margin-top: 100px;}
img {width: 150px}

</style>



<body>
   
     <?php include("hearadmin.php") ?>


<div>
    <?php
    $IDCategoryRecieve = $_GET['IDCategory'];
    $sqlPage = "select count(product_id) as 'slsp' from product where category_id = $IDCategoryRecieve";
    $resultPage = mysqli_query($conn, $sqlPage);
    $rowPage = mysqli_fetch_array($resultPage);
    $pages = ceil($rowPage['slsp'] / 4);
    $current_page = 1;
    if (isset($_GET['Page'])) {
        $current_page = $_GET['Page'];
    }
    $index = ($current_page - 1) * 4;
    $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY product_id) AS  Stt  FROM product WHERE `category_id` = $IDCategoryRecieve LIMIT $index, 4";
    $kq = mysqli_query($conn, $query);
    ?>
    <table class="table table-bordered">
        <thead>
            <th>No. </th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
     
        </thead>
        <?php
        while ($row = mysqli_fetch_array($kq)) {
            echo '<tr>';
            echo '  <td>' . $row["Stt"] . '</td>';
            echo '  <td>' . $row["product_name"] . '</td>';
            echo '  <td>' . $row["product_price"] . '</td>';
            echo '  <td>' . $row["state"] . '</td>';
            echo '  <td>' . $row["product_price"]*$row["state"] . '</td>';
            echo '<td><a href="/doantichhop/ShopPet/product-create.php?IDCategory='.$row["category_id"].'"> Add Product</a></td>';
            echo '<td><a href="/doantichhop/ShopPet/deleteProduct.php?IDCategory='.$row['category_id'].'&IDProduct='.$row['product_id'].'">Delete</a></td>';
            // echo '<td><a href="/doantichhop/ShopPet/updateProduct.php?IDCategory='.$row['category_id'].'&IDProduct='.$row['product_id'].'">Change</a></td>';
            
            echo '</tr>';
        }
        ?>
    </table>
</div>

<nav aria-label="Page navigation example">
            <ul class="pagination">
               
                <?php

                for ($i=1; $i <= $pages; $i++) { 
                    echo '<li><a href="?IDCategory='.$IDCategoryRecieve.'&Page='.$i.'">'.$i.'</a></li>';
                }
                ?>
               
            </ul>
            </nav>
</div>
</body>
</html>


    <?php include('./footer.php') ?>