// delcaration

const imgDiv = document.querySelector('#profilePhotoM');
const img = document.querySelector('#photoM');
const file = document.querySelector('#fileM');
const uploadButton = document.querySelector('#uploadButtonM');

// if user hovers on the profile photo, display the choose photo button
imgDiv.addEventListener('mouseenter', function(){
    uploadButton.style.display = "block";
})

imgDiv.addEventListener('mouseleave', function(){
    uploadButton.style.display = "none";
})


// change the photo by choosing the different files
file.addEventListener('change', function(){   
    // refers to the file
    const chosenFile = this.files[0];

    if(chosenFile){
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(chosenFile);
    }

});