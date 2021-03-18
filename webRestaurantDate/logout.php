
<!-- people probably wont see this page just quickly run code to log user out and send-->
<!-- them back to the home page index.php-->
<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/header.php";
        ?>
        <title>Logout</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <div>
        <h1>logout</h1>
    </div>
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php";
        ?>
    </footer>
    
    
    <?php
            include "modularContent/firebaseInit.php";
        ?>
        <script src="js/pgJavascript/logout.js"></script>

</html>