


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with Markers</title>
    <style>
        #map {
            height: 80px;
            width: 50%;
        }
        .geo-data {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="containerMap">
        <input type="text" id="searchInput" placeholder="Enter the location">
        <div id="map"></div>
        <ul class="geo-data">
            <li>Full Address: <span id="location"></span></li>
            <li>Postal Code: <span id="postal_code"></span></li>
            <li>Country: <span id="country"></span></li>
            <li>Latitude: <span id="lat"></span></li>
            <li>Longitude: <span id="lon"></span></li>
        </ul>
        sdafhds
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
            $host = "localhost";
            $username = "root";
            $password = "Password";
            $database = "e_garage_db";
            
            // Create a connection
            $conn = new mysqli($host, $username, $password, $database);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM garages";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["name"]."<br>";
            }
            } else {
            echo "0 results";
            }
            $conn->close();
?>
   
    <!-- Script -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBSACwiMGkSFSrmE8_e0EsJzy-A1_u6LMs&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -1.9440727, lng: 30.0618851 },
                zoom: 13
            });
            
            var locations = [
                {lat: -1.9342783, lng: 30.12139779999999, name: 'Location 1', address: 'Address 1'},
                {lat: -1.9251428, lng:  30.1399463, name: 'Location 2', address: 'Address 2'},
                {lat: -1.941918, lng: 30.0442993, name: 'Location 3', address: 'Address 3'}
            ];
            
            var infowindow = new google.maps.InfoWindow();
            var markers = [];
            
            locations.forEach(function(location) {
                var marker = new google.maps.Marker({
                    position: {lat: location.lat, lng: location.lng},
                    map: map,
                    title: location.name
                });
                marker.addListener('mouseover', function() {
                    infowindow.setContent('<div><strong>' + location.name + '</strong><br>' + location.address);
                    infowindow.open(map, marker);
                });
                marker.addListener('mouseout', function() {
                    infowindow.close();
                });
                markers.push(marker);
            });

            var input = document.getElementById('searchInput');
            var autocomplete = new google.maps.places.Autocomplete(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            autocomplete.bindTo('bounds', map);

            var searchMarker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                searchMarker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                searchMarker.setIcon({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                });
                searchMarker.setPosition(place.geometry.location);
                searchMarker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, searchMarker);

                for (var i = 0; i < place.address_components.length; i++) {
                    if (place.address_components[i].types[0] == 'postal_code') {
                        document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
                    }
                    if (place.address_components[i].types[0] == 'country') {
                        document.getElementById('country').innerHTML = place.address_components[i].long_name;
                    }
                }

                document.getElementById('location').innerHTML = place.formatted_address;
                document.getElementById('lat').innerHTML = place.geometry.location.lat();
                document.getElementById('lon').innerHTML = place.geometry.location.lng();
            });
        }
    </script>
</body>
</html>
