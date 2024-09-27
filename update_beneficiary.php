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
$lrn_no = $_POST['lrn_no']; // Add LRN field
$name = $_POST['name'];
$sex = $_POST['sex'];
$grade_section = $_POST['grade_section'];
$student_section = $_POST['student_section']; // Add Student Section field
$date_of_birth = $_POST['date_of_birth'];
$date_of_weighing = $_POST['date_of_weighing'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$bmi = $_POST['bmi'];
$nutritional_status_bmia = $_POST['nutritional_status_bmia'];
$nutritional_status_hfa = $_POST['nutritional_status_hfa'];

// Update query
$sql = "UPDATE beneficiary_details 
        SET lrn_no=?, 
            name=?, 
            sex=?, 
            grade_section=?, 
            student_section=?, 
            date_of_birth=?, 
            date_of_weighing=?, 
            age=?, 
            weight=?, 
            height=?, 
            bmi=?, 
            nutritional_status_bmia=?, 
            nutritional_status_hfa=? 
        WHERE id=?";

// Prepare statement to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssss", $lrn_no, $name, $sex, $grade_section, $student_section, $date_of_birth, $date_of_weighing, $age, $weight, $height, $bmi, $nutritional_status_bmia, $nutritional_status_hfa, $id);

if ($stmt->execute()) {
    // Log the activity if the email is set and the role is 'sbfp'
    if (isset($_SESSION['email']) && $_SESSION['role'] === 'sbfp') {
        $activity = "Updated beneficiary details for ID: $id";
        $activity_type = "update"; // Define the activity type
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
    
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
