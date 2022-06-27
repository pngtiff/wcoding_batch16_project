<?php $title = "Modify Property";
ob_start(); ?>
<section>
    <form action="index.php" method="post" id="modifyPropertyForm" enctype="multipart/form-data">
        <label for="title">Title<input type="text" name="title" id="title" value="<?=$propDetails[0]['post_title'];?>"></label>
    
        <label for="roomType">Room Type
            <select name="roomType" id="roomType">
                <option value="1" <?php if($propDetails[0]['room_type_id'] === 1):?> selected="selected" <?php endif;?>>Private room</option>
                <option value="2" <?php if($propDetails[0]['room_type_id'] === 2):?> selected="selected" <?php endif;?>>Shared room</option>
                <option value="3" <?php if($propDetails[0]['room_type_id'] === 3):?> selected="selected" <?php endif;?>>Shared unit</option>
                <option value="4" <?php if($propDetails[0]['room_type_id'] === 4):?> selected="selected" <?php endif;?>>Entire place</option>
            </select>
            <span class="hide">Select one</span>
        </label>
        <label for="bedroom">
            Number of bedrooms
            <input type="number" name="bedroom" id="bedroom" value="<?=$propDetails[0]['room_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="bath">
            Number of baths
            <input type="number" name="bath" id="bath" value="<?=$propDetails[0]['bath_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="furnished">
            Furnished
            <input type="checkbox" name="furnished" id="furnished" <?php if($propDetails[0]['is_furnished'] === 1):?>checked<?php endif;?>>
        </label>
        <label for="bed">
            Number of beds
            <input type="number" name="bed" id="bed" value="<?=$propDetails[0]['bed_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="price">
            Price(Monthly)
            <input type="number" name="price" id="price" value="<?=$propDetails[0]['monthly_price_won'];?>">
            <span class='hide'>Number greater than 0</span>
        </label>
        <label for="description">
            Description<textarea name="description" id="description"><?=$propDetails[0]['description'];?></textarea>
            <span class="hide">At least 6 charachters</span>
        </label>
        <label for="bankAccNum">
            Bank Account Number
            <input type="text" name="bankAccNum" id="bankAccNum" value="<?=$propDetails[0]['bank_account_num'];?>">
            <span class="hide">Enter real bank account number</span>
        </label>
        <label for="addImg">
            <span>Add an Image</span>
            <button id="addImg">Add img</button>
            <span class="hide">(At least 2, at most 20)</span>
        </label>
        <input type="hidden" id="imgLinks", name="imgLinks" value="<?=$imgs;?>">
        <div id="photosPreview">
            <?php 
            for($i=0; $i<count($propDetails); $i++) {
                ?>
                <div>
                    <input value="<?=$propDetails[$i]['image_description']?>" name="f-attachment-<?=$i?>" type="text">
                    <span>&times;</span>
                    <img src="./public/images/property_images/<?=$propDetails[$i]['propId']?>/<?=$propDetails[$i]['p_img']?>" alt="">
                    <input value="<?=$propDetails[$i]['p_img']?>" name="attachment-<?=$i?>" type="hidden">
                </div>
                <?php
            }
            ?>
        </div>
        <input type="hidden" id="propId" name="propId" value="<?= $propDetails[0]['propId'];?>">
        <input type="hidden" name="action" value="modifyProperty">
        <button type="submit">SUBMIT</button>
    </form>
</section>
<script src="./public/js/modifyProperty.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
