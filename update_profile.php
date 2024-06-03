<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Update user information
    $sql = "UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $id);
    if ($stmt->execute()) {
        echo "User information updated successfully.<br>";
    } else {
        echo "Error updating user information: " . $conn->error . "<br>";
    }

    // Handle password change if new password is provided
    if (!empty($new_password) && $new_password == $confirm_password) {
        // Check old password
        $check_password_sql = "SELECT password FROM users WHERE id=?";
        $stmt = $conn->prepare($check_password_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($old_password, $hashed_password)) {
                // Update password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password_sql = "UPDATE users SET password=? WHERE id=?";
                $stmt = $conn->prepare($update_password_sql);
                $stmt->bind_param("si", $hashed_new_password, $id);
                if ($stmt->execute()) {
                    echo "Password updated successfully.<br>";
                } else {
                    echo "Error updating password: " . $conn->error . "<br>";
                }
            } else {
                echo "Old password is incorrect.<br>";
            }
        }
    }

    // Handle profile picture upload
    if ($_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["profile_picture"]["tmp_name"];
        $name = basename($_FILES["profile_picture"]["name"]);
        $destination_dir = "./assets/avatars/";
        if (!file_exists($destination_dir)) {
            mkdir($destination_dir, 0777, true);
        }
        $destination = $destination_dir . $name;
        if (move_uploaded_file($tmp_name, $destination)) {
            // Update profile picture in database
            $update_picture_sql = "UPDATE users SET profile_picture=? WHERE id=?";
            $stmt = $conn->prepare($update_picture_sql);
            $stmt->bind_param("si", $name, $id);
            if ($stmt->execute()) {
                echo "Profile picture updated successfully.<br>";
            } else {
                echo "Error updating profile picture: " . $conn->error . "<br>";
            }
        } else {
            echo "Error uploading profile picture.<br>";
        }
    }
}

$conn->close();
?>
