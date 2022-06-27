
<header class="flexColumn"> 
    <!-- <h2>BATCH 16 (awesome) PROJECT : ROOM EZ !</h2> -->
    <div class="headerContainer"> 

        <div class="logo">
            <a href="index.php">
                <img src="public/images/output-onlinepngtools.png" alt="logo" width="100px" height="100px">
            </a>
        </div>
        <nav class="nav">

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
                    <a href=".contact">Contact us</a>
                </div>
            </div>

            <form id="searchBarContainer" method="post" action="index.php">
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
                <select name="city" id="city" ></select>
                <select name="rentRange" id="rentRange" class="filter">
                    <option value="any">Price Range :</option>
                    <option value="500000">Less than 500k/month</option>
                    <option value="1000000">Between 500k and 1M/ month</option>
                    <option value="1500000">More than 1M/month</option>
                </select>

                <select name="propertyType" id="propertyType" class="filter">
                    <option value="any">Property Type :</option>
                    <option value="1">Apartment</option>
                    <option value="2">Officetel</option>
                    <option value="3">Villa</option>
                    <option value="4">House</option>
                    <option value="5">Shared House</option>
                    <option value="6">Residential Hotel</option>
                </select>
                
                <select name="roomType" id="roomType" class="filter">
                    <option value="any">Room Type :</option>
                    <option value="1">Private Room</option>
                    <option value="2">Shared Room</option>
                    <option value="3">Entire Place</option>
                </select>
                <button class="searchButton"><img src="public/images/magnifying_glass.png" id="magnifying"></button>
                <input type="hidden" name="action" value="search">
            </form>            
        </nav>

        <div class="signInUp">
            <!-- Changing interface once signed in/signed out -->
            <div class="dropdown4">
                <button class="dropbtn4"><a href="<?= (isset($_SESSION['uid'])) ? "index.php?action=profile&user={$_SESSION['uid']}" : "#" ;?>"><img src="<?= (isset($_SESSION['profile_img'])) ? './profile_images/'.$_SESSION['profile_img'] : "./public/images/defaultProfile.jpg" ?>" alt="defaultPic"></a></button>
                <div class="dropdown-content4">
                    <?php echo (!empty($_SESSION['firstName'])) ? '<button id="settingsButton"><a href="#">Settings</a></button>' : '<button id="signUpButton"><a href="#">Register</a></button>'; ?>
                    <?php echo (!empty($_SESSION['firstName'])) ? '<button id="signOutButton"><a href="index.php?action=signOut">Sign Out</a></button>' : '<button id="signInButton"><a href="#">Sign In</a></button>'; ?>
                    
                    <?php 
                        if (!empty($_SESSION['firstName'])){
                            // echo '<img src="' . $_SESSION['profile_img']. '" width="500px" height="400px">';
                            echo '<a href="index.php?action=profile&user='.$_SESSION['uid'].'">View My Profile</a>';
                            echo '<a href="index.php?action=modifyProfile&user='.$_SESSION['uid'].'">Edit My Profile</a>';

                        }
                    ?>                    
                </div>
            </div>
        </div>
    </div>
      <!-- Modal section -->
<?php if (empty($_SESSION['email'])) {?>
  <div id="modalBox" class="modal">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div id="banner-container"></div>
      <span class="close">&times;</span>
      <div class="form-container">
        <div id="signIn-container">
          <?php include('view/signInView.php');?>
        </div>
        <div id="signUp-container">
          <?php include('view/signUpView.php');?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</header>

<div class="headerBackgroundColor"></div>











