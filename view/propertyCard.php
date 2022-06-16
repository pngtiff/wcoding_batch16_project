<div class='property'>
    <div class='propertyImgContainer'><img alt="property main image" src="<?= $property['p_img'];?>"></div>
    <div id='propertyDetails'>
        <p>Location: <?= $property['city'].', '.$property['country'];?></p>
        <p>Type: <?= $property['p_type']?>, <?= $property['r_type'];?></p>
        <p>Price: <?= number_format($property['monthly_price_won']).'₩';?></p>
        <p>
            <?= $property['title'];?>
        </p>
    </div>
</div>