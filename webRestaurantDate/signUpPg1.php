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
    
    
    
    
    <body>
        <h1> sign Up </h1>

        <!-- Using POST to send data to the next page  -->
        <form id="userForm" method="post" action="undefined">

            <!-- radio btn determins the action location of this form -->
            <!-- update within the pages javascript for on event -->

            <input type="radio" id="signUpUser" name="nextPg" value="empty">
            <label for="signUpUser">user</label>

            <input type="radio" id="signUpRes" name="nextPg" value="empty">
            <label for="signUpRes">restraunt</label>


            <label>Email:</label>
            <input type="text" name="email">

            <label>Password:</label>
            <input type="password" name="password">

            <button type="submit">submit</button>
            
        </form>
    
        
        
        <!-- firestore added at end of body      -->
        <?php
            include "modularContent/firebaseInit.php";
        ?>
        <script src="scripts/javascript/signUpPg1.js"></script>
    </body>
    
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer.php";
        ?>
    </footer>
    

</html>