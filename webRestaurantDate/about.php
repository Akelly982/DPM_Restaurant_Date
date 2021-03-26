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
        <h2>Food bla bla.......</h2>
            <p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like </p>
    </div>
</div>

<!-- We need to rename the class (Igor)-->
<section>
        <div class="home_restJoin">
            <div class="home_restJoin_text">
                <h2>Promoting your restaurant</h2>
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