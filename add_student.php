<?php
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
$height_cm = $_POST['height'];  // Height in cm
$gender = $_POST['gender'];  // Gender
$section_id = $_POST['section_id'];

// Convert height to meters for BMI calculation
$height_meters = $height_cm / 100; // Convert cm to meters

// Calculate BMI (BMI = weight / height^2)
$bmi = $weight / ($height_meters * $height_meters);

// Insert student into the database
$sql = "INSERT INTO students (student_name, birthday, weight, height, gender, bmi, section_id)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the SQL query
$stmt->bind_param("ssddssd", $student_name, $birth_date, $weight, $height_cm, $gender, $bmi, $section_id);

// Execute the query
if ($stmt->execute()) {
    // Redirect back to the main page with a success message
    header("Location: weighing_sessions.php?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
