<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include Composer's autoloader

include("accountconnection.php");

$notification = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send reset link to user's email
        $reset_link = "http://localhost/sbfp/reset_password.php?token=" . $token;
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                           // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';      // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                  // Enable SMTP authentication
            $mail->Username   = 'jorandelgado23@gmail.com'; // SMTP username
            $mail->Password   = 'btlk bmiu xtqe jpac';       // SMTP password
            $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                   // TCP port to connect to

          // Recipients
$mail->setFrom('your_email@gmail.com', 'Your Name');
$mail->addAddress($email); // Add a recipient

// Content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'Password Reset Request';

// HTML content for the email body
$mail->Body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset Request</title>
    <style>
        body {
            background: url("images/notext.jpg") no-repeat center center fixed;
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
            color: #fff; /* Added text color for the button */
            width: 100%;
            padding: 10px; /* Added padding for better button appearance */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
        }

        .btn-primary:hover {
            background-color: #084298;
        }

        .forgot-password {
            margin-top: 20px; /* Space above the link */
        }

        .forgot-password a {
            color: #0a53be;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .card-gov.card-outline {
            border-top: 3px solid #003594;
        }
    </style>
</head>
<body>
    <div class="login-container card card-outline card-gov elevation-3">
        <div class="signin-image">
            <img src="http://localhost/sbfp/logo.png" alt="Your Logo"> <!-- Placeholder for logo -->
        </div>
        <h2>Password Reset Request</h2>
        <div class="content">
            <p>We received a request to reset your password. Click the button below to reset it:</p>
            <a href="' . $reset_link . '" class="btn btn-primary">Reset Password</a>
            <p>If you did not request a password reset, please ignore this email.</p>
        </div>
    </div>
</body>
</html>
';



// Alternative text content for email clients that do not support HTML
$mail->AltBody = 'Click on this link to reset your password: ' . $reset_link;

            $mail->send();
            $notification = 'A reset link has been sent to your email address.';
        } catch (Exception $e) {
            $notification = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $notification = "No account found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
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
        </div>
        
        <?php if ($notification): ?>
            <div class="notification <?= strpos($notification, 'reset link has been sent') !== false ? 'success' : 'error' ?>">
                <?= $notification ?>
            </div>
        <?php endif; ?>

        <a href="login.php" class="back-button">Back to Login</a>
    </div>
</div>


</body>
</html>
