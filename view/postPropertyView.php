<?php
$title = "Post new property";
ob_start();?>
<section>
    <form action="index.php" method="post" id="postPropertyForm" enctype="multipart/form-data">
        <label for="title">Title<input type="text" name="title" id="title"></label>
        <label for="country">Country 
            <select name="country" id="country">
                <!-- TODO: Add more countries -->
                <option value="KR">South Korea</option>
            </select>
        </label>
        <label for="province">Province/State
            <select name="province" id="province">
                <option disabled selected>Select province</option>
                <option value="1">Chungcheongbuk-do</option>
                <option value="2">Chungcheongnam-do</option>
                <option value="3">Gangwon-do</option>
                <option value="4">Gyeonggi-do</option>
                <option value="5">Gyeongsangbuk-do</option>
                <option value="6">Gyeongsangnam-do</option>
                <option value="7">Jeollabuk-do</option>
                <option value="8">Jeollanam-do</option>
                <option value="9">Jeju Special Self-governing Province</option>
            </select>
        </label>
        <label for="city">City<select name="city" id="city"></select></label>
        <label for="district">District<select name="district" id="district"></select></label>
        <label for="address1">Address 1<input type="text" name="address1" id="address1"></label>
        <label for="address2">Address 2<input type="text" name="address2" id="address2"></label>
        <label for="zipcode">Zipcode<input type="text" name="zipcode" id="zipcode"></label>
        <label for="propertyType">Property Type
            <select name="propertyType" id="propertyType">
                <option value="1">Apartment</option>
                <option value="2">Officetel</option>
                <option value="3">Villa</option>
                <option value="4">House</option>
                <option value="5">Sharehouse</option>
                <option value="6">Residential hotel</option>
            </select>
        </label>
        <label for="roomType">Room Type
            <select name="roomType" id="roomType">
                <option value="1">Private room</option>
                <option value="2">Shared room</option>
                <option value="3">Shared unit</option>
                <option value="4">Entire place</option>
            </select>
        </label>
        <label for="bedroom">Number of bedrooms<input type="number" name="bedroom" id="bedroom"></label>
        <label for="bed">Number of beds<input type="number" name="bed" id="bed"></label>
        <label for="bath">Number of baths<input type="number" name="bath" id="bath"></label>
        <label for="furnished">Furnished<input type="checkbox" name="furnished" id="furnished"></label>
        <label for="size">
            Size
            <span>
                <input type="number" name="size" id="size">m<sup>2</sup></label>
            </span>
        <label for="price">Price(Monthly)<input type="number" name="price" id="price"></label>
        <label for="description">Description<textarea name="description" id="description"></textarea></label>
        <label for="bankAccNum">Bank Account Number<input type="number" name="bankAccNum" id="bankAccNum"></label>
        
        <button id="addImg">Add img</button>
        <div id="photosPreview"></div>
        <input type="hidden" name="action" value="postProperty">
        <button type="submit">SUBMIT</button>
    </form>

    <script>
        let form = document.querySelector('#postPropertyForm'),
            photosArr = new Array(),
            photosPreview = document.querySelector('#photosPreview');

        document.querySelector('form button#addImg').addEventListener('click', function(e) {
            e.preventDefault();
            var nb_attachments = document.querySelectorAll("form input[type='file']").length;
            var input = document.createElement('input')
            input.type="file" 
            input.name='attachment-' + nb_attachments;
            input.accept = 'image/*'
            input.addEventListener('change', function(evt) {
                var f = evt.target.files[0];
                form.appendChild(evt.target);
                photosArr.push(evt.target.files[0])
                photosPreview.innerHTML = ''
                for (let i=0; i<photosArr.length; i++) {
                    let file = photosArr[i]
                    if (file) {
                        let img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        let div = document.createElement('div');
                        let title = document.createElement('input');
                        title.name = evt.target.name + 'desc';
                        title.type = 'text';
                        title.placeholder = "Enter a short description for an image";
                        let closeBttn = document.createElement('span');
                        closeBttn.innerHTML = '&times;';
                        closeBttn.className = 'closeBttn';
                        div.appendChild(title);
                        div.appendChild(closeBttn);
                        div.appendChild(img);
                        photosPreview.appendChild(div);
                    }
                }
            });
            input.style.display = 'none';
            input.click();
        });
        let province = document.querySelector('#province');
        let city = document.querySelector('#city');
        let district = document.querySelector('#district');
        province.addEventListener('change', function(e) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `index.php?action=getCities&province=${e.target.options[e.target.selectedIndex].text}`);
            xhr.onload = function (e) {
                if (xhr.status == 200) {
                    city.innerHTML = xhr.responseText;
                }
            }
            xhr.send(null)
        })
        city.addEventListener('change', function(e) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `index.php?action=getDistrict&city=${e.target.options[e.target.selectedIndex].text}`);
            xhr.onload = function (e) {
                if (xhr.status == 200) {
                    district.innerHTML = xhr.responseText;
                }
            }
            xhr.send(null)
        })
    </script>
</section>
<?php
$content = ob_get_clean();
include('template.php');
?>