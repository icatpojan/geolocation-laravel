<!DOCTYPE html>
<html>

<head>
    <title>poly lines</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="{{ asset('map.css') }}">
</head>

<body>
    <div id="map"></div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script>
        let map, infoWindow, marker;

        function initMap() {
            //titik awal maps
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 3,
                center: {
                    lat: 0,
                    lng: -180
                },
                mapTypeId: "satellite",
            });
            // data titik
            const flightPlanCoordinates = [{
                    lat: 37.772,
                    lng: -122.214
                },
                {
                    lat: -8.5830695,
                    lng: 116.3202515
                },
                {
                    lat: -18.142,
                    lng: 178.431
                },
                {
                    lat: -27.467,
                    lng: 153.027
                },
            ];

            //memberikan marker di setiap titik
            flightPlanCoordinates.forEach(
                function(el) {
                    var marker = new google.maps.Marker({
                        position: el,
                        map: map,

                        //animasi lompat lompat
                        animation: google.maps.Animation.DROP
                    });
                }
            );


            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 1,
            });

            flightPath.setMap(map);
        }
    </script>

    {{-- script api maps --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm3arcWdL-NKDf0lc4r-CnObRUqMfQf80&callback=initMap&v=weekly"
        async></script>
</body>

</html>
