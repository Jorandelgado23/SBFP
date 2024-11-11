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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $section_name = $_POST['section_name'];
    $grade_id = $_POST['grade_id'];

    // Check if the section name already exists
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM sections WHERE section_name = ? AND grade_id = ?");
    $check_stmt->bind_param("si", $section_name, $grade_id);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        // Section name already exists
        echo "Error: Section '$section_name' already exists for Grade ID $grade_id.";
    } else {
        // Prepare and bind the SQL statement for insertion
        $stmt = $conn->prepare("INSERT INTO sections (section_name, grade_id) VALUES (?, ?)");
        $stmt->bind_param("si", $section_name, $grade_id);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            // Set session variable and redirect
            session_start(); // Start the session here
            $_SESSION['success'] = true; // Set the session variable
            header("Location: weighing_sessions.php"); // Change to the page you want to redirect to
            exit();
        } else {
            echo "Error inserting section: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>
