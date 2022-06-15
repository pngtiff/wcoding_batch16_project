let form = document.querySelector("#signInForm");
    form.addEventListener('submit', checkInput);
    
function checkInput(e){
    if (!/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/i.test(email.value)){
        let errorText = document.querySelector(".errorText");
        errorText.classList.remove('errorText');
        e.preventDefault()
    }  
}

  