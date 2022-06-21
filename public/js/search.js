/////////// trigger search on icon click//////////////

document.querySelector(".searchButton").addEventListener("click", function(e) {
    let city = document.querySelector("#searchBar").value
    window.location = `index.php?action=search&city=${city}`;
})


/// ENTER ////////
document.getElementById("searchBar").addEventListener("keyup", function(e) {
    
    if (e.key == "Enter")
    {
        let city = document.querySelector("#searchBar").value
        window.location = `index.php?action=search&city=${city}`;
    }
})



