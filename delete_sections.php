<?php
// add_section.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['section_ids'])) {
    $section_ids = $_POST['section_ids'];

    // Prepare the statement for deletion
    $placeholders = implode(',', array_fill(0, count($section_ids), '?'));
    $stmt = $conn->prepare("DELETE FROM sections WHERE section_id IN ($placeholders)");
    
    // Dynamically bind parameters
    $stmt->bind_param(str_repeat('i', count($section_ids)), ...$section_ids);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Sections deleted successfully!';
    } else {
        $_SESSION['error'] = 'Error deleting sections: ' . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the page where sections are listed
    header("Location: weighing_sessions.php");
    exit();
} else {
    echo "No sections selected for deletion.";
}
?>
