// API key: 2d4e6c65e087f4ced51eeb4ccd34262c
// dapi.kakao.com/v2/maps/sdk.js?appkey=2d4e6c65e087f4ced51eeb4ccd34262c

var lat = 33.450701,
    lon = 126.570667;

const kakaoMap = function (lat, long) {
    var mapContainer = document.getElementById('map'),
        mapOption = { 
        center: new kakao.maps.LatLng(lat, long), // center point of map
        level: 4 // map zoom level
    };

    var map = new kakao.maps.Map(mapContainer, mapOption); // create map

    // location of map marker
    var centerPosition  = new kakao.maps.LatLng(lat, long); 

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

kakaoMap(lat, lon);