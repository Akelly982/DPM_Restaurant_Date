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
        <title>SignUp User</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <body>
        <h1> Add user</h1>

        <form id="addUserForm">
            <label>First Name:</label>
            <input type="text" name="firstName" placeholder="type here">

            <label>Last Name:</label>
            <input type="text" name="lastName">
            
            <label>Username:</label>
            <input type="text" name="userName">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Gender:</label>
            <input type="text" name="gender">

            <label>Birthday:</label>
            <input type="date" name="birthday" prefill="20/03/1994" min="1925-01-01" max="2001-01-01">

            <label>Height:</label>
            <input type="number" name="height">

            <label>Smoker:</label>
            <input type="text" name="smoker" placeholder="yes / no">


            <!-- hidden inputs -->
            <!-- <label>AuthID:</label> -->
            <input type="hidden" name="authId" value="<?php echo $userAuthId ?>">
            <!-- <label>Email:</label> -->
            <input type="hidden" name="email" value="<?php echo $userEmail ?>">
            
            <br>

            <label>Introduce Yourself:</label>
            <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>

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
    <script src="js/pgJavascript/signUpUserPg2.js"></script>

</html>