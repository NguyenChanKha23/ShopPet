
    <!-- Hero Section Begin -->
  
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
</style>
<body>

        <?php include('./hearadmin.php') ?>

         <div>
            <?php
            $query = "select *, ROW_NUMBER() OVER (ORDER BY category_id) AS  Stt from category";
            $kq = mysqli_query($conn, $query);
           
            ?>
            <table class="table table-bordered">
                <thead>
                    <th>No. </th>
                    <th>Category's Name</th>
                
                </thead>
                <?php
                while ($row = mysqli_fetch_array($kq)) {
                    echo '<tr>';
                    echo '<td>'.$row['Stt'].'</td>';
                    echo '<td><a href="/doantichhop/ShopPet/productmanagement.php?IDCategory=' . $row["category_id"] . '">' . $row["category_name"] . '</a></td>';
                    echo '<td><a href="/doantichhop/ShopPet/deleteCategory.php?IDCategory='.$row["category_id"].'">Delete</a></td>';
                    echo '<td><a href="/doantichhop/ShopPet/updateCategory.php?IDCategory='.$row["category_id"].'">Change</a></td>';
                    
                    echo '<td><a href="/doantichhop/ShopPet/product-list.php?IDCategory='.$row["category_id"].'">Product List</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
            
        </div>
    </div>

                    
                 
       
                  


                  
              


     
</body>

</html>
    <!-- Partner Logo Section End -->
<?php include('./footer.php') ?>