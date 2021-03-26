
    <?php 
        $resId = $_GET["restaurantId"];
        $resName = $_GET["restaurantName"];
        //echo "<p>".$resId."</p>";
        //echo "<p>".$resName."</p>";
    ?>

    <!-- Begin: Get Header -->
    <?php
        /* Name of page title */
        $title = $resName;
        /* Get header.php */
        include "modularContent/header.php";
    ?>
    <!-- Finish: Get Header -->

    <!-- hide resId at top for firestore search -->
    <input type="hidden" id="restaurantId" value="<?php echo $resId ?>"> 

    <?php
        include "modularContent/nav.php"
    ?>



    
    <!-- Content to be shown on the page -->

    <div>

        <div class="rdTitleContainer">
            <h2 id="rdName">Restraunt Name</h2>
        </div>
        
        <div class="restaurantDetailHero" id="resHeroImg" style="background-image: url(userImage/tempResHeroImg.png);"">
            <div class="restaurantDetailTextContainer">
                <p id="rdSummary">Lorem Ipsum is simply dummy text of the printing 
                and typesetting industry. Lorem Ipsum has been the industry's 
                standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p id="rdAddress">Location: 77 temp address NSW Chattswood Sydney</p>
            </div>
        </div>

        <!-- gallery component -->
        <div class="rdGalleryContentContainer">
            <h2> Gallery </h2>
            <div class="rdGalleryItemGrid" id="rdGalleryGrid">
                <div class="rdGalleryItem">
                    <h2 class="rdGalleryText">Loading in images...</h2>
                </div>
            </div>
        </div>


        <!--  add comment component -->
        <form class="rdAddCommentForm" id="rdAddCommentF">
            <h3> Is this restaurant interesting to you </h3>

            <input type="radio" id="posReview" name="userReviewIsPos" value="true">
            <label for="posReview">YES!!!</label>

            <input type="radio" id="negReview" name="userReviewIsPos" value="false">
            <label for="negReview">...Nope</label>

            <h3>Do you have a vibe for this restraunt?</h3>
            <button id="rdAddCommentBtn"> Leave a comment </button>
        </form>



        <!-- comment section grid -->
        <div class="rdCommentContentContainer">
            <h2> Comments </h2>
            <div class="rdCommentItemGrid" id="rdCommentGrid">
                <div class="rdCommentItem">
                    <h2 class="rdCommentTitle">Loading in comments...</h2>
                </div>
            </div>
        </div>
    
    </div>
    
    
    
    <footer>
        <?php
            include "modularContent/footer.php"
        ?>
    </footer>

    <?php
            include"modularContent/firebaseInit.php";  
    ?>
    <!-- javascript identify if user is logged in -->
    <script src="js/firebaseUser.js"></script>
    <!-- javascript for the page that we are on -->
    <script src="js/pgJavascript/restaurantDetail.js"></script>

</html>