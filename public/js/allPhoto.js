const viewOpenButton = document.querySelector(".allPropPhotos");
const photoModalContianer = document.querySelector(".photoModalContainer");
const viewCloseButton = document.querySelector(".pModalCloseButton");
const propertyImg = document.getElementsByClassName("allPropImgContainer");


viewOpenButton.classList.add('primaryBtn');
viewOpenButton.addEventListener("click", function(e) { 
    e.preventDefault();
    photoModalContianer.classList.add("showP");
});

viewCloseButton.addEventListener("click", function(e) {
    e.preventDefault();
    photoModalContianer.classList.remove("showP");
});

propertyImg.addEventListener("click", function(e){

});