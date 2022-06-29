/////////// trigger search on icon click//////////////

function loadSearch(e) {
    e.preventDefault()
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
                    "content" : document.querySelectorAll("input.content")[i].value,
                    "link" : document.querySelectorAll("input.link")[i].value,
                    "latitude" : parseFloat(document.querySelectorAll("input.latitude")[i].value),
                    "longitude" : parseFloat(document.querySelectorAll("input.longitude")[i].value)
                }
                coords.push(coord)
            }
            searchMap(coords);
            
        } else {
            console.log("bad Request")
        }
    })

    xhr.send(formData)
}

let provinceSearch = document.querySelector('#province');
let citySearch = document.querySelector('#city');
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
document.querySelector("#searchBarContainer").addEventListener("submit", loadSearch)
