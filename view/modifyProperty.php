<?php $title = "Modify Property"; ?>

<?php ob_start(); ?>
<section>
    <form action="index.php?action=modifyProperty" method="post" id="modifyPropertyForm" enctype="multipart/form-data">
        <label for="title">Title<input type="text" name="title" id="title" value="<?=$propDetails['post_title'];?>"></label>
    
        <label for="roomType">Room Type
            <select name="roomType" id="roomType">
                <option value="1" <?php if($propDetails['room_type_id'] === 1):?> selected="selected" <?php endif;?>>Private room</option>
                <option value="2" <?php if($propDetails['room_type_id'] === 2):?> selected="selected" <?php endif;?>>Shared room</option>
                <option value="3" <?php if($propDetails['room_type_id'] === 3):?> selected="selected" <?php endif;?>>Shared unit</option>
                <option value="4" <?php if($propDetails['room_type_id'] === 4):?> selected="selected" <?php endif;?>>Entire place</option>
            </select>
            <span class="hide">Select one</span>
        </label>
        <label for="bedroom">
            Number of bedrooms
            <input type="number" name="bedroom" id="bedroom" value="<?=$propDetails['room_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="bath">
            Number of baths
            <input type="number" name="bath" id="bath" value="<?=$propDetails['bath_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="furnished">
            Furnished
            <input type="checkbox" name="furnished" id="furnished" <?php if($propDetails['is_furnished'] === 1):?>checked<?php endif;?>>
        </label>
        <label for="bed">
            Number of beds
            <input type="number" name="bed" id="bed" value="<?=$propDetails['bed_num'];?>">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="price">
            Price(Monthly)
            <input type="number" name="price" id="price" value="<?=$propDetails['monthly_price_won'];?>">
            <span class='hide'>Number greater than 0</span>
        </label>
        <label for="description">
            Description<textarea name="description" id="description"><?=$propDetails['description'];?></textarea>
            <span class="hide">At least 6 charachters</span>
        </label>
        <label for="bankAccNum">
            Bank Account Number
            <input type="text" name="bankAccNum" id="bankAccNum" value="<?=$propDetails['bank_account_num'];?>">
            <span class="hide">Enter real bank account number</span>
        </label>
        <label for="addImg">
            <span>Add an Image</span>
            <button id="addImg">Add img</button>
            <span class="hide">(At least 2, at most 20)</span>
        </label>
        <input type="hidden" id="imgLinks", name="imgLinks" value="<?=$propDetails['p_img'];?>">
        <div id="photosPreview"></div>
        <input type="hidden" id="propId" name="propId" value="<?= $propDetails['propId'];?>">
        <input type="hidden" name="action" value="postProperty">
        <button type="submit">SUBMIT</button>
    </form>
</section>
<script src="./public/js/modifyProperty.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
