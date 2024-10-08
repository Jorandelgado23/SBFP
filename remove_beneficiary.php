<?php
session_start(); // Ensure session is started

include("accountconnection.php");

// Fetch data from AJAX request
$id = $_POST['id'];

// Delete query
$sql = "DELETE FROM beneficiary_details WHERE id=?";

// Prepare statement to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

$response = array(); // Initialize response array

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

    $response['success'] = true; // Indicate success
    $response['message'] = "Record deleted successfully"; // Success message
} else {
    $response['success'] = false; // Indicate failure
    $response['message'] = "Error deleting record: " . $stmt->error; // Error message
}

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the statement and connection
$stmt->close();
$conn->close();
?>
