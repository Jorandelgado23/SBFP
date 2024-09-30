<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Retrieve POST data
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$birthday = $_POST['birthday'];
$role = $_POST['role'];
$division_province = $_POST['division_province'];
$school_district_municipality = $_POST['school_district_municipality'];
$school_name = $_POST['school_name'];
$beis_id = $_POST['beis_id'];
$school_address = $_POST['school_address'];
$barangay_name = $_POST['barangay_name'];
$supervisor_principal_name = $_POST['supervisor_principal_name'];
$password = $_POST['password'] ?? ''; // Get password if provided

// Prepare the SQL statement
if (!empty($password)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, phone_number=?, birthday=?, role=?, `Division/Province`=?, school_district_municipality=?, school_name=?, beis_id=?, school_address=?, barangay_name=?, supervisor_principal_name=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die(json_encode(['success' => false, 'message' => 'Failed to prepare statement: ' . $conn->error]));
    }
    $stmt->bind_param("ssssssssssssssi", $firstname, $lastname, $email, $phone_number, $birthday, $role, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $passwordHash, $id);
} else {
    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, phone_number=?, birthday=?, role=?, `Division/Province`=?, school_district_municipality=?, school_name=?, beis_id=?, school_address=?, barangay_name=?, supervisor_principal_name=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die(json_encode(['success' => false, 'message' => 'Failed to prepare statement: ' . $conn->error]));
    }
    $stmt->bind_param("sssssssssssssi", $firstname, $lastname, $email, $phone_number, $birthday, $role, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $id);
}

// Execute the prepared statement
$response = array();
if ($stmt->execute()) {
    // Log the activity if the update was successful
    if (isset($email)) { // Assuming $email contains the user email
        $activity = "Updated user with email: $email (ID: $id)";
        $activity_type = "update"; // Define the activity type
        $timestamp = date("Y-m-d H:i:s");

        // Prepare statement for logging recent_activity
        $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
        $log_stmt->execute();
        $log_stmt->close();
    }

    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['message'] = 'Error updating record: ' . $stmt->error;  // Provide the error message
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return response as JSON
echo json_encode($response);
?>
