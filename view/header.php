
<header class="flexColumn"> 
    <!-- <h2>BATCH 16 (awesome) PROJECT : ROOM EZ !</h2> -->
    <div class="headerContainer"> 
        <div class="logo">
            <a href="#">
            <img src="public/images/output-onlinepngtools.png" alt="logo" width="90px" height="90px">
            </a>
        </div>
        <nav class="nav">
            <div class="dropdown">
                <button class="dropbtn">About Us</button>
                <div class="dropdown-content">
                    <a href="#intro">Who are we?</a>
                    <a href="">What do we do?</a>
                    <a href=".contact">Contact us</a>
                </div>
            </div>
            <div class="dropdown2">
                <button class="dropbtn2">Browse</button>
                <div class="dropdown-content2">
                    <a href="#propertiesContainer">Search Most Recent Listings</a>
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
                    <a href="view/profileFormView.php">Edit My Profile</a>
                    <a href="">Logout</a>
                </div>
            </div>
        </nav>
        <div class="signInUp">
            <!-- Changing interface once signed in/signed out -->
            <?php echo (!empty($_SESSION['firstName'])) ? '<button id="settingsButton"><a href="#">Settings</a></button>' : '<button id="signUpButton"><a href="#">REGISTER</a></button>'; ?>
            <?php echo (!empty($_SESSION['firstName'])) ? '<button id="signOutButton"><a href="index.php?action=signOut">Sign Out</a></button>' : '<button id="signInButton"><a href="#">Sign In</a></button>'; ?>
        </div>
    </div>
</header>





