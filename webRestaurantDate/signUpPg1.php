<!doctype>
<html lang="en">
    
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
    
    
    
    
    <section>
        <h1> sign Up </h1>

        
        <form id="userForm">

            <!-- radio btn determins the action location of this form -->
            <!-- update within the pages javascript for on event -->

            <input type="radio" id="signUpUser" name="userType" value="user">
            <label for="signUpUser">user</label>

            <input type="radio" id="signUpRes" name="userType" value="restaurant">
            <label for="signUpRes">restaurant</label>
            <br>

            <label>Email:</label>
            <input type="text" name="email">
            <br>
            <label>Password:</label>
            <input type="password" name="password">

            <!-- <button type="submit">submit</button> -->
            <button id="signUpPgSubmitBtn">Submit</button>
            
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
    <script src="js/pgJavascript/signUpPg1.js"></script>


</html>