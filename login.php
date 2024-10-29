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
        <h2>Nutrition Monitoring System</h2>
        <form id="loginForm" method="post" action="loginauth.php">
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
        <div class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
        </div>
    </div>

    <!-- Passcode Modal -->
    <div class="modal fade" id="passcodeModal" tabindex="-1" role="dialog" aria-labelledby="passcodeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passcodeModalLabel">Enter Passcode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="password" id="inputPasscode" class="form-control" placeholder="Passcode" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="submitPasscode">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to save email to localStorage
        function saveEmail() {
            const emailInput = document.getElementById('inputEmail');
            localStorage.setItem('email', emailInput.value);
        }

        // Function to load email from localStorage
        function loadEmail() {
            const savedEmail = localStorage.getItem('email');
            if (savedEmail) {
                document.getElementById('inputEmail').value = savedEmail;
            }
        }

        // Event listener to save email on form submit
        document.addEventListener('DOMContentLoaded', loadEmail);
        window.addEventListener('beforeunload', saveEmail);

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            // Get form data
            const formData = new FormData(this);
            const email = document.getElementById('inputEmail').value;

            // Send form data to login authentication script
            fetch('loginauth.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Check for mainadmin email
                    if (email === 'mainadmin@sbfp.ph') {
                        // Show passcode modal
                        $('#passcodeModal').modal('show');
                    } else {
                        // Redirect based on role
                        redirectToRole(data.role);
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

        // Redirect based on role
        function redirectToRole(role) {
            if (role === 'admin') {
                window.location.href = 'admindashboard.php';
            } else if (role === 'sbfp') {
                window.location.href = 'dashboard.php';
            } else {
                // Invalid role
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid role!'
                });
            }
        }

        // Handle passcode submission
        document.getElementById('submitPasscode').addEventListener('click', function() {
            const passcode = document.getElementById('inputPasscode').value;
            if (passcode === 'sbfpadmin') { // Replace with your actual passcode
                $('#passcodeModal').modal('hide');
                window.location.href = 'admindashboard.php'; // Redirect to admin dashboard
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid passcode!'
                });
            }
        });
    </script>

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
    </script>
</div>

</body>
</html>
