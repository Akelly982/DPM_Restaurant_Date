<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>SignUp Restraunt</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <body>
        <h1> add Restraunt</h1>

        <form id="addUserForm">
            <label>RestrauntName:</label>
            <input type="text" name="resName" placeholder="type here">

            <label>location:</label>
            <input type="text" name="location">

            <label>Email:</label>
            <input type="text" name="email">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Password:</label>
            <input type="password" name="password">

            <br>

            <label>Summary:</label>
            <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>

            <button id="submitBtn">submit</button>
        </form>
    
        
        
        <!-- firestore added at end of body      -->
        <?php
            include "modularContent/firebaseInit.php";
        ?>

        <script src="scripts/javascript/signUpRestraunt.js"></script>
    </body>
    
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php";
        ?>
    </footer>
    

</html>