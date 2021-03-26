<!doctype>
<html lang="en">
    
    <?php
        $userAuthId = $_GET["user"];
        $userEmail = $_GET["email"];
        //echo "<p>". $userAuthId ."</p>";
        //echo "<p>". $userEmail ."</p>";
    ?>



    <head>        
        <?php
            include "modularContent/header.php";
        ?>
        <title>SignUp Restraunt</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/navEmpty.php";
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

            <label>Restaurant name:</label>
            <input type="text" name="resName">
            
            <label>Address:</label>
            <input type="text" name="address" placeholder="44 albert st chattswood Sydney NSW">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Category 1:</label>
            <input type="text" name="cat1">

            <label>Category 2:</label>
            <input type="text" name="cat2">

            <label>Category 3:</label>
            <input type="text" name="cat3">

            

            <!-- hidden inputs -->
            <!-- <label>AuthID:</label> -->
            <input type="hidden" name="authId" value="<?php echo $userAuthId ?>">
            <!-- <label>Email:</label> -->
            <input type="hidden" name="email" value="<?php echo $userEmail ?>">


            <br>

            <label>Introduce about your restraunt:</label>
            <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>

            <!-- Submit is done with js -->
            <button id="submitBtn">submit</button>
        </form>
    
        
        

        
    </body>
    
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php";
        ?>
    </footer>

    <?php
        include "modularContent/firebaseInit.php";
    ?>
    <script src="js/pgJavascript/signUpRestrauntPg2.js"></script>
    

</html>