
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
                <form method="POST">
                    <button type="submit"> Update Gallery</button>
                </form>


                <!-- show Img   (main and icon img as one image )-->
                <div class="profileMainImgCont">
                    <div class="profileMainImg" style="background-image: url(userImage/tempUserImg.png);"></div>
                    <div class="profileMainImgRound" style="background-image: url(userImage/tempUserImg.png);"></div>
                </div>

                <!-- update Img -->
                <form class="profileMainImgForm" method="POST" result="">
                    <button type="submit"> Update Display Image</button>
                </form>



                <h2 id="userFirstNameTitle">About you: </h2>
                <hr>

                <!-- form version Restaurant -->
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

                    <!-- resName -->
                    <label>Restaurant name:</label>
                    <input type="text" class="profileUpdateField" id="userResNameField" name="resName" value="">

                    <!-- street -->
                    <label >Street: </label>
                    <input type="text" class="profileUpdateField" id="userStreetField" name="street" value="" placeholder="44 albert st">

                    <!-- city -->
                    <label>City: </label>
                    <input type="text" class="profileUpdateField" id="userCityField" name="city" value="" placeholder="Sydney">

                    <!-- state -->
                    <label>State: </label>
                    <input type="text" class="profileUpdateField" id="userStateField" name="state" value="" placeholder="NSW">

                    <!-- category 1 -->
                    <label>Category 1:</label>
                    <select name="cat1" id="catDrop1" class="profileUpdateField">
                        <!-- <option value="volvo">Volvo</option> -->
                    </select>

                    <!-- category 2 -->
                    <label>Category 2:</label>
                    <select name="cat2" id="catDrop2" class="profileUpdateField">
                        <!-- <option value="volvo">Volvo</option> -->
                    </select>
                    
                    <!-- category 3 -->
                    <label>Category 3:</label>
                    <select name="cat3" id="catDrop3" class="profileUpdateField">
                        <!-- <option value="volvo">Volvo</option> -->
                    </select>

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
    <script src="js/pgJavascript/restaurantProfileSettings.js"></script> 
