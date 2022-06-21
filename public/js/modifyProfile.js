// delcaration
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadButton = document.querySelector('#uploadButton');

// change the photo by choosing the different files

file.addEventListener('change', function(){   
    // refers to the file
    const choosedFile = this.files[0];

    if(choosedFile){
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }

});