<?php
include("accountconnection.php");

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
            background: url('images/notext.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
          
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23) !important;
            text-align: center;
           
        }

        .login-container img {
            display: block;
            margin: 0 auto 20px;
            width: 100px; /* Adjusted logo size */
        }

        .login-container h2 {
            color: #0a53be; /* Blue color for the title */
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-control {
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #0a53be;
            border-color: #0a53be;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #084298;
        }

        .register-link {
            display: block;
            margin-top: 10px;
        }

        .register-link a {
            color: #0a53be;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .signin-image img {
            width: 50%;
            max-width: 400px;
        }

        .card-gov.card-outline {
    border-top: 3px solid #003594;
}
    </style>
</head>
<body>

<div class="card card-outline card-gov elevation-3">
<div class="login-container">
    <div class="signin-image">
        <img src="images/logo/semilogo.png" alt="Logo" class="logo"> <!-- Updated logo path -->
        <div></div>
        <?php if ($notification): ?>
            <div class="notification <?= strpos($notification, 'successfully') !== false ? 'success' : 'error' ?>">
                <?= $notification ?>
            </div>
        <?php endif; ?>

        <a href="login.php" class="back-button">Back to Login</a>
    </div>
</div>


</body>
</html>
