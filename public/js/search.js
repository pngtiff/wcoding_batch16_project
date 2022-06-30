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
    let curr = document.querySelector('#searchBarContainer .active');
    if (curr && curr != e.target) curr.classList.remove('active');
    e.target.classList.add('active');
    formContainer.style.display = 'block';
    searchForm.style.display = 'block';
})
priceSearch.addEventListener('click', e=> {
    let curr = document.querySelector('#searchBarContainer .active');
    if (curr) curr.classList.remove('active');
    e.target.classList.add('active');
    formContainer.style.display = 'block';
    searchForm.style.display = 'block';
})
propertyTypeSearch.addEventListener('click', e=> {
    let curr = document.querySelector('#searchBarContainer .active');
    if (curr) curr.classList.remove('active');
    e.target.classList.add('active');
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
