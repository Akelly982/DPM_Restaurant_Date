<!doctype html>
<html lang="en">
    
    <head>
        <?php
            include "modularContent/header.php";
        ?>
        <title>undefined</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav.php"
        ?>
    </navigation>
    
    
    
    <!-- Content to be shown on the page -->
    <div>
        
        <h2>This is some text</h2>
        <p> show content here...... <p>
    
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
    <script src="js/myScript.js"></script>

</html>