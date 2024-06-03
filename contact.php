<!DOCTYPE html>
<html>

<head>
    <title>Contact Us - Garage Finder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:gray ;
        }

        /* Navigation styles */
        nav {
            width: 80px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            background-color: green;
            padding: 10px;
            display: block; /* Make sure nav is visible by default */
        }

        nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        nav a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: white;
            margin-bottom: 5px;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: #005a42;
        }

        /* Hamburger menu button */
        #menuButton {
            display: none; /* Initially hidden, shown on small screens */
            background-color: green;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            position: fixed;
            top: 10px;
            left: 10px;
            border-radius: 4px;
        }

        /* Container styles */
        .container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 10%;
            margin-left: 10%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-left: 250px; /* Shift container to the right */
        }

        /* Form and form elements styles */
        form input,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: darkblue;
        }

        /* Back button styles */
        button.back-button {
            background-color: blue;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 100%;
        }

        button.back-button:hover {
            background-color: darkgray;
        }

        /* Media queries for responsiveness */
        @media (max-width: 480px) {
            #menuButton {
                display: block;
            }

            nav {
                position: static;
                width: 100%;
                text-align: center;
                display: none; /* Hide nav by default on small screens */
            }

            nav a {
                margin-bottom: 10px;
            }

            .container {
                padding: 15px;
                max-width: 100%;
                margin-left: 0;
            }

            form button,
            button.back-button {
                padding: 10px 15px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
<header>
        <h1></h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="garage_owner_login.php">Garage Login</a>
            <a href="admin.php">Admin Login </a>
            <a href="client_request.php"> Send Request </a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>
    <!-- Hamburger menu button -->
    <button id="menuButton">☰</button>

    <!-- Navigation menu -->
    <nav id="navMenu">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="aboutus.php">About US</a></li>
                <li><a href="garage_owner_login.php">Garage Login</a></li>
                <li><a href="admin.php">Admin Login</a></li>
                <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Contact Us Container -->
    <div class="container">
        <h1>Contact Us</h1>
        <p>We would love to hear from you!</p>

        <!-- Contact information -->
        <p>Email: mbonimpaegide@gmail.com</p>
        <p>Phone: +250791199775</p>
        <p>WhatsApp: +250781199775</p>
        <p>If you have any questions or feedback, feel free to contact us:</p>
        Phone: <a href="tel:+250791199775" class="me-2">0791199775 <span class="fa fa-phone ms-2"></span></a>

        <!-- Contact form -->
      <!--  <form method="POST" action="">
            <label for="name">Names:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Feedback/Questions?:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send</button>
        </form>
    -->
        <!-- Back button -->
        <button class="back-button" onclick="history.back()">Back</button>

        <!-- PHP code to handle form submission -->
        <?php
        // Database connection details
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'egrage';

        // Create a connection to the database
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check for a connection error
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $name = $conn->real_escape_string($_POST["name"]);
            $email = $conn->real_escape_string($_POST["email"]);
            $message = $conn->real_escape_string($_POST["message"]);

            // Insert data into the database
            $sql = "INSERT INTO contactus (Name, email, message) VALUES ('$name', '$email', '$message')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Thank you for contacting us. We will get back to you soon.</p>";
            } else {
                echo "<p>Sorry, there was an error submitting your message. Please try again later.</p>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <!-- JavaScript to handle menu toggle -->
    <script>
        document.getElementById("menuButton").addEventListener("click", function() {
            var navMenu = document.getElementById("navMenu");
            if (navMenu.style.display === "block") {
                navMenu.style.display = "none";
            } else {
                navMenu.style.display = "block";
            }
        });
    </script>
</body>

</html>
