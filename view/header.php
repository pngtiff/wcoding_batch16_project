<header> 
    <!-- <h2>header</h2>  -->
    
    <h1>BATCH 16 (awesome) PROJECT : ROOM EZ !</h1>
    <div class="menu">
        <button id="signUpButton"><a href="#">REGISTER</a></button>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="signOutButton"><a href="#">Sign Out</a></button>' : '<button id="signInButton"><a href="#">Sign In</a></button>'; ?>
        <?php echo (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") ? '<button id="settingsButton"><a href="#">Settings</a></button>' : ''; ?>
    </div>
    <nav>
        <div class="dropdown">
            <button class="dropbtn">About Us</button>
            <div class="dropdown-content">
                <a href="">Who are we?</a>
                <a href="">What do we do?</a>
                <a href="">Contact us</a>
            </div>
        </div>
        <div class="dropdown2">
            <button class="dropbtn2">Browse</button>
            <div class="dropdown-content2">
                <a href="">Search Most Recent Listings</a>
                <a href="">Search All Listings</a>
                <a href="">Search for a renter</a>
                <a href="">Find a Roommate</a>
            </div>
        </div>
        <div class="dropdown3">
            <button class="dropbtn3">Post</button>
            <div class="dropdown-content3">
                <a href="">Become a Host</a>
                <a href="">Post a New Listing</a>
            </div>
        </div>
        <div class="dropdown4">
            <button class="dropbtn4">Account</button>
            <div class="dropdown-content4">
                <a href="">View My Profile</a>
                <a href="">Edit My Profile</a>
                <a href="">Logout</a>
            </div>
        </div>
    </nav>
</header>





