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
    var marker;
    function initMap() {
        var tjuOld = new google.maps.LatLng(39.107918850334265, 117.1730089187622);
        var mapOptions = {
            center: tjuOld,
            zoom: 15
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        marker = new google.maps.Marker({
            position : tjuOld,
            map: map,
            draggable: false,
            //animation: google.maps.Animation.DROP,
            title: 'Hello World!'
        });
        marker.addListener('click', toggleBounce);

        //信息窗口
        var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">天津大学</h1>'+
                '<div id="bodyContent">'+
                '<p><b>天津大学</b>, also referred to as <b>Tianjin University</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                'south west of the nearest large town, Alice Springs; 450&#160;km '+
                '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                'Aboriginal people of the area. It has many springs, waterholes, '+
                'rock caves and ancient paintings. Uluru is listed as a World '+
                'Heritage Site.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }
    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }





</script>
<script src="http://maps.google.cn/maps/api/js?key=AIzaSyDYjVhYKfncsuJqUiR80_vKPL6WxaMY_tE&callback=initMap"
        async defer></script>
</body>
</html>




