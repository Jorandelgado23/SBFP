<?php
// Assuming you have a database connection established
$conn = new mysqli('localhost', 'root', '', 'sbfp');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the section_id from POST request
$section_id = $_POST['section_id'];

// SQL query to get the latest weighing session
$latest_session_sql = "
    SELECT ws.session_date, sy.school_year 
    FROM weighing_sessions ws
    JOIN school_years sy ON ws.school_year_id = sy.school_year_id
    WHERE ws.section_id = ?
    ORDER BY ws.session_date DESC
    LIMIT 1
";

$latest_session_stmt = $conn->prepare($latest_session_sql);
$latest_session_stmt->bind_param("i", $section_id);
$latest_session_stmt->execute();
$latest_session_stmt->bind_result($latest_weighing_date, $school_year);
$latest_session_stmt->fetch();
$latest_session_stmt->close();

// Close the database connection
$conn->close();

// Return response in JSON format
echo json_encode([
    'school_year' => $school_year,
    'weighing_date' => $latest_weighing_date ? date('d-m-Y', strtotime($latest_weighing_date)) : null
]);
?>
