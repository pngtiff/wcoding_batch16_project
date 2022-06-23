<?php $title = 'User Profile';?>

<?php ob_start();?>
<section id="viewProfile">
<div>
    <button id='homeButton'><a href='index.php'>Home</a></button>
</div>
<div id='profileContainer' class='flexColumn'>
    <div id='userInfo' class='flexColumn'>
        <div id='userMain'>
            <div><div id='userImgContainer'><img id='userImg' src="<?php if($userImg = $user['profile_img']) {echo './profile_images/'.$user['profile_img'];} else {echo './public/images/defaultProfile.jpg';}?>" alt="<?= $user['id'].'profile image';?>"></div></div>
            <div>
                <div>
                    <h2 id='userName'><?= $user['first_name'];?></h2>
                    <p>Last active: <?php if($lastOnline = $user['last_online']){
                    $lastOnline = $user['last_online'];
                    $currentTime = date('Y-m-d H:i:s');
                    echo $lastOnline." KST";
                }
                // TODO: last online status based on session end datetime ?></p>
                </div>
            </div>
        </div>
        <div id='userDetails'>
            <div>
                <p>Age: <?php if($dob = $user['dob']){
                    $dob = $user['dob'];
                    $today = date('Y-m-d');
                    $diff = date_diff(date_create($dob), date_create($today));
                    $age = $diff->format('%y');
                    echo $age;
                }
                    ?></p>
                <p>Gender: <?php if($gender = $user['gender']) {
                    if($gender=='F'){
                        echo 'Female';
                    } elseif($gender=='M') {
                        echo 'Male';
                    } else {
                        echo 'Non-binary';
                    }};?></p>
                <p>Language(s):</p>
                <ul>
                    <?php 
                    $languages = $user['languages'];
                    foreach($languages as $language) {
                        echo '<li>'.$language.'</li>';
                    } ?>
                </ul>
                <button id='contact'>Contact</button>
            </div>
            <div>
                <p><?php if($bio=$user['bio']) {
                    echo nl2br($user['bio']);
                    } else {
                        echo 'No bio yet';
                    };?></p>
                <?php if(!empty($_SESSION['email'])) { ?>
                
                <form action="index.php" method='GET'>
                    <button type='submit' id='editProfileButton'>Edit Profile</button>
                    <input type="hidden" name = "action" value = "modifyProfile">
                    <input type="hidden" name = "user" value = "<?= $_SESSION['uid']?>">
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include('listPropertiesView.php'); ?> 
</div>
</section>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>