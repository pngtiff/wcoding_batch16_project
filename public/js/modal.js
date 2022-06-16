function opacity (opacity) {
    document.getElementById("modalBox").style.opacity = opacity;
}

//// open the modal on SignUp/Sign In button click
document.getElementById("signUpButton").addEventListener("click", function(e) {
    e.preventDefault()
    document.getElementById("modalBox").style.display = "block";
    setTimeout(opacity, 50, 1)
})

document.getElementById("signInButton").addEventListener("click", function(e) {
    e.preventDefault()
    document.getElementById("modalBox").style.display = "block";
    setTimeout(opacity, 50, 1)
})

// close the modal when click X
document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("modalBox").style.display = "none";
    opacity(0);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
  if (e.target == document.getElementById("modalBox")) {
    document.getElementById("modalBox").style.display = "none";
    opacity(0);
  }
})