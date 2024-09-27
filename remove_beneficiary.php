<?php
session_start(); // Ensure session is started

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from AJAX request
$id = $_POST['id'];

// Delete query
$sql = "DELETE FROM beneficiary_details WHERE id=?";

// Prepare statement to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    // Log the activity if the email is set and the role is 'sbfp'
    if (isset($_SESSION['email']) && $_SESSION['role'] === 'sbfp') {
        $activity = "Deleted beneficiary details for ID: $id";
        $activity_type = "delete"; // Define the activity type
        $timestamp = date("Y-m-d H:i:s");

        // Prepare statement for logging recent_activity
        $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $activity, $_SESSION['email'], $activity_type, $timestamp);
        $log_stmt->execute();
        $log_stmt->close();

        // Prepare statement for logging sbfp_recent_activity
        $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (email, activity, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $sbfp_activity_stmt->bind_param("ssss", $_SESSION['email'], $activity, $activity_type, $timestamp);
        $sbfp_activity_stmt->execute();
        $sbfp_activity_stmt->close();
    }

    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
