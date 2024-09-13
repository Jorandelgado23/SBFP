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

// Get data from POST request
$id = $_POST['id'];
$region_division_district = $_POST['region_division_district'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];
$student_name = $_POST['student_name'];
$grade_section = $_POST['grade_section'];
$milk_tolerance = $_POST['milk_tolerance'];

// Update record in milkcomponent table
$stmt = $conn->prepare("UPDATE milkcomponent SET region_division_district = ?, name_of_school = ?, school_id_number = ?, student_name = ?, grade_section = ?, milk_tolerance = ? WHERE id = ?");
$stmt->bind_param("ssssssi", $region_division_district, $name_of_school, $school_id_number, $student_name, $grade_section, $milk_tolerance, $id);
$stmt->execute();
$stmt->close();

$conn->close();

// Redirect back to the main page
header("Location: form6.php");
exit();
?>
