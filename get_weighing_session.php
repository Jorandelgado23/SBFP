<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$database = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['section_id'])) {
    $section_id = $_GET['section_id'];

    // Get the latest weighing session for the given section
    $sql = "
        SELECT ws.session_date, ws.school_year 
        FROM weighing_sessions ws 
        WHERE ws.section_id = ? 
        ORDER BY ws.session_date DESC 
        LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $section_id);
    $stmt->execute();
    $stmt->bind_result($weighing_date, $school_year);
    $stmt->fetch();

    // Prepare the response
    $response = [
        'weighing_date' => $weighing_date ?: 'N/A',
        'school_year' => $school_year ?: 'N/A'
    ];

    // Send the response as JSON
    echo json_encode($response);
}

$conn->close();
?>
