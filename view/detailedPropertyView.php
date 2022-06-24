<?php if($propDetails[0]['post_title']==''){
        $title = $propDetails[0]['p_type'].' in '.$propDetails[0]['province_state'].', '.$propDetails[0]['city'];
    } else {
        $title = $propDetails[0]['post_title'];
    };;?>

<?php ob_start();?>
<section>
<h2><?php 
    if($propDetails[0]['post_title']==''){
        echo $propDetails[0]['p_type'].' in '.$propDetails[0]['province_state'].', '.$propDetails[0]['city'];
    } else {
        echo $propDetails[0]['post_title'];
    };?></h2>
    <p><?= $propDetails[0]['province_state'].', '.$propDetails[0]['city'];?><?php
    if($propDetails[0]['validation']) {
        echo ' ‣ Validated Property'?> <img class='validatedCheck' src="./public/images/validatedPropertyCheck.png" alt="validation green check"><?php ;}
        else?></p>
    <?php if(!empty($_SESSION['uid'])) {
    if($_SESSION['uid'] === $_SESSION['user_uid']) { ?>
       <button><a href="index.php?action=modifyProperty&propId=<?= $_REQUEST['propId'];?>">Modify Property Details</a></button>
    <?php }} ?>
    <div class='propertyImgContainer propImages'>
        <?php if(count($propDetails)>1) {
            include('propImagesCarousel.php');
        } else {
            echo "<img alt=".$propDetails[0]['image_description']." src=./public/images/property_images/{$propDetails[0]['p_id']}/{$propDetails[0]['p_img']}>";
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
            <p>Size: <?=$propDetails[0]['size'];?>m² | <?=$propDetails[0]['room_num'];?> Bedroom(s) | <?=$propDetails[0]['bath_num'];?> Bathroom(s)</p>
            <p class='upperLowerBorders'><?= $propDetails[0]['description'];?></p>
            <p>Address: <?= $propDetails[0]['province_state'].', '.$propDetails[0]['city'];?></p>
        </div>
        <div class='propResv flexColumn'>
            <p class='price'>Price: <span><?= number_format($propDetails[0]['monthly_price_won']);?></span>₩/month</p>
            <p>Owner information:</p>
            <a href="index.php?action=profile&user=<?=$propOwner['uid'];?>">
                <div class="propOwnerInfo flexColumn">
                    <p><?=$propOwner['first_name'];?></p>
                    <div class="propOwnerIcon">
                        <img src="./profile_images/<?=$propOwner['profile_img'];?>" alt="">
                    </div>
                </div>
            </a>
            <button class='resvbutton'><a href="">Reserve now</a></button>
            <!-- TODO: reservation action -->
        </div>
    </div>

</section>

<!-- All property photos modal -->
<div class="photoModalContainer">
    
    <div class="innerContainer">
        <button class="pModalCloseButton">Close</button>
        <!-- this grabs the related photos -->
        <div class="imgGrid">
            <?php include('allPropertyImg.php');?> 
        </div>
    </div>

    
</div>

<script src="./public/js/propImagesCarousel.js"></script>
<script src="./public/js/allPhoto.js"></script>

<?php $content = ob_get_clean();?>
<?php require('template.php');?>