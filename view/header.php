<header> 
    <h1>BATCH 16 (awesome) PROJECT : ROOM EZ !</h1>
    <h2>header</h2> 
    
    <div class="menu">
        <button id="signUpButton"><a href="#">REGISTER</a></button>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="signOutButton">Sign Out/button>' : '<button id="signInButton">Sign In</button>'; ?>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="settingsButton">Settings</button>' : ''; ?>
    </div>
</header>





