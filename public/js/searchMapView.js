const searchMap = async function (coords) {
// let coords = [
//     {
//         title: 'house 1',
//         latitude: 33.450701, 
//         longitude: 126.570667
//     },
//     {   
//         title: 'house 2',
//         latitude: 37.55807,
//         longitude: 126.84785
//     },
//     {
//         title: 'house 3',
//         latitude: 35.09951,
//         longitude: 129.01340
//     },
//     {
//         title: 'house 4',
//         latitude: 37.54001,
//         longitude: 127.21551
//     },
//     {
//         title: 'house 5',
//         latitude: 37.5364,
//         longitude: 126.896
//     },
//     {
//         title: 'house 6',
//         latitude: 37.540,
//         longitude: 127.2155
//     }
// ]

    const centerLoc = await getLatLngCenter(coords);

    let mapContainer = document.getElementById('searchMap'),
    mapOption = { 
        center: new kakao.maps.LatLng(centerLoc[0], centerLoc[1]), // center point of map
        level: 13 // map zoom level
    };
    let map = new kakao.maps.Map(mapContainer, mapOption); // create map

    // location of map markers
    let positions = [];
    for(i=0; i<coords.length; i++) {
        positions.push({title: coords[i].title, content: coords[i].content, link: coords[i].link, latlng: new kakao.maps.LatLng(coords[i].latitude, coords[i].longitude)});
    }
    
    // create map markers
    for (i=0; i<positions.length; i++) {
        let marker = new kakao.maps.Marker({
            map: map,
            position: positions[i].latlng,
            title: positions[i].title,
            clickable: true
        });

        // create infoWindow for each marker
        var infowindow = new kakao.maps.InfoWindow({
            content: positions[i].content // 인포윈도우에 표시할 내용
        });

        // marker.addListener('click', function() {
        //     window.location = positions[i].link;
        // })

        // 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
        // 이벤트 리스너로는 클로저를 만들어 등록합니다 
        // for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
        kakao.maps.event.addListener(marker, 'click', makeOverListener(map, marker, infowindow));
        // kakao.maps.event.addListener(marker, 'click', function() {
        //     window.location = positions[i].link;
        // });
        kakao.maps.event.addListener(map, 'click', makeOutListener(infowindow));
    }

    // display map markers
    // marker.setMap(map);
}


// closure for displaying infoWindow
function makeOverListener(map, marker, infowindow) {
    return function() {
        infowindow.open(map, marker);
    };
}

// closure for closing infoWindow
function makeOutListener(infowindow) {
    return function() {
        infowindow.close();
    };
}

// calculate center point of the search result property coordinates
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
async function getLatLngCenter(coords) {
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

    return ([rad2degr(lat), rad2degr(lng)]);
}