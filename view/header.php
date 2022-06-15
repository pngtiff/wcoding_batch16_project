<header> 
    <h1>Welcome to ROOM EZ !</h1>
    <h2>header</h2> 
    
    <div class="menu">
        <button id="signUpButton"><a href="#">REGISTER</a></button>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="signOutButton"><a href="#">Sign Out</a></button>' : '<button id="signInButton"><a href="#">Sign In</a></button>'; ?>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="settingsButton"><a href="#">Settings</a></button>' : ''; ?>
    </div>
</header>





