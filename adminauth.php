<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

include("accountconnection.php");

$email = $_SESSION['email'];

// Prepare and bind
$stmt = $conn->prepare("SELECT firstname, lastname, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname, $user_role);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    
    // Check if the user's role is 'admin'
    if ($user_role !== 'admin') {
        // Deny access if the user is not an admin and display the access denied page
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- basic -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- mobile metas -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="initial-scale=1, maximum-scale=1">
            <!-- site metas -->
            <title>ACCESS DENIED</title>
            <meta name="keywords" content="">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- site icon -->
            <link rel="icon" href="images/LOGO.png" type="image/png" />

            <!-- bootstrap css -->
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <!-- site css -->
            <link rel="stylesheet" href="style.css" />
            <!-- responsive css -->
            <link rel="stylesheet" href="css/responsive.css" />
            <!-- color css -->
            <link rel="stylesheet" href="css/colors.css" />
            <!-- select bootstrap -->
            <link rel="stylesheet" href="css/bootstrap-select.css" />
            <!-- scrollbar css -->
            <link rel="stylesheet" href="css/perfect-scrollbar.css" />
            <!-- custom css -->
            <link rel="stylesheet" href="css/custom.css" />
            <!-- calendar file css -->
            <link rel="stylesheet" href="js/semantic.min.css" />
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body class="inner_page error_404">
            <div class="full_container">
                <div class="container">
                    <div class="center verticle_center full_height">
                        <div class="error_page">
                            <div class="center">
                                <div class="error_icon">
                                    <img class="img-responsive" src="images/layout_img/error.png" alt="#">
                                </div>
                            </div>
                            <br>
                            <h3>ACCESS DENIED!</h3>
                            <p>THIS PAGE IS FOR ADMIN ONLY</p>
                            <div class="center"><a class="main_bt" href="dashboard.php">Go To Home Page</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- jQuery -->
            <script src="js/jquery.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- wow animation -->
            <script src="js/animate.js"></script>
            <!-- select country -->
            <script src="js/bootstrap-select.js"></script>
            <!-- nice scrollbar -->
            <script src="js/perfect-scrollbar.min.js"></script>
            <script>
                var ps = new PerfectScrollbar('#sidebar');
            </script>
            <!-- custom js -->
            <script src="js/custom.js"></script>
        </body>
        </html>
        <?php
        exit(); // Terminate the script after displaying the access denied page
    }

    // You can proceed with the rest of your page logic for admin users here

} else {
    echo "No user found with that email address.";
    exit();
}

$stmt->close();
$conn->close();
?>
