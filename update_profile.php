<?php
session_start(); // Start the session to access session variables

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
    
    // Sanitize and validate email (if necessary)
    $email = $_POST['email']; // Assuming email is not changed
    
    // Handle profile picture upload
    if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = './uploads/'; // Directory where you store uploads
        $tmp_name = $_FILES['profile_picture']['tmp_name'];
        $profile_picture = $_FILES['profile_picture']['name'];
        
        // Move uploaded file to permanent location
        if (move_uploaded_file($tmp_name, $upload_dir . $profile_picture)) {
            // Update profile_picture field in the users table
            $sql = "UPDATE users SET profile_picture = '$profile_picture' WHERE email = '$email'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Profile picture updated successfully.";
            } else {
                echo "Error updating profile picture: " . $conn->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    }
    
    // Handle other profile information updates
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Update firstname and lastname
    $sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname' WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Firstname and lastname updated successfully.";
    } else {
        echo "Error updating firstname and lastname: " . $conn->error;
    }
    
    // Handle password change if new password is provided
    if (!empty($new_password)) {
        // Verify old password first
        $sql = "SELECT password FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            
            // Verify old password
            if (password_verify($old_password, $hashed_password)) {
                // Hash new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                
                // Update password in the database
                $sql = "UPDATE users SET password = '$hashed_new_password' WHERE email = '$email'";
                if ($conn->query($sql) === TRUE) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                echo "Old password is incorrect.";
            }
        } else {
            echo "Error: User not found.";
        }
    }
}

$conn->close();
?>
