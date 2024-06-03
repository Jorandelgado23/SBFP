<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO schools (division_province, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name, contact_number, email_address, total_beneficiaries) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssi", $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $contact_number, $email_address, $total_beneficiaries);


// Set parameters and execute
$division_province = $_POST['division_province'];
$school_district_municipality = $_POST['school_district_municipality'];
$school_name = $_POST['school_name'];
$beis_id = $_POST['beis_id'];
$school_address = $_POST['school_address'];
$barangay_name = $_POST['barangay_name'];
$supervisor_principal_name = $_POST['supervisor_principal_name'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$total_beneficiaries = $_POST['total_beneficiaries'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
