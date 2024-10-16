<?php
// Start session and check user login status
session_start();

// Include database connection
include("accountconnection.php");

// Retrieve submitted form data
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];
$meal_served = $_POST['meal_served'];

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    // Get the corresponding meal served
    $meal = $meal_served[$beneficiary_id];

    // Check if the attendance record already exists for this beneficiary and date
    $check_sql = "SELECT id FROM beneficiary_attendance WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
    $stmt = $conn->prepare($check_sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error); // Error handling
    }
    $stmt->bind_param("iss", $beneficiary_id, $attendance_date, $session_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Record exists, update the existing record
        $update_sql = "UPDATE beneficiary_attendance SET status = ?, meal_served = ? WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        if (!$update_stmt) {
            die("Error preparing update statement: " . $conn->error); // Error handling
        }
        $update_stmt->bind_param("ssiss", $attendance_status, $meal, $beneficiary_id, $attendance_date, $session_id);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // No record exists, insert a new record
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served, session_id) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        if (!$insert_stmt) {
            die("Error preparing insert statement: " . $conn->error); // Error handling
        }
        $insert_stmt->bind_param("issss", $beneficiary_id, $attendance_date, $attendance_status, $meal, $session_id);
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
