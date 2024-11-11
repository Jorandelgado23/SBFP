<?php
// Start session and check user login status
session_start();

// Include database connection
include("accountconnection.php");

// Retrieve submitted form data
$attendance_date = $_POST['attendance_date'];
$status = $_POST['status'];
$meal_served = $_POST['meal_served'];
$attendance_mode = $_POST['attendance_mode']; // Retrieve the selected attendance mode (Present/Absent)

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// ClickSend API credentials
$username = 'joran2312';  // Your ClickSend username
$apiKey = 'EB59DEAA-98B2-5648-FB90-4BD97EA1CFDA';  // Your ClickSend API key

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    // Adjust the attendance status based on the selected attendance mode
    $final_status = ($attendance_mode === 'Present') ? $attendance_status : ($attendance_status === 'Present' ? 'Absent' : 'Present');
    
    // Get the corresponding meal served
    $meal = $meal_served[$beneficiary_id];

    // Get beneficiary details (name, student_section, grade_section)
    $info_sql = "SELECT name, student_section, grade_section, parent_phone FROM beneficiary_details WHERE id = ?";
    $info_stmt = $conn->prepare($info_sql);
    $info_stmt->bind_param("i", $beneficiary_id);
    $info_stmt->execute();
    $info_stmt->store_result();
    $info_stmt->bind_result($name, $student_section, $grade_section, $parent_phone);
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
        $update_stmt->bind_param("ssiss", $final_status, $meal, $beneficiary_id, $attendance_date, $session_id);
        $update_stmt->execute();
        $update_stmt->close();

        // Log the update activity
        $activity = "Updated attendance for beneficiary ID: $beneficiary_id";
    } else {
        // No record exists, insert a new record with additional fields
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served, session_id, name, student_section, grade_section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isssssss", $beneficiary_id, $attendance_date, $final_status, $meal, $session_id, $name, $student_section, $grade_section);
        $insert_stmt->execute();
        $insert_stmt->close();

        // Log the insert activity
        $activity = "Inserted attendance for beneficiary ID: $beneficiary_id";
    }

    // If the beneficiary is absent, send SMS notification
    if ($final_status === 'Absent' && !empty($parent_phone)) {
        // Prepare SMS message
        $sms_body = "Dear Parent, your child $name is marked as absent on $attendance_date. Please contact us for more information.";
        
        // SMS details
        $sms_data = [
            'messages' => [
                [
                    'source' => 'php',
                    'to' => $parent_phone,
                    'body' => $sms_body,
                ],
            ],
        ];

        // ClickSend API URL
        $apiUrl = 'https://rest.clicksend.com/v3/sms/send';

        // Initialize cURL for SMS
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$apiKey");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sms_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        // Execute the request
        $sms_response = curl_exec($ch);

        // Check for SMS errors
        if (curl_errno($ch)) {
            error_log('SMS Error: ' . curl_error($ch));
        } else {
            // Log the SMS response if needed
            error_log('SMS Response: ' . $sms_response);
        }

        // Close cURL
        curl_close($ch);
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
