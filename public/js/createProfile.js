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
let phoneNum = document.querySelector('#phoneNum');
let years = document.querySelector('#year');
let months = document.querySelector('#month');
let days = document.querySelector('#day');
let gender = document.querySelector('input[name="gender"]:checked');
let languages = document.querySelector('#language');
let bio = document.querySelector('#bio');


// change the photo by choosing the different files
file.addEventListener('change', function(){   
    // refers to the file
    let imgContainer = document.querySelector('#profilePhoto div');
    imgContainer.innerHTML="";
    const chosenFile = this.files[0];
    let img = document.createElement('img');

    if(chosenFile){
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(chosenFile);
    }

    imgContainer.appendChild(img);
});


// test if user phone # is valid
phoneNum.value.match(/^\+?[0-9]{7,14}$/) ? contact = true : contact = null;

// list of years for birthday
let currentYear = new Date().getFullYear();
for (let i = currentYear; i >= currentYear - 120; i--) {
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

if (!contact || !gender || !languages.value || !bio.value) {
    profileForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let alert = document.querySelector('#newProfile p');
        if (!alert.textContent) {
            alert.textContent = "Please fill out all fields";
        }
    })
}