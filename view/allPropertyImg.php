<?php
for($i=0; $i<count($propDetails); $i++) {?>
    <div class="allPropImgContainer <?=$i+1?>">
        
        <img class="allPropImg " src="<?= "./public/images/property_images/{$propDetails[$i]['p_id']}/{$propDetails[$i]['p_img']}";?>" alt="<?= $propDetails[$i]['image_description'];?>">
        
    </div>
    <?php 
};
?>