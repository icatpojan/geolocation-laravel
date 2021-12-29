<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Tutorial Google Map - Petani Kode</title>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        // variabel global marker
        var marker;

        function taruhMarker(peta, posisiTitik) {

            if (marker) {
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }

            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();

        }

        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-8.5830695, 116.3202515),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            // even listner ketika peta diklik
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });

        }


        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>

<body>

    <div id="googleMap" style="width:100%;height:380px;"></div>

    <form action="" method="post">
        <input type="text" id="lat" name="lat" value="">
        <input type="text" id="lng" name="lng" value="">
    </form>

</body>

</html>
