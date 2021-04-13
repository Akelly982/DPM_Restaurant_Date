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

<!-- START: About page -->
<div class="about_top">
    <div class="about_box">
        <h2>Food and Drink are important<br> for any relationship</h2>
            <p>Welcome to Restaurant Date your number one platform where users can use for searching good restaurants but also can find anyone who has a similar sense of restaurants. We are dedicated to giving you the very best experience, which focuses on searching for a good restaurant, find a new partner through a similar sense of restaurants, and customer service.<br><br>
            We have created this platform to connect two things that we love so much, people and food, and Restaurant Date has come a long way from its beginnings in a small office. When our founders first started, their passion for connecting people through restaurant reviews and food, providing the best platform they realized that it could change people's lives in many different ways.</p>
    </div>
</div>

<!-- Start: Our Goal section -->
<div class="bacColour about_goal">
    <div class="about_title"> 
        <h2>Our Goal</h2>
    </div>
    <div class="about_restJoin">
        <div class="about_restJoin_text">
            <div class="about_restJoin_text_block">
                <p>At Restaurant Date, our goal is to connect people through restaurants ‘reviews, but more important than that is to make life easier. We want our members to express themselves and share their experiences in some restaurants, and based on those experiences we can connect them with new people who have a similar sense of restaurants while keeping the experience simple and fun.</p>
                <p>Love and food are a perfect combination to have fun and a good time with new people.</p>                
            </div>
        </div>        
        <div class="about_restJoin_img"></div>
    </div>
</div>
<!-- End: Our Goal section --> 


<!--Start: Connect each other section -->  
<section> 
    <div class="connectEachOther">
        <div class="about_title"> 
            <h2>Connecting you to each other</h2> 
        </div>
        <img src="img/connectEachOther.svg">
        <p> We are passionate about people and connecting them to make their life better is one amazing achievement for us.<br> We love what we do.</p>
    </div>
</section>
<!--End: Connect each other section -->  


<!--Start: Last section for about page -->
<div class="bacColour about_promotion">
    <div class="about_title"> 
        <h2>Promoting your restaurant</h2> 
    </div>
    <div class="about_restJoin">            
        <div class="about_promotion_img"></div>
        <div class="about_restJoin_text">
            <div class="about_restJoin_text_block">
                <p>If you are restaurant owner, create your page for promoting your business. You can have a restaurant page for FREE!
                    Additionally, users reviews could be great benefit for your business.</p>
            </div>
        </div>              
    </div>
</div>
<!--End: Last section on about page -->


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