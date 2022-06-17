
<?php $title = "Welcome to Room-EZ";?>


<?php ob_start();?>
<div class = "personalInformationContainer">
    <h2>Modify Profile</h2>

    <form action="index.php" method = "POST" id = "photoForm" enctype="multipart/form-data">
        <div id = "profilePhoto">
            <img src= "../profile_images/ <?php echo $_SESSION['fileName']; ?>" id = "photo" />
            <input type="file" id = "file" name = "uploadFile">
            <label for="file" id = "uploadButton">Choose Photo</label>
        </div>
        <input type="submit" name="submit" value="upload" id ="submitButton">
        <input type="hidden" name="action" value="uploadImg">
    </form>

    <form action="index.php" method = "POST">
    
        <div>    
            <label for="language">Which languages do you speak? (hold CMD/Ctrl to select multiple)</label>
            <select id="language" name="language[]" multiple>
                <option value="HK">Cantonese</option>
                <option value="ZH">Chinese(Mandarin)</option>
                <option value="NL">Dutch</option>
                <option value="EN">English</option>
                <option value="FR">French</option>
                <option value="DE">German</option>
                <option value="HI">Hindi</option>
                <option value="IN">Indonesian</option>
                <option value="IT">Italian</option>
                <option value="JA">Japanese</option>
                <option value="KO">Korean</option>
                <option value="VI">Vietnamese</option>
                <option value="PT">Portugese</option>
                <option value="RU">Russian</option>
                <option value="ES">Spanish</option>
            </select>
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
        <input type="hidden" name="action" value="updateUserData">

    </form>
</div>

<script src="public/js/modifyProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>