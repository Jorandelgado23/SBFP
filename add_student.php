<?php
// Start session to access session variables
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "sbfp";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$student_name = $_POST['student_name'];
$birth_date = $_POST['birth_date'];
$weight = $_POST['weight'];
$height_cm = $_POST['height']; // Height in cm
$gender = $_POST['gender'];   // Gender
$section_id = $_POST['section_id'];

// Get the session_id of the logged-in user
$email = $_SESSION['email']; // Assuming email is stored in session after login
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Convert height to meters for BMI calculation
$height_meters = $height_cm / 100; // Convert cm to meters

// Calculate BMI
$bmi = $weight / ($height_meters * $height_meters);

// Insert student into the database with session_id
$sql = "INSERT INTO students (student_name, birthday, weight, height, gender, bmi, section_id, session_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the SQL query
$stmt->bind_param("ssddssds", $student_name, $birth_date, $weight, $height_cm, $gender, $bmi, $section_id, $session_id);

// Execute the query
if ($stmt->execute()) {
    // Redirect with success message
    header("Location: weighing_sessions.php?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
