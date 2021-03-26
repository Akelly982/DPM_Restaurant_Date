<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Foodies";
    /* Get header.php */
    include "modularContent/header.php";
?>
<!-- Finish: Get Header -->

<!-- Begin: Get Header -->
<?php
    include "modularContent/nav.php"
?>
<!-- Finish: Get Header -->

<!-- START: Page Contents -->
    <!-- START: Page Top Image -->
    <div class="home_top">
        <h1><span class="gray">Find Your</span> Favorite <span class="blue">Restaurant</span> +</h1>
        <div class="home_top_links">
            <div class="home_top_rest"><a href="findRestraunts.php">FIND RESTAURANTS</a></div>
            <div class="home_top_love"><a href="signUpPg1.php">FIND YOUR LOVE</a></div>
            <div class="home_top_join"><a href="signUpPg1.php">JOIN AS RESTAURANT</a></div>
        </div>
    </div>
    <!-- END: Page Top Image -->
    <!-- START: Services List -->
    <section>
        <div class="home_sList">
            <div class="home_sList_block">
                <img src="img/icon_restaurant.svg" alt="restaurant search services">
                <h3>Find your favourite restaurant</h3>
                <p>You can search and find many restaurants and information without registration. It is totally FREE!!</p>
                <div class="btn_blue">
                    <a href="findRestraunts.php">Find Restaurant</a>
                </div>
            </div>
            <div class="home_sList_block">
                <img src="img/icon_chat.svg" alt="comment and chatting">
                <h3>Leave your comment</h3>
                <p>Please leave your comment restaurants to show your review.</p>
            </div>
            <div class="home_sList_block">
                <img src="img/icon_couple.svg" alt="make a couple">
                <h3>Find your love</h3>
                <p>You can find someone has same sense of restaurant idea. Lets leave a comment where the restaurant which your are interesting.</p>
                <div class="btn_pink">
                    <a href="signUpPg1.php">JOIN NOW</a>
                </div>
            </div>
            <div class="home_sList_block">
                <img src="img/icon_chef.svg" alt="restaurant owner">
                <h3>Post restaurant owner</h3>
                <p>If you are the restaurant owner, you can create your restaurant page for free! Additionally, you can promote your business.</p>
                <div class="btn_green">
                    <a href="signUpPg1.php">JOIN NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Services List -->
    <!-- START: JOIN NOW for users -->
    <section>
        <div class="home_joinNow">
            <div class="home_joinNow_bg">
                <div class="home_joinNow_bg_cover"></div>
            </div>
            <div class="home_joinNow_contents">
                <div class="home_joinNow_img"></div>
                <div class="home_joinNow_text">
                    <h2>Food and Drink are important for the relationship</h2>
                    <div class="home_joinNow_text_block">
                        <p>Every one use the restaurants for the special occasion such as go to the date, start the relationship, and more…</p>
                        <p>Do you have an experience that it is hard to decide where you go to the restaurant on the first date?</p>
                        <p>Do not worry, you can find similar sense of restaurant person here.</p>
                        <p>Food and drink are part of our life. That is why, in the relationship, if the couple has similar sense of food and drink, it will make a great relationship.</p>
                    </div>
                    <div class="btn_w_p">
                        <a href="">JOIN NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: JOIN NOW for users -->
    <!-- START: JOIN NOW for users -->
    <section>
        <div class="home_restJoin">
            <div class="home_restJoin_text">
                <h2>Promote your restaurant</h2>
                    <div class="home_restJoin_text_block">
                        <p>If you are restaurant owner, create your page for promoting your business. You can have a restaurant page for FREE!</p>
                        <p>Additionally, users reviews could be great benefit for your business.</p>
                    </div>
                <div class="btn_black">
                    <a href="">Create your page</a>
                </div>
            </div>        
            <div class="home_restJoin_img"></div>
        </div>
    </section>
    <!-- END: JOIN NOW for users -->
    <!-- START: Search -->
    <section>
        <div class="home_search">
            <h2>Search The Restaurants</h2>
            <form method="get" action="">
                <div class="home_search_box">
                    <input type="search" placeholder="Start typing to find!" value="" class="home_search_text"><button type="submit" id="rest_search" value=""><img src="img/icon_search.svg" alt="search restaruant"></button>
                </div>
            </form>
        </div>
    </section>
    <!-- END: Search -->
    <!-- START: Separation -->
    <div class="home_sepr"></div>
    <!-- END: Separation -->




<!-- END: Page Contents -->

<!-- Begin: Get Footer -->
<?php
    /* Get footer.php */
    include "modularContent/footer.php"
?>
<!-- Finish: Get Footer -->

<!-- Begin: Connect to the Firebase  -->
<?php
    include "modularContent/firebaseInit.php";  
?>

    <!-- javascript for the page that we are on -->
    <script src="js/firebaseUser.js"></script>
<!-- Finish: Connect to the Firebase  -->