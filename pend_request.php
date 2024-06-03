<?php
// Database connection
include 'db_connection.php';

// Check if the request ID is provided
if (isset($_GET['id'])) {
    $request_id = $_GET['id'];

    // Update the request status to 'pending'
    $sql = "UPDATE requests SET status = 'pending' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);

    if ($stmt->execute()) {
        // Request pended successfully
        // You can redirect to a success page or display a success message here
        echo "Request pended successfully.";
    } else {
        // Error occurred
        echo "Error updating request status: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Request ID not provided
    echo "Invalid request.";
}

$conn->close();

?>