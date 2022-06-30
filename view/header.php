<header class="flexColumn">
    <!-- <h2>BATCH 16 (awesome) PROJECT : ROOM EZ !</h2> -->
    <div class="headerContainer">

        <div class="logo">
            <a href="index.php">
                <img src="public/images/output-onlinepngtools.png" alt="logo" width="100px" height="100px">
            </a>
        </div>
        <nav class="nav offsetColor">

            <div class="dropdown2">
                <button class="dropbtn2">Browse</button>
                <div class="dropdown-content2">
                    <a href="#propertiesContainer">Search Most Recent Listings</a>
                    <a href="#propertiesContainer">Search All Listings</a>
                    <a href="">Search for a renter</a>
                    <a href="">Find a Roommate</a>
                </div>
            </div>

            <div class="dropdown3">
                <button class="dropbtn3">Post</button>
                <div class="dropdown-content3">
                    <a href="">Become a Host</a>
                    <a href="index.php?action=viewPostProperty">Post a New Listing</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">About Us</button>
                <div class="dropdown-content">
                    <a href="view/footer.php/.modal-content">Who are we?</a>
                    <a href="">What do we do?</a>
                    <a href="view/footer.php/.contact">Contact us</a>
                </div>
            </div>

            <form id="searchBarContainer" class="offsetFill" >
                <span id="regionSearch">Anywhere</span>
                <span id="priceSearch">Any price</span>
                <span id="propertyTypeSearch">Any type</span>
                <button class="searchButton primaryFill"><i id="magnifying" class="fa-solid fa-magnifying-glass offsetColor"></i></button>
                <div id="formContainer"></div>
                <div id="searchForm" method="post" action="index.php">
                    <div>
                        <span id="regionSearch">Region</span>
                        <span id="priceSearch">Price Range</span>
                        <span id="propertyTypeSearch">Property Type</span>
                    </div>
                    <input type="hidden" name="action" value="search">
                    <div>
                        <select name="province" id="province">
                            <option selected value="-1">Province/Special City</option>
                            <option value="1">Busan</option>
                            <option value="2">Chungcheongbuk-do</option>
                            <option value="3">Chungcheongnam-do</option>
                            <option value="4">Daegu</option>
                            <option value="5">Daejeon</option>
                            <option value="6">Gangwon-do</option>
                            <option value="7">Gwangju</option>
                            <option value="8">Gyeonggi-do</option>
                            <option value="9">Gyeongsangbuk-do</option>
                            <option value="10">Gyeongsangnam-do</option>
                            <option value="11">Incheon</option>
                            <option value="12">Jeju-do</option>
                            <option value="13">Jeollabuk-do</option>
                            <option value="14">Jeollanam-do</option>
                            <option value="15">Sejong-si</option>
                            <option value="16">Seoul</option>
                        </select>
                        <select name="city" id="city">
                            <option value="-1">Select Province/City First</option>
                        </select>
                        <span class="multi-range">
                            <input type="range" min="0" max="50" value="0" id="lower">
                            <input type="range" min="0" max="50" value="50" id="upper">
                        </span>
                        <select name="propertyType" id="propertyType" class="filter">
                            <option value="any">Property Type</option>
                            <option value="1">Apartment</option>
                            <option value="2">Officetel</option>
                            <option value="3">Villa</option>
                            <option value="4">House</option>
                            <option value="5">Shared House</option>
                            <option value="6">Residential Hotel</option>
                        </select>
                        <select name="roomType" id="roomType" class="filter">
                            <option value="any">Room Type</option>
                            <option value="1">Private Room</option>
                            <option value="2">Shared Room</option>
                            <option value="3">Entire Place</option>
                        </select>
                        <button class="searchButton primaryFill"><i id="magnifying" class="fa-solid fa-magnifying-glass offsetColor"></i><span>Search</span></button>
                    </div>
                </div>
            </form>
        </nav>

        <div class="signInUp">
            <!-- Changing interface once signed in/signed out -->
            <div class="dropdown4">
                <button class="dropbtn4"><a href="<?= (isset($_SESSION['uid'])) ? "index.php?action=profile&user={$_SESSION['uid']}" : "#"; ?>"><img src="<?= (isset($_SESSION['profile_img'])) ? './profile_images/' . $_SESSION['profile_img'] : "./public/images/defaultProfile.jpg" ?>" alt="defaultPic"></a></button>
                <div class="dropdown-content4">

                    <?php
                    if (!empty($_SESSION['firstName'])) {
                        // echo '<img src="' . $_SESSION['profile_img']. '" width="500px" height="400px">';
                        echo '<a href="index.php?action=profile&user=' . $_SESSION['uid'] . '">View My Profile</a>';
                        echo '<a href="index.php?action=modifyProfile&user=' . $_SESSION['uid'] . '">Edit My Profile</a>';
                    }
                    ?>
                    <?php echo (!empty($_SESSION['firstName'])) ? '' : '<button id="signUpButton" class="primaryBtn"><a href="#">Register</a></button>'; ?>
                    <?php echo (!empty($_SESSION['firstName'])) ? '<a href="index.php?action=signOut">Sign Out</a>' : '<button id="signInButton" class="primaryBtn"><a href="#">Sign In</a></button>'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal section -->
    <?php if (empty($_SESSION['email'])) { ?>
        <div id="modalBox" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div id="banner-container"></div>
                <span class="close">&times;</span>
                <div class="form-container">
                    <div id="signIn-container">
                        <?php include('view/signInView.php'); ?>
                    </div>
                    <div id="signUp-container">
                        <?php include('view/signUpView.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</header>


<div class="headerBackground offsetFill" ></div>