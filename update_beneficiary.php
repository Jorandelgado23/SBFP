<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from AJAX request
$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$grade_section = $_POST['grade_section'];
$date_of_birth = $_POST['date_of_birth'];
$date_of_weighing = $_POST['date_of_weighing'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$bmi = $_POST['bmi'];
$nutritional_status_bmia = $_POST['nutritional_status_bmia'];
$nutritional_status_hfa = $_POST['nutritional_status_hfa'];

// Update query
$sql = "UPDATE beneficiary_details SET name='$name', sex='$sex', grade_section='$grade_section', date_of_birth='$date_of_birth', date_of_weighing='$date_of_weighing', age='$age', weight='$weight', height='$height', bmi='$bmi', nutritional_status_bmia='$nutritional_status_bmia', nutritional_status_hfa='$nutritional_status_hfa' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
