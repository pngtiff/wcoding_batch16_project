<?php $title = "Search Results"; ?>

<?php ob_start(); ?>

<section id='searchResults'>
<?php
    if(count($properties)>0){
        ?>
        
        <h2>Search Results</h2>
        <div id='propertiesSearchList'>
            <?php
            foreach($properties as $property)
            {
                include('propertyCard.php');
            } ?>
        </div>
        
    <?php
    }else {
        ?>
        <p>No Search Results Yet :)</p>
        <?php
    } ?>

</section>

<?php $content = ob_get_clean();?>
<?php require('template.php');?>