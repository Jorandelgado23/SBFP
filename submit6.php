<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Prepare and bind SQL statement for milkcomponent table
$stmt = $conn->prepare("INSERT INTO milkcomponent (session_id, region_division_district, name_of_school, school_id_number, student_name, grade_section, milk_tolerance) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $session_id, $region_division_district, $name_of_school, $school_id_number, $student_name, $grade_section, $milk_tolerance);

// Set parameters for milkcomponent table and execute
$region_division_district = $_POST['region_division_district'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];

foreach ($_POST['student_name'] as $index => $student_name) {
    $grade_section = $_POST['grade_section'][$index];
    $milk_tolerance = $_POST['milk_tolerance'][$index];
    $stmt->execute();

    // Update the selected status in the beneficiary_details table
    $update_stmt = $conn->prepare("UPDATE beneficiary_details SET selected = TRUE WHERE session_id = ? AND name = ?");
    $update_stmt->bind_param("ss", $session_id, $student_name);
    $update_stmt->execute();
    $update_stmt->close();
}

$stmt->close();

// Log activity into recent_activity table
$activity = "Inserted milkcomponent data";
$activity_type = "data_insert";
$timestamp = date("Y-m-d H:i:s");

$log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
$log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
$log_stmt->execute();
$log_stmt->close();

// Close connection
$conn->close();

// Redirect to form6.php after completion
header("Location: form6.php");
exit();
?>
