
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
</style>
<body>
  
         <?php include("hearadmin.php") ?>

        <div>
            <?php
        
            $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY dh.IDDonHang) AS Stt FROM donhang dh, users u WHERE u.ID_User = dh.ID_User AND dh.ID_User = dh.ID_User ";
            $kq = mysqli_query($conn, $query);
            ?>
            <table class="table table-bordered">
                <thead>
                    <th>STT</th>
                    <th>Đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Xem chi tiết</th>
                    <th>Cập nhật đang vận chuyển</th>
                    <th>Cập nhật giao dịch</th>

                </thead>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($kq)) {
                    
                    echo '<tr>';
                    echo '<td>'.$row['Stt'].'</td>';
                    echo '<td>Đơn hàng thứ '.$i.'</td>';
                    echo '<td>'.$row['Name'].'</td>';
                    echo '<td>'.$row['PhoneNumber'].'</td>';
                    echo '<td>'.$row['ngaydat'].'</td>';
                    echo '<td>'.$row['trangthai'].'</td>';
                    echo '<td>'.number_format($row['tong'], 0, '.', '.').'VND</td>';
                    echo '<td><a href="../code/chitietadmin.php?iddonhang='.$row['IDDonHang'].'">xem</a></td>';
                    echo '<td><a href="/code/updateStatus.php?IDOrder='.$row["IDDonHang"].'&Status=1">Update</a></td>';
                    echo '<td><a href="/code/updateStatus.php?IDOrder='.$row["IDDonHang"].'&Status=2">Update</a></td>';
                    echo '</tr>';
                    $i = $i + 1;
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>