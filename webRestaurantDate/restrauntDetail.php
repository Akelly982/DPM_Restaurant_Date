
    <?php 
        $resId = $_GET["restrauntId"];
        $resName = $_GET["restrauntName"];
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
    <input type="hidden" id="restrauntId" value="<?php echo $resId ?>"> 

    <?php
        include "modularContent/nav.php"
    ?>



    
    <!-- Content to be shown on the page -->

    <div>

        <div class="rdTitleContainer">
            <h2 id="rdName">Restraunt Name</h2>
        </div>
        
        <div class="restrauntDetailHero" id="resHeroImg" style="background-image: url(userImage/tempResHeroImg.png);"">
            <div class="restrauntDetailTextContainer">
                <p id="rdSummary">Lorem Ipsum is simply dummy text of the printing 
                and typesetting industry. Lorem Ipsum has been the industry's 
                standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p id="rdAddress">Location: 77 temp address NSW Chattswood Sydney</p>
            </div>
        </div>


        <!-- <div class="restrauntDetailGallery">
            
        </div> -->


        <div class="rdAddCommentForm">
            <h3> Is this restaurant interesting to you </h3>
            <div class="rdRadioBtnCont">
                <div id="rdYesBtn" class="rdYesRadioBtn">
                    <p>YES!</p>
                </div>
                <div id="rdNoBtn" class="rdNoRadioBtn">
                    <p>...nope</p>
                </div>
            </div>
            <h3>Do you have a vibe for this restraunt?</h3>
            <button id="rdAddCommentBtn"> Leave a comment </button>
        </div>

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
    <script src="js/pgJavascript/restrauntDetail.js"></script>

</html>