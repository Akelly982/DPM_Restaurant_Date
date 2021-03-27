<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/header.php";
        ?>
        <title>Login</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <section>
        <h1>Login</h1>

        <form id="loginForm">
            <label>Email:</label>
            <input type="text" name="email">

            <label>Password:</label>
            <input type="password" name="password">

            <button id="submitBtn">submit</button>
        </form>
    
        
        
        
    </section>
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php";
        ?>
    </footer>

    
    <?php
        include "modularContent/firebaseInit.php";
    ?>
    <script src="js/pgJavascript/login.js"></script>
    

</html>