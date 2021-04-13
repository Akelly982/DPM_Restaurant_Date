<?php
    $userAuthId = $_GET["user"];
    $userEmail = $_GET["email"];
    //echo "<p>". $userAuthId ."</p>";
    //echo "<p>". $userEmail ."</p>";
?>

<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Restaurant resistration | Foodies";
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
    <h1>Please fill in about your business</h1>
    <section>
        <form id="addUserForm">
            <div class="fillin">
                <label>Username:</label>
                <input type="text" name="username" placeholder="">
            </div>
            <div class="fillin">
                <label>first name:</label>
                <input type="text" name="firstName">
            </div>
            <div class="fillin">
                <label>last name:</label>
                <input type="text" name="lastName">
            </div>
            <div class="fillin">
                <label>Restaurant name:</label>
                <input type="text" name="resName">
            </div>
            <div class="fillin">
                <label>Street:</label>
                <input type="text" name="street" placeholder="44 albert st">
            </div>
            <div class="fillin">
                <label>City:</label>
                <input type="text" name="city" placeholder="Sydney">
            </div>
            <div class="fillin">
                <label>State:</label>
                <input type="text" name="state" placeholder="NSW">
            </div>
            <div class="fillin">
                <label>Phone:</label>
                <input type="text" name="phone">
            </div>            
            <div class="fillin">
                <label>Category 1:</label>
                <select name="cat1" id="catDrop1">
                <!-- <option value="volvo">Volvo</option> -->
                </select>
            </div>
            <div class="fillin">
                <label>Category 2:</label>
                <select name="cat2" id="catDrop2">
                <!-- <option value="volvo">Volvo</option> -->
                </select>
            </div>
            <div class="fillin">
                <label>Category 3:</label>
                <select name="cat3" id="catDrop3">
                <!-- <option value="volvo">Volvo</option> -->
                </select>
            </div>
            <div class="fillin">
                <label>Introduce about your restraunt:</label>
                <textarea style="resize:none" rows="5" cols="25" id="taSummary" name="summary"></textarea>
            </div>
            
            <!-- hidden inputs -->
            <!-- <label>AuthID:</label>    //firestore doc name -->
            <input type="hidden" name="authId" value="<?php echo $userAuthId ?>">
            <!-- <label>Email:</label>     //firestore email field -->
            <input type="hidden" name="email" value="<?php echo $userEmail ?>">

            <!-- Submit is done with js -->
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

    <script src="js/pgJavascript/signUpRestrauntPg2.js"></script>

