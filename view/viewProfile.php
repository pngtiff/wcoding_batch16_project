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
                    $lastOnline = new DateTime($user['last_online']);
                    $currentTime = new DateTime(date('Y-m-d H:i:s'));
                    $diff = $lastOnline->diff($currentTime);
                    if($diff->y == 0) {
                        if($diff->m == 0) {
                            if($diff->d == 0) {
                                if($diff->h == 0) {
                                    echo $diff->i.' minute(s)';
                                } else {
                                    echo $diff->h.' hour(s)';
                                }
                            } else {
                                echo $diff->d.' day(s)';
                            }
                        } else {
                            echo $diff->m.' month(s)';
                        }
                    } else {
                        echo $diff->y.' year(s)';
                    }
                    echo ' ago';
                    // echo '<pre>';
                    // print_r($diff)." KST";
                    // echo '</pre>';
                } ?></p>
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

                <?php if(!empty($_SESSION['uid'])) {
                    if($_REQUEST['user'] == $_SESSION['uid']) { ?>
                <form action="index.php" method='GET'>
                    <button type='submit' id='editProfileButton'>Edit Profile</button>
                    <input type="hidden" name = "action" value = "modifyProfile">
                    <input type="hidden" name = "user" value = "<?= $_SESSION['uid']?>">
                </form>
                <?php }} ?>
            </div>
        </div>
    </div>
    <?php include('listPropertiesView.php'); ?> 
</div>
</section>

<?php $content = ob_get_clean();?>
<?php require('template.php');?>
