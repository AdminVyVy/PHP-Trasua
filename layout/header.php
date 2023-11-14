<?php
//require_once '../admin/database/config.php';
//require_once '../database/dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/details.css">
        <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <title>Milk Tea</title>
    </head>

    <body>
        <div id="wrapper">
            <header>
                <div class="container">
                    <section class="logo">
                        <a href="index.php"><img src="images/logo-grabfood.svg" alt=""></a>
                    </section>
                    <nav>
                        <ul>
                            <li><a href="index.php">Home Page</a></li>
                            <li class="nav-cha">
                                <a href="thucdon.php?page=thucdon">Menu</a>
                                <ul class="nav-con">
                                    <li><a href="thucdon.php?id_category=1">Milk Tea</a></li>
                                    <li><a href="thucdon.php?id_category=2">Olong Tea</a></li>
                                    <li><a href="thucdon.php?id_category=3">Iced</a></li>
                                    <li><a href="thucdon.php?id_category=4">Black Tea</a></li>
                                </ul>
                            </li>
                            <li><a href="about.php">About us</a></li>
                            <li><a href="sendMail.php?action=add">Contact</a></li>
                        </ul>
                    </nav>
                    <section class="menu-right">
                        <div class="cart">
                            <a href="cart.php"><img src="images/icon/cart.svg" alt=""></a>
                            <?php
                            $cart = [];
                            if (isset($_COOKIE['cart'])) {
                                $json = $_COOKIE['cart'];
                                $cart = json_decode($json, true);
                            }
                            $count = 0;
                            foreach ($cart as $item) {
                                $count += $item['num']; // đếm tổng số item
                            }
                            ?>
                            <span><?= $count ?></span>
                            <!-- <div class="history">
                                <a href="history.php"><i class="fas fa-history" style="font-size: 14px;"></i>Lịch sử</a>
                            </div> -->
                        </div>
                        <div class="login">
                            <?php
                            if (isset($_COOKIE['username'])) {
                                $username = $_COOKIE['username'];
                                if ($username == 'AdminThanh' || $username == 'admin') {
                                    echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                                <div class="logout">
                                    <a href="admin/"><i class="fas fa-user-edit"></i>Admin</a> <br>
                                    <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </div>';
                                } else {
                                    echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                            <div class="logout">
                                <a href="login/changePass.php"><i class="fas fa-exchange-alt"></i>Change Password</a> <br>
                                <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </div>
                            ';
                                }
                            } else {
                                echo '<a href="login/login.php"">Login</a>';
                            }
                            ?>
                        </div>
                    </section>
                </div>
            </header>