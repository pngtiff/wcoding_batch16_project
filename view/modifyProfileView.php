
<?php $title = "Modify Profile";?>


<?php ob_start();?>
<section id = "modifyProfileSection">
    <div class = "personalInformationContainer profileFormsBorder">
        <h2>Modify Profile</h2>
     
        <form action="index.php" method = "post" id = "modifyFormM" enctype="multipart/form-data">
            
            <div id = "photoContainerM">
                <div id = "profilePhotoM">
                    <img id = "photoM" src= "./profile_images/<?= $data['profile_img']?>"/>
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
                        <input type="text" id="phoneNumber" class="box" name="phoneNumber" value = "<?= $data['phone_number']?>">
                    </div>
                </div>
    
                <div id="langDetails">
                    <div>
                        <label for="language">Which languages do you speak?</label>
                        <select id="language" name="language">
                                <option id="HK" value="HK">Cantonese</option>
                                <option id="ZH" value="ZH">Chinese(Mandarin)</option>
                                <option id="NL" value="NL">Dutch</option>
                                <option id="EN" value="EN">English</option>
                                <option id="DE" value="DE">German</option>
                                <option id="FR" value="FR">French</option>
                                <option id="HI" value="HI">Hindi</option>
                                <option id="IN" value="IN">Indonesian</option>
                                <option id="IT" value="IT">Italian</option>
                                <option id="JA" value="JA">Japanese</option>
                                <option id="KO" value="KO">Korean</option>
                                <option id="VI" value="VI">Vietnamese</option>
                                <option id="PT" value="PT">Portugese</option>
                                <option id="RU" value="RU">Russian</option>
                                <option id="ES" value="ES">Spanish</option>
                        </select>
                        <input type="hidden" id="userLang" name="userLang" value="">
                    </div>
                </div>

            </div>
            
            <div class = "bottomContainerM">
                <input type="textarea" id="userBio" class="box" name="bio" value = "<?= $data['bio']?>">
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