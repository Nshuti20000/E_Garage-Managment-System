<!DOCTYPE html>
<html>
<head>
    <title>About Us - E_Garage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:skyblue;
            color: white;
            text-align: center;
            padding: 5px 0;
        }
        footer {
            background-color: grey;
            color: white;
            text-align: center;
            padding: 5px 0;
        }

        .content {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 8px 16px;
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        p {
            line-height: 1.6;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }

        nav a:hover {
            color: #007BFF;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Team section */
        .team {
            margin-top: 40px;
        }

        /* Team members container */
        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 5px;
        }

        /* Team member card */
        .team-member {
            width: calc(50% - 10px);
            text-align: center;
            margin-bottom: 10px;
        }

        /* Team member images */
        .team-member img {
            width: 80%;
            max-width: 150px;
            border-radius: 50%;
        }

        /* Team member details */
        .team-member h3 {
            margin-top: 10px;
            font-size: 1rem;
            color: #333;
        }

        .team-member p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>About Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="garage_owner_login.php">Garage Login</a>
            <a href="admin.php">Admin Login </a>
            <a href="client_request.php"> Send Request </a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <h2>Welcome to E_Garage</h2>
        <p>At E_Garage, we aim to revolutionize the automotive service industry by connecting garage owners with clients seeking reliable and efficient car maintenance and repair services. Our platform allows users to find, review, and book services from a wide range of garages.</p>

        <section>
            <h3>Our Mission</h3>
            <p>Our mission is to provide an easy-to-use platform that ensures transparency and quality service in the automotive industry. We strive to create a seamless experience for both garage owners and clients.</p>
        </section>

        <section>
            <h3>Our Vision</h3>
            <p>We envision a future where automotive services are easily accessible to everyone, where clients can trust the services they receive, and where garage owners can grow their businesses through our platform.</p>
        </section>
    </div>

    <div class="team">
        <h2>Meet Our Team</h2>
        <div class="team-members">
            <!-- Team member 1 -->
            <div class="team-member">
                <img src="Fr.jpg" alt="Team Member 1">
                <h3>DUSENGIMANA Ferdinand</h3>
                <p>CEO & Founder</p>
                <p>+250 782 338 479</p>
            </div>
            <!-- Team member 2 -->
            <div class="team-member">
                <img src="kabibi.jpg" alt="Team Member 2">
                <h3>KABIBI Sandrine</h3>
                <p>Financial Manager</p>
                <p>+250 787 251 882</p>
            </div>
            <!-- Team member 3 -->
            <div class="team-member">
                <img src="DELTA(160).jpg" alt="Team Member 3">
                <h3>Egide MBONIMPA</h3>
                <p>IT Manager</p>
                <p>+250791199775</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 E_Garage. All rights reserved.</p>
    </footer>
</body>
</html>