let provinceSearch = document.querySelector('#province');
let citySearch = document.querySelector('#city');
provinceSearch.addEventListener('change', function(e) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `index.php?action=getCities&province=${e.target.options[e.target.selectedIndex].text}`);
    xhr.onload = function (e) {
        if (xhr.status == 200) {
            citySearch.innerHTML = xhr.responseText;
        }
    }
    xhr.send(null)
})