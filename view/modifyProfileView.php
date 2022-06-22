
<?php $title = "Modify Profile";?>


<?php ob_start();?>
<section id = "modifyProfileSection">
    <div class = "personalInformationContainer profileFormsBorder">
        <h2>Modify Profile</h2>
     
        <form action="index.php" method = "POST" id = "modifyFormM" enctype="multipart/form-data">
            
            <div id = "photoContainerM">
                <div id = "profilePhotoM">
                    <img id = "photoM" src= "<?php if($_SESSION['folder']) {echo $_SESSION['folder'];} else { echo $_SESSION['profileImgLocation'];}?>"/>
                    <input type="file" id = "fileM" name = "uploadFile">
                    <label for="fileM" id = "uploadButtonM">Choose Photo</label>
                    <input type="hidden" name="action" value="uploadImg">
                </div>
            </div>
            
            <div id="row1" class="flexRow">
                
                <div id = "phoneBox" >
                    <div>
                        <label for="phoneNumber">Phone Number:</label>
                        <span id="alertMesg">Please Check Your Phone Number</span>
                    </div>
                    <div>
                        <input type="text" id="phoneNumber" class="box" name="phoneNumber" value = "<?php print_r($_SESSION['phoneNumber']);?>">
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
            
            <div class = "bottomContainerM">
                <input type="textarea" id="userBio" class="box" name="bio" value = "<?php print_r($_SESSION['bio']);?>">
            </div>

            <div class = "bottomContainerM">
                <button type="submit" class="buttons" id="save" name="save">Save Profile Changes</button>
            </div>
            <input type="hidden" name="action" value="updateUserData">

        </form>
    </div>
</section>
<p></p>

<script src="public/js/modifyProfile.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

<!-- /Applications/XAMPP/xamppfiles/htdocs/sites/batch16_project/view/modifyProfileView.php on line 11" id = "photo" /> -->