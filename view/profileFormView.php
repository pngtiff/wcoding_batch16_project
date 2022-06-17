
<?php $title = "Welcome to Room-EZ";?>


<?php ob_start();?>
<div class = "personalInformationContainer">
    <h2>Modify Profile</h2>

    <form action="../controller/uploadImg.php" method = "POST" id = "photoForm" enctype="multipart/form-data">
        <div id = "profilePhoto">
            <img src= "../profile_images/ <?php echo $_SESSION['fileName']; ?>" id = "photo" />
            <input type="file" id = "file" name = "uploadFile">
            <label for="file" id = "uploadButton">Choose Photo</label>
        </div>
        <input type="submit" name="submit" value="upload" id ="submitButton">
    </form>

    <form action="../controller/updateUserData.php" method = "POST">
    
        <div>
            <label for="languages">Languages</label>
            <input type="text" id = "languages" class = "box" name = "languages">
        </div>

        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" id = "phone_number"  class = "box" name = "phone_number">
        </div>

        <div>
            <label for="bio">Introduce Yourself</label>
            <input type="text" id = "bio"  class = "box" name = "bio">
        </div>

        <div id = "buttonContainer">
            <button type = "submit" class = "buttons">Save</button>
        </div>

    </form>

    <form action="./propertiesFormView.php">
        <button type = "submit" class = "buttons">Complete Your Listing</button>
    </form>
</div>

<script src="../public/js/profileForm.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>