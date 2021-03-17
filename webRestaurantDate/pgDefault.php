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
            include "modularContent/nav/navSelector.php"
        ?>
    </navigation>
    
    
    
    
    <div>
        
        <h2>This is some text</h2>
        <p> show content here...... <p>
    
        
        <?php
            include "modularContent/firebaseInit.php";  
        ?>
        <!-- javascript for the page that we are on -->
        <script src="myScript.js"></script>
    </div>
    
    
    
    <footer>
        <?php
            include "modularContent/footer/footer.php"
        ?>
    </footer>

</html>