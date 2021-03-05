<!doctype html>
<html lang="en">
    
    <head>
        <?php
            include "modularContent/head/header.php";
        ?>
        <title>undefined</title>
    </head>
    
    <navigation>
        <?php
            include "modularContent/nav/nav.php"
        ?>
    
        
<!--        navigation logged in -->
        <div class="nav">
            <h1> Navigation</h1>
            <!-- available pages  -->
            <div id="pgContent">
                <a href="index.php">Home</a>
            </div>
            <!-- if user is logged in add data here -->
            <div id="userNav">
                <p>myName</p>
                <a href="logout.php">Logout</a>
                <a href="userSettings">Settings</a>
                <input type="hidden" id="currentUserId" value="">
                <input type="hidden" id="currentUserType" value="">
            </div>
        </div>
        
    </navigation>
    
    
    
    
    <div>
        
        <h2>This is some text</h2>
        <p> show content here...... <p>
    
        
        <?php
             include"modularContent/firebaseInit.php";  
        ?>
        <!-- javascript for the page that we are on -->
        <script src="myScript.js"></script>
    </div>
    
    
    
    <footer class="foot">
        <?php
            include "modularContent/footer/footer.php"
        ?>
    </footer>

</html>