<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

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
    $student_name = $student_name;
    $grade_section = $_POST['grade_section'][$index];
    $milk_tolerance = $_POST['milk_tolerance'][$index];
    $stmt->execute();
}

$stmt->close();
$conn->close();
header("Location: form6.php");
?>
