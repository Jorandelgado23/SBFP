<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO schools (session_id, division_province, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name, contact_number, email_address, total_beneficiaries) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssi", $session_id, $division_province, $school_district_municipality, $school_name, $beis_id, $school_address, $barangay_name, $supervisor_principal_name, $contact_number, $email_address, $total_beneficiaries);

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

if ($stmt->execute()) {
    echo '<script>
            window.onload = function() {
                swal({
                    title: "Success!",
                    text: "New record created successfully",
                    icon: "success"
                }).then(function() {
                    window.location = "form2.php";
                });
            }
          </script>';
} else {
    echo '<script>
            window.onload = function() {
                swal({
                    title: "Error!",
                    text: "Failed to create new record",
                    icon: "error"
                }).then(function() {
                    window.location = "form2.php";
                });
            }
          </script>';
}

$stmt->close();
$conn->close();
?>
