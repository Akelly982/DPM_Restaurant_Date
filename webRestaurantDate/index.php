<!doctype html>
<html lang="en">
    <head>
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>Home</title>
    </head>
    
    <navigation class="nav">
        <?php
            include "modularContent/nav/nav.php"
        ?>
    </navigation>
    
    
    <div class="content">
        
        <h2> Home page </h2>
        <p> show content here......</p>
    
        <?php
             include"modularContent/firebaseInit.php";  
        ?>
        <!-- javascript for the page that we are on -->
        <script src="scripts/javascript/firebaseUser.js"></script>
        <script src="scripts/javascript/home.js"></script>
    </div>
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php"
        ?>
    </footer>
    

</html>