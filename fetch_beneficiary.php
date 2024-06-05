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

// Fetch beneficiary data
$sql = "SELECT * FROM beneficiary_details WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode([]);
}

$conn->close();
?>
