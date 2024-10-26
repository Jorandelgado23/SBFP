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

    // Get beneficiary details (name, student_section, grade_section)
    $info_sql = "SELECT name, student_section, grade_section FROM beneficiary_details WHERE id = ?";
    $info_stmt = $conn->prepare($info_sql);
    $info_stmt->bind_param("i", $beneficiary_id);
    $info_stmt->execute();
    $info_stmt->store_result();
    $info_stmt->bind_result($name, $student_section, $grade_section);
    $info_stmt->fetch();

    // Check if the attendance record already exists for this beneficiary and date
    $check_sql = "SELECT id FROM beneficiary_attendance WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("iss", $beneficiary_id, $attendance_date, $session_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Record exists, update the existing record
        $update_sql = "UPDATE beneficiary_attendance SET status = ?, meal_served = ? WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssiss", $attendance_status, $meal, $beneficiary_id, $attendance_date, $session_id);
        $update_stmt->execute();
        $update_stmt->close();
        
        // Log the update activity
        $activity = "Updated attendance for beneficiary ID: $beneficiary_id";
    } else {
        // No record exists, insert a new record with additional fields
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served, session_id, name, student_section, grade_section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isssssss", $beneficiary_id, $attendance_date, $attendance_status, $meal, $session_id, $name, $student_section, $grade_section);
        $insert_stmt->execute();
        $insert_stmt->close();

        // Log the insert activity
        $activity = "Inserted attendance for beneficiary ID: $beneficiary_id";
    }

    // Log the activity in recent_activity table
    $activity_type = "attendance_update";
    $timestamp = date("Y-m-d H:i:s");

    $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
    $log_stmt->execute();
    $log_stmt->close();

    // Insert into sbfp_recent_activity for SBFP role only
    if ($_SESSION['role'] === 'sbfp') {
        $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $sbfp_activity_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
        $sbfp_activity_stmt->execute();
        $sbfp_activity_stmt->close(); // Close the SBFP statement here
    }

    $stmt->close();
    $info_stmt->close();
}

// Close the database connection
$conn->close();

// Redirect back to the attendance page or display a success message
header("Location: beneficiary_attendance.php?success=1");
exit();
?>
