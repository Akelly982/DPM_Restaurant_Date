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
            include "modularContent/nav.php";
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
            
            <label>Street:</label>
            <input type="text" name="street" placeholder="44 albert st">

            <label>City:</label>
            <input type="text" name="city" placeholder="Sydney">

            <label>State:</label>
            <input type="text" name="state" placeholder="NSW">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Category 1:</label>
            <select name="cat1" id="catDrop1">
                <!-- <option value="volvo">Volvo</option> -->
            </select>

            <label>Category 2:</label>
            <select name="cat2" id="catDrop2">
                <!-- <option value="volvo">Volvo</option> -->
            </select>

            <label>Category 3:</label>
            <select name="cat3" id="catDrop3">
                <!-- <option value="volvo">Volvo</option> -->
            </select>

            

            <!-- hidden inputs -->
            <!-- <label>AuthID:</label>    //firestore doc name -->
            <input type="hidden" name="authId" value="<?php echo $userAuthId ?>">
            <!-- <label>Email:</label>     //firestore email field -->
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