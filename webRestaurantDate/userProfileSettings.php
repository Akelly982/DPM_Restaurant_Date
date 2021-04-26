
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

            <div class="profileContentCont">

                <!-- show gallery -->
                <section class="profileGalleryContentContainer">
                    <div class="profileGalleryItemGrid" id="upGalleryGrid">
                        <div class="profileGalleryItem">
                            <h2 class="profileGalleryText">Loading in your images...</h2>
                        </div>
                    </div>
                </section>

                <!-- update gallery -->
                <form method="POST" action="php/results/resultAddImageGallery.php" enctype="multipart/form-data">
                    <!-- fill on page load -->
                    <input type="hidden" name="userTypeIsRestaurant" value="0">  
                    <input type="hidden" id="userIdGallery" name="uid">
                    <!--  -->
                    <label class="akTextLight">Image Files  (png, jpg, jpeg / Less than 50mb )</label>
                    <input type="file" class="form-control" id="galleryImagesToUpload" name="galleryImagesToUpload[]" multiple required>
                    <button type="submit"> Update Gallery</button>
                </form>


                <!-- show Img   (main and icon img as one image )-->
                <div class="profileMainImgCont">
                    <div id="userDisplay1" class="profileMainImg" style="background-image: url(userImage/tempUserImg.png);"></div>
                    <div id="userDisplay2" class="profileMainImgRound" style="background-image: url(userImage/tempUserImg.png);"></div>
                </div>

                <!-- update display Img -->
                <form class="profileMainImgForm" method="POST" action="php/results/resultAddSingleImage.php" enctype="multipart/form-data">
                    <!-- fill on page load -->
                    <input type="hidden" name="userTypeIsRestaurant" value="0">  
                    <input type="hidden" id="userIdSingle" name="uid">
                    <!--  -->
                    <label class="akTextLight">Image File (png, jpg, jpeg / Less than 10mb )</label>
                    <input type="file" class="form-control" id="imageToUpload" name="imageToUpload" required>
                    <button type="submit"> Update Display Image</button>
                </form>



                <h2 id="userFirstNameTitle">About you: </h2>
                <hr>

                <!-- form version User -->
                <form class="userProfileForm" id="updateUserForm">

                    <!-- firstName -->
                    <label>First name:</label>
                    <input type="text" class="profileUpdateField" id="userFirstNameField" name="firstName">

                    <!-- lastName -->
                    <label>Last name:</label>
                    <input type="text" class="profileUpdateField" id="userLastNameField" name="lastName" value="">

                    <!-- username -->
                    <label>Username: </label>
                    <input type="text" class="profileUpdateField" id="userUsernameField" name="username" value="">

                    <!-- phone -->
                    <label>Phone:</label>
                    <input type="text" class="profileUpdateField" id="userPhoneField" name="phone" value="">

                    <!-- gender -->
                    <label>Gender:</label>
                    <input type="text" class="profileUpdateField" id="userGenderField" name="gender" value="">

                    <!-- birthday -->
                    <label >Birthday: </label>
                    <input type="text" class="profileUpdateField" id="userBirthdayField" name="birthday" value="">

                    <!-- height -->
                    <label>Height: </label>
                    <input type="text" class="profileUpdateField" id="userHeightField" name="height" value="">

                    <!-- smoker -->
                    <label>Smoker: </label>
                    <input type="text" class="profileUpdateField" id="userSmokerField" name="smoker" value="">

                    <!-- Summary -->
                    <label>Summary:</label>
                    <textarea style="resize:none" class="profileUpdateField" rows="5" cols="25" id="userSummaryField"></textarea>

                    <button id="updateUserDataBtn" class="updateProfileBtn profileUpdateField"> Update </button>
                </form>

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
    <script src="js/pgJavascript/userProfileSettings.js"></script> 
