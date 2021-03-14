<!doctype html>
<html lang="en">
    
    <head>
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>undefined</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/nav.php"
        ?>
    </navigation>
    
    
    
    <!-- page content -->
    <div>

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
            <!-- THis is where we put our firebase firestore restraunt items/docs -->
            <div class="findResContentGrid"  id="resContent">

                <div class="frContentSpacer"></div>
                    <div class="findResContentItem">
                        <div class="frText">
                            <h4>Loading in Restraunt Content...</h4>
                        </div>
                    </div>
                <div class="frContentSpacer"></div>

            </div>
        </div>
    
        
        <?php
             include"modularContent/firebaseInit.php";  
        ?>
        <!-- javascript identify if user is logged in -->
        <script src="scripts/javascript/firebaseUser.js"></script>

        <!-- javascript for the page that we are on -->
        <script src="scripts/javascript/findRestraunts.js"></script>
        
    </div>
    
    
    
    <footer>
        <?php
            include "modularContent/footer/footer.php"
        ?>
    </footer>

</html>