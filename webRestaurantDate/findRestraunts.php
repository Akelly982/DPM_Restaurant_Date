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
    
    
    
    
    <div>
        
        <div class="findResContainer">
            <div class="findResSearch">
                <input type="text" id="nameTextField">
                <a id="serchByName"> Name </a>
                <p> search by type: </p>
                <a id="search"
            </div>
            <div class="findResContent"  id="resContent">
                    <p> No content found </p>
            </div>
        </div>
    
        
        <?php
             include"modularContent/firebaseInit.php";  
        ?>
        <!-- javascript identify if user is logged in -->
        <script src="scripts/javascript/firebaseUser.js"></script>
        <!-- javascript for the page that we are on -->
        <script src="scripts/javascript/myScript.js"></script>
    </div>
    
    
    
    <footer>
        <?php
            include "modularContent/footer/footer.php"
        ?>
    </footer>

</html>