<?php
require_once('database/dbhelper.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Product Management</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScrseipt -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
<!--        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Statistical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../category/">Directory Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../product/">Product Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">Manage shopping cart</a>
            </li>

        </ul>-->
 <ul class="nav nav-tabs">
                   <li class="nav-item">
                       <a class="nav-link" href="admin/index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="admin/product/">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer/customer.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="admin/category/index.php">Directory Management</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="admin/dashboard.php">Manage shopping cart</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                   <li class="nav-item">
                       <a class="nav-link" href="login/login.php">Login</a>
                    </li>
                </ul>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Contact</h2>
                </div>
                <div class="panel-body"></div>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr style="font-weight: 500;">
                            <td width="70px">ID</td>
                            <td>Full name</td>
                            <td>Send to email</td>
                            <td>Email</td>
                            <td>Contact</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lấy danh sách Sản Phẩm
                     
                            $sql = "SELECT * FROM contact ";
                            executeResult($sql);
                            // $sql = 'select * from product limit $star,$limit';
                            $contactList = executeResult($sql);

                            $index = 1;
                            foreach ($contactList as $item) {
                                echo '  <tr>
                    <td>' . ($index++) . '</td>
                    <td >' . $item['id'] . '</td>
                    <td>' . $item['fullname'] . '</td>
                    <td>' . $item['sendto']. ' </td>
                    <td>' . $item['email'] . '</td>
                    <td>' . $item['contact'] . '</td>
                   
                    
                </tr>';
                            }
                      
                        ?>
                    </tbody>
                </table>
            </div>

            <ul class="pagination">
                <?php
                $sql = "SELECT * FROM `product`";
                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                    $numrow = mysqli_num_rows($result);
                    $current_page = ceil($numrow / 5);
                    // echo $current_page;
                }
                for ($i = 1; $i <= $current_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                    ';
                    }
                }
                ?>
            </ul>
        </div>

    </div>
   
</body>

</html>