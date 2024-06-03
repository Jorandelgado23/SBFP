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

$sql = "INSERT INTO users (role, firstname, lastname, email, phone_number, birthday, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $role, $firstname, $lastname, $email, $phone_number, $birthday, $password);

$response = array();

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
