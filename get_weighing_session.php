<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'sbfp');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the section ID from the query string
$section_id = isset($_GET['section_id']) ? intval($_GET['section_id']) : 0;

// Prepare the SQL query to get the latest weighing session
$sql = "SELECT ws.session_date, ws.school_year 
        FROM weighing_sessions ws 
        WHERE ws.section_id = ? 
        ORDER BY ws.session_date DESC LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $section_id);
$stmt->execute();
$stmt->bind_result($weighing_date, $school_year);
$stmt->fetch();
$stmt->close();
$conn->close();

// Prepare the response
$response = [
    'weighing_date' => $weighing_date ? date('d-m-Y', strtotime($weighing_date)) : 'N/A',
    'school_year' => $school_year ? $school_year : 'N/A'
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
