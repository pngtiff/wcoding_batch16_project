let owner = document.querySelector('#owner');
let number = document.querySelector('#cardNumber');
let cvv = document.querySelector('#cvv'); 
// let signUpForm = document.querySelector('#signUpForm'); 
// let reset = document.querySelector('#reset'); 

owner.addEventListener('keyup', checkCardholder);
number.addEventListener('keyup', checkCardNumber);
cvv.addEventListener('keyup', checkCVV); 
// signUpForm.addEventListener('submit', submitForm); 
// reset.addEventListener('click', resetForm); 

function checkCardholder() {
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

function checkCVV() {
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


function resetForm() {
    document.getElementById('paymentForm').reset(); 
}

function dateDiff() {
    var d2 = document.getElementById("startDate").value;
    var d1 = document.getElementById("endDate").value;
  
    var t2 = new Date(d2);
    var t1 = new Date(d1);
  
    document.getElementById("dateBtn").innerHTML = Math.round(((t1 - t2) / (24 * 3600 * 1000))/30) +" month(s)"; 
  }

function price() {

}

function submitForm(e) {

    e.preventDefault();
    if(checkCardholder() && checkCardNumber() && checkCVV() && dateDiff()) {
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php?action=reservations');
        
        var form = document.querySelector('#paymentForm'),
        formData = new FormData(form);
        xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText); 
                if (xhr.responseText == "") //1 denotes if email is already in the database
                {
                    alert("Please complete the reservation."); 
                } else {
                    document.querySelector("#reservations-container").innerHTML = ""
                    document.querySelector("#reservations-container").innerHTML = "Reservation Successful!"
                }
            }
        });
        
        // xhr.send();
        xhr.send(formData);


    } 
    // else {
    //     e.preventDefault();
    // }
}
