let form = document.querySelector('#modifyPropertyForm'),
    photosPreview = document.querySelector('#photosPreview')


photosPreview.querySelectorAll('.closeBttn').forEach(elem => {
    elem.addEventListener('click', e => {
        e.target.parentElement.style.display = 'none';
        e.target.previousElementSibling.value = 'delete+' + e.target.nextElementSibling.nextElementSibling.value;
    })
})

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
        let img = document.createElement('img');
        img.src = URL.createObjectURL(f);
        let div = document.createElement('div');
        let title = document.createElement('input');
        title.name = 't-' + evt.target.name;
        title.type = 'text';
        title.placeholder = "Write short description";
        title.className = 'added'
        let closeBttn = document.createElement('span');
        closeBttn.innerHTML = '&times;';
        closeBttn.className = 'closeBttn';
        closeBttn.addEventListener('click', (e) => {
            form.removeChild(input)
            photosPreview.removeChild(e.target.parentElement);
            let files = document.querySelectorAll("form input[type='file']")
            let descriptions = photosPreview.querySelectorAll("input.added")
            files.forEach((file, idx) => {
                file.name = 'attachment-' + idx;
                descriptions[idx].name = 't-' + file.name
            })
        })
        let span = document.createElement('span');
        span.textContent = 'At least 6 charachters for description'
        span.className = 'hide'
        div.appendChild(title);
        div.appendChild(closeBttn);
        div.appendChild(span);
        div.appendChild(img);
        photosPreview.appendChild(div);
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


let furniture = document.querySelector('#furnished');
let bedField = document.querySelector('#bedField');
furniture.addEventListener('click', () => {
    if(furniture.checked) {
        bedField.classList.add('slideDown');
    } else {
        bedField.classList.remove('slideDown');
    }
})