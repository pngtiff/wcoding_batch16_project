<section>
    <form action="index.php?action=displayUpdatedProperty" method="post" id="modifyPropertyForm" enctype="multipart/form-data">
        <label for="title">Title<input type="text" name="title" id="title" value="<?=$propDetails['post_title'];?>"></label>
    
        <label for="roomType">Room Type
            <select name="roomType" id="roomType">
                <option value="1" <?php if($propDetails['room_type_id'] === 1):?> selected="selected" <?php endif;?>>Private room</option>
                <option value="2" <?php if($propDetails['room_type_id'] === 2):?> selected="selected" <?php endif;?>>Shared room</option>
                <option value="3" <?php if($propDetails['room_type_id'] === 3):?> selected="selected" <?php endif;?>>Shared unit</option>
                <option value="4" <?php if($propDetails['room_type_id'] === 4):?> selected="selected" <?php endif;?>>Entire place</option>
            </select>
        </label>
        <label for="bedroom">Number of bedrooms<input type="number" name="bedroom" id="bedroom" value="<?=$propDetails['room_num'];?>"></label>
        <label for="bed">Number of beds<input type="number" name="bed" id="bed" value="<?=$propDetails['bed_num'];?>"></label>
        <label for="bath">Number of baths<input type="number" name="bath" id="bath" value="<?=$propDetails['bath_num'];?>"></label>
        <label for="furnished">Furnished<input type="checkbox" name="furnished" id="furnished" <?php if($propDetails['is_furnished'] === 1):?>checked<?php endif;?>></label>
        <label for="price">Price(Monthly)<input type="number" name="price" id="price" value="<?=$propDetails['monthly_price_won'];?>"></label>
        <label for="description">Description<textarea name="description" id="description"><?=$propDetails['description'];?></textarea></label>
        <label for="bankAccNum">Bank Account Number<input type="number" name="bankAccNum" id="bankAccNum" value="<?=$propDetails['bank_account_num'];?>"></label>
        <button id="addImg">Add img</button>
        <input type="hidden" id="imgLinks", name="imgLinks" value="<?=$propDetails['p_img'];?>">
        <div id="photosPreview"></div>
        <input type="hidden" name="action" value="postProperty">
        <button type="submit">SUBMIT</button>
    </form>

</section>
<script src="./public/js/modifyProperty.js"></script>