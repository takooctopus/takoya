<!DOCTYPE html>
<html>
<head>
    <title>Google Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>

    var map;
    function initMap() {
        var tianjinuniversity = new google.maps.LatLng(39.107918850334265, 117.1730089187622);
        var map = new google.maps.Map(document.getElementById('map'), {
                center: tianjinuniversity,
                zoom: 15
            });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYjVhYKfncsuJqUiR80_vKPL6WxaMY_tE&callback=initMap"
        async defer></script>
</body>
</html>




