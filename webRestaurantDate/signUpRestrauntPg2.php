<!doctype>
<html lang="en">
    
    <?php
        $email = $_POST["email"];
    ?>



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
            
            <label>Username:</label>
            <input type="text" name="username" placeholder="">
            
            <label>first name:</label>
            <input type="text" name="firstName">
            
            <label>last name:</label>
            <input type="text" name="lastName">

            <label>Restraunt name:</label>
            <input type="text" name="resName">
            
            <label>location:</label>
            <input type="text" name="location">
            
            <label>address:</label>
            <input type="text" name="address">

            <!-- <label>Email:</label> -->
            <input type="hidden" name="email" value="<?php echo $email ?>">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Password:</label>
            <input type="password" name="password">

            <label>Category 1:</label>
            <input type="text" name="cat1">

            <label>Category 2:</label>
            <input type="text" name="cat2">

            <label>Category 3:</label>
            <input type="text" name="cat3">


            <br>

            <label>Introduce about your restraunt:</label>
            <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>

            <!-- Submit is done with js -->
            <button id="submitBtn">submit</button>
        </form>
    
        
        
        <!-- firestore added at end of body      -->
        <?php
            include "modularContent/firebaseInit.php";
        ?>

        <script src="scripts/javascript/signUpRestrauntPg2.js"></script>
    </body>
    
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php";
        ?>
    </footer>
    

</html>