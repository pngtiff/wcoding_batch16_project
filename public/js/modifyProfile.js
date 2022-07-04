// delcaration

const imgDiv = document.querySelector('#profilePhotoM');
const img = document.querySelector('#photoM');
const file = document.querySelector('#fileM');
const uploadButton = document.querySelector('#uploadButtonM');
const saveButton = document.querySelector('#save');
const phoneNumInput = document.querySelector('#phoneNumber');
const inputBoxes = document.querySelectorAll('input');
const alertMesg = document.querySelector('#alertMesg');

// language selection
// let languages = document.querySelector('#language');
// let options = document.querySelectorAll('#language option');
let languages = document.querySelectorAll('.list input[type="checkbox"]');
let langArray = [];
let userLang = document.querySelector('#userLang');
let langList = Array.apply(null, document.querySelectorAll('.list > *'));



// if user hovers on the profile photo, displays the choose photo button
imgDiv.addEventListener('mouseenter', function(){
    uploadButton.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function(){
    uploadButton.style.display = "none";
});

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

// multi language selection
document.querySelector('.select-field').addEventListener('click', () => {
    document.querySelector('#absolute').style.display='block';
    document.querySelector('.list').classList.toggle('show');
    document.querySelector('.down-arrow').classList.toggle('rotate180');
});

// closes languages list when clicking outside .select-field
window.addEventListener('click', (e) => {
    console.log(e.target);
    if (e.target == document.querySelector('#absolute')) {
        document.querySelector('#absolute').style.display='none';
        if(document.querySelector('.list').classList.contains('show')) {
            document.querySelector('.list').classList.remove('show');
            document.querySelector('.down-arrow').classList.remove('rotate180');
        }
    }
});

for (i = 0; i < languages.length; i++) {
    if(languages[i].checked) {
        langArray.push(languages[i].value);
    }
    languages[i].addEventListener('change', (e) => {
        if (e.target.checked) {
            langArray.push(e.target.value);
        } else if (!e.target.checked) {
            langArray = langArray.filter(lang => lang != e.target.value);
        }
        userLang.value = langArray;
    });
    userLang.value = langArray;
}

// =======================================//
// frontend checking for the phone number //
// =======================================//

// hide and show message
const display = function(element){
    alertMesg.style.display = "none";
    if(element.classList.contains("red")){
        alertMesg.style.display = "block";
    }
}

// function to check the condition
const countStr = function(phoneNum){
    let count = phoneNum.value.length; // add more condition
    console.log(count);
    if(count < 11 || count >= 15){
        phoneNum.classList.remove("green");
        phoneNum.classList.add("red"); // display the input box in red color
    } else{
        phoneNum.classList.remove("red");
        phoneNum.classList.add("green");    
    }
    display(phoneNum); // display the alert message
}

// to alert the user while they type their phone number
inputBoxes[3].addEventListener('change', function(){
    countStr(phoneNumInput);
});

// to check the before form submission
// saveButton.addEventListener('click', function(e){
//     countStr(phoneNumInput);
// });

