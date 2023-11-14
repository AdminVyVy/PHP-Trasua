<?php require_once('database/dbhelper.php'); 
require_once('database/config.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Add Products</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- summernote -->
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="wrapper">
            <header>
<!--                <ul class="nav nav-tabs">
                    <li class="nav-item ">
                        <a class="nav-link active" href="../admin/index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/category/index.php">Manage categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/product">Product Management</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../admin/dashboard.php">Manage shopping cart</a>
                    </li>
                </ul>-->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="../admin/index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/product/">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../customer/customer.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../admin/category/index.php">Directory Management</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/dashboard.php">Manage shopping cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">Login</a>
                    </li>
                </ul>
            </header>
        </div>
            <div class="container">
                <main>
                    <h1>Statistical tables</h1>
                    
                    <section class="dashboard">
                        <div class="table">
                            <div class="sp">
                                <p>Products</p>
                                <?php
                                $sql = "SELECT * FROM `product`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                                <p><a href="../admin/product/index.php">See details➜</a></p>
                            </div>
                            <div class="sp kh">
                                <p>Customer</p>
                                <?php
                                $sql = "SELECT * FROM `user`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                                <p><a href="../customer/customer.php">See details➜</a></p>
                            </div>
                            <div class="sp dm">
                                <p>Category</p>
                                <?php
                                $sql = "SELECT * FROM `category`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                                <p><a href="../admin/category/index.php">See details➜</a></p>
                            </div>
                            <div class="sp dh">
                                <p>Order</p>
                                <?php
                                $sql = "SELECT * FROM `order_details`";
                                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                                $result = mysqli_query($conn, $sql);
                                echo '<span>' . mysqli_num_rows($result) . '</span>';
                                ?>
                                <p><a href="../admin/dashboard.php">See details➜</a></p>
                            </div>
                        </div>
                    </section>
                    <section class="new-order">
                        <h4>New orders</h4>
                        <table>
                            <tr class="bold">
                                <td>Numerical order</td>
                                <td>Name</td>
                                <td>Product Name/Quantity</td>
                                <td>Product price</td>
                                <td>Address</td>
                                <td>Phone number</td>
                            </tr>
                            <?php
                            try {

                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $limit = 10;
                                $start = ($page - 1) * $limit;

                                $sql = "SELECT * from orders, order_details, product
                                where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $start,$limit ";
                                $order_details_List = executeResult($sql);
                                $total = 0;
                                $count = 0;
                                // if (is_array($order_details_List) || is_object($order_details_List)){
                                foreach ($order_details_List as $item) {
                                    echo '
                                        <tr style="text-align: center;">
                                            <td>' . (++$count) . '</td>
                                            <td>' . $item['fullname'] . '</td>
                                            <td>' . $item['title'] . '<br>(<strong>' . $item['num'] . '</strong>)</td>
                                            <td class="b-500 red">' . number_format($item['num'] * $item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                                            <td>' . $item['address'] . '</td>
                                            <td class="b-500">' . $item['phone_number'] . '</td>
                                        </tr>
                                    ';
                                }
                            } catch (Exception $e) {
                                die("Error executing sql: " . $e->getMessage());
                            }
                            ?>
                        </table>
                    </section>
                </main>
            </div>
        </div>
        <?php require "../layout/footer.php"; ?>
    </body>
    <style>
        #wrapper{
            padding-bottom: 5rem;
        }
        .b-500 {
            font-weight: 500;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>

</html>
