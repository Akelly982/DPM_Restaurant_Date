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
                    <div class="findResContentItem">             
                                                                     <!-- userImage/tempResImg.png -->
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