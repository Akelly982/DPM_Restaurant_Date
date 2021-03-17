<!doctype html>
<html lang="en">
    <head>
        <?php
            include "modularContent/header.php";
        ?>
        <title>Home</title>
    </head>
    
    <navigation class="nav">
        <?php
            include "modularContent/nav.php"
        ?>
    </navigation>
    
    
    <div class="content">
        
        <h2> Home page </h2>
        <p> show content here...... I exist</p>
    

    </div>
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php"
        ?>
    </footer>



    <?php
        include "modularContent/firebaseInit.php";  
    ?>
        <!-- javascript for the page that we are on -->
        <script src="scripts/javascript/firebaseUser.js"></script>
        <script src="scripts/javascript/home.js"></script>


</html>