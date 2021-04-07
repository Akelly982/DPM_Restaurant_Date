<!-- Begin: Get Header -->
<?php
    /* Name of page title */
    $title = "Foodies";
    /* Get header.php */
    include "modularContent/header.php";
?>
<!-- Finish: Get Header -->

<!-- Begin: Get Header -->
<?php
    include "modularContent/nav.php"
?>
<!-- Finish: Get Header -->

<!-- Begin: Contact Us top page -->
<div class="contact_top">
    <div class="contact_box">
        <h2>CONTACT US</h2>
            <p>You’re not going to hit a ridiculously long phone menu when you call us. Your email isn’t going to be the inbox abyss, never to be seen or heard from again. At Restaurant Date, we provide the exceptional service we’d want to experience ourselves!</p>
     </div>
</div>
<!-- End: Contact Us top page -->

<!-- Start: Contact form -->
<div class="contact_body">
    <div class="contact_form_container">
        <form id="contact_form">
            <div class="contact_form_element">
                <label for="fname">First Name&nbsp<span class="red">*</span></label>
                <input type="text" id="fname" name="firstname">
            </div>
            
            <div class="contact_form_element">
                <label for="lname">Last Name&nbsp<span class="red">*</span></label>
                <input type="text" id="lname" name="lastname">
            </div>

            <div class="contact_form_element">
                <label for="email">Email Address&nbsp<span class="red">*</span></label>
                <input type="email" id="email" name="email">
            </div>

            <div class="contact_form_element">
                <label for="phone">Contact Number&nbsp<span class="red">*</span></label>
                <input type="tel" id="phone" name="phone">
            </div> 
            
            <div class="contact_form_element">
                <label for="messagebox">Message&nbsp<span class="red">*</span></label>
                <textarea id="messagebox"  name="firstname"> </textarea>
            </div>

            <div class="contact_form_element">
                <button id="submit_button" form="contact_form" type="submit" value="Submit">Submit</button>
            </div>        
        </form>
    </div>
</div>
<!-- End: Contact form -->

<!-- START: Separation -->
<div class="home_sepr"></div>
<!-- END: Separation -->

<!-- END: Page Contents -->


<!-- Begin: Get Footer -->
<?php
    /* Get footer.php */
    include "modularContent/footer.php"
?>
<!-- Finish: Get Footer -->

<!-- Begin: Connect to the Firebase  -->
<?php
    include "modularContent/firebaseInit.php";  
?>

    <!-- javascript for the page that we are on -->
    <script src="js/firebaseUser.js"></script>
    <script src="js/pgJavascript/home.js"></script>
<!-- Finish: Connect to the Firebase  -->