<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sbfp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $milk_tolerance = $_POST['milk_tolerance'];

    // Fetch user email and role from session (ensure they are set)
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

    // Update the milk tolerance
    $stmt = $conn->prepare("UPDATE milkcomponent SET milk_tolerance = ? WHERE id = ?");
    $stmt->bind_param("si", $milk_tolerance, $id);

    if ($stmt->execute()) {
        // Log the activity if the email is set and the role is 'sbfp'
        if (isset($email) && $role === 'sbfp') {
            $activity = "Updated milk tolerance for ID: $id";
            $activity_type = "update"; // Define the activity type
            $timestamp = date("Y-m-d H:i:s");

            // Insert into recent_activity
            $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
            $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
            $log_stmt->execute();
            $log_stmt->close();

            // Insert into sbfp_recent_activity
            $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (email, activity, activity_type, timestamp) VALUES (?, ?, ?, ?)");
            $sbfp_activity_stmt->bind_param("ssss", $email, $activity, $activity_type, $timestamp);
            $sbfp_activity_stmt->execute();
            $sbfp_activity_stmt->close();
        }

        header("Location: form6.php?success=1");
    } else {
        header("Location: form6.php?error=1");
    }

    $stmt->close();
    $conn->close();
}
?>
