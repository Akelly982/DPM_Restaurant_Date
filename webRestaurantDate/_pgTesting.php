<!doctype html>
<html lang="en">
    
    <head>
        <?php
            include "modularContent/header.php";
        ?>
        <title>undefined</title>
    </head>
    
    <navigation>

        <!-- base navigation -->
        <?php
            include "modularContent/nav.php"
        ?>
    
        <div class="spacer"></div>

        <!--    navigation logged in -->
        <div class="nav">
            <h1> Navigation</h1>
            <!-- available pages  -->
            <div id="pgContent">
                <a href="index.php">Home</a>
            </div>
            <!-- if user is logged in add data here -->
            <div id="userNav">
                <p>myName</p>
                <a href="logout.php">Logout</a>
                <a href="userSettings">Settings</a>
                <input type="hidden" id="currentUserId" value="">
                <input type="hidden" id="currentUserType" value="">
            </div>
        </div>
        
    </navigation>
    
    
    
    <!-- findRestraunt pg -->
    <div>

        <div class="spacer"></div>
        <div style="spacer" >
            <h4 style="text-align:center;"> findRestraunt Items </h4>
        </div>
        <div class="spacer"></div>
        
        

        <div class="findResContainer">
            <div class="findResSearch">
                <!-- Search field -->
                <p> Search: </p>
                <div class="frSearchField">
                    <input type="text" id="searchByNameTextField">
                    <button id="searchByNameBtn">X</button>
                </div>
                <!-- Search catagories -->
                <p> search by type: </p>
                <a id="searchMexican" href="">Mexican</a>
                <a id="searchThai" href="">Thai</a>
                <a id="searchFastFood" href="">FastFood</a>
            </div>
            <div class="findResContentGrid"  id="resContent">

                    <!-- The item to be created in JS for every res returned -->
                    <div class="findResContentItem">                                                       <!-- userImage/tempResImg.png -->
                        <div class="frImage" style="background-image: url(userImage/tempResImg.png);">
                        </div>
                        <div class="frText">
                            <h2>my Restraunt name</h2>
                            <h4>Cafe: location of my cafe </h4>
                            <p class="frSummary">Summary of my cafe. lorum ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum 
                            ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
                            ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
                            ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
                            ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
                            ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
                            </p>
                            <button class="frBtn"> Enter </button>
                        </div>
                    </div>

                    <!--  what will be shown before js runs -->
                    <div class="findResContentItem">
                        <div class="frText">
                            <h3>Loading in Restraunt Content...</h3>
                        </div>
                    </div>


                    <!-- what will be shown if Firestore returns empty list of docs -->
                    <div class="findResContentItem">
                        <div class="frText">
                            <h3>No restraunts by that type found. <br> Try again.</h3>
                        </div>
                    </div>


                    <!-- spacer to cover excess height needed so that the --->
                    <!-- footer clears the bottom of the screen -->
                    <div class="frContentSpacer"></div>


            </div>
        </div>

        
    </div>
    


    <!-- Restraunt Detail -->
    <div>

        <div class="spacer"></div>
        <div style="spacer" >
            <h4 style="text-align:center;"> restraunt detail pg </h4>
        </div>
        <div class="spacer"></div>



        <div class="rdGalleryContentContainer">
            <h2> Gallery </h2>
            <div class="rdGalleryItemGrid" id="rdGalleryGrid">

                <!-- generic on html load item -->
                <div class="rdGalleryItem">
                    <h2 class="rdGalleryText">Loading in images...</h2>
                </div>

                <!-- On found doc load item (gallery will be a CSV forEach loop)-->
                <div class="rdGalleryItem" style="background-image: url(userImage/tempResImg.png);">
                </div>

                <!-- no gallery items found -->
                <div class="rdGalleryItem">
                    <h3 class="rdGalleryText">Gallery images for this restraunt have not been uploaded yet. Patience is a virtue..</h3>
                </div>

            </div>
        </div>




        <!-- add comment button plus radio -->
         <!--  V1   -->
        <div class="rdAddCommentForm">
            <h3> Is this restaurant interesting to you </h3>
            <div class="rdRadioBtnCont">
                <div id="rdYesBtn" class="rdYesRadioBtn rdActiveRadioBtn">
                    <p>YES!</p>
                </div>
                <div id="rdNoBtn" class="rdNoRadioBtn">
                    <p>...Nope</p>
                </div>
            </div>
            <h3>Do you have a vibe for this restraunt?</h3>
            <button id="rdAddCommentBtn"> Leave a comment </button>
        </div>

        <div class="spacer"></div>

        <!-- add comment button plus radio -->
         <!--  V2   -->
        <form class="rdAddCommentForm">
            <h3> Is this restaurant interesting to you </h3>

            <input type="radio" id="posReview" name="userReviewIsPos" value="true">
            <label for="posReview">YES!!!</label>

            <input type="radio" id="negReview" name="userReviewIsPos" value="false">
            <label for="negReview">...Nope</label>

            <h3>Do you have a vibe for this restraunt?</h3>
            <button id="rdAddCommentBtn"> Leave a comment </button>
        </form>



        <!-- comment grid -->
        <div class="rdCommentContentContainer">
            <h2> Comments </h2>
            <div class="rdCommentItemGrid">
                <!-- items -->
                <!-- multiples to ensure grid works the way i want it to  -->
                <div class="rdCommentItem">
                    <div class="rdCommentImg" style="background-image: url(userImage/tempUserImg.png);">
                    </div>
                    <h4 class="rdCommentTitle">Awsome Coffee</h4>
                    <p class="rdCommentText">making it look like readable English. 
                    Many desktop publishing packages and web page editors 
                    now use Lorem Ipsum as their default model text
                    </p>
                </div>

                <!-- Normal comment item with extended ammount of comment text to check item sizing -->
                <div class="rdCommentItem">
                    <div class="rdCommentImg" style="background-image: url(userImage/tempUserImg.png);">
                    </div>
                    <h4 class="rdCommentTitle">Awsome Coffee</h4>
                    <p class="rdCommentText">making it look like readable English. 
                    Many desktop publishing packages and web page editors 
                    now use Lorem Ipsum as their default model text fadf
                    making it look like readable English. 
                    Many desktop publishing packages and web page editors 
                    now use Lorem Ipsum as their default model text fadf
                    making it look like readable English. 
                    Many desktop publishing packages and web page editors 
                    now use Lorem Ipsum as their default model text fadf
                    </p>
                </div>

                <!--html base item while loading in comment items -->
                <div class="rdCommentItem">
                    <h2 class="rdCommentTitle">Loading in comments...</h2>
                </div>

                <!-- no comments founds  -->
                <div class="rdCommentItem">
                    <h4 class="rdCommentTitle">No comments found be the first to review this new restraunt. 
                        Add a comment by clicking the button just above. 
                    </h4>
                </div>

            </div>
        </div>


    </div>


    
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php"
        ?>
    </footer>



    <?php
             include"modularContent/firebaseInit.php";  
    ?>
    <!-- javascript for the page that we are on -->
    <script src="myScript.js"></script>

</html>