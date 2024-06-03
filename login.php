<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile-Friendly Menu</title>
    <style>
        .menu-icon {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .menu-icon span {
            display: block;
            width: 30px;
            height: 4px;
            background-color: #333;
            margin-bottom: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .menu-icon.open span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-icon.open span:nth-child(2) {
            opacity: 0;
        }

        .menu-icon.open span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        .menu {
            list-style-type: none;
            padding: 0;
            display: none;
        }

        .menu li {
            display: block;
            margin-bottom: 10px;
        }

        .menu li a {
            display: block;
            padding: 10px;
            background-color: #f2f2f2;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu li a:hover {
            background-color: #e0e0e0;
        }

        .menu.open {
            display: block;
        }
    </style>
</head>
<body>
    <div class="menu-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="menu">
        <li><a href="garage_owner_login.php">Garage Login</a></li>
        <li><a href="admin.php">Admin Login</a></li>
    </ul>

    <script>
        const menuIcon = document.querySelector('.menu-icon');
        const menu = document.querySelector('.menu');

        menuIcon.addEventListener('click', () => {
            menuIcon.classList.toggle('open');
            menu.classList.toggle('open');
        });
    </script>
</body>
</html>