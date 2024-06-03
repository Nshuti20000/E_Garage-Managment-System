<?php
session_start();

// Database connection
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Verify admin credentials
    $query = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $admin_username, $admin_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Admin credentials are valid, start session and redirect to admin dashboard
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
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
        input[type="password"],
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
           margin-left: 200px;
            transition: background-color 0.3s;
            
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
<body>
<div class="container">
    <h1>Admin Login</h1>
    <form method="POST" action="">
        <label for="admin_username">Username:</label>
        <input type="text" id="admin_username" name="admin_username" required>

        <label for="admin_password">Password:</label>
        <input type="password" id="admin_password" name="admin_password" required>

        <button type="submit">Login</button>
    </form>
    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    </div>
</body>
</html>
