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
            background: url('images/bg3.jpg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0;
            transition: opacity 2s ease;
        }

        body.fade-in {
            opacity: 1;
        }

        .full_container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login_section {
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.5717884565935749) 0%, rgba(0,0,0,0.8575027423078606) 100%);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            max-width: 900px;
            width: 100%;
        }

        .login_form {
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.7622646470697654) 0%, rgba(0,0,0,0.7790713697588411) 100%);
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px;
        }

        .signin-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: rgb(10,10,10);
background: radial-gradient(circle, rgba(10,10,10,0.7622646470697654) 0%, rgba(0,0,0,0.7790713697588411) 100%);
            padding: 20px;
            border-radius: 10px;
        }

        .signin-image figure {
            margin: 0;
        }

        .signin-image img {
            width: 100%;
            max-width: 600px;
        }

        .signin-image .signup-image-link {
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        .form-container {
            width: 100%;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
           
            display: block;
            max-width: 200px;
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
                <div class="signin-image">
                    <figure><img src="images/LOGO.png" alt="sign up image"></figure>
                </div>
                <div class="login_form">
                    <div class="w-50 mx-auto form-container">
                        <form class="text-center" id="resetRequestForm" method="post" action="send_reset_link.php">
                            <h1 class="h6 mb-3" style="color: white;">Reset Password</h1>
                            <fieldset>
                                <div class="field form-group">
                                    <label class="label_field sr-only" for="inputEmail">Email Address</label>
                                    <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address" required autofocus>
                                </div>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="btn btn-lg btn-primary btn-block main_bt" type="submit">Send Reset Link</button>
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
