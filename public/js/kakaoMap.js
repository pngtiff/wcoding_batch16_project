// API key: 2d4e6c65e087f4ced51eeb4ccd34262c
// dapi.kakao.com/v2/maps/sdk.js?appkey=2d4e6c65e087f4ced51eeb4ccd34262c

var mapContainer = document.getElementById('map');

const kakaoMap = function (lat, lon) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '//dapi.kakao.com/v2/maps/sdk.js?appkey=2d4e6c65e087f4ced51eeb4ccd34262c');

    xhr.addEventListener('readystatechange', function () {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var mapOption = { 
                center: new kakao.maps.LatLng(lat, lon), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

            var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

            // 마커가 표시될 위치입니다 
            var markerPosition  = new kakao.maps.LatLng(lat, lon); 

            // 마커를 생성합니다
            var marker = new kakao.maps.Marker({
                position: markerPosition
            });

            // 마커가 지도 위에 표시되도록 설정합니다
            marker.setMap(map);

        }
    })
    xhr.send(null);
}