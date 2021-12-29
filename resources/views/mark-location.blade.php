<!DOCTYPE html>
<html>

<head>
    <title>mark location</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="{{ asset('map.css') }}">
</head>

<body>
    <div id="map"></div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script>
        let map, infoWindow;

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

            //buat tombol cari lokasi
            const locationButton = document.createElement("button");
            locationButton.textContent = "cari lokasi saya  ";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

            //event click carilokasi anda
            locationButton.addEventListener("click", () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            // membuat marker
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(position.coords.latitude, position
                                    .coords.longitude),
                                map: map,

                                //custom icon mark
                                icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",

                                //animasi lompat lompat
                                animation: google.maps.Animation.BOUNCE
                            });
                            map.setCenter(pos);


                            // mebuat konten untuk info window
                            var contentString = '<h2>ini lokasi anda</h2>';

                            // membuat objek info window
                            var infowindow = new google.maps.InfoWindow({
                                position: new google.maps.LatLng(position.coords.latitude, position
                                    .coords.longitude),
                                content: contentString
                            });

                            // event saat marker diklik
                            marker.addListener('click', function() {
                                // tampilkan info window di atas marker
                                infowindow.open(map, marker);
                            });
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
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
    </script>

    {{-- script api maps --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBm3arcWdL-NKDf0lc4r-CnObRUqMfQf80&callback=initMap&v=weekly"
        async></script>
</body>

</html>
