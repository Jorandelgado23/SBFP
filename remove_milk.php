<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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

$conn->close();

// Redirect back to the main page
header("Location: form6.php");
exit();
?>
