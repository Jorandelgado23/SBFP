<?php
session_start();

// Capture email and role before destroying the session
$email = $_SESSION['email'];
$role = $_SESSION['role']; // Capture the user's role

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Log the activity if the email is set and the role is 'sbfp'
if (isset($email) && $role === 'sbfp') {
    $activity = "User logged out";
    $activity_type = "logout";
    $timestamp = date("Y-m-d H:i:s");

    $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
    $log_stmt->execute();
    $log_stmt->close();
}

// Close connection
$conn->close();

// Unset all session variables and destroy the session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>
