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
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
          background: rgb(137,200,64);
background: linear-gradient(84deg, rgba(137,200,64,1) 0%, rgba(138,200,64,1) 100%);
            opacity: 0; /* Initially hide the body */
            animation: fadeIn 1s ease forwards; /* Fade-in animation */
        }

        .logo_login {
    background: url('images/background.jpg') no-repeat center center;
    background-size: cover; /* This ensures the image covers the entire container */
    width: 100%; /* Adjust the width as needed */
    height: 250px; /* Adjust the height as needed */
    display: flex;
    justify-content: center;
    align-items: center;
}

    
   
}

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

      

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
                            <form class="text-center" id="loginForm" method="post">
                                <h1 class="h6 mb-3">Sign in</h1>
                                <fieldset>
                                    <div class="field form-group">
                                        <label class="label_field sr-only" for="inputEmail">Email Address</label>
                                        <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address" required autofocus>
                                    </div>
                                    <div class="field form-group">
                                        <label class="label_field sr-only" for="inputPassword">Password</label>
                                        <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password" required>
                                    </div>
                                    <div class="field form-group checkbox mb-3">
                                        <!-- <label>
                                            <input type="checkbox" name="remember-me" value="remember-me"> Stay logged in
                                        </label> -->
                                    </div>
                                    <div class="field margin_0">
                                        <label class="label_field hidden">hidden label</label>
                                        <button class="btn btn-lg btn-primary btn-block main_bt" type="submit">Let me in</button>
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
