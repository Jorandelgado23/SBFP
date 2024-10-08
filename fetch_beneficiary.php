<?php
include("accountconnection.php");


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
