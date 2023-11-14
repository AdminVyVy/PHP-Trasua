<!DOCTYPE html>
<html lang="en">
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <title>Product</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <section class="logo">
                    <a href=""><img src="images/download.png" alt=""></a>
                    <section class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Enter your address">
                    </section>
                </section>

                <section class="menu-right">
                    <div class="cart">
                        <a href=""><img src="images/icon/cart.svg" alt=""></a>
                    </div>
                    <div class="login">
                        <a href="">Login</a>
                    </div>
                </section>
            </div>
        </header>
        <!-- END HEADR -->
        <main>
            <div class="container">
                <div id="ant-layout">
                    <section class="search-quan">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search a drink">
                    </section>
                </div>
                <div class="bg-grey">

                </div>
                <!-- END LAYOUT  -->
                <section class="main">
                    <section class="oder-product">
                        <div class="title">
                            <section class="main-order">
                                <h1>Product's name</h1>
                                <div class="box">
                                    <img src="https://www.highlandscoffee.com.vn/vnt_upload/product/03_2018/TRATHANHDAO.png" alt="">
                                    <div class="about">
                                        <p>Another fun experience! The harmony between premium tea, cool lemongrass and juicy peach pieces will bring you a great drink.</p>
                                        <div class="size">
                                            <p>Size:</p>
                                            <ul>
                                                <li><a href="">S</a></li>
                                                <li><a href="">M</a></li>
                                                <li><a href="">L</a></li>
                                            </ul>
                                        </div>
                                        <div class="number">
                                            <span class="number-buy">Quantity</span>
                                            <input type="number">
                                        </div>
                                        <p class="price">Price: <span>100.000 VNĐ</span></p>
                                        <a class="buy-now" href="">Buy now</a>

                                    </div>
                                </div>
                            </section>
                        </div>
                        <aside>
                            <h1>Suggestions for you</h1>
                            <div class="row">
                                <?php
                                $sql = 'select * from product limit 3';
                                $productList = executeResult($sql);
                                $index = 1;
                                foreach ($productList as $item) {
                                    echo '
                                <div class="col">
                                    <a href="thucdon.php">
                                        <img src="' . $item['thumbnail'] . '" alt="">
                                        <div class="about">
                                            <div class="title">
                                                <p>' . $item['title'] . '</p>
                                                <span>Price: ' . $item['price'] . ' VNĐ</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                                }
                                ?>
                            </div>
                        </aside>
                    </section>

                    <!-- end Món ngon gần bạn -->
                    <section class="comment">
                        <h1>Comment</h1>
                        <div class="container">
                            <div class="post">
                                <textarea name="" id="" cols="50" rows="10"></textarea>
                                <button>Publish</button>
                            </div>
                            
                        </div>
                    </section>

                    <!-- end comment -->
                    <section class="restaurants">
                        <div class="title">
                            <h1>Menu at the restaurant <span class="green">Milk Tea</span></h1>
                        </div>
                        <div class="product-restaurants">
                            <div class="row">
                                <?php
                                $sql = 'select * from product';
                                $productList = executeResult($sql);
                                $index = 1;
                                foreach ($productList as $item) {
                                    echo '
                                <div class="col">
                                    <a href="">
                                        <img class="thumbnail" src="' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . $item['price'] . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="images/icon/icon-star.svg" alt="">
                                                <span>4.6</span>
                                            </div>
                                            <div class="time">
                                                <img src="images/icon/icon-clock.svg" alt="">
                                                <span>15 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </main>
    </div>

</body>

</html>