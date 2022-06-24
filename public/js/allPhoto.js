const viewOpenButton = document.querySelector(".allPropPhotos");
const photoModalContianer = document.querySelector(".photoModalContainer");
const viewCloseButton = document.querySelector("#photoModalClose");
const propertyImg = document.getElementsByClassName("allPropImgContainer");


// let modalBox = document.querySelector("#modalBox");
viewOpenButton.addEventListener("click", function(e) { 
    e.preventDefault();
    photoModalContianer.classList.add("showP");
  
    // showAllPropPhotos();
    // setTimeout(opacity, 50, 1, modalBox);
});

viewCloseButton.addEventListener("click", function(e) {
    e.preventDefault();
    photoModalContianer.classList.remove("showP");
});

propertyImg.addEventListener("click", function(e){
    
});