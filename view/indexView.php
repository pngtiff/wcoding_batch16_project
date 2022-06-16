
<?php $title = "Welcome to Room-EZ";?>


<?php ob_start();?>

<section class="flexColumn">
    <div class="searchBarContainer">
        <input type="text" name="searchbar" id="searchBar" placeholder="SEARCH">
    </div>

    <div class="slideshow">
      <div id="slide1" class="slide"></div>
    </div>


    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


  </section>

  <!-- Modal section -->
<div id="modalBox" class="modal">
  
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<<<<<<< HEAD
    <!-- Sign In view -->
    <p><?php include("view/signInView.php")?> </p>
=======
    <?php include('view/signUpView.php');?>
    <p>Insert SIGN UP / SIGN IN VIEW</p>
>>>>>>> master
  </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>

<script src="./public/js/modal.js"></script> 
