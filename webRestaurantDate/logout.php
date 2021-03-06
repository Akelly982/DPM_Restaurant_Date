
<!-- people probably wont see this page just quickly run code to log user out and send-->
<!-- them back to the home page index.php-->
<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>Logout</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <body>
        <h1>logout</h1>
    
        <!-- firestore added at end of body      -->
        <?php
            include "modularContent/firebaseInit.php";
        ?>
        <script src="scripts/javascript/logout.js"></script>
    </body>
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php";
        ?>
    </footer>
    

</html>