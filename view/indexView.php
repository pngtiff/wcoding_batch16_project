
<?php $title = "Welcome to Room-EZ";?>


<?php ob_start();?>

<section class="flexColumn">

  <div class="landingHeader">
    <h3 id="slogan">Your hassle-free housing search starts with Room-EZ</h3>
  </div>
  
  <div id="searchBarContainer">
      <input type="text" name="searchbar" id="searchBar" placeholder="Start your search here">
  </div>

  <div class="slideshow">
    <div id="slide1" class="slide"></div>
  </div>

  <div class="indexProperties">
    <?php include('listPropertiesView.php'); ?> 
  </div>

  <div id="intro">
    <h3>About Us</h3>
    <p>Room E-Z is a no-frills service linking hosts with housing or rooms to rent and renters looking for a place in Korea anywhere from a month to a year</p>
    <p>Whether you're a host or a renter, post your profile and look for potential matches!</p>
  </div>
</section>
  

  <!-- Modal section -->
<?php if (empty($_SESSION['email'])) {?>
  <div id="modalBox" class="modal">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div id="banner-container"></div>
      <span class="close">&times;</span>
      <div class="form-container">
        <div id="signIn-container">
          <?php include('view/signInView.php');?>
        </div>
        <div id="signUp-container">
          <?php include('view/signUpView.php');?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>

<script src="./public/js/modal.js"></script> 
