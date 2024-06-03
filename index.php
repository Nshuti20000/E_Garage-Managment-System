<!DOCTYPE html>
<html>

<head>
<title>
         E_Garage
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        
    
        
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f4f4f4;
        }

        /* Style for the heading */
        .scrolling-text {
            font-size: 24px;
            color: skyblue;
            
            padding: 10px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
           
        }

        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Styling for navigation links */
        nav {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            background-color: #007BFF;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav li {
            margin-left: 15px;
        }

        nav a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Mobile navigation styles */
        @media (max-width: 768px) {
            nav {
                justify-content: center;
            }

            nav ul {
                display: block;
                padding: 0;
            }

            nav li {
                margin-bottom: 5px;
                text-align: center;
            }
        }

        /* Slideshow container styles */
        #slideshow-container {
            position: relative;
            height: 400px; /* Adjust height for mobile */
            width: 100%;
            overflow: hidden;
            margin-top: 20px;
            border-radius: 10px;
        }

        #slideshow-container .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s;
        }

        #slideshow-container .slide.active {
            opacity: 1;
        }

        /* Slideshow navigation buttons */
        .slideshow-btn {
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .slideshow-btn.left {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        .slideshow-btn.right {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .slideshow-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Style for the footer */
        footer {
            background-color: #333;
            padding: 10px;
            text-align: center;
            color: white;
            margin-top: 5%;
        }

        footer p {
            margin: 0;
        }

        /* Social media icons */
        .social-icons {
            position: fixed;
            top: 10px;
            right: 15px;
            font-size: 20px;
            z-index: 1000;
          color: aqua;
        }

        .social-icons a {
            margin-left: 10px;
            color: blue;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: skyblue;
        }
        .honest-logo {
            float: left; /* Float the image to the left */
            margin-right: 10px; /* Add some margin to separate the image from the text */
            
            margin-bottom: 1px;
        height: 100px;
            width: 150px;
        }
        .facebook-icon {
            color: #3b5998; /* Change the color to the desired color */
        }
       

    </style>
</head>

<body>
    <!-- Social media icons -->
    <div class="social-icons">
    <a href="https://www.facebook.com/mbonimpa.egide.92" class="facebook-icon"><i class="fab fa-facebook"></i></a>
<a href="https://twitter.com/Egidus_Nshuti" class="twitter-icon"><i class="fab fa-twitter"></i></a>
<a href="https://www.instagram.com/m.n.egide/" class="instagram-icon"><i class="fab fa-instagram"></i></a>

    </div>

   
    <!-- Scrolling heading -->
    <div class="scrolling-text">
        
        <h1><img src="logo.png" class="honest-logo"  alt=""   >Welcome to E_Garage Managment System</h1>
   
   
    </div>
   
    <!-- Navigation menu -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="garage_owner.php">Register your garage</a></li> -->
            <li><a href="garage_owner_login.php">Garage Dashboard</a></li>
            <li><a href="client_request.php">Client send Request</a></li>
            <li><a href="admin.php">Admin Dahsboard</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Slideshow container -->
    <div id="slideshow-container">
        <div class="slide active" style="background-image: url('p1.jpg');"></div>
        <div class="slide" style="background-image: url('p3.jpg');"></div>
        <div class="slide" style="background-image: url('p4.jpg');"></div>
        <a class="slideshow-btn left" onclick="changeSlide(-1)">&#10094;</a>
        <a class="slideshow-btn right" onclick="changeSlide(1)">&#10095;</a>
    </div>
    <p> &nbsp &nbsp &nbsp &nbsp &nbsp At E_Garage Managment System, we aim to revolutionize the automotive service industry by connecting garage owners with clients seeking reliable and efficient car maintenance and repair &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  services. Our platform  allows users to find, review, and book services from a wide range of garages. <a href="aboutus.php">click here</a> for more information</p>
    <!-- Footer section -->
    <div>
        
        <footer>
        <div class="we-offer">
          <div class="logo">
          
            <div class="honest"><br>
              <h3>E Garage Managment System</h3>
              <p></p>
        
          </div>
          <p>We offer full range of garage services to vehicle owners. professionals know how to handle a wide range of car services.</p>
          
        </div>
        <div class="we-services">
          <h4>Services that you can get in our Garages</h4>
          <ul>
			
            <li><i class="fa-solid fa-circle-dot"></i>Body Works</a></li>
			
            <li><i class="fa-solid fa-circle-dot"></i>Car Inspections</a></li>
			
            <li><i class="fa-solid fa-circle-dot"></i>Car Wash</a></li>
			
            <li><i class="fa-solid fa-circle-dot"></i>Car Repair Works</a></li>
			
            <li><i class="fa-solid fa-circle-dot"></i>Polishing Vehicles</a></li>
			
            <li><i class="fa-solid fa-circle-dot"></i>Engine Diagonistics</a></li>
            <li><i class="fa-solid fa-circle-dot"></i>BreakDown car cover</a></li>
			
          </ul>
        </div>
        <div class="we-get-in-touch">
          <h4>Get In Touch</h4>
          <div class="get">
           
            <p>mbonimpaegide@gmail.com</a></p>
            <p>0791199775/0798448882</p>
          </div>
         
            
       
        </div>
        
<br>
        <span><i class="fa-solid fa-copyright"></i> Copy Right 2024  All Rights Reserved</span>
            
        </footer>
    </div>
    <!-- JavaScript for slideshow -->
    <script>
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function startSlideshow() {
            setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }, 5000); // Adjust this value for slide duration (5 seconds)
        }

        function changeSlide(n) {
            currentSlide = (currentSlide + n + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Start the slideshow
        startSlideshow();
    </script>
</body>

</html>
