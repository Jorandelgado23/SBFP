<?php
session_start(); // Ensure session is started

include("accountconnection.php");

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
$parent_phone = $_POST['parent_phone']; // Add Parent Phone field
$dewormed = $_POST['dewormed'];
$parents_consent_for_milk = $_POST['parents_consent_for_milk'];
$participation_in_4ps = $_POST['participation_in_4ps'];
$beneficiary_of_sbfp_in_previous_years = $_POST['beneficiary_of_sbfp_in_previous_years'];

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
            nutritional_status_hfa=?, 
            parent_phone=?,
            dewormed=?, 
            parents_consent_for_milk=?, 
            participation_in_4ps=?, 
            beneficiary_of_sbfp_in_previous_years=?
        WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssss", $lrn_no, $name, $sex, $grade_section, $student_section, $date_of_birth, $date_of_weighing, $age, $weight, $height, $bmi, $nutritional_status_bmia, $nutritional_status_hfa, $parent_phone, $dewormed, $parents_consent_for_milk, $participation_in_4ps, $beneficiary_of_sbfp_in_previous_years, $id);

$response = array(); // Initialize response array

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

    $response['success'] = true; // Indicate success
    $response['message'] = "Record updated successfully"; // Success message
} else {
    $response['success'] = false; // Indicate failure
    $response['message'] = "Error updating record: " . $stmt->error; // Error message
}

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the statement and connection
$stmt->close();
$conn->close();
?>
