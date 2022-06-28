let coords = [
    {
        title: 'house 1',
        latitude: 33.450701, 
        longitude: 126.570667
    },
    {   
        title: 'house 2',
        latitude: 37.55807,
        longitude: 126.84785
    },
    {
        title: 'house 3',
        latitude: 35.09951,
        longitude: 129.01340
    },
    {
        title: 'house 4',
        latitude: 37.54001,
        longitude: 127.21551
    }
]


const searchMap = function () {
    getLatLngCenter(coords);

    let mapContainer = document.getElementById('searchMap'),
    mapOption = { 
        center: new kakao.maps.LatLng(centerLoc[0], centerLoc[1]), // center point of map
        level: 12 // map zoom level
    };
    let map = new kakao.maps.Map(mapContainer, mapOption); // create map

    // location of map markers
    let positions = [];
    for(i=0; i<coords.length; i++) {
        positions.push({title: coords[i].title, latlng: new kakao.maps.LatLng(coords[i].latitude, coords[i].longitude)});
    }
    // let positions = [
    //     {
    //         title: '카카오', 
    //         latlng: new kakao.maps.LatLng(33.450701, 126.570667)
    //     },
    //     {
    //         title: '생태연못', 
    //         latlng: new kakao.maps.LatLng(37.55807, 126.84785)
    //     },
    //     {
    //         title: '텃밭', 
    //         latlng: new kakao.maps.LatLng(35.09951, 129.01340)
    //     },
    //     {
    //         title: '근린공원',
    //         latlng: new kakao.maps.LatLng(37.54001, 127.21551)
    //     }
    // ];
    // console.log(positions);

    // create map markers
    for (i=0; i<positions.length; i++) {
        let marker = new kakao.maps.Marker({
            map: map,
            position: positions[i].latlng,
            title: positions[i].title
        });
    }

    // display map markers
    // marker.setMap(map);
}

function rad2degr(rad) { return rad * 180 / Math.PI; }
function degr2rad(degr) { return degr * Math.PI / 180; }

/**
 * @param coords array of arrays with latitude and longtitude
 *   pairs in degrees. e.g. [[latitude1, longtitude1], [latitude2
 *   [longtitude2] ...]
 *
 * @return array with the center latitude longtitude pairs in 
 *   degrees.
 */
function getLatLngCenter(coords) {
    var latitude = 0;
    var longitude = 1;
    var sumX = 0;
    var sumY = 0;
    var sumZ = 0;

    for (var i=0; i<coords.length; i++) {
        var lat = degr2rad(coords[i].latitude);
        var lng = degr2rad(coords[i].longitude);
        // sum of cartesian coordinates
        sumX += Math.cos(lat) * Math.cos(lng);
        sumY += Math.cos(lat) * Math.sin(lng);
        sumZ += Math.sin(lat);
    }

    var avgX = sumX / coords.length;
    var avgY = sumY / coords.length;
    var avgZ = sumZ / coords.length;

    // convert average x, y, z coordinate to latitude and longtitude
    var lng = Math.atan2(avgY, avgX);
    var hyp = Math.sqrt(avgX * avgX + avgY * avgY);
    var lat = Math.atan2(avgZ, hyp);

    return centerLoc = ([rad2degr(lat), rad2degr(lng)]);
}