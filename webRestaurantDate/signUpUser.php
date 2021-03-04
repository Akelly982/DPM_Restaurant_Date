<!doctype>
<html lang="en">
    
    <head>        
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>SignUp User</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/navEmpty.php";
        ?>
    </navigation>
    
    
    
    
    <body>
        <h1> add user</h1>

        <form id="addUserForm">
            <label>First Name:</label>
            <input type="text" name="firstName" placeholder="type here">

            <label>Last Name:</label>
            <input type="text" name="lastName">

            <label>Email:</label>
            <input type="text" name="email">

            <label>Phone:</label>
            <input type="text" name="phone">

            <label>Gender:</label>
            <input type="text" name="gender">

            <label>Age:</label>
            <input type="number" name="age">

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

        <script src="scripts/javascript/signUpUser.js"></script>
    </body>
    
    
    
    
    <footer>
        <?php
            include "modularContent/footer/footer.php";
        ?>
    </footer>
    

</html>