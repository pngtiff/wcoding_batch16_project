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
                <div>
                    <span id="regionSearch">Anywhere</span>
                    <span id="priceSearch">Any price</span>
                    <span id="propertyTypeSearch">Any type</span>
                </div>
                <button class="searchButton primaryFill"><i id="magnifying" class="fa-solid fa-magnifying-glass offsetColor"></i></button>
                <div id="formContainer"></div>
                <div id="searchForm" method="post" action="index.php">
                    <div>
                        <span id="regionSearch" class="searchBarDots" onclick="currentSearch(1)">Region</span>
                        <span id="priceSearch" class="searchBarDots" onclick="currentSearch(2)">Price Range</span>
                        <span id="propertyTypeSearch" class="searchBarDots" onclick="currentSearch(3)">Type </span>
                        <button class="searchButton primaryFill"><i id="magnifying" class="fa-solid fa-magnifying-glass offsetColor"></i></button>
                    </div>
                    <input type="hidden" name="action" value="search">
                    <div>
                        <div class="searchBarSlides">
                            <div id="provinceSearchMenu" class="multi-selector">
                                <div class="provinceSearchBar select-field">
                                    <p class="choose">Any Province/Special City</p>
                                    <p class="down-arrow">&blacktriangledown;</p>
                                </div>
                                <div id="provinceSearchList" class="list modifyList">
                                    <label><input type="radio" name="province" checked value="-1">Province/Special City</label>
                                    <label><input type="radio" name="province" value="1">Busan</label>
                                    <label><input type="radio" name="province" value="2">Chungcheongbuk-do</label>
                                    <label><input type="radio" name="province" value="3">Chungcheongnam-do</label>
                                    <label><input type="radio" name="province" value="4">Daegu</label>
                                    <label><input type="radio" name="province" value="5">Daejeon</label>
                                    <label><input type="radio" name="province" value="6">Gangwon-do</label>
                                    <label><input type="radio" name="province" value="7">Gwangju</label>
                                    <label><input type="radio" name="province" value="8">Gyeonggi-do</label>
                                    <label><input type="radio" name="province" value="9">Gyeongsangbuk-do</label>
                                    <label><input type="radio" name="province" value="10">Gyeongsangnam-do</label>
                                    <label><input type="radio" name="province" value="11">Incheon</label>
                                    <label><input type="radio" name="province" value="12">Jeju-do</label>
                                    <label><input type="radio" name="province" value="13">Jeollabuk-do</label>
                                    <label><input type="radio" name="province" value="14">Jeollanam-do</label>
                                    <label><input type="radio" name="province" value="15">Sejong-si</label>
                                    <label><input type="radio" name="province" value="16">Seoul</label>
                                </div>
                            </div>
                            <div id="citySearchMenu" class="multi-selector">
                                <div class="citySearchBar select-field">
                                    <p class="choose">Any City/District</p>
                                    <p class="down-arrow">&blacktriangledown;</p>
                                </div>
                                <div id="citySearchList" class="list modifyList">
                                    <label><input type="radio" value="-1" checked>Select Province/City First</label>
                                </div>
                            </div>
                        </div>
                        <div class="searchBarSlides">
                            <div id="range"></div>
                        </div>
                        <div class="searchBarSlides">
                            <div id="propertySearchMenu" class="multi-selector">
                                <div class="propertySearchBar select-field">
                                    <p class="choose">Any Property Type</p>
                                    <p class="down-arrow">&blacktriangledown;</p>
                                </div>
                                <div id="propertySearchList" class="list modifyList">
                                    <label><input type="radio" name="propertyType" value="any" checked>Any Property Type</label>
                                    <label><input type="radio" name="propertyType" value="1">Apartment</label>
                                    <label><input type="radio" name="propertyType" value="2">Officetel</label>
                                    <label><input type="radio" name="propertyType" value="3">Villa</label>
                                    <label><input type="radio" name="propertyType" value="4">House</label>
                                    <label><input type="radio" name="propertyType" value="5">Shared House</label>
                                    <label><input type="radio" name="propertyType" value="6">Residential Hotel</label>
                                </div>
                            </div>
                            <div id="roomSearchMenu" class="multi-selector">
                                <div class="roomSearchBar select-field">
                                    <p class="choose">Any Room Type</p>
                                    <p class="down-arrow">&blacktriangledown;</p>
                                </div>
                                <div id="roomSearchList" class="list modifyList">
                                    <label><input type="radio" name="roomType" value="any" checked>Any Room Type</label>
                                    <label><input type="radio" name="roomType" value="1">Private Room</label>
                                    <label><input type="radio" name="roomType" value="2">Shared Room</label>
                                    <label><input type="radio" name="roomType" value="3">Entire Place</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </nav>

        <div class="signInUp">
            <!-- Changing interface once signed in/signed out -->
            <div class="dropdown4">
                <?php if(empty($_SESSION['firstName'])): echo '<div id="noUser">'?>
                    <button class="dropbtn4"><a href="<?= (isset($_SESSION['uid'])) ? "index.php?action=profile&user={$_SESSION['uid']}" : "#"; ?>"><img src="<?= (isset($_SESSION['profile_img'])) ? './profile_images/' . $_SESSION['profile_img'] : "./public/images/defaultProfile.jpg" ?>" alt="defaultPic"></a></button>
                    <?php echo '</div>'; endif; ?>
                <?php if(!empty($_SESSION['firstName'])): ?> 
                    <button class="dropbtn4"><a href="<?= (isset($_SESSION['uid'])) ? "index.php?action=profile&user={$_SESSION['uid']}" : "#"; ?>"><img src="<?= (isset($_SESSION['profile_img'])) ? './profile_images/' . $_SESSION['profile_img'] : "./public/images/defaultProfile.jpg" ?>" alt="defaultPic"></a></button>
                    <?php endif; ?>
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