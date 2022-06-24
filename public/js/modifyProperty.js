let preLoadImg = document.querySelector('#imgLinks'),
    pictures = preLoadImg.value.split(",");

let form = document.querySelector('#modifyPropertyForm'),
    photosArr = new Array(),
    photosPreview = document.querySelector('#photosPreview');

if (pictures) {
    pictures.forEach(picture => {
        let img = document.createElement('img');
        img.src = picture;
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