<?php $title = $propDetails[0]['post_title'];?>

<?php ob_start();?>
<section>
<h2><?=$propDetails[0]['post_title'];?></h1>
    <p><?= $propDetails[0]['province_state'].', '.$propDetails[0]['city'];?><?php
    if($propDetails[0]['validation']) {
        echo ' ‣ Validated Property'?> <img class='validatedCheck' src="./public/images/validatedPropertyCheck.png" alt="validation green check"><?php ;}
        else?></p>
    <div class='propertyImgContainer propImages'>
        <img alt="property main image" src="<?= $propDetails['p_img'];?>">
        <button class='allPropPhotos'><a href="">See all photos <i class="fa-solid fa-images"></i></a></button>
        <!-- TODO: click for modal with slide gallery for showing all property photos -->
    </div>
    <div class='propDetails'>
        <div class='propDesc'>
            <h3><?=$propDetails[0]['r_type']?> in <?= $propDetails[0]['p_type'];?></h3>
            <p>Size: <?=$propDetails[0]['size'];?>m² | # Beds | # Baths</p>
            <p class='upperLowerBorders'><?= $propDetails[0]['description'];?></p>
            <p>Address: <?= $propDetails[0]['address1'].' '.$propDetails[0]['address2'].', '.$propDetails[0]['city'];?></p>
        </div>
        <div class='propResv flexColumn'>
            <p class='price'>Price: <span><?= number_format($propDetails[0]['monthly_price_won']);?></span>₩/month</p>
            <p>Owner information:</p>
            <button class='resvbutton'><a href="">Reserve now</a></button>
            <!-- TODO: reservation action -->
        </div>
    </div>

</section>
<script src="./public/js/propImagesCarousel.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>