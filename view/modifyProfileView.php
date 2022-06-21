
<?php $title = "Modify Profile";?>


<?php ob_start();?>
<section>
    <div class = "personalInformationContainer profileFormsBorder">
        <h2>Modify Profile</h2>
    
        <!-- <form action="index.php" method = "POST" id = "photoFormM" enctype="multipart/form-data">
            <div id = "profilePhotoM">
                <img id = "photoM" src= ""/>
                <input type="file" id = "fileM" name = "uploadFile">
                <label for="fileM" id = "uploadButtonM">Choose Photo</label>
            </div>
            <input type="submit" name="submit" value="Upload" id ="sendPhotoButton">
            <input type="hidden" name="action" value="uploadImg">
        </form>
     -->
     
        <form action="index.php" method = "POST" id = "modifyFormM" enctype="multipart/form-data">
            
            <div id = "phtoFormM">
                <div id = "profilePhotoM">
                    <img id = "photoM" src= "<?php if($_SESSION['folder']) {echo $_SESSION['folder'];} else { echo $_SESSION['profileImgLocation'];}?>"/>
                    <input type="file" id = "fileM" name = "uploadFile">
                    <label for="fileM" id = "uploadButtonM">Choose Photo</label>
                    
                    <input type="hidden" name="action" value="uploadImg">
                </div>
            </div>
            
            <div id = "languageSelection">    
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
    
            <div class = "container phoneNumberMod ">
                <label for="phoneNumberM" class = "labelM">Phone Number</label>
                <input type="text" id = "phoneNumberM"  class = "boxM" name = "phone_number">
            </div>
    
            <div class = "container bioMod ">
                <label for="bio" class = "labelM">Introduce Yourself</label>
                <input type="textarea" id = "bioM"  class = "boxM" name = "bio" placeholder="Modify your bio" rows="4">
            </div>

            <div id = "buttonContainer">
                <button type = "submit" class = "modifyFormButtons">Save</button>
            </div>
            <input type="hidden" name="action" value="updateUserData">
        </form>
    </div>
</section>
<p></p>

<script src="public/js/modifyProfile.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>

<!-- /Applications/XAMPP/xamppfiles/htdocs/sites/batch16_project/view/modifyProfileView.php on line 11" id = "photo" /> -->