
<?php
    $userAuthId = $_GET["user"];
    $userEmail = $_GET["email"];
    //echo "<p>". $userAuthId ."</p>";
    //echo "<p>". $userEmail ."</p>";
?>


<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "User resistration | Foodies";
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
    <h1>Please fill in about you</h1>
    <section>
        <form id="addUserForm">
            <h3>I am ...</h3>
            <div class="fillin">
                <label>First Name:</label>
                <input type="text" name="firstName">
            </div>
            <div class="fillin">
                <label>Last Name:</label>
                <input type="text" name="lastName">
            </div>
            <div class="fillin">
                <label>Username:</label>
                <input type="text" name="userName">
            </div>
            <div class="fillin">
                <label>Phone:</label>
                <input type="text" name="phone">
            </div>
            <div class="fillin">
                <label>Gender:</label>
                <input type="text" name="gender">
            </div> 
            <div class="fillin">
                <label>Birthday:</label>
                <input type="date" name="birthday" prefill="20/03/1994" min="1925-01-01" max="2001-01-01">
            </div>    
            <div class="fillin">
                <label>Height:</label>
                <input type="number" name="height">
            </div>
            <div class="fillin">
                <label>Smoker:</label>
                <input type="text" name="smoker" placeholder="yes / no">
            </div>            
            <div class="fillin">
                <label>Introduce Yourself:</label>
                <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>
            </div>

            <!-- hidden inputs -->
            <!-- <label>AuthID:</label>    //firestore doc name -->
            <input type="hidden" name="authId" value="<?php echo $userAuthId ?>">
            <!-- <label>Email:</label>     //firestore email field-->
            <input type="hidden" name="email" value="<?php echo $userEmail ?>">

            <button id="submitBtn">SUBMIT</button>
        </form>
    </section>
</div>


<?php
    include "modularContent/footer.php";
?>

<?php
    include "modularContent/firebaseInit.php";
?>

<script src="js/pgJavascript/signUpUserPg2.js"></script>

