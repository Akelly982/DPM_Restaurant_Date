
    <!-- Begin: Get Header -->
    <?php
        /* Name of page title */
        $title = "Restaurant profile settings";
        /* Get header.php */
        include "modularContent/header.php";
    ?>
    <!-- Finish: Get Header -->


    <?php
        include "modularContent/nav.php"
    ?>


    <!-- Content to be shown on the page -->
    <div class="bgColor profilePageCont">
        <div class="ppLeftNav">
            <?php
                include "modularContent/profileNav.php";
            ?>
            <div class="profileContentCont">

            </div>
        </div>
    </div>
    
    
<!-- Begin: Get Footer -->
    <?php
        include "modularContent/footer.php"
    ?>
<!-- Finish: Get Footer -->

<!-- Begin: Connect to the Firebase  -->
    <?php
        include"modularContent/firebaseInit.php";  
    ?>
    <!-- javascript identify if user is logged in -->
    <script src="js/firebaseUser.js"></script>
<!-- Finish: Connect to the Firebase  -->

<!-- javascript for the page that we are on -->
    <!-- <script src="js/pgJavascript/restaurantProfileSettings"></script>  -->
