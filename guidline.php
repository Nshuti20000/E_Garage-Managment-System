<!DOCTYPE html>
<html>
<head>
    <title>Map Guidance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: skyblue;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			margin-top: 5%;
        }

        h2 {
            color: #333;
        }

        ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        strong {
            font-weight: bold;
        }

        .back-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Define variables for the garage and people's locations
        $garageLocation = "Red location icon represents the garage's location.";
        $peopleLocation = "Human icons represent the locations of people nearby.";

        // Define the map URL
        $mapUrl = "https://example.com/map"; // Replace with the actual URL of your map

        // Define the message
        $message = "
            <h2>Guidance for Viewing the Map:</h2>
            <ol>
               
                <li>Understanding the Map:
                    <ul>
                        <li>$garageLocation</li>
                        <li>$peopleLocation</li>
                    </ul>
                </li>
                <li>Interacting with the Map:
                    <ul>
                        <li><strong>Zooming:</strong> Use the zoom controls on the map to zoom in and out for a closer or broader view of the area.</li>
                        <li><strong>Exploring:</strong> Drag the map with your mouse or fingers (on touch-enabled devices) to explore different areas.</li>
                        <li><strong>Viewing Details:</strong> Click or tap on the icons to view additional information about the garage or people's locations.</li>
                    </ul>
                </li>
                <li>Making Use of the Information:
                    <ul>
                        <li>If you're interested in the services provided by the garage, you can navigate to its location using the map.</li>
                       
                    </ul>
                </li>
                <li>Feedback and Assistance:
                    <ul>
                        <li>If you have any questions or need further assistance regarding the map or its features, feel free to reach out to us (+250791199775/+250782338479) . We're here to help!</li>
						
                    </ul>
					
                </li>
				
            </ol>
			
            <button class='back-button' onclick='window.history.back()'>Back</button>
        ";

        // Output the message
        echo $message;
        ?>
    </div>
</body>
</html>
