// function to determine number of days in select input
function checkDays() {
    let days30 = [4, 6, 9, 11];
    let days31 = [1, 3, 5, 7, 8, 10, 12];
    let birthMonth = parseInt(months.value);
    let daysInMonth;

    days.innerHTML = "";

    if (birthMonth === 2) {
        if ((years.value % 100 === 0 && years.value % 400 === 0) || (years.value % 100 !== 0 && years.value % 4 === 0)) {
            daysInMonth = 29;
        } else {
            daysInMonth = 28;
        }
    } else if (days30.includes(birthMonth)) {
        daysInMonth = 30;
    } else if (days31.includes(birthMonth)) {
        daysInMonth = 31;
    }

    for (let i = 1; i <= daysInMonth; i++) {
        let option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        days.appendChild(option);
    }
}

const imgDiv = document.querySelector('#profilePhoto');
const file = document.querySelector('#file');
const uploadButton = document.querySelector('#uploadButton');
let profileForm = document.querySelector('#newProfile');
let contact;
let profilePic = document.querySelector('#file');
let phoneNum = document.querySelector('#phoneNum');
let years = document.querySelector('#year');
let months = document.querySelector('#month');
let days = document.querySelector('#day');
let gender = document.querySelector('input[name="gender"]:checked');
let languages = document.querySelector('#language');
let options = document.querySelectorAll('#language option');
let langArray = [];
let userLang = document.querySelector('#userLang');
let bio = document.querySelector('#bio');
let imgContainer = document.querySelector('#profilePhoto div');


// change the photo by choosing the different files
<<<<<<< HEAD
file.addEventListener('change', function () {
    imgContainer.innerHTML = "";
=======
file.addEventListener('change', function(){   
    imgContainer.innerHTML="";
>>>>>>> master
    const chosenFile = this.files[0];
    let fileSize = chosenFile.size;
    let fileType = chosenFile.name.split('.').pop();

    if (fileSize > 500000) {
        return imgContainer.textContent = "Sorry, your file is too large";
    } else if (fileType !== "jpeg" && fileType !== "jpg" && fileType !== "png" && fileType !== "webp" && fileType !== "") {
        return imgContainer.textContent = "Images must be in jpeg, jpg, png, or webp format";
    }

    let img = document.createElement('img');

    if (chosenFile) {
        const reader = new FileReader();

        reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(chosenFile);
    }

    imgContainer.appendChild(img);
});


// test if user phone # is valid
let regexp = /^\+?[0-9]{7,14}$/;
let validNum = regexp.test(phoneNum.value);

// list of years for birthday
let currentYear = new Date().getFullYear();
for (let i = currentYear - 19; i >= currentYear - 120; i--) {
    let option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    years.appendChild(option);
}

checkDays();

months.addEventListener('change', () => {
    checkDays();
})

years.addEventListener('change', () => {
    checkDays();
})

languages.addEventListener('change', (e) => {
    for (i = 0; i < options.length; i++) {
        if(options[i].id === e.target.value) {
            options[i].setAttribute('disabled', 'disabled');
            langArray.push(e.target.value);
        }
    }
    userLang.value = langArray;
})  

profileForm.addEventListener('submit', (e) => {
    if (!(validNum || gender.value || userLang.value || bio.value)) {
        e.preventDefault();
        let alert = document.querySelector('#newProfile p');
        if (!alert.textContent) {
            alert.textContent = "Please fill out all fields";
        }
    }
})


