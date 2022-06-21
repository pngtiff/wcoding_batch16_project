<?php
$title = "Post new property";
ob_start();?>
<section>
    <form action="index.php" method="post" id="postPropertyForm">
        <label for="title">Title<input type="text" name="title" id="title"></label>
        <label for="country">Country 
            <select name="country" id="country">
                <!-- TODO: Add more countries -->
                <option value="KR">South Korea</option>
            </select>
        </label>
        <label for="province">Province/State<input type="text" name="province" id="province"></label>
        <label for="city">City<input type="text" name="city" id="city"></label>
        <label for="address1">Address 1<input type="text" name="address1" id="address1"></label>
        <label for="address2">Address 2<input type="text" name="address2" id="address2"></label>
        <label for="zipcode">Zipcode<input type="text" name="zipcode" id="zipcode"></label>
        <label for="propertyType">Property Type
            <select name="country" id="country">
                <option value="1">Apartment</option>
                <option value="2">Officetel</option>
                <option value="3">Villa</option>
                <option value="4">House</option>
                <option value="5">Sharehouse</option>
                <option value="6">Residential hotel</option>
            </select>
        </label>
        <label for="roomType">Room Type
            <select name="country" id="country">
                <option value="1">Private room</option>
                <option value="2">Shared room</option>
                <option value="3">Shared unit</option>
                <option value="4">Entire place</option>
            </select>
        </label>
        <label for="size">Size<input type="number" name="size" id="size">m<sup>2</sup></label>
        <label for="price">Price(Monthly)<input type="number" name="price" id="price"></label>
        <label for="description">Description<textarea name="description" id="description"></textarea></label>
        <!-- <input type="file" name="photos[]" id="photos" accept="image/*" multiple> -->
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
                form.append(evt.target);
                photosArr.push(evt.target.files[0])
                photosPreview.innerHTML = ''
                for (let i=0; i<photosArr.length; i++) {
                    let file = photosArr[i]
                    if (file) {
                        let img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        photosPreview.appendChild(img);
                    }
                }
            });
            input.style.display = 'none';
            input.click();
        });
    </script>
</section>
<?php
$content = ob_get_clean();
include('template.php');
?>