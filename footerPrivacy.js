//// open the modal on SignUp/Sign In button click
document.getElementById("privacy").addEventListener("click", function(e) {
    e.preventDefault()
    document.getElementById("modalBoxPrivacy").style.display = "block";
    setTimeout(opacity, 50, 1)
})

document.getElementById("privacy").addEventListener("click", function(e) {
    e.preventDefault()
    document.getElementById("modalBoxPrivacy").style.display = "block";
    setTimeout(opacity, 50, 1)
})

// close the modal when click X
document.querySelector(".close").addEventListener("click", function() {
    document.getElementById("modalBoxPrivacy").style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacity(0);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
  if (e.target == document.getElementById("modalBoxPrivacy")) {
    document.getElementById("modalBoxPrivacy").style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacity(0);
  }
})