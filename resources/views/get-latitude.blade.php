<!DOCTYPE html>
<html>

<head>
    <title>get latitude lotitude</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script>
        function getLocation() {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        document.getElementById("lat").value = position.coords.latitude;
                        document.getElementById("lng").value = position.coords.longitude;
                    }
                );
        }
    </script>
</head>

<body>
    <button class="btn btn-primary btn-sm" onclick="getLocation()">Get location</button>
    <form action="" method="post">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
    </form>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm3arcWdL-NKDf0lc4r-CnObRUqMfQf80&callback=initMap&v=weekly"async></script>
</body>

</html>
