let privacyModal = document.getElementById("footerPrivacyModal");
//// open the modal on SignUp/Sign In button click
document.getElementById("privacy").addEventListener("click", function(e) {
    e.preventDefault()
    privacyModal.style.display = "block";
    setTimeout(opacity, 50, 1, privacyModal)
})

// close the modal when click X
document.querySelector("#footerPrivacyModal .close").addEventListener("click", function() {
    privacyModal.style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacity(0,privacyModal);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
  if (e.target == privacyModal) {
    privacyModal.style.display = "none";
    document.querySelector("body").style.overflowY = "visible";
    opacity(0, privacyModal);
  }
})

let termsModal = document.getElementById("footerTermsModal")
//// open the modal on SignUp/Sign In button click
document.getElementById("terms").addEventListener("click", function(e) {
  e.preventDefault()
  termsModal.style.display = "block";
  setTimeout(opacity, 50, 1, termsModal)
})

// close the modal when click X
document.querySelector("#footerTermsModal .close").addEventListener("click", function() {
  termsModal.style.display = "none";
  document.querySelector("body").style.overflowY = "visible";
  opacity(0, termsModal);
})

// close the modal when click outside modal
window.addEventListener("click", function(e) {
if (e.target == termsModal) {
  termsModal.style.display = "none";
  document.querySelector("body").style.overflowY = "visible";
  opacity(0, termsModal);
}
})