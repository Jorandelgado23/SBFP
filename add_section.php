<?php
// Start session to access session variables
session_start();

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

    // Get the session_id of the logged-in user
    $email = $_SESSION['email']; // Assuming email is stored in session after login
    $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($session_id);
    $stmt->fetch();
    $stmt->close();

    // Check if the section name already exists for the same session_id
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM sections WHERE section_name = ? AND grade_id = ? AND session_id = ?");
    $check_stmt->bind_param("sis", $section_name, $grade_id, $session_id);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        // Section already exists
        echo "Error: Section '$section_name' already exists for Grade ID $grade_id.";
    } else {
        // Insert the section with session_id
        $stmt = $conn->prepare("INSERT INTO sections (section_name, grade_id, session_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $section_name, $grade_id, $session_id);

        if ($stmt->execute()) {
            // Set session success message and redirect
            $_SESSION['success'] = true;
            header("Location: weighing_sessions.php");
            exit();
        } else {
            echo "Error inserting section: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
