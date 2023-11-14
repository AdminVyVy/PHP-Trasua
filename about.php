<?php require('layout/header.php') ?>
<style>
    main {
        font-family: "Encode Sans SC", sans-serif;
    }

    .row img {
        max-width: 100%;
    }
</style>
<main>
    <div class="container">
        <div id="ant-layout">
            <section class="search-quan">
                <i class="fas fa-search"></i>
                <form action="thucdon.php" method="GET">
                    <input name="search" type="text" placeholder="Search a drink">
                </form>
            </section>
            <section class="main">
                <div class="row">
                    <h3>What is Milk Tea?</h3>
                    <p>At Milk Tea, we understand that a delicious drink can bring you the most comfort. Therefore, Milk Tea launched a service to order water through the app. You just need to order your favorite food on Milk Tea, we will quickly bring you a cool and delicious drink.</p>
                </div>
                <div class="row">
                    <h3>How Does Milk Tea Work?</h3>
                    <p>Milk Tea operates from 9am to 10pm daily.</p>
                </div>
                <div class="row">
                    <img src="images/bg/GrabFood.jpg" alt="">

                    <h3>Vision</h3>
                    <p>1. With the aspiration of constantly expanding the market - sustainable development, Milk Tea strives to become a high-value dairy in Vietnam.</p>
                
                    <p>2. Milk Tea wishes to create a Vietnamese brand with class and quality reflected in each product, thereby gradually asserting its position in the international market.</p>
                </div>
                <div class="row">
                    <h3>Can I Pay With Cash?</h3>
                    <p>Yes!</p>
                </div>
                <div class="row">
                    <h3>Strictly Quality Control?</h3>
                    <p>The cost displayed on the application includes the cost of the drink according to the bar's unit price and shipping fee.</p>
                </div>
                <div class="row">
                    <h3>Listen to understand?</h3>
                    <p>Milk Tea always listens and absorbs all opinions from you - dear customers of Milk Tea house.</p>
                </div>
                <div class="row">
                    <h3>What restaurants can I find in my area?</h3>
                    <p>List of restaurants and eateries sorted by distance and estimated delivery time from the Delivery Address to your location.</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.4505843247475!2d105.72201050915052!3d10.06211687192425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08628b6906199%3A0x73f2591fb1e66417!2zTG9uZyBIw7JhLCBMb25nIEhvw6AsIELDrG5oIFRo4buneSwgQ-G6p24gVGjGoSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1690454004024!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade width="550" height="450" style="border:0;" ></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lEQeDOZhrA0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </section>
        </div>
    </div>
</main>
<?php require('layout/footer.php') ?>
