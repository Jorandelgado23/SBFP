<?php
session_start();

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $firstname, $lastname, $email, $hashed_password, $role);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a session
            $_SESSION['id'] = $id;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email; // Store email in session
            $_SESSION['role'] = $role;

            // Log the activity
            $activity = "User logged in";
            $activity_type = "login"; // Define the activity type
            $timestamp = date("Y-m-d H:i:s");

            // Insert into recent_activity
            $recent_activity_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
            $recent_activity_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
            $recent_activity_stmt->execute();
            $recent_activity_stmt->close();

            // Insert into sbfp_recent_activity for SBFP role only
            if ($role === 'sbfp') {
                $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (email, activity, activity_type, timestamp) VALUES (?, ?, ?, ?)");
                $sbfp_activity_stmt->bind_param("ssss", $email, $activity, $activity_type, $timestamp);
                $sbfp_activity_stmt->execute();
                $sbfp_activity_stmt->close();
            }

            // Return JSON response indicating success
            echo json_encode(array('success' => true, 'role' => $role));
            exit();
        } else {
            // Invalid password
            echo json_encode(array('success' => false, 'message' => 'Invalid password.'));
            exit();
        }
    } else {
        // No user found with that email address
        echo json_encode(array('success' => false, 'message' => 'No user found with that email address.'));
        exit();
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
