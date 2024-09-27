<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include Composer's autoloader

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
            font-family: Arial, sans-serif;
            background: rgb(10,10,10);
            background: radial-gradient(circle, rgba(10,10,10,0.5717884565935749) 0%, rgba(0,0,0,0.8575027423078606) 100%);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.5717884565935749) 0%, rgba(0,0,0,0.8575027423078606) 100%);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 120px;
        }
        .content {
            text-align: center;
        }
        .content h1 {
            color: #fff;
        }
        .content p {
            font-size: 16px;
            color: #fff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="http://localhost/sbfp/logo.png" alt="Your Logo">
        </div>
        <div class="content">
            <h1>Password Reset Request</h1>
            <p>We received a request to reset your password. Click on the button below to reset your password:</p>
            <a href="' . $reset_link . '" class="button">Reset Password</a>
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
            cursor: pointer;
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
        <div class="notification <?= strpos($notification, 'reset link has been sent') !== false ? 'success' : 'error' ?>">
            <?= $notification ?>
        </div>
    <?php endif; ?>
    <a href="login.php" class="back-button">Back to Login</a>
</div>

</body>
</html>
