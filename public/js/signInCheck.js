let form = document.querySelector("#signInForm");
    form.addEventListener('submit', checkInput);
    
function checkInput(e){
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `index.php?action=checkSignIn&email=${form.email.value}&password=${form.password.value}`);
    xhr.onload = function () {
        if (xhr.status == 200) {
            console.log(xhr.responseText)
            if (xhr.responseText==1) {
                form.submit();
            } else {
                let errorText = document.querySelector(".errorText");
                errorText.classList.remove('errorText');
            }
        } 
    }
    xhr.send();
}

  