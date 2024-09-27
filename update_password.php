<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$notification = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $notification = "Passwords do not match.";
    } else {
        // Check if the token is valid and not expired
        $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE reset_token = ?");
            $stmt->bind_param("ss", $hashed_password, $token);
            $stmt->execute();

            $notification = "Your password has been successfully changed.";
        } else {
            $notification = "Invalid or expired token.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <!-- site icon -->
    <link rel="icon" href="images/LOGO.png" type="image/png" />


    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.5717884565935749) 0%, rgba(0,0,0,0.8575027423078606) 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.5717884565935749) 0%, rgba(0,0,0,0.8575027423078606) 100%);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 500px;
            margin-bottom: 20px;
        }
        .notification {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .back-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <img src="images/LOGO.png" alt="Logo" class="logo">
    <?php if ($notification): ?>
        <div class="notification <?= strpos($notification, 'successfully') !== false ? 'success' : 'error' ?>">
            <?= $notification ?>
        </div>
    <?php endif; ?>
    <a href="login.php" class="back-button">Back to Login</a>
</div>

</body>
</html>
