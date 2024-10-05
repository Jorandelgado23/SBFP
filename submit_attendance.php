<?php
// Start session
session_start();

// Include database connection
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

// Retrieve submitted form data
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];
$meal_served = $_POST['meal_served'];

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    // Get the corresponding meal served
    $meal = $meal_served[$beneficiary_id];

    // Check if the attendance record already exists for this beneficiary and date
    $check_sql = "SELECT id FROM beneficiary_attendance WHERE beneficiary_id = ? AND attendance_date = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("is", $beneficiary_id, $attendance_date);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Record exists, update the existing record
        $update_sql = "UPDATE beneficiary_attendance SET status = ?, meal_served = ? WHERE beneficiary_id = ? AND attendance_date = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssis", $attendance_status, $meal, $beneficiary_id, $attendance_date);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // No record exists, insert a new record
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isss", $beneficiary_id, $attendance_date, $attendance_status, $meal);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    $stmt->close();
}

// Close the database connection
$conn->close();

// Redirect back to the attendance page or display a success message
header("Location: beneficiary_attendance.php?success=1");
exit();
?>
