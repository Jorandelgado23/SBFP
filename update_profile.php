<?php
session_start(); // Start session if not already started

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $id = $_SESSION['user_id']; // Assuming you have stored user_id in the session
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Update user information
    $sql = "UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $id);
    $stmt->execute();

    // Check and update password if provided
    if (!empty($new_password) && $new_password === $confirm_password) {
        // Fetch hashed password from the database
        $check_password_sql = "SELECT password FROM users WHERE id=?";
        $stmt = $conn->prepare($check_password_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            // Verify old password
            if (password_verify($old_password, $hashed_password)) {
                // Hash and update new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password_sql = "UPDATE users SET password=? WHERE id=?";
                $stmt = $conn->prepare($update_password_sql);
                $stmt->bind_param("si", $hashed_new_password, $id);
                $stmt->execute();
            } else {
                echo "Old password is incorrect.";
            }
        }
    }

    // Upload and update profile picture if provided
    if ($_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["profile_picture"]["tmp_name"];
        $name = basename($_FILES["profile_picture"]["name"]);
        $destination_dir = "./assets/avatars/";
        if (!file_exists($destination_dir)) {
            mkdir($destination_dir, 0777, true);
        }
        $destination = $destination_dir . $name;
        if (move_uploaded_file($tmp_name, $destination)) {
            $update_picture_sql = "UPDATE users SET profile_picture=? WHERE id=?";
            $stmt = $conn->prepare($update_picture_sql);
            $stmt->bind_param("si", $name, $id);
            $stmt->execute();
            echo "Profile picture updated successfully.";
        } else {
            echo "Error uploading profile picture.";
        }
    }
}

$conn->close();
?>
