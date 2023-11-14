
<?php
require_once('../../database/dbhelper.php');
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
                        <a class="nav-link" href="../index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../product/">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../customer/customer.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../category/index.php">Directory Management</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard.php">Manage shopping cart</a>
                    </li>
                   <li class="nav-item">
                       <a class="nav-link" href="../../contact.php">Contact</a>
                    </li>
        
                </ul>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Product Management</h2>
                </div>
                <div class="panel-body"></div>
                <a href="add.php?action=add" class=" btn btn-success" style="margin-bottom:20px">Add Products
                </a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr style="font-weight: 500;">
                            <td width="70px">Numerical order</td>
                            <td>Thumbnail</td>
                            <td>Product's name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Content</td>
                            <td>ID</td>
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
                            $sql = "SELECT * FROM product limit $start,$limit";
                            executeResult($sql);
                            // $sql = 'select * from product limit $star,$limit';
                            $productList = executeResult($sql);

                            $index = 1;
                            foreach ($productList as $item) {
                                echo '  <tr>
                    <td>' . ($index++) . '</td>
                    <td style="text-align:center">
                        <img src="' . $item['thumbnail'] . '" alt="" style="width: 50px">
                    </td>
                    <td>' . $item['title'] . '</td>
                    <td>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</td>
                    <td>' . $item['number'] . '</td>
                    <td>' . $item['content'] . '</td>
                    <td>' . $item['id_category'] . '</td>
                    <td>
                        <a href="add.php?action=edit&id=' . $item['id'] . '">
                            <button class=" btn btn-warning">Edit</button> 
                        </a> 
                    </td>
                    <td>            
                    <button class="btn btn-danger" onclick="deleteProduct(' . $item['id'] . ')">Delete</button>
                    </td>
                </tr>';
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
    <script type="text/javascript">
        function deleteProduct(id) {
            var option = confirm('Are you sure you want to delete this product?')
            if (!option) {
                return;
            }

            console.log(id)
            //ajax - lenh post
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function (data) {
                location.reload()
            })
        }
    </script>
</body>

</html>
