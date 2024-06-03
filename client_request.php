<?php
// Database connection
include 'db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];
    $client_phone = $_POST['client_phone'];
    $garage_id = $_POST['garage_id'];
    $car_location=$_POST['car_location'];
    $car_details = $_POST['car_details'];
    $issue = $_POST['issue'];
    $query = "SELECT email FROM garages WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $garage_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $garage = $result->fetch_assoc();
    $garage_email = $garage['email'];

    $mail = new PHPMailer(true);

            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'finalprojectlevel4@gmail.com';         // SMTP username
            $mail->Password   = 'cfst sfxa illn vghb';                  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('finalprojectlevel4@gmail.com',"Garage System");
            // $request_email = $_GET['email'];
            $mail->addAddress($garage_email);             // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Client Request on Garage';
            $garage=$_GET['garage'];
            $address=$_GET['address'];
            $mail->Body    = "The cleint {$clientname} with email {$client_email} have phone number {$client_phone} Send  Request to Your Garage";
            $mail->send();
            echo "Message Sent";

    // Insert client data if they are new
    $query = "SELECT id FROM clients WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $client_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        $query = "INSERT INTO clients (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $client_name, $client_email, $client_phone);
        $stmt->execute();
        $client_id = $stmt->insert_id;
    } else {
        $client_data = $result->fetch_assoc();
        $client_id = $client_data['id'];
    }

    // Insert request data
    $query = "INSERT INTO requests (client_id, garage_id, car_details, issue,car_location) VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iisss', $client_id, $garage_id, $car_details, $issue,$car_location);
    $stmt->execute();

    // Redirect to a success page or display a success message
    header('Location: request_success.php');
    exit;
}

// Retrieve garage data for the dropdown
$query = "SELECT id, name FROM garages";
$result = $conn->query($query);
$garages = $result->fetch_all(MYSQLI_ASSOC);

// Fetch garage locations
$query = "SELECT name, latitude, longitude,address,phone,garage_description FROM garages";
$result = $conn->query($query);
$locations = $result->fetch_all(MYSQLI_ASSOC);
$locations_json = json_encode($locations);
?>
<!DOCTYPE html>
<html>
<head>
<title>Client Request Submission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .containerMap {
            max-width: 900px;
            margin-left:41rem;
            margin-top:-47rem;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
            background-color: #fff;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        #map {
            height: 800px;
            width: 100%;
            margin-top: 5%;
            margin-top: 0%;
        }
        .geo-data {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>
            <p>Before  submit your request <a href="guidline.php">click here for map guidance</a></h2></p>
    
        <h1>Client Request Submission</h1>
        <form method="POST" action="">
            <label for="client_name">Client Name:</label>
            <input type="text" id="client_name" name="client_name" required>

            <label for="client_email">Client Email:</label>
            <input type="email" id="client_email" name="client_email" required>

            <label for="client_phone">Client Phone:</label>
            <input type="number" id="client_phone" name="client_phone" required>

            <label for="garage_id">Select Garage:</label>
            <select id="garage_id" name="garage_id" required>
                <?php foreach ($garages as $garage): ?>
                    <option value="<?php echo $garage['id']; ?>"><?php echo $garage['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="car_location">Car Location:</label>
            <textarea id="car_location" name="car_location" placeholder="Please enter the full address where your car is located" required></textarea>

            <label for="car_details">Car Details:</label>
            <textarea id="car_details" name="car_details" required></textarea>

            <label for="issue">Issue with the Car:</label>
            <textarea id="issue" name="issue" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

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
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBSACwiMGkSFSrmE8_e0EsJzy-A1_u6LMs&callback=initMap" async defer></script>
    <script>
        var locations = <?php echo $locations_json; ?>;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -1.9440727, lng: 30.0618851 },
                zoom: 13
            });

            var infowindow = new google.maps.InfoWindow();
            var markers = [];

            locations.forEach(function(location) {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                    map: map,
                    title: location.name
                });
                marker.addListener('mouseover', function() {
                    infowindow.setContent('<div><strong>Garage Name: ' + location.name + '</strong><br>' + location.address + '<br>Garage Contact: ' + location.phone + '<br>Garage Description: ' + location.garage_description + '</div>');
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

            // Geolocation functionality to mark the user's current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Your Location',
                        icon: 'https://maps.google.com/mapfiles/kml/shapes/man.png'
                    });
                    map.setCenter(userLocation);

                    infowindow.setContent('<div><strong>Your Location</strong><br>Latitude: ' + userLocation.lat + '<br>Longitude: ' + userLocation.lng + '</div>');
                    infowindow.open(map, userMarker);
                }, function(error) {
                    console.log('Error occurred. Error code: ' + error.code);
                });
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }
    </script>
</body>
</html>
