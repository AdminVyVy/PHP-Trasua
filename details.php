<?php require "layout/header.php"; ?>
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('utils/utility.php');
// Lấy id từ trang index.php truyền sang rồi hiển thị nó
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $sql = 'select * from product where id=' . $id;
    $product = executeSingleResult($sql);
    // Kiểm tra nếu ko có id sp đó thì trả về index.php
    if ($product == null) {
        header('Location: index.php');
        die();
    }
}
?>


<!--<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=264339598396676&autoLogAppEvents=1" nonce="8sTfFiF4"></script>-->
<!-- END HEADR -->
<main>
    <div class="container">
        <div id="ant-layout">
        <section class="search-quan">
                <i class="fas fa-search"></i>
                <form action="thucdon.php" method="GET">
                    <input name="search" type="text" placeholder="Search a drink">
                </form>
            </section>
        </div>
        <!-- <div class="bg-grey">

        </div> -->
        <!-- END LAYOUT  -->
        <section class="main">
            <section class="oder-product">
                <div class="title">
                    <section class="main-order">
                        
<!--                         <h1>Golden Lotus Tea</h1>
                                    <div class="box">
                                        <img src="admin/product/uploads/TRASENVANG.png" alt="">
                                        <link rel="stylesheet" href="details_1.php"/>
                                        <div class="about">
                                            <p><font color="#000000">Drinks conquer the fastidious diners! A unique combination of Oolong tea, fragrant lotus seeds and crispy tapioca. Adding a little milk will make the taste more sweet.</font><br></p>-->
                        <h1><?= $product['title'] ?></h1>
                        <div class="box">
                            <img src="<?='admin/product/'.$product['thumbnail'] ?>" alt="">
                            <div class="about">
                                <p><?= $product['content'] ?></p>
<!--                                <div class="size">
                                    <p>Size:</p>
                                    <ul>
                                        <li><input type="radio" name="size" value="S">S</li>
                                        <li><input type="radio" name="size" value="M"></li>
                                        <li><input type="radio" name="size" value="L"></li>
                                    </ul>
                                </div>-->
                                <script>
                                    
                                    </script>
                                <div class="number">
                                    <span class="number-buy">Quantity</span>
                                    <input id="num" type="number" value="1" min="1" onchange="updatePrice()">
                                </div>

                               <p class="price">Price: <span id="price">35.000</span><span> VND</span><span class="gia none">35000</span></p>
                                            <!-- <a class="add-cart" href="" onclick="addToCart(1)"><i class="fas fa-cart-plus"></i>More Add to cart</a> -->
                                            <button class="add-cart" onclick="addToCart(1)"><i class="fas fa-cart-plus"></i>Add to cart</button>
                                            <!-- <a class="buy-now" href="checkout.php" >Buy now</a> -->
                                            <button class="buy-now" onclick="buyNow(1)">Buy Now</button>
                                <script>
                                    function updatePrice() {
                                        var price = document.getElementById('price').innerText; // giá tiền
                                        var num = document.querySelector('#num').value; // số lượng
                                        var gia1 = document.querySelector('.gia').innerText;
                                        var gia = price.match(/\d/g);
                                        gia = gia.join("");
                                        var tong = gia1 * num;
                                        document.getElementById('price').innerHTML = tong.toLocaleString();
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="fb-comments" data-href="http://localhost/PROJECT/details.php" data-width="750" data-numposts="5"></div>

                    </section>
                </div>
                <aside>
                    <h1>Suggestions for you</h1>
                    <div class="row">
<!--                         <div class="col">
                                        <a href="details.php?id=1">
                                            <img src="admin/product/uploads/trasuaphuclong.png" alt="">
                                            <link rel="stylesheet" href="details_1.php"/>
                                            <div class="about">
                                                <div class="title">
                                                    <p>Phuc Long Milk Tea</p>
                                                    <span>Price: 40.000 VNĐ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="details.php?id=2">
                                            <img src="admin/product/uploads/hi-tea-dao.png" alt="">
                                            <div class="about">
                                                <div class="title">
                                                   <p>Hi-Tea Peach</p>
                                                    <span>Price: 49.000 VNĐ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        <div class="col">
                                        <a href="details.php?id=3">
                                            <img src="admin/product/uploads/traxanhxay.png" alt="">
                                            <div class="about">
                                                <div class="title">
                                                    
                                                     <p>Matcha Ice Blended</p>
                                                    <span>Price: 60.000 VNĐ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        <div class="col">
                                        <a href="details.php?id=4">
                                            <img src="admin/product/uploads/luckyTea.png" alt="">
                                            <div class="about">
                                                <div class="title">
                                                    <p>Lucky Tea</p>
                                                    <span>Price: 50.000 VNĐ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        -->
                        
                        <?php
                        $sql = 'select * from product limit 5';
                        $product = executeResult($sql);
                        $index = 1;
                        foreach ($product as $item) {
                            echo '
                                    <div class="col">
                                    <a href="details.php?id=' . $item['id'] . '">
                                        <img src="admin/product/'.$item['thumbnail'] . '" alt="">
                                        <div class="about">
                                            <div class="title">
                                                <p>' . $item['title'] . '</p>
                                                <span>Price: ' . number_format($item['price'], 0, ',', '.') . ' VNĐ' . '</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                        }
//                        ?>
                    </div>
                </aside>
            </section>
            <section class="restaurants">
                <div class="title">
                    <h1>Menu at the restaurant <span class="green">Milk Tea</span></h1>
                </div>
                <div class="product-restaurants">
                    <div class="row">
                        <?php
                        $sql = 'select * from product';
                        $product = executeResult($sql);
                        $index = 1;
                        foreach ($product as $item) {
                            echo '
                                <div class="col">
                                    <a href="details.php?id=' . $item['id'] . '">
                                        <img class="thumbnail" src="admin/product/' . $item['thumbnail'] . '" alt="">
                                        <div class="title">
                                            <p>' . $item['title'] . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span>
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
//                        ?>
<!--                         <div class="col">
                                        <a href="details.php?id=1">
                                            <img class="thumbnail" src="admin/product/uploads/TRASENVANG.png" alt="">
                                            <div class="title">
                                                <p>Golden Lotus Tea</p>
                                            </div>
                                            <div class="price">
                                                <span>35.000 VNĐ</span>
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

                                    <div class="col">
                                        <a href="details.php?id=4">
                                            <img class="thumbnail" src="admin/product/uploads/Tralai.png" alt="">
                                            <div class="title">
                                                <p>Fragrant Jasmine Tea</p>
                                                
                                                    
                                            </div>
                                            <div class="price">
                                                <span>50.000 VNĐ</span>
                                            </div>
                                            <div class="more">
                                                <div class="star">
                                                    <img src="images/icon/icon-star.svg" alt="">
                                                    <span>4.5</span>
                                                </div>
                                                <div class="time">
                                                    <img src="images/icon/icon-clock.svg" alt="">
                                                    <span>20 comment</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>-->
                    </div>
                </div>
            </section>
        </section>
    </div>
</main>
<?php require_once('layout/footer.php'); ?>
</div>
<script type="text/javascript">
    function addToCart(id) {
        var num = document.querySelector('#num').value; // số lượng
        $.post('api/cookie.php', {
            'action': 'add',
            'id': id,
            'num': num
        }, function(data) {
            location.reload()
        })
    }

    function buyNow(id) {
            $.post('api/cookie.php', {
                'action': 'add',
                'id': id,
                'num': 1
            }, function(data) {
                location.assign("checkout.php");
            })
    }
</script>
</body>

</html>