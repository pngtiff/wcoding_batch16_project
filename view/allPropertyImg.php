<?php
for($i=0; $i<count($propDetails); $i++) {?>
    <div class="allPropImgContainer">
        <img class="allPropImg" src="<?= $propDetails[$i]['p_img'];?>" alt="<?= $propDetails[$i]['image_description'];?>">
        
    </div>
    <?php 
};
?>