////////// AJAX 1 : GET ZIPCODE FROM DATABASE /////////////

async function createMap() {

    const params = new URLSearchParams(window.location.search);
    const propId = parseInt(params.get("propId"));
    const url = "index.php?action=getZipCode&propId=" + propId

    let response = await fetch(url);
    let zipcode = await response.text();
    zipcodeGeotagging(zipcode)
}

async function zipcodeGeotagging(zipcode) {
    const url = "https://geocode.xyz/" + zipcode + "?region=KR&json=1"
   
    let response = await fetch(url);
    let coordinates = await response.json();
    console.log(coordinates)
    let latitude = coordinates['latt']
    let longitude = coordinates['longt']
    
    kakaoMap(latitude,longitude)
}

function kakaoMap(latitude,longitude) {
    var mapContainer = document.getElementById('map'),
        mapOption = { 
        center: new kakao.maps.LatLng(latitude, longitude), // center point of map
        level: 5 // map zoom level
    };

    var map = new kakao.maps.Map(mapContainer, mapOption); // create map

    // location of map marker
    var centerPosition  = new kakao.maps.LatLng(latitude, longitude); 
    // var marker  = new kakao.maps.LatLng(lat, long); 

    // create map marker
    // var marker = new kakao.maps.Marker({
    //     position: centerPosition
    // });

    var circle = new kakao.maps.Circle({ 
        center : centerPosition,
        radius: 300,
        strokeColor: '#29A376',
        strokeOpacity: 1,
        strokeStyle: 'solid',
        fillColor: '#29A376',
        fillOpacity: 0.5
    });

    // display map marker
    // marker.setMap(map);
    circle.setMap(map);
}



// async function zipcodeGeotagging(zipcode) {
//     const url = "https://geocode.xyz/" + zipcode + "?region=KR&json=1"
   
//     let response = await fetch(url);
//     let coordinates = await response.json();
//     console.log(coordinates)
//     let lat = coordinates['latt']
//     let long = coordinates['longt']
    
//     kakaoMap(lat,long)
// }
