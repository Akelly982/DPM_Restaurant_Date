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
        
        <h2>This is some text</h2>
        <p> show content here...... <p>
    
        
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