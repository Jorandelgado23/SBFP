<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

// Fetch user email or name and session_id before deletion for logging
$sql = "SELECT email, session_id FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($user_email, $session_id);
$stmt->fetch();
$stmt->close();

$response = array();

if (isset($session_id)) {
    // Delete records from other tables based on session_id
    $tables = ['milkcomponent', 'beneficiary_details', 'beneficiaries'];

    foreach ($tables as $table) {
        $delete_sql = "DELETE FROM $table WHERE session_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $session_id);
        $delete_stmt->execute();
        $delete_stmt->close();
    }
}

// Delete user from the users table
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Log the activity if the deletion was successful
    if (isset($user_email)) {
        $activity = "Deleted user with email: $user_email (ID: $id)";
        $activity_type = "delete"; // Define the activity type
        $timestamp = date("Y-m-d H:i:s");

        // Prepare statement for logging recent_activity
        $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $activity, $user_email, $activity_type, $timestamp);
        $log_stmt->execute();
        $log_stmt->close();
    }

    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
