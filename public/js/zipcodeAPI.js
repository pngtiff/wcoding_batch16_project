// async function zipcodeGeotagging(zipcode) {
//     const url = "https://geocode.xyz/" + zipcode + "?region=KR&json=1"
   
//     let response = await fetch(url);
//     let coordinates = await response.json();
//     console.log(coordinates)
//     let lat = coordinates['latt']
//     let long = coordinates['longt']
    
//     kakaoMap(lat,long)
// }