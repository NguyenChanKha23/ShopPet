
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


        <div >
            <?php
            $query = "SELECT *, ROW_NUMBER() OVER (ORDER BY ID_User) AS  Stt FROM account ac, vaitro vt WHERE ac.id_role = vt.id ORDER BY ID_User";
            $kq = mysqli_query($conn, $query);
            ?>
            <table class="table table-bordered">
                <thead>
                    <th>No. </th>
                    <th>UserName</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Change</th>
                    <th>Delete</th>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($kq)) {
                    
                    echo '<td>' . $row["Stt"] . '</td>';
                    echo '<td>' . $row["username"] . '</td>';
                    echo '<td>' . $row["fullname"] . '</td>';
                    echo '<td>' . $row["password"] . '</td>';
                    echo '<td>' . $row["role"] . '</td>';
                    echo '<td><a href="/doantichhop/ShopPet/updateAccount.php?ID_User='.$row["ID_User"].'">Change</a></td>';
                    echo '<td><a href="/doantichhop/ShopPet/deleteAccount.php?ID_User='.$row["ID_User"].'">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>