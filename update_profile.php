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

// Initialize variables to store user data
$user_id = "";
$user_firstname = "";
$user_lastname = "";
$email = "";
$user_profile_picture = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate email (if necessary)
    $email = $_POST['email']; // Assuming email is not changed
    
    // Initialize variables for recent activity logging
    $activity = "";
    $activity_type = "";
    
    // Handle profile picture upload
    if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/'; // Directory where you store uploads
        $tmp_name = $_FILES['profile_picture']['tmp_name'];
        $profile_picture = $_FILES['profile_picture']['name'];
        
        // Move uploaded file to permanent location
        if (move_uploaded_file($tmp_name, $upload_dir . $profile_picture)) {
            // Update profile_picture field in the users table
            $sql = "UPDATE users SET profile_picture = '$profile_picture' WHERE email = '$email'";
            
            if ($conn->query($sql) === TRUE) {
                $activity = "Updated profile picture";
                $activity_type = "profile_picture_update";
                $user_profile_picture = $profile_picture; // Update user_profile_picture variable
            } else {
                echo "Error updating profile picture: " . $conn->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    }
    
    // Fetch user data including profile picture
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $user_firstname = $row['firstname'];
        $user_lastname = $row['lastname'];
        $email = $row['email'];
        $user_profile_picture = $row['profile_picture']; // Retrieve profile picture filename
    } else {
        echo "Error: User not found.";
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
        $activity = "Updated firstname and lastname";
        $activity_type = "name_update";
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
                    $activity = "Changed password";
                    $activity_type = "password_change";
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
    
    // Log the recent activity
    if (!empty($activity) && !empty($activity_type)) {
        $timestamp = date("Y-m-d H:i:s");
        $log_sql = "INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES ('$activity', '$email', '$activity_type', '$timestamp')";
        
        if ($conn->query($log_sql) === TRUE) {
            echo "Recent activity logged successfully.";
        } else {
            echo "Error logging recent activity: " . $conn->error;
        }
    }
}

// Redirect back to settings page
header("Location: adsettings.php");
exit();

$conn->close();
?>
