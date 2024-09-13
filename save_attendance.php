<?php
session_start(); // Start session if not already started

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if attendance data is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['attendance'])) {
    // Get current session ID
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($current_session_id);
    $stmt->fetch();
    $stmt->close();

    $attendance = $_POST['attendance'];
    $attendanceDate = date('Y-m-d'); // Use the current date for attendance

    foreach ($attendance as $studentId => $days) {
        // Check if the student belongs to the current session
        $stmt = $conn->prepare("SELECT session_id, grade_section, name FROM beneficiary_details WHERE id = ?");
        $stmt->bind_param("i", $studentId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($session_id, $grade_section, $studentName);
        $stmt->fetch();

        if ($session_id !== $current_session_id) {
            continue; // Skip this student if session_id does not match
        }
        $stmt->close();

        foreach ($days as $day => $status) {
            // Ensure that the status is valid and not empty
            if (!empty($status)) {
                // Insert or update attendance record
                $stmt = $conn->prepare("INSERT INTO attendance (student_id, student_name, grade_section, attendance_date, status) 
                                        VALUES (?, ?, ?, ?, ?)
                                        ON DUPLICATE KEY UPDATE status=?");
                $stmt->bind_param("isssss", $studentId, $studentName, $grade_section, $attendanceDate, $status, $status);

                if (!$stmt->execute()) {
                    echo "Error: " . $stmt->error . "<br>";
                }
                $stmt->close();
            }
        }
    }

    echo "Attendance saved successfully!";
} else {
    echo "No attendance data received.";
}

$conn->close();
?>
