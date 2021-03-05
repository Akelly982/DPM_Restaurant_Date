<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>Login</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <body>
        <h1>Login</h1>

        <form id="loginForm">
            <label>Email:</label>
            <input type="text" name="email">

            <label>Password:</label>
            <input type="password" name="password">

            <button id="submitBtn">submit</button>
            <button id="submitBtn2">submit</button>
        </form>
    
        
        
        <!-- firestore added at end of body      -->
        <?php
            include "modularContent/firebaseInit.php";
        ?>
        <script src="scripts/javascript/login.js"></script>
    </body>
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php";
        ?>
    </footer>
    

</html>