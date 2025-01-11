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

<<<<<<< HEAD
// ClickSend API credentials
$username = 'delgado2312';  // Your ClickSend username
$apiKey = 'B67D7603-BD80-2F41-C466-22FF2FE52530';  // Your ClickSend API key

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    // Adjust the attendance status based on the selected attendance mode
    $final_status = ($attendance_mode === 'Present') ? $attendance_status : ($attendance_status === 'Present' ? 'Absent' : 'Present');
    
    // Get the corresponding meal served
    $meal = $meal_served[$beneficiary_id];

    // Get beneficiary details (name, student_section, grade_section)
=======
// Movider API credentials
$apiKey = '2rTTPhe4AODsmZHIvxE0BBpgfSb';  // Replace with your Movider API key

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    $final_status = ($attendance_mode === 'Present') ? $attendance_status : ($attendance_status === 'Present' ? 'Absent' : 'Present');
    $meal = $meal_served[$beneficiary_id];

>>>>>>> cc86752 (Initial commit)
    $info_sql = "SELECT name, student_section, grade_section, parent_phone FROM beneficiary_details WHERE id = ?";
    $info_stmt = $conn->prepare($info_sql);
    $info_stmt->bind_param("i", $beneficiary_id);
    $info_stmt->execute();
    $info_stmt->store_result();
    $info_stmt->bind_result($name, $student_section, $grade_section, $parent_phone);
    $info_stmt->fetch();

<<<<<<< HEAD
    // Check if the attendance record already exists for this beneficiary and date
=======
>>>>>>> cc86752 (Initial commit)
    $check_sql = "SELECT id FROM beneficiary_attendance WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("iss", $beneficiary_id, $attendance_date, $session_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
<<<<<<< HEAD
        // Record exists, update the existing record
=======
>>>>>>> cc86752 (Initial commit)
        $update_sql = "UPDATE beneficiary_attendance SET status = ?, meal_served = ? WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssiss", $final_status, $meal, $beneficiary_id, $attendance_date, $session_id);
        $update_stmt->execute();
        $update_stmt->close();
<<<<<<< HEAD
        // Log the update activity
        $activity = "Updated attendance for beneficiary ID: $beneficiary_id";
    } else {
        // No record exists, insert a new record with additional fields
=======
        $activity = "Updated attendance for beneficiary ID: $beneficiary_id";
    } else {
>>>>>>> cc86752 (Initial commit)
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served, session_id, name, student_section, grade_section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isssssss", $beneficiary_id, $attendance_date, $final_status, $meal, $session_id, $name, $student_section, $grade_section);
        $insert_stmt->execute();
        $insert_stmt->close();
<<<<<<< HEAD

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

=======
        $activity = "Inserted attendance for beneficiary ID: $beneficiary_id";
    }

    if ($final_status === 'Absent' && !empty($parent_phone)) {
        $sms_body = "Dear Parent, your child $name is marked as absent on $attendance_date. Please contact us for more information.";
        $apiUrl = 'https://api.movider.co/v1/sms';

        $sms_data = [
            'to' => $parent_phone,
            'message' => $sms_body,
            'sender' => 'School'
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sms_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $sms_response = curl_exec($ch);

        if (curl_errno($ch)) {
            error_log('SMS Error: ' . curl_error($ch));
        } else {
            error_log('SMS Response: ' . $sms_response);
        }

        curl_close($ch);
    }

    $activity_type = "attendance_update";
    $timestamp = date("Y-m-d H:i:s");
>>>>>>> cc86752 (Initial commit)
    $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
    $log_stmt->execute();
    $log_stmt->close();

<<<<<<< HEAD
    // Insert into sbfp_recent_activity for SBFP role only
=======
>>>>>>> cc86752 (Initial commit)
    if ($_SESSION['role'] === 'sbfp') {
        $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $sbfp_activity_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
        $sbfp_activity_stmt->execute();
<<<<<<< HEAD
        $sbfp_activity_stmt->close(); // Close the SBFP statement here
=======
        $sbfp_activity_stmt->close();
>>>>>>> cc86752 (Initial commit)
    }

    $stmt->close();
    $info_stmt->close();
}

<<<<<<< HEAD
// Close the database connection
$conn->close();

// Redirect back to the attendance page or display a success message
=======
$conn->close();
>>>>>>> cc86752 (Initial commit)
header("Location: beneficiary_attendance.php?success=1");
exit();
?>
