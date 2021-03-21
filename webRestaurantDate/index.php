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
<div class="home_top">
    <h1><span class="gray">Find Your</span> Favorite <span class="blue">Restaurant</span> +</h1>
    <div class="home_top_links">
        <div class="home_top_rest"><a href="findRestraunts.php">FIND RESTAURANTS</a></div>
        <div class="home_top_love"><a href="signUpPg1.php">FIND YOUR LOVE</a></div>
        <div class="home_top_join"><a href="signUpPg1.php">JOIN AS RESTAURANT</a></div>
    </div>
</div>
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