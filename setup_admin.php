<?php
// Include database connection
include("accountconnection.php");

// Define default admin credentials
$email = 'mainadmin@sbfp.ph';
$plainPassword = 'mainadminsbfp';
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
$role = 'admin';
$session_id = 'default_session_id';
$passcode = 'sbfpadmin'; // Define your passcode

// Check if the MAIN_ADMIN user already exists
$sql = "SELECT COUNT(*) as count FROM `users` WHERE `email` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// If the admin user does not exist, insert it
if ($row['count'] == 0) {
    $sqlInsert = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `role`, `session_id`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param("ssssss", $firstname, $lastname, $email, $hashedPassword, $role, $session_id);

    $firstname = 'MAIN';
    $lastname = 'ADMIN';

    if ($stmtInsert->execute()) {
        echo "Default MAIN_ADMIN user created successfully.";

        // Create the note content
        $noteContent = "Email: $email\n";
        $noteContent .= "Password: $plainPassword\n"; // use plain password for note
        $noteContent .= "Passcode: $passcode\n";

        // Define the filename
        $filename = "admin_credentials.txt";

        // Force download of the file
        header('Content-Type: text/plain');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Content-Length: ' . strlen($noteContent));
        echo $noteContent;
        exit; // Terminate the script after download
    } else {
        echo "Error creating MAIN_ADMIN user: " . $stmtInsert->error;
    }
    $stmtInsert->close();
} else {
    echo "MAIN_ADMIN user already exists.";
}

$stmt->close();
$conn->close();
