<?php
// Start session
session_start();

// Check if the user is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page or display an error message
    header('Location: adminlogin.php');
    exit;
}

// Database connection
include 'db_connection.php';

// Retrieve data for the admin dashboard
$query = "SELECT COUNT(*) AS total_garages FROM garages";
$result = $conn->query($query);
$total_garages = $result->fetch_assoc()['total_garages'];

$query = "SELECT COUNT(*) AS total_clients FROM clients";
$result = $conn->query($query);
$total_clients = $result->fetch_assoc()['total_clients'];

$query = "SELECT COUNT(*) AS total_requests FROM requests";
$result = $conn->query($query);
$total_requests = $result->fetch_assoc()['total_requests'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Total Garages: <?php echo $total_garages; ?></p>
    <p>Total Clients: <?php echo $total_clients; ?></p>
    <p>Total Requests: <?php echo $total_requests; ?></p>

    <!-- Add other dashboard components as needed -->
</body>
</html>