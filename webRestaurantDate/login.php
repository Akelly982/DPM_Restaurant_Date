<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Login | Foodies";
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
    <h1>Login to your account</h1>
    <section>
        <form id="loginForm">
            <div class="fillin">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="fillin">    
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <!-- <button type="submit">submit</button> -->
            <button id="submitBtn">LOGIN</button>
        </form>
        <p>
            <a href="signUpPg1.php">Don't have an account? Create one here.</a>
        </p>
    </section>
</div>


<?php
    include "modularContent/footer.php";
?>

<?php
    include "modularContent/firebaseInit.php";
?>
<script src="js/pgJavascript/login.js"></script>

