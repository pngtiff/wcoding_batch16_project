/////////// trigger search on icon click//////////////

document.querySelector(".searchButton").addEventListener("click", function(e) {
    let search = (document.querySelector("#searchBar").value != "") ? document.querySelector("#searchBar").value : "any"////// content of the search bar
    let rangeMin = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value)-500000 : "any"
    let rangeMax = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value) : "any"
    let propertyType = (document.querySelector("#propertyType").value != "any") ? document.querySelector("#propertyType").value : "any"
    let roomType = (document.querySelector("#roomType").value != "any") ? document.querySelector("#roomType").value : "any"


    window.location = `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` 
     ////// redirect to search results
})


/// ENTER KEY ////////
document.getElementById("searchBar").addEventListener("keyup", function(e) {
    
    if (e.key == "Enter")
    {
        let search = (document.querySelector("#searchBar").value != "") ? document.querySelector("#searchBar").value : "any"////// content of the search bar
        let rangeMin = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value)-500000 : "any"
        let rangeMax = (document.querySelector("#rentRange").value != "any") ? parseInt(document.querySelector("#rentRange").value) : "any"
        let propertyType = (document.querySelector("#propertyType").value != "any") ? document.querySelector("#propertyType").value : "any"
        let roomType = (document.querySelector("#roomType").value != "any") ? document.querySelector("#roomType").value : "any"
    
    
        window.location = `index.php?action=search&search=${search}&rangeMin=${rangeMin}&rangeMax=${rangeMax}&propertyType=${propertyType}&roomType=${roomType}` 
    }
})



