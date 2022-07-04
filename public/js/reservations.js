let owner = document.querySelector('#owner');
let number = document.querySelector('#cardNumber');
let cvv = document.querySelector('#cvv'); 
// let signUpForm = document.querySelector('#signUpForm'); 
// let reset = document.querySelector('#reset'); 
let confirmButton = document.querySelector('#confirm-purchase');


function checkCardholder(){
    let regex = /^(?![\s.]+$)[A-Z\-a-z\s.]{2,}$/;
    if (regex.test(owner.value)) {
        owner.classList.add('green');
        owner.classList.remove('red'); 
        owner.nextElementSibling.classList.add('nameError'); 
        return true;
    }
    else {
        owner.classList.add('red');
        owner.classList.remove('green');
        owner.nextElementSibling.classList.remove('nameError'); 
        return false; 
    }
}

function checkCardNumber(){
    let regex = /^4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}|3[47][0-9]{13}$/;
    if (regex.test(number.value)) {
        number.classList.add('green');
        number.classList.remove('red'); 
        number.nextElementSibling.classList.add('numError'); 
        return true;
    }
    else {
        number.classList.add('red');
        number.classList.remove('green');
        number.nextElementSibling.classList.remove('numError'); 
        return false; 
    }
}

function checkCVV(){
    let regex = /^[0-9]{3,4}$/;
    if (regex.test(cvv.value)) {
        cvv.classList.add('green');
        cvv.classList.remove('red'); 
        cvv.nextElementSibling.classList.add('cvvError'); 
        return true;
    }
    else {
        cvv.classList.add('red');
        cvv.classList.remove('green');
        cvv.nextElementSibling.classList.remove('cvvError'); 
        return false; 
    }
}


function resetForm(){
    document.getElementById('paymentForm').reset(); 
}

function dateDiff(){
    var d2 = document.getElementById("startDate").value;
    var d1 = document.getElementById("endDate").value;
  
    var t2 = new Date(d2);
    var t1 = new Date(d1);

    var currentLocation = window.location.href;
    var url = new URL(currentLocation);
    var price = url.searchParams.get("price");

    for (let i = 0; i < price.length; i++){
        price = price.replace(',', ''); // go through all the characters and replace commas if they are present
    }

    if (((t1 - t2) / (24 * 3600 * 1000)) >= 30){
    document.getElementById("dateBtn").innerHTML = "Your total price is " + Math.round(((t1 - t2) / (24 * 3600 * 1000))/30 * parseInt(price)).toLocaleString('en-US') + "₩"; 
    }
    else {
        document.getElementById("dateBtn").innerHTML = "Minimum stay is 30 days. Please enter new dates"; 
    }
}

owner.addEventListener('keyup', checkCardholder);
number.addEventListener('keyup', checkCardNumber);
cvv.addEventListener('keyup', checkCVV); 
// signUpForm.addEventListener('submit', submitForm); 
// reset.addEventListener('click', resetForm);


// =================== //
// reservation calendar//
// =================== //
let dateOpenButton = document.querySelector('.stayingDuration');
let dateCloseButton = document.querySelector('.dateCloseButton');
let bookingCalendar = document.querySelector('.bookingCalendar');
let checkIn = document.querySelector('.checkIn');
let checkOut = document.querySelector('.checkOut');
let dateSelection = document.querySelectorAll('.dateFilled');

// when we first click the calendar button
dateOpenButton.addEventListener("click", function(e) { 
    e.preventDefault();
    checkIn.classList.add('selectedFunction');
    bookingCalendar.classList.remove('calendarUp');
    bookingCalendar.classList.add('calendarExtension');
});

// when we click the close button
dateCloseButton.addEventListener("click", function(e) {
    e.preventDefault();
    checkIn.classList.remove('selectedFunction');
    checkOut.classList.remove('selectedFunction');
    bookingCalendar.classList.remove('calendarExtension');
    bookingCalendar.classList.add('calendarUp');
});


// main operation //
// for(let i = 0; i < dateSelection.length; i++){
    
//     dateSelection[i].addEventListener("click", function(e){
//         e.preventDefault();
//         dateSelection[i].classList.add('dateSelection');
//         checkIn.classList.remove('selectedFunction');
//         checkOut.classList.add('selectedFunction');
//         dateSelection[i].classList.add('dateSelection');
//     });
// };

let calendar = document.querySelector('.calendar')

const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
}

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

generateCalendar = (month, year) => {

    let calendar_days = calendar.querySelector('.calendar-days')
    let calendar_header_year = calendar.querySelector('#year')

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    calendar_days.innerHTML = ''

    let currDate = new Date()
    if (!month) month = currDate.getMonth()
    if (!year) year = currDate.getFullYear()

    let curr_month = `${month_names[month]}`
    month_picker.innerHTML = curr_month
    calendar_header_year.innerHTML = year

    // get first day of month
    
    let first_day = new Date(year, month, 1)

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement('div')
        if (i >= first_day.getDay()) {
            day.classList.add('calendar-day-hover')
            day.innerHTML = i - first_day.getDay() + 1
            day.innerHTML += `<span></span>
                            <span></span>
                            <span></span>
                            <span></span>`
            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                day.classList.add('curr-date')
            }
        }
        calendar_days.appendChild(day)
    }
}

let month_list = calendar.querySelector('.month-list')

month_names.forEach((e, index) => {
    let month = document.createElement('div')
    month.innerHTML = `<div data-month="${index}">${e}</div>`
    month.querySelector('div').onclick = () => {
        month_list.classList.remove('show')
        curr_month.value = index
        generateCalendar(index, curr_year.value)
    }
    month_list.appendChild(month)
})

let month_picker = calendar.querySelector('#month-picker')

month_picker.onclick = () => {
    month_list.classList.add('show')
}

let currDate = new Date()

let curr_month = {value: currDate.getMonth()}
let curr_year = {value: currDate.getFullYear()}

generateCalendar(curr_month.value, curr_year.value)

document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

let dark_mode_toggle = document.querySelector('.dark-mode-switch')

dark_mode_toggle.onclick = () => {
    document.querySelector('body').classList.toggle('light')
    document.querySelector('body').classList.toggle('dark')
}








