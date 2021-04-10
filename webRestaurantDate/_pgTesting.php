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



    <!-- restraunt detail add comment pg -->
    <div>
        <!-- standard item -->
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
        <!-- if user id does not match GET userId -->
        <div class="rdacAddCommentCont" id="parentRdacAddCommentCont">
            <div class="rdacAddCommentForm">
                <h4> User does not match signed in user. </h4>
            </div>
        </div>
    </div>




    <!-- Content to be shown on the page -->
    <!-- userPROFILE SETTINGS v1  -->
    <div class="bgColor profilePageCont">
            <div class="profileLeftNav">  
                <?php
                    include "modularContent/profileNav.php";
                ?>
            </div>
            <div class="profileContentCont">
                <div class="userGaller">

                </div>

                <form method="POST">
                </form>

                <h2 id="userFirstNameTitle">About you: </h2>
                <hr>

                <!-- form version 1 -->
                <form class="userProfileForm">

                    <!-- firstName -->
                    <label>First name:</label>
                    <div class="profileInLine">
                        <p class="profileSettingsText" id="userFirstName"> undefined </p>
                        <input type="text" id="userFirstNameField"value="">
                        <button id="updateFirstName"> Update </button>
                    </div>

                    <!-- lastName -->
                    <label>Last name:</label>
                    <div class="profileInLine">
                        <input type="text" id="userLastNameField" value="">
                        <button id="updateLastName"> Update </button>
                    </div>

                    <!-- username -->
                    <label>Username: </label>
                    <div class="profileInLine">
                        <input type="text" id="userUsernameField" value="">
                        <button id="updateUsername"> Update </button>
                    </div>

                    <!-- phone -->
                    <label>Phone:</label>
                    <div class="profileInLine">
                        <input type="text" id="userPhoneField" value="">
                        <button id="updatePhone"> Update </button>
                    </div>

                    <!-- gender -->
                    <label>Gender</label>
                    <div class="profileInLine">
                        <input type="text" id="userGenderField" value="">
                        <button id="updateGender"> Update </button>
                    </div>

                    <!-- birthday -->
                    <label > Birthday</label>
                    <div class="profileInLine">
                        <input type="text" id="userBirthdayField" value="">
                        <button id="updateBirthday"> Update </button>
                    </div>

                    <!-- height -->
                    <label>Height</label>
                    <div class="profileInLine">
                        <input type="text" id="userHeightField" value="">
                        <button id="updateHeight"> Update </button>
                    </div>

                    <!-- Summary -->
                    <label>Summary:</label>
                    <div class="profileInLine">
                        <textarea style="resize:none" rows="5" cols="25" id="userSummaryField"></textarea>
                        <button id="updateSummary"> Update </button>
                    </div>

                </form>

            </div>
    </div>





    <!-- Content to be shown on the page -->
    <!-- userPROFILE SETTINGS v2  -->
    <div class="bgColor profilePageCont">
            <div class="profileLeftNav">  
                <?php
                    include "modularContent/profileNav.php";
                ?>
            </div>
            <div class="profileContentCont">
                <div class="userGaller">

                </div>

                <form method="POST">
                </form>

                <h2 id="userFirstNameTitle">About you: </h2>
                <hr>

                <!-- version 2 -->
                <form class="userProfileForm">

                    <!-- firstName -->
                    <label>First name:</label>
                    <input type="text" id="userFirstNameField"value="">

                    <!-- lastName -->
                    <label>Last name:</label>
                    <input type="text" id="userLastNameField" value="">

                    <!-- username -->
                    <label>Username: </label>
                    <input type="text" id="userUsernameField" value="">

                    <!-- phone -->
                    <label>Phone:</label>
                    <input type="text" id="userPhoneField" value="">

                    <!-- gender -->
                    <label>Gender</label>
                    <input type="text" id="userGenderField" value="">

                    <!-- birthday -->
                    <label > Birthday</label>
                    <input type="text" id="userBirthdayField" value="">

                    <!-- height -->
                    <label>Height</label>
                    <input type="text" id="userHeightField" value="">

                    <!-- Summary -->
                    <label>Summary:</label>
                    <textarea style="resize:none" rows="5" cols="25" id="userSummaryField"></textarea>

                    <button id="updateAll"> Update </button>
                </form>

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