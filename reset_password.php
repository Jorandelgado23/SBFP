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
            background: url('images/background.jpg') no-repeat center center fixed;
            background-size: cover; /* Ensure the image covers the entire container */
            opacity: 0; /* Initially hide the body */
            transition: opacity 1s ease; /* Transition effect for the opacity */
        }

        body.fade-in {
            opacity: 1; /* Set opacity to 1 when the page loads */
        }

        .logo_login {
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent background for logo */
            width: 100%;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            margin: 0 auto; /* Center the inputs */
            display: block; /* Ensure the inputs are block-level elements */
            max-width: 300px; /* Limit the input width */
        }

        .main_bt {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
<div class="full_container">
    <div class="container">
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img width="250" src="images/LOGO.png" alt="#" />
                    </div>
                </div>
                <div class="login_form">
                    <div class="w-50 mx-auto form-container">
                        <form class="text-center" id="resetPasswordForm" method="post" action="update_password.php">
                            <h1 class="h6 mb-3">Reset Password</h1>
                            <fieldset>
                                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                                <div class="field form-group">
                                    <label class="label_field sr-only" for="inputPassword">New Password</label>
                                    <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="New Password" required>
                                </div>
                                <div class="field form-group">
                                    <label class="label_field sr-only" for="confirmPassword">Confirm Password</label>
                                    <input type="password" id="confirmPassword" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" required>
                                </div>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="btn btn-lg btn-primary btn-block main_bt" type="submit">Reset Password</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
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
