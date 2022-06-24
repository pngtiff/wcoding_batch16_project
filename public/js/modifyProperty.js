let preLoadImg = document.querySelector('#imgLinks'),
    pictures = preLoadImg.value.split(",");

let form = document.querySelector('#modifyPropertyForm'),
    photosArr = new Array(),
    photosPreview = document.querySelector('#photosPreview');

if (pictures) {
    pictures.forEach(picture => {
        let img = document.createElement('img');
        let propId = document.querySelector('#propId');
        img.src = `./public/images/property_images/${propId.value}/${picture}`;
        let div = document.createElement('div');
        let title = document.createElement('input');
        title.name = picture + 'desc';
        title.type = 'text';
        title.placeholder = "Enter a short description for this image";
        let closeBttn = document.createElement('span');
        closeBttn.innerHTML = '&times;';
        closeBttn.className = 'closeBttn';
        closeBttn.addEventListener('click', (e) => {
            
        })
        div.appendChild(title);
        div.appendChild(closeBttn);
        div.appendChild(img);
        photosPreview.appendChild(div);
    });
}

document.querySelector('form button#addImg').addEventListener('click', function (e) {
    e.preventDefault();
    var nb_attachments = document.querySelectorAll("form input[type='file']").length;
    var input = document.createElement('input')
    input.type = "file"
    input.name = 'attachment-' + nb_attachments;
    input.accept = 'image/*'
    input.addEventListener('change', function (evt) {
        var f = evt.target.files[0];
        form.appendChild(evt.target);
        photosArr.push(evt.target.files[0])
        photosPreview.innerHTML = ''
        for (let i = 0; i < photosArr.length; i++) {
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

function checkTitle(e) {
    return /^.{6,50}$/is.test(e.value)
}

function checkSelect(e) {
    return e.value > 0
}

function checkNumber(e) {
    return /^[1-9][0-9]?$/i.test(e.value)
}

function checkPrice(e) {
    return /^[1-9][0-9]+$/i.test(e.value)
}

function checkImg() {
    let imgs = document.querySelectorAll("form input[type='file']")
    let desc = document.querySelectorAll("#photosPreview input[type='text']")
    if (imgs.length < 2 || imgs.length > 20) return 
    for (i=0; i<imgs.length; i++) {
        if(imgs[i].files[0].size > 1048576 || !checkDescription(desc[i])) {
            return
        }
    }
    return true
}

function checkDescription(e) {
    return /^.{6,255}$/is.test(e.value)
}

function checkBank(e) {
    return /^[1-9][0-9]{10,17}$/i.test(e.value)
}
let title = document.querySelector('#title');
let roomType = document.querySelector('#postPropertyForm #roomType');
let roomNum = document.querySelector('#roomNum');
let bedNum = document.querySelector('#bedNum');
let bathNum = document.querySelector('#bathNum');
let price = document.querySelector('#price');
let description = document.querySelector('#description');
let bankAccNum = document.querySelector('#bankAccNum');
postPropertyForm.addEventListener('submit', (e)=> {
    e.preventDefault();
    if (checkTitle(title)&&
        checkSelect(roomType) &&
        checkNumber(roomNum) &&
        checkNumber(bedNum) && 
        checkNumber(bathNum) &&
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