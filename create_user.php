<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$role = $_POST['role'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$birthday = $_POST['birthday'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password before storing

// Check if the role is not 'admin' before generating session ID
if ($role != 'admin') {
    $session_id = generateRandomString(8); // Generate session ID
} else {
    $session_id = ''; // Set session ID to empty for 'admin' role
}

$sql = "INSERT INTO users (role, firstname, lastname, email, phone_number, birthday, password, session_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $role, $firstname, $lastname, $email, $phone_number, $birthday, $password, $session_id);

$response = array();

if ($stmt->execute()) {
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
