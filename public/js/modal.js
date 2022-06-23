function opacity (opacity, modalContainer) {
    modalContainer.style.opacity = opacity;
}

let modalBox = document.getElementById("modalBox");
let id = null;
function moveBanner() {
    let left = parseInt(getComputedStyle(banner).left);
    if (left > 0) {
        clearInterval(id);
        showSignup();
        id = setInterval(frame, 1);
        function frame() {
            if (left <= 0) {
                clearInterval(id);
            } else {
                left -= 4; 
                banner.style.left = left + "px"; 
            }
        }
    } else {
        clearInterval(id);
        showSignin();
        id = setInterval(frame, 1);
        function frame() {
            if (left >= banner.offsetWidth) {
                clearInterval(id);
            } else {
                left += 4; 
                banner.style.left = left + "px"; 
            }
        }
    }
}

function showSignup() {
    banner.innerHTML = '';
    let h1 = document.createElement('h1');
    h1.textContent = 'Welcome Back!';
    let h2 = document.createElement('h2');
    h2.textContent = 'Already have an account?';
    let h3 = document.createElement('h2');
    h3.textContent = 'Click button below to sign in.';
    let bttn = document.createElement('button');
    bttn.textContent = 'Sign in';
    bttn.addEventListener('click', moveBanner)
    banner.appendChild(h1);
    banner.appendChild(h2);
    banner.appendChild(h3 );
    banner.appendChild(bttn);
}

function showSignin () {
    banner.innerHTML = '';
    let h1 = document.createElement('h1');
    h1.textContent = 'New Here?';
    let h2 = document.createElement('h2');
    h2.textContent = 'Click button below to sign up.';
    let bttn = document.createElement('button');
    bttn.textContent = 'Sign up';
    bttn.addEventListener('click', moveBanner)
    banner.appendChild(h1);
    banner.appendChild(h2);
    banner.appendChild(bttn);
}

let banner = document.querySelector('#banner-container');

//// open the modal on SignUp/Sign In button click
document.getElementById("signUpButton").addEventListener("click", function(e) {
	banner.style.left = 0; 
	e.preventDefault()
	showSignup();
	modalBox.style.display = "block";
	setTimeout(opacity, 50, 1, modalBox);
})

document.getElementById("signInButton").addEventListener("click", function(e) {
	banner.style.left = '50%'; 
	e.preventDefault();
	showSignin();
	modalBox.style.display = "block";
	setTimeout(opacity, 50, 1, modalBox);
})

// close the modal when click X
document.querySelector(".close").addEventListener("click", function() {
    console.log("one");
	modalBox.style.display = "none";
	document.body.style.overflowY = "visible";
	opacity(0, modalBox);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
	if (e.target == modalBox) {
		modalBox.style.display = "none";
		document.body.style.overflowY = "visible";
		opacity(0, modalBox);
	}
})