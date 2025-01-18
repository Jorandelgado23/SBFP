<?php
// Start session and check user login status
session_start();

// Redirect if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include("accountconnection.php");

// Retrieve submitted form data, with validation
if (isset($_POST['attendance_date'], $_POST['status'], $_POST['meal_served'], $_POST['attendance_mode'])) {
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];
    $meal_served = $_POST['meal_served'];
    $attendance_mode = $_POST['attendance_mode'];
} else {
    die('Required data not found.');
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

// Nexmo API credentials
$apiKey = '1cd1a24a';  // Nexmo API key
$apiSecret = '7gjMFvy9Qsz0nT9H';  // Nexmo API secret
$from = 'SchoolAdmin';  // Sender name

// Function to send SMS via Nexmo API
function sendSms($to, $message) {
    global $apiKey, $apiSecret, $from;

    $url = 'https://rest.nexmo.com/sms/json';

    // Prepare the payload
    $data = [
        'api_key' => $apiKey,
        'api_secret' => $apiSecret,
        'to' => $to,
        'from' => $from,
        'text' => $message,
    ];

    // Set up cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'SMS sent successfully: ' . $response;
    }

    // Close the cURL handle
    curl_close($ch);
}

// Loop through each beneficiary
foreach ($status as $beneficiary_id => $attendance_status) {
    $final_status = ($attendance_mode === 'Present') ? $attendance_status : ($attendance_status === 'Present' ? 'Absent' : 'Present');
    $meal = $meal_served[$beneficiary_id];

    // Retrieve beneficiary details
    $info_sql = "SELECT name, student_section, grade_section, parent_phone FROM beneficiary_details WHERE id = ?";
    $info_stmt = $conn->prepare($info_sql);
    $info_stmt->bind_param("i", $beneficiary_id);
    $info_stmt->execute();
    $info_stmt->store_result();
    $info_stmt->bind_result($name, $student_section, $grade_section, $parent_phone);
    $info_stmt->fetch();

    // Check attendance record
    $check_sql = "SELECT id FROM beneficiary_attendance WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("iss", $beneficiary_id, $attendance_date, $session_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $update_sql = "UPDATE beneficiary_attendance SET status = ?, meal_served = ? WHERE beneficiary_id = ? AND attendance_date = ? AND session_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssiss", $final_status, $meal, $beneficiary_id, $attendance_date, $session_id);
        $update_stmt->execute();
        $update_stmt->close();
        $activity = "Updated attendance for beneficiary ID: $beneficiary_id";
    } else {
        $insert_sql = "INSERT INTO beneficiary_attendance (beneficiary_id, attendance_date, status, meal_served, session_id, name, student_section, grade_section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("isssssss", $beneficiary_id, $attendance_date, $final_status, $meal, $session_id, $name, $student_section, $grade_section);
        $insert_stmt->execute();
        $insert_stmt->close();
        $activity = "Inserted attendance for beneficiary ID: $beneficiary_id";
    }

    // Send SMS if absent
    if ($final_status === 'Absent' && !empty($parent_phone)) {
        $sms_body = "Dear Parent, your child $name is absent on $attendance_date. Please contact us for more info.";
        sendSms($parent_phone, $sms_body);
    }

    // Log activity
    $activity_type = "attendance_update";
    $timestamp = date("Y-m-d H:i:s");
    $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
    $log_stmt->execute();
    $log_stmt->close();

    $stmt->close();
    $info_stmt->close();
}

// Set status message for response
$res_status = 'success'; 
$res_msg = 'Attendance has been successfully updated.';
$_SESSION['response'] = array( 
    'status' => $res_status, 
    'msg' => $res_msg 
);

$conn->close();

// Redirect to beneficiary_attendance.php
header("Location: beneficiary_attendance.php?success=1");
exit();
?>
