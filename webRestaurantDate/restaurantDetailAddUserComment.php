
    <?php 
        $resId = $_GET["restaurantId"];
        $getUserId = $_GET["userId"];
        $isPosReview = $_GET["isPos"];
        //echo "<p>".$resId."</p>";
        //echo "<p>".$getUserId."</p>";
        //echo "<p>".$isPosReview."</p>";
    ?>

    <!-- Begin: Get Header -->
    <?php
        /* Name of page title */
        $title = "Add Comment for restaurant";
        /* Get header.php */
        include "modularContent/header.php";
    ?>
    <!-- Finish: Get Header -->

    <!-- hide GET data at top for js code -->
    <input type="hidden" id="restaurantId" value="<?php echo $resId ?>"> 
    <input type="hidden" id="isPosReview" value="<?php echo $isPosReview ?>"> 
    <!-- check that the user id that accesses the page is the user id of the person signed in -->
    <input type="hidden" id="getUserId" value="<?php echo $getUserId ?>"> 


    <?php
        include "modularContent/nav.php"
    ?>



    <!-- Content to be shown on the page -->

    
    <div class="rdacAddCommentCont" id="parentRdacAddCommentCont">
        <div class="rdacAddCommentForm">
            <h3>Write a review:</h3>
            <label class="rdacAddCommentLabel" style>Title:</label>
            <input type="text" id="tfUserCommentTitle" class="rdacAddCommentTitleField" placeholder="A great experience with friends" value="">
            <label class="rdacAddCommentLabel">comment:</label>
            <textarea style="resize:none" rows="20" cols="60" id="taUserComment" name="userComment"></textarea>
            <button class="rdacAddCommentFormBtn" id="formBtn"> submit </button>
        </div>
    </div>
    
    
    

    <?php
        include "modularContent/footer.php"
    ?>
    
    <?php
            include"modularContent/firebaseInit.php";  
    ?>
    <!-- javascript identify if user is logged in -->
    <script src="js/firebaseUser.js"></script>
    <!-- javascript for the page that we are on -->
    <script src="js/pgJavascript/restaurantDetailAddUserComment.js"></script>

</html>