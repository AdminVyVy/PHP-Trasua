<?php
require_once('../database/config.php');
require_once('../database/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="plugin/fontawesome/css/all.css">

        <link rel="stylesheet" href="header.css">

        <title>Login</title>
    </head>

    <body>
        <div id="wrapper" style="padding-bottom: 4rem;">
            <header>
                <div class="container">
                    <section class="logo">
                        <a href="../index.php"><img src="../images/logo-grabfood.svg" alt=""></a>
                    </section>
                    <nav>
                        <ul>
                            <li><a href="../index.php">Home Page</a></li>
                            <li class="nav-cha">
                                <a href="../thucdon.php?page=thucdon">Menu</a>
                                <ul class="nav-con">
                                    <?php
                                    $sql = "SELECT * FROM category";
                                    $result = executeResult($sql);
                                    foreach ($result as $item) {
                                        echo '<li><a href="../thucdon.php?id_category=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                    }
                                    ?>
                                    <li><a href="thucdon.php?page=trasua">Milk Tea</a></li>
                                    <li><a href="thucdon.php?page=hongtra">Olong tea</a></li>
                                    <li><a href="thucdon.php?page=daxay">Iced</a></li>
                                    <li><a href="thucdon.php?page=traden">Black tea</a></li> 
                                </ul>
                            </li>
                            <li><a href="../about.php">About us</a></li>
                            <li><a href="../sendMail.php">Contact</a></li>
                        </ul>
                    </nav>
                    <section class="menu-right">
                        <div class="cart">
                            <a href="../cart.php"><img src="../images/icon/cart.svg" alt=""></a>
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
                        </div>
                        <div class="login">
                            <?php
                            if (isset($_COOKIE['username'])) {
                                echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                            <div class="logout">
                                <a href="changePass.php"><i class="fas fa-exchange-alt"></i>Change Password</a> <br>
                                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </div>
                            ';
                            } else {
                                echo '<a href="login.php"">Login</a>';
                            }
                            ?>


                        </div>
                    </section>
                </div>
            </header>
            <div class="container">
                <form action="login.php" method="POST">
                    <h1 style="text-align: center;">System Login</h1>
                    <div class="form-group">
                        <label for="">Account:</label>
                        <input type="text" name="username" class="form-control" placeholder="Tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    </div>
                    <a href="forget.php">Forgot password</a>
                    <div style="padding-top: 5px;" class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        <p style="padding-top: 1rem;">Don't have an account yet? <a href="reg.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?php
        require_once('../database/config.php');
        require_once('../database/dbhelper.php');
        if (isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["password"] != '') {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // $password = md5($password);
            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            execute($sql);
            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $user = mysqli_query($con, $sql);
            if (mysqli_num_rows($user) > 0) {
                while ($row = mysqli_fetch_assoc($user)) {
                    if ($row['role'] == 1) {
                        header('location:../admin/index.php');
                    } else if ($row['role'] == 2) {
                        $cookie_name = "username";
                        $cookie_value = $row['username'];
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                        header('location:../index.php');
                    }
                }
            }
        }
        ?>


    </body>

</html>