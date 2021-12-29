<!DOCTYPE html>
<html>

<head>
    <title>set mark</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="{{ asset('map.css') }}">
</head>

<body>
    <div id="map"></div>
    <form action="" method="post">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
    </form>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script>
        let map, infoWindow;
        var marker;

        function initMap() {
            //titik awal maps
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -8.5830695,
                    lng: 116.3202515
                },
                zoom: 6,
            });
            infoWindow = new google.maps.InfoWindow();

            // even listner ketika peta diklik
            google.maps.event.addListener(map, 'click', function(event) {
                setMarker(this, event.latLng);
            });
        }

        //handle error
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        // taruh tanda
        function setMarker(map, posisiTitik) {

            if (marker) {
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: map
                });
            }

            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();

        }

        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

    {{-- script api maps --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm3arcWdL-NKDf0lc4r-CnObRUqMfQf80&callback=initMap&v=weekly"
        async></script>
</body>

</html>
