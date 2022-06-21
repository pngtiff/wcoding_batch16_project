<?php $title = "Welcome to Room-EZ"; ?>


<?php ob_start(); ?>
<section id="modifyProfile">
    <div class="personalInformationContainer profileFormsBorder">
        <h2>Modify Profile</h2>
        <form action="index.php" method="POST" id="updateForm" enctype="multipart/form-data">

            <div id="profilePhoto">
                <img src="./profile_images/<?php echo $_SESSION['fileName']; ?>" id="photo" />
            </div>
            <input type="file" id="file" name="uploadFile">
            <label for="file" id="uploadButton" class="customFileButton">Choose Profile Photo</label>
            <div id="row1" class="flexRow">
                <div id="phoneBox">
                    <div>
                        <label for="phoneNumber">Phone Number:</label>
                    </div>
                    <div>
                        <input type="text" id="phoneNumber" class="box" name="phoneNumber" placeholder="ex)...">
                    </div>
                </div>
                <div id="langDetails">
                    <label for="language">Which languages do you speak? <span>(hold CMD/Ctrl to select multiple)</span></label>
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
            </div>
            <input type="textarea" id="userBio" class="box" name="bio" placeholder="Introduce yourself">
            <button type="submit" class="buttons" id="save" name="save">Save Profile Changes</button>
            <input type="hidden" name="action" value="updateUserData">

        </form>
    </div>
</section>

<script src="public/js/modifyProfile.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

<!-- /Applications/XAMPP/xamppfiles/htdocs/sites/batch16_project/view/modifyProfileView.php on line 11" id = "photo" /> -->