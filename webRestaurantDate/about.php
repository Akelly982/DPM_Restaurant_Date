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

<!-- START: About page -->
<div class="about_top">
    <div class="about_box">
        <h2>Food bla bla.......</h2>
            <p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like </p>
    </div>
</div>

<!-- Our Goal section -->
<div class="bacColour about_goal">
      <div class="about_title"> <h2>Our Goal</h2> </div>
        <div class="about_restJoin">
             <div class="about_restJoin_text">
                    <div class="about_restJoin_text_block">
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        <p>Additionally, users reviews could be great benefit for your business.</p>
                    </div>
                </div>        
            <div class="about_restJoin_img"></div>
        </div>
    </div>


  <!-- Connect each other section -->  
  <section> 
      <div class="connectEachOther">
        <div class="about_title"> <h2>Connecting you to each other </h2> </div>
         <img src="img/connectEachOther.svg">
            <p>distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web</p>
       </div>
  </section>



<!-- Last section for about page -->
<div class="bacColour about_promotion">
       <div class="about_title"> <h2>Promoting your restaurant</h2> </div>
        <div class="about_restJoin">            
           <div class="about_promotion_img"></div>
                <div class="about_restJoin_text">
                    <div class="about_restJoin_text_block">
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        <p>Additionally, users reviews could be great benefit for your business.</p>
                    </div>
             </div>              
        </div>
    </div>



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