<?php $title = "Search Results"; ?>

<?php ob_start(); ?>

<section>
    <!-- <?php echo $city; ?> -->
    <?php print_r($properties) ?>
</section>

<?php $content = ob_get_clean();?>
<?php require('template.php');?>