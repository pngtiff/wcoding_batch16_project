function opacityPrivacy(opacity) {
  document.getElementById("footerPrivacyModal").style.opacity = opacity;
}

//// open the modal on SignUp/Sign In button click
document.getElementById("privacy").addEventListener("click", function(e) {
    e.preventDefault()
    document.getElementById("footerPrivacyModal").style.display = "block";
    setTimeout(opacityPrivacy, 50, 1)
})

// close the modal when click X
document.querySelector("#footerPrivacyModal .close").addEventListener("click", function() {
    document.getElementById("footerPrivacyModal").style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacityPrivacy(0);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
  if (e.target == document.getElementById("footerPrivacyModal")) {
    document.getElementById("footerPrivacyModal").style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacityPrivacy(0);
  }
})

function opacityTerms(opacity) {
  document.getElementById("footerTermsModal").style.opacity = opacity;
}
//// open the modal on SignUp/Sign In button click
document.getElementById("terms").addEventListener("click", function(e) {
  e.preventDefault()
  document.getElementById("footerTermsModal").style.display = "block";
  setTimeout(opacityTerms, 50, 1)
})

// close the modal when click X
document.querySelector("#footerTermsModal .close").addEventListener("click", function() {
  document.getElementById("footerTermsModal").style.display = "none";
  document.querySelector("body").style.overflowY = "visible";
  opacityTerms(0);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
if (e.target == document.getElementById("footerTermsModal")) {
  document.getElementById("footerTermsModal").style.display = "none";
  document.querySelector("body").style.overflowY = "visible";
  opacityTerms(0);
}
})