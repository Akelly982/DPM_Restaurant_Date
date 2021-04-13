<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Sign in | Foodies";
    /* Get header.php */
    include "modularContent/header.php";
?>
<!-- Finish: Get Header -->

<navigation>
    <?php
        include "modularContent/navEmpty.php";
    ?>
</navigation>
    
    
    

<div class="allGrayBg logSignForm">
    <h1>Let’s create your account</h1>
    <section>
        <form id="userForm">
            <h3>Who are you?</h3>
            <!-- radio btn determins the action location of this form -->
            <!-- update within the pages javascript for on event -->
            <div>
                <input type="radio" id="signUpUser" name="userType" value="user">
                <label for="signUpUser">I’m looking for the partner</label>
                <input type="radio" id="signUpRes" name="userType" value="restaurant">
                <label for="signUpRes">I want to create an account for my restaurant.</label>
            </div>
            <div class="fillin">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="fillin">    
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <!-- <button type="submit">submit</button> -->
            <button id="signUpPgSubmitBtn">JOIN NOW</button>
        </form>        
        <p>
            <a href="login.php">Do you already have an account? Login here.</a>
        </p>
    </section>
</div>
    
    
    
    
<?php
    include "modularContent/footer.php";
?>

<?php
    include "modularContent/firebaseInit.php";
?>
<script src="js/pgJavascript/signUpPg1.js"></script>

