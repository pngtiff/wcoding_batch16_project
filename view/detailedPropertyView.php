<?php $title = $propDetails[0]['post_title'];?>

<?php ob_start();?>
<section>
<h2><?=$propDetails[0]['post_title'];?></h1>
    <p><?= $propDetails[0]['province_state'].', '.$propDetails[0]['city'];?><?php
    if($propDetails[0]['validation']) {
        echo ' ‣ Validated Property'?> <img class='validatedCheck' src="./public/images/validatedPropertyCheck.png" alt="validation green check"><?php ;}
        else?></p>
    <div class='propertyImgContainer propImages'>
        <?php if(count($propDetails)>1) {
            include('propImagesCarousel.php');
        } else {
            echo "<img alt=".$propDetails[0]['image_description']." src=". $propDetails[0]['p_img'].">";
        } ?>
    </div>
    <div style="text-align:center">
        <?php if(count($propDetails)>1) {
            for($i=0; $i<count($propDetails); $i++) {?>
        <span class="propImgDots" onclick="currentSlide(<?=$i+1?>)"></span>
        <?php }};?>
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

<!-- All property photos modal -->
<div id="modalBox">
    <div id="propPhotosModal">
        
    </div>
</div>

<script src="./public/js/propImagesCarousel.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>