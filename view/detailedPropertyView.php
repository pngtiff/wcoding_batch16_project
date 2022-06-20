<?php $title = 'Property Details';?>

<?php ob_start();?>
<section>
    <div class='propDetails'>
        <div class='propertyImgContainer'><img alt="property main image" src="<?= $property['p_img'];?>"></div>
        <div>
            <p class="price">Price: <span><?= number_format($property['monthly_price_won']);?></span>₩/month</p>
        </div>
    </div>

</section>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>