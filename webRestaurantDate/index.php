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
    <script src="js/pgJavascript/home.js"></script>
<!-- Finish: Connect to the Firebase  -->