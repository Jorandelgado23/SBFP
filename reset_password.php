<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- Site Metas -->
    <title>SBFP LOGIN PAGE</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icon -->
    <link rel="icon" href="images/LOGO.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Color CSS -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- Select Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- Calendar File CSS -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<div>
<div class="card card-outline card-gov elevation-3">
    <div class="login-container">
        <div class="signin-image">
            <img src="images/logo/semilogo.png" alt="Logo"> <!-- Placeholder for logo -->
        </div>
        <h2>Reset Password</h2>
        <form id="resetPasswordForm" method="post" action="update_password.php">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="form-group">
                <label for="inputPassword">New Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="New Password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
            <button class="btn btn-primary" type="submit">Reset Password</button>
        </form>
        <div class="forgot-password">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
</div>



    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Wow Animation -->
    <script src="js/animate.js"></script>
    <!-- Select Country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- Nice Scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    <!-- SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('fade-in');
        });

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get form data
            const formData = new FormData(this);

            // Send form data to login authentication script
            fetch('loginauth.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect based on role
                    if (data.role === 'admin') {
                        window.location.href = 'admindashboard.php';
                    } else if (data.role === 'sbfp') {
                        window.location.href = 'dashboard.php';
                    } else {
                        // Invalid role
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid role!'
                        });
                    }
                } else {
                    // Display error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            })
            .catch(error => {
                // Handle network error
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred. Please try again later.'
                });
            });
        });
    </script>
</body>
</html>
