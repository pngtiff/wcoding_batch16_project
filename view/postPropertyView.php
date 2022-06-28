<?php
$title = "Post new property";
ob_start();?>
<section>
    <form action="index.php" method="post" id="postPropertyForm" enctype="multipart/form-data">
        <label for="title">
            <span>Title</span>
            <input type="text" name="title" id="title" >
            <span class='hide'>At least 6 charachters</span>
        </label>
        <label for="country">
            <span>Country</span>
            <select name="country" id="country" >
                <!-- TODO: Add more countries -->
                <option value="KR">South Korea</option>
            </select>
            <span class="hide">Select one</span>
        </label>
        <label for="provincePost">
            <span>Province/Special City</span>
            <select name="province" id="provincePost" >
                <option selected disabled>Select a Province/Special City</option>
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
            <span class="hide">Select one</span>
        </label>
        <label for="cityPost">
            <span>City/District</span>
            <select name="city" id="cityPost" ></select>
            <span class="hide">Select one</span>
        </label>
        <label for="district">
            <span>District</span>
            <select name="district" id="district"></select>
            <span class="hide">Select one</span>
        </label>
        <label for="address1">
            <span>Address 1</span>
            <input type="text" name="address1" id="address1" >
            <span class='hide'>At least 6 charachters</span>
        </label>
        <label for="address2">
            <span>Address 2</span>
            <input type="text" name="address2" id="address2">
            <span class='hide'>At least 6 charachters</span>
        </label>
        <label for="zipcode">
            <span>Zipcode</span>
            <input type="text" name="zipcode" id="zipcode" >
            <span class="hide">Enter real zipcode</span>
        </label>
        <label for="propertyTypePost" >
            <span>Property Type</span>
            <select name="propertyType" id="propertyTypePost">
                <option value="1">Apartment</option>
                <option value="2">Officetel</option>
                <option value="3">Villa</option>
                <option value="4">House</option>
                <option value="5">Sharehouse</option>
                <option value="6">Residential hotel</option>
            </select>
            <span class="hide">Select one</span>
        </label>
        <label for="roomTypePost">
            <span>Room Type</span>
            <select name="roomType" id="roomTypePost" >
                <option value="1">Private room</option>
                <option value="2">Shared room</option>
                <option value="3">Entire place</option>
            </select>
            <span class="hide">Select one</span>
        </label>
        <label for="roomNum">
            <span>Number of bedrooms</span>
            <input type="number" name="roomNum" id="roomNum" >
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="bedNum">
            <span>Number of beds</span>
            <input type="number" name="bedNum" id="bedNum">
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="bathNum">
            <span>Number of baths</span>
            <input type="number" name="bathNum" id="bathNum" >
            <span class='hide'>Number between 1 and 100</span>
        </label>
        <label for="furnished">
            <span>Furnished</span>
            <input type="checkbox" name="furnished" id="furnished">
            <span class="hide">Check if furnished</span>
        </label>
        <label for="size">
            <span>
                Size (m<sup>2</sup>)
            </span>
            <input type="number" name="size" id="size" >
            <span class='hide'>Number between 1 and 10000</span>
        </label>
        <label for="price">
            <span>Price(Monthly/Won)</span>
            <input type="number" name="price" id="price" >
            <span class='hide'>Number greater than 0</span>
        </label>
        <label for="description">
            Description
            <textarea name="description" id="description" cols="23" rows="12" charswidth="100" name="text_body"></textarea>
            <span class="hide">At least 6 charachters</span>
        </label>
        <label for="bankAccNum">
            <span>Bank Account Number</span>
            <input type="number" name="bankAccNum" id="bankAccNum" >
            <span class="hide">Enter real bank account number</span>
        </label>
        <label for="addImg">
            <span>Add an Image</span>
            <button id="addImg">Add</button>
            <span class="hide">(At least 2, at most 20)</span>
        </label>
        <div id="photosPreview"></div>
        <input type="hidden" name="action" value="postProperty">
        <button type="submit" id="postPropertyButton">SUBMIT</button>
    </form>

</section>
<script src="./public/js/postProperty.js"></script>
<?php
$content = ob_get_clean();
include('template.php');
?>