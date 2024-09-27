<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

if (!empty($_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, phone_number=?, birthday=?, role=?, `Division/Province`=?, school_district_municipality=?, school_name=?, beis_id=?, school_address=?, barangay_name=?, supervisor_principal_name=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssi", $firstname, $lastname, $email, $phone_number, $birthday, $role, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $password, $id);
} else {
    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, phone_number=?, birthday=?, role=?, `Division/Province`=?, school_district_municipality=?, school_name=?, beis_id=?, school_address=?, barangay_name=?, supervisor_principal_name=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssi", $firstname, $lastname, $email, $phone_number, $birthday, $role, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $id);
}

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
