<?php $title = "Create profile"; ?>

<?php ob_start(); ?>
    <section>
    <form action="index.php?action=checkProfile" method="POST" id="newProfile" enctype="multipart/form-data">
    <h1>Let's create a profile for you</h1>
    <div id="profilePhoto">
        <div>
            
        </div>
        <input type="file" id="file" name="uploadFile">
    </div>
    <input type="text" id="phoneNum" name="phoneNum" placeholder="Phone number ex) +8201031837065">
    <div>
        <select id="year" name="year"></select>
        <select id="month" name="month">
            <option value=1>Jan</option>
            <option value=2>Feb</option>
            <option value=3>Mar</option>
            <option value=4>Apr</option>
            <option value=5>May</option>
            <option value=6>June</option>
            <option value=7>July</option>
            <option value=8>Aug</option>
            <option value=9>Sept</option>
            <option value=10>Oct</option>
            <option value=11>Nov</option>
            <option value=12>Dec</option>
        </select>
        <select id="day" name="day"></select>
    </div>
    <div>
        <label for="male">M</label>
        <input type="radio" id="male" name="gender" value="M">
        <label for="female">F</label>
        <input type="radio" id="female" name="gender" value="F">
        <label for="non-binary">NB</label>
        <input type="radio" id="non-binary" name="gender" value="Nb">
    </div>
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
    <input type="textarea" id="bio" name="bio" placeholder="Write about yourself">
    <input type="submit" id="create" name="create" value="Create profile">
    <p></p>
</form>

    </section>
<script src="./public/js/createProfile.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>