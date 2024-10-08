<?php
session_start();

include("accountconnection.php");

// Get the ID from the query string
$id = $_GET['id'];

// Retrieve student name and session_id before deleting
$stmt = $conn->prepare("SELECT student_name, session_id FROM milkcomponent WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($student_name, $session_id);
$stmt->fetch();
$stmt->close();

// Delete the record from the milkcomponent table
$stmt = $conn->prepare("DELETE FROM milkcomponent WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// Update the selected status in the beneficiary_details table
$update_stmt = $conn->prepare("UPDATE beneficiary_details SET selected = FALSE WHERE session_id = ? AND name = ?");
$update_stmt->bind_param("ss", $session_id, $student_name);
$update_stmt->execute();
$update_stmt->close();

// Log the activity if the user is logged in
if (isset($_SESSION['email']) && $_SESSION['role'] === 'sbfp') {
    $activity = "Deleted milk component record for student: $student_name (ID: $id)";
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

$conn->close();

// Redirect back to the main page
header("Location: form6.php");
exit();
?>
