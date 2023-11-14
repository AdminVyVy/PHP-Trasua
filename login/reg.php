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
        <title>Sign up for an account</title>
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
                <form action="reg.php" method="POST">
                    <h1 style="text-align: center;">System registration</h1>
                    <div class="form-group">
                        <label for="">Full name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Fullname" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Account:</label>
                        <input type="text" name="username" class="form-control" placeholder="Account" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Re-enter password:</label>
                        <input type="password" name="repassword" class="form-control" placeholder="Re-enter password:" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Phone number:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone number" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <p style="padding-top: 1rem;">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>

        <?php
        require_once('../database/config.php');
        require_once('../database/dbhelper.php');
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['submit']) && $_POST['name'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['phone'] != "" && $_POST['email'] != "") {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $repass = $_POST['repassword'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                //kiểm tra trùng paswword không
                if ($pass != $repass) {
                    echo '<script language="javascript">
                    alert("Invalid password, please re-register!");
                    window.location = "reg.php";
              </script>';
                    die();
                }
                //kiểm tra username
                $sql = "SELECT * FROM user where username = '$username' OR email='$email'";
                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<script language="javascript">
                 alert("Account or Email is already in use!");
                 window.location = "reg.php";
             </script>';
                    die();
                }
                $sql = 'INSERT INTO user(hoten,username,password,phone,email) values ("' . $name . '","' . $username . '","' . $pass . '","' . $phone . '","' . $email . '")';
                execute($sql);
                echo '<script language="javascript">
                alert("You have successfully registered!");
                window.location = "login.php";
             </script>';
            } else {
                echo '<script language="javascript">
    alert("Please enter enough information!");
    window.location = "reg.php";
    </script>';
            }
        }
        ?>

    </body>

</html>
