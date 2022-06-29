let postPropertyForm = document.querySelector('#postPropertyForm'),
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
        postPropertyForm.appendChild(evt.target);
        let img = document.createElement('img');
        img.src = URL.createObjectURL(f);
        let div = document.createElement('div');
        let title = document.createElement('input');
        title.name = 't-' + evt.target.name;
        title.type = 'text';
        // title.setAttribute('required', true);
        title.placeholder = "Enter a short description for an image";
        let closeBttn = document.createElement('span');
        closeBttn.innerHTML = '&times;';
        closeBttn.className = 'closeBttn';
        closeBttn.addEventListener('click', (e) => {
            postPropertyForm.removeChild(input)
            photosPreview.removeChild(e.target.parentElement);
            let files = document.querySelectorAll("form input[type='file']")
            let descriptions = photosPreview.querySelectorAll("input")
            files.forEach((file, idx) => {
                file.name = 'attachment-' + idx;
                descriptions[idx].name = 't-' + file.name
            })
        })
        let span = document.createElement('span');
        span.textContent = 'At least 6 charachters for description';
        span.className = 'hide';
        div.appendChild(title);
        div.appendChild(closeBttn);
        div.appendChild(span);
        div.appendChild(img);
        photosPreview.appendChild(div);
    });
    input.style.display = 'none';
    input.click();
});
let countries = ['KR']
let province = document.querySelector('#provincePost');
let city = document.querySelector('#cityPost');
let district = document.querySelector('#district');
province.addEventListener('change', function(e) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `index.php?action=getCities&province=${e.target.options[e.target.selectedIndex].text}`);
    xhr.onload = function (e) {
        if (xhr.status == 200) {
            city.innerHTML = xhr.responseText;
            district.innerHTML = ''
        }
    }
    xhr.send(null)
})
city.addEventListener('change', function(e) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `index.php?action=getDistricts&city=${e.target.options[e.target.selectedIndex].text}`);
    xhr.onload = function (e) {
        if (xhr.status == 200) {
            district.innerHTML = xhr.responseText;
        }
    }
    xhr.send(null)
})

function checkTitle(e) {
    return (e.value.length >= 4 && e.value.length <= 50)
}

function checkSelect(e) {
    return e.value >= -1
}

function checkCountry(e) {
    return countries.indexOf(e.value) >= 0
}

function checkAddress(e) {
    return (e.value.length >= 4 && e.value.length <= 255)
}

function checkZip(e) {
    return /^[a-z0-9]{5,10}$/i.test(e.value)
}

function checkNumber(e) {
    return (e.value > 0 && e.value < 100)
}

function checkSize(e) {
    return (e.value > 0 && e.value < 1000)
}

function checkPrice(e) {
    return e.value > 0
}

function checkImg() {
    let imgs = document.querySelectorAll("form input[type='file']")
    let desc = document.querySelectorAll("#photosPreview input[type='text']")
    if (imgs.length < 2 || imgs.length > 20) return 
    for (i=0; i<imgs.length; i++) {
        if(imgs[i].files[0].size > 10485760 || !checkDescription(desc[i])) {
            return
        }
    }
    return true
}

function checkDescription(e) {
    return (e.value.length >= 4 && e.value.length <= 255)
}

function checkBank(e) {
    return (e.value.length >= 4 && e.value.length <= 20)
}
let title = document.querySelector('#title');
let country = document.querySelector('#country');
let address1 = document.querySelector('#address1');
let zipcode = document.querySelector('#zipcode');
let propertyType = document.querySelector('#propertyTypePost');
let roomType = document.querySelector('#roomTypePost');
let roomNum = document.querySelector('#roomNum');
let bedNum = document.querySelector('#bedNum');
let bathNum = document.querySelector('#bathNum');
let size = document.querySelector('#size');
let price = document.querySelector('#price');
let description = document.querySelector('#description');
let bankAccNum = document.querySelector('#bankAccNum');
postPropertyForm.addEventListener('submit', (e)=> {
    e.preventDefault();
    if (checkTitle(title)&&
        checkSelect(province) &&
        checkSelect(city) &&
        checkAddress(address1) &&
        checkZip(zipcode) &&
        checkSelect(roomType) &&
        checkSelect(propertyType) &&
        checkNumber(roomNum) &&
        checkNumber(bedNum) && 
        checkNumber(bathNum) &&
        checkSize(size) && 
        checkPrice(price) &&
        checkDescription(description) &&
        checkBank(bankAccNum) &&
        checkImg()) {
            postPropertyForm.submit()
        }
    else {
        let errorMsgs = document.querySelectorAll('#postPropertyForm span.hide');
        for (i=0; i<errorMsgs.length; i++) {
            errorMsgs[i].className = 'show'
        }
    }
})