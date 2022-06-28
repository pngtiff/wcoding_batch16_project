<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     fdsfdsfsdfsdfsdfsdfsdf
    <script>

        const POSTCODE = "07956"

        var xhr = new XMLHttpRequest();
        xhr.open('GET', "https://geocode.xyz/" + POSTCODE + "?region=KR&json=1");
        xhr.addEventListener("load", function(e) {

        if (e.target.status === 200) {

            console.log(JSON.parse(xhr.responseText))

        } else {
            console.log("bad Request")
        }
        })

        xhr.send()

    </script>

</body>
</html>