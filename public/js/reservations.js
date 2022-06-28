let owner = document.querySelector('#owner');
let number = document.querySelector('#cardNum')
// let signUpForm = document.querySelector('#signUpForm'); 
// let reset = document.querySelector('#reset'); 

owner.addEventListener('keyup', checkCardholder);
number.addEventListener('keyup', checkCardNumber);
// signUpForm.addEventListener('submit', submitForm); 
// reset.addEventListener('click', resetForm); 

function checkCardholder() {
    let regex = /^(?![\s.]+$)[a-zA-Z\s.]*$/;
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

function checkCardNumber() {
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