<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Find Restaurants | Foodies";
    /* Get header.php */
    include "modularContent/header.php";
?>
<!-- Finish: Get Header -->

<!-- Begin: Get Header -->
<?php
    include "modularContent/nav.php"
?>
<!-- Finish: Get Header -->
    
<!-- START: page content -->
<section class="findRest bgColor">
    <!-- <div class="spacer"></div> -->
    
    <div class="findResContainer">
        <div class="findResSearch">
            <div class="leftNav">
                <!-- Search field -->
                <h2> Search...</h2>
                <div class="frSearchField">
                    <input type="text" id="searchByNameTextField" placeholder="I'm looking for...">
                    <button id="searchByNameBtn"></button>
                </div>
                <!-- Search catagories -->
                <div class="frCategories">
                    <h2>Categories</h2>
                    <ul id="resCategories"></ul>
                </div>
            </div>
        </div>
        <!-- THis is where we put our firebase firestore restraunt items/docs -->
        <div class="findResContentGrid"  id="resContent">

            <!-- <div class="frContentSpacer"></div> -->
                <div class="findResContentItem">
                    <div class="frText">
                        <h4>Loading in Restraunt Content...</h4>
                    </div>
                </div>
            <!-- <div class="frContentSpacer"></div> -->

        </div>
    </div>
    
</section>
<!-- END: page contents -->

<!-- Begin: Get Footer -->
<?php
    include "modularContent/footer.php"
?>
<!-- Finish: Get Footer -->

<!-- Begin: Connect to the Firebase  -->
    <?php
        include "modularContent/firebaseInit.php";  
    ?>
    <!-- javascript identify if user is logged in -->
    <script src="js/firebaseUser.js"></script>
<!-- Finish: Connect to the Firebase  -->

<!-- javascript for the page that we are on -->
<script src="js/pgJavascript/findRestaurants.js"></script>

