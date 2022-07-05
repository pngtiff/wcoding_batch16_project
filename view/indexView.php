<?php $title = "Welcome to Room-EZ"; ?>


<?php ob_start(); ?>

<section id="indexSection">

  
  <div class="slideshow">
    <div id="slide1" class="slide"></div>
    <h3 id="slogan">Your hassle-free housing search starts with Room-EZ</h3>
  </div>

  <div class="indexProperties">
    <?php include('listPropertiesView.php'); ?> 
  </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>