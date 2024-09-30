<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$role = $_POST['role'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$birthday = $_POST['birthday'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password before storing
$division_province = $_POST['division_province'];
$school_district_municipality = $_POST['school_district_municipality'];
$school_name = $_POST['school_name'];
$beis_id = $_POST['beis_id'];
$school_address = $_POST['school_address'];
$barangay_name = $_POST['barangay_name'];
$supervisor_principal_name = $_POST['supervisor_principal_name'];

// Check if the role is not 'admin' before generating session ID
if ($role != 'admin') {
    $session_id = generateRandomString(8); // Generate session ID
} else {
    $session_id = ''; // Set session ID to empty for 'admin' role
}

// Prepare SQL for inserting user data
$sql = "INSERT INTO users (role, firstname, lastname, email, phone_number, birthday, password, session_id, `Division/Province`, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssss", $role, $firstname, $lastname, $email, $phone_number, $birthday, $password, $session_id, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name);

$response = array();

if ($stmt->execute()) {
    // Log the activity if the insertion was successful
    $activity = "Created user with email: $email"; // Log user creation
    $activity_type = "create"; // Define the activity type
    $timestamp = date("Y-m-d H:i:s");

    // Prepare statement for logging recent_activity
    $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
    $log_stmt->execute();
    $log_stmt->close();

    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);

// Function to generate random alphanumeric string
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
