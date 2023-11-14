<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Customer</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScrseipt -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
        <link rel="stylesheet" href="css/cart.css">
    </head>

    <body>
         <div id="wrapper">
           
            <!-- END HEADR -->
            <main style="padding-bottom: 4rem;">
                <section class="cart">
                    <div class="container-top">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding: 1rem 0;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/product/">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../customer/customer.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/category/index.php">Directory Management</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/dashboard.php">Manage shopping cart</a>
                    </li>
        
                </ul>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Customer</h2>
                </div>
                <div class="panel-body"></div>
                <a href="addCus.php?action=add">
                    <button class=" btn btn-success" style="margin-bottom:20px">Add Customers</button>
                </a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr style="font-weight: 500;">
                            <td width="70px">ID</td>
                            <td>Full name</td>
                            <td>Username</td>
                            <td>Password</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td width="50px"></td>
                            <td width="50px"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lấy danh sách Sản Phẩm
                        if (!isset($_GET['page'])) {
                            $pg = 1;
                            echo 'You are on page: 1';
                        } else {
                            $pg = $_GET['page'];
                            echo 'You are on page: ' . $pg;
                        }

                        try {

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $limit = 5;
                            $start = ($page - 1) * $limit;
                            require_once '../database/config.php';
                            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                            $sql = "SELECT * FROM user where role = 2 limit $start,$limit";
                            $result = mysqli_query($conn, $sql);
                            // $sql = 'select * from product limit $star,$limit';

                            $index = 1;
                               
                        foreach ($result as $item) {
                            echo '  <tr>
                   
                           
                    <td>' . $item['id_user'] . '</td>
                    <td>' . $item['hoten'] . '</td>
                    <td>' . $item['username'] . '</td>
                    <td>' . $item['password'] . '</td>
                    <td>' . $item['phone'] . '</td>
                    <td>' . $item['email'] . '</td>
                    <td>' . $item['role'] . '</td>
                      

                     
                        
                    
                    <td>

                       <a href="addCus.php?action=edit&id=' . $item['id_user'] . '">
                            
                            <button class=" btn btn-warning">Edit</button> 
                        </a> 
                    </td>
                    <td>            
                    <button class="btn btn-danger" onclick="deleteUser(' . $item['id_user'] . ')">Delete</button>
                    </td>
                </tr>';
                             $_SESSION['id'] = $item['id_user'];
                            }
                        } catch (Exception $e) {
                            die("Error executing sql: " . $e->getMessage());
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <ul class="pagination">
                <?php
                $sql = "SELECT * FROM `user`";
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
    <script type="text/javascript">
        function deleteUser(id) {
            var option = confirm('Are you sure you want to delete this customer?')
            if (!option) {
                return;
            }

            console.log(id)
            //ajax - lenh post
            $.post('ajaxa.php', {
                'id_user': id,
                'action': 'delete'
            }, function (data) {
                location.reload()
            })
        }
    </script>
</body>

</html>
