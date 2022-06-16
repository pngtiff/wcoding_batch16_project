<header> 
    <h1>BATCH 16 (awesome) PROJECT : ROOM EZ !</h1>
    <h2>header</h2> 
    
    <div class="menu">
        <!-- Changing interface once signed in/signed out -->
        <?php echo (!empty($_SESSION['firstName'])) ? '<button id="settingsButton"><a href="#">Settings</a></button>' : '<button id="signUpButton"><a href="#">REGISTER</a></button>'; ?>
        <?php echo (!empty($_SESSION['firstName'])) ? '<button id="signOutButton"><a href="index.php?action=signOut">Sign Out</a></button>' : '<button id="signInButton"><a href="#">Sign In</a></button>'; ?>
    </div>
</header>





