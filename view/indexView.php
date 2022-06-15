<?php $title = "Better Title Needed";?>

<?php ob_start();?>

<section>
    <div class="searchBarContainer">
        <input type="text" name="searchbar" id="searchBar" placeholder="SEARCH">
    </div>

    <div class="slideshow">slideshow</div>

    <p>Lorem ipsum dolor iod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt molliiod tempor incididunt ut officia deserunt mollisiod tempor incididunt ut officia deserunt mollit anim id est laborum.</p>

</section>

  <!-- Modal section -->
<div id="modalBox" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Insert SIGN UP / SIGN IN VIEW</p>
  </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>