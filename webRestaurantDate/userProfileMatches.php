
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

            <div class="profileLeftNav">  
                <?php
                    include "modularContent/profileNav.php";
                ?>
            </div>

            <!-- page content parent -->
            <div class="profileContentCont">
                <!-- user matches gallery -->
                <div class="matchesGalleryContentContainer">
                        <h2> Matches </h2>
                        <div class="matchesGalleryItemGrid" id="matchesGalleryGrid">

                            <!-- generic on html load item -->
                            <div class="matchesGalleryItem">
                                <h2 class="matchesGalleryText">Loading in Matches...</h2>
                            </div>

                            <!-- On found doc load item -->
                            <!-- <div class="matchesGalleryItem" style="background-image: url(userImage/tempResImg.png);">
                            </div> -->

                            <!-- no user items found -->
                            <!-- <div class="matchesGalleryItem">
                                <h3 class="rdGalleryText"> We have found no matches for you try adding some comments / reviews to restaurants. </h3>
                            </div> -->

                        </div>
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
    <script src="js/classes/MatchUser.js"></script>
    <script src="js/pgJavascript/userProfileMatches.js"></script> 
