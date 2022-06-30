/////////// trigger search on icon click//////////////

function loadSearch(e) {
    e.preventDefault()
    // e.preventDefault();
    // window.location = `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` 
    // window.history.pushState('', '', `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` );
    const xhr = new XMLHttpRequest()

    ////// LOAD THE ROUTER with action "Search"////////
    xhr.open("post", `index.php`)
    let formData = new FormData(e.target)
    ////// Response = searchResultsCard with $_get parameters loaded in xhr.open above //////////
    xhr.addEventListener("load", function(e) {
        if (e.target.status === 200) {
            document.querySelector("section").innerHTML = ""
            document.querySelector("section").innerHTML = xhr.responseText

            let coords = []
          
            for (let i=0; i<document.querySelectorAll("input.postTitle").length; i++)
            {
                let coord = {
                    "title" : document.querySelectorAll("input.postTitle")[i].value,
                    "latitude" : document.querySelectorAll("input.latitude")[i].value,
                    "longitude" : document.querySelectorAll("input.longitude")[i].value
                }
                coords.push(coord)
            }
            console.log(coords)

            
        } else {
            console.log("bad Request")
        }
    })

    xhr.send(formData)
}

let provinceSearch = document.querySelector('#province');
let citySearch = document.querySelector('#city');
let searchBar = document.querySelector("#searchBarContainer");
provinceSearch.addEventListener('change', function(e) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `index.php?action=getCities&province=${e.target.options[e.target.selectedIndex].text}`);
    xhr.onload = function (e) {
        if (xhr.status == 200) {
            citySearch.innerHTML = xhr.responseText
        }
    }
    xhr.send(null)
})

//// CLICK ICON///////

searchBar.addEventListener("submit", loadSearch)
let formContainer = document.querySelector("#formContainer"),
    searchForm = document.querySelector('#searchForm')
    regionSearch = document.querySelector("#regionSearch"),
    priceSearch = regionSearch.nextElementSibling,
    propertyTypeSearch = priceSearch.nextElementSibling


regionSearch.addEventListener('click', e=> {
    // let curr = document.querySelector('#searchBarContainer .active');
    // if (curr && curr != e.target) curr.classList.remove('active');
    currentSlide(1);
    formContainer.style.display = 'block';
    searchForm.style.display = 'block';
})
priceSearch.addEventListener('click', e=> {
    // let curr = document.querySelector('#searchBarContainer .active');
    // if (curr) curr.classList.remove('active');
    currentSlide(2);
    formContainer.style.display = 'block';
    searchForm.style.display = 'block';
})
propertyTypeSearch.addEventListener('click', e=> {
    // let curr = document.querySelector('#searchBarContainer .active');
    // if (curr) curr.classList.remove('active');
    currentSlide(3);
    formContainer.style.display = 'block';
    searchForm.style.display = 'block';
})

window.addEventListener('click', (e) => {
    if (e.target == formContainer) {

        let curr = document.querySelector('#searchBarContainer .active');
        if (curr) curr.classList.remove('active');
        formContainer.style.display = 'none'
        searchForm.style.display = 'none';
    }
}, true)


// Search Bar Carousel
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("searchBarSlides");
    let dots = document.getElementsByClassName("searchBarDots");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" searchBarDotActive", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " searchBarDotActive";
}

let slideIndex = 1;
showSlides(slideIndex);
var lowerSlider = document.querySelector('#lower'),
   upperSlider = document.querySelector('#upper'),
   lowerVal = parseInt(lowerSlider.value);
   upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function() {
   lowerVal = parseInt(lowerSlider.value);
   upperVal = parseInt(upperSlider.value);
   
    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        
        if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
        }
    }
};


lowerSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }

    }
};
