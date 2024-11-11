<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

include("accountconnection.php");

$email = $_SESSION['email'];

// Prepare and bind
$stmt = $conn->prepare("SELECT firstname, lastname, school_name, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname, $school_name, $user_role);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    
    // Check the user's role
    if ($user_role !== 'sbfp') {
        // If the role is not 'sbfp', display the custom Access Denied page
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <title>ACCESS DENIED</title>
            <link rel="icon" href="images/LOGO.png" type="image/png" />

            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="css/responsive.css" />
            <link rel="stylesheet" href="css/colors.css" />
            <link rel="stylesheet" href="css/bootstrap-select.css" />
            <link rel="stylesheet" href="css/perfect-scrollbar.css" />
            <link rel="stylesheet" href="js/semantic.min.css" />
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
                            <P>You do not have permission to access this page.</P>
                            <div class="center">
                                <a class="main_bt" href="admindashboard.php">Go To Home Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/animate.js"></script>
            <script src="js/bootstrap-select.js"></script>
            <script src="js/perfect-scrollbar.min.js"></script>
            <script>
                var ps = new PerfectScrollbar('#sidebar');
            </script>
            <script src="js/custom.js"></script>
        </body>
        </html>
        <?php
        exit(); // Terminate the script after displaying the access-denied page
    }

    // Proceed with the welcome message if the role is 'sbfp'
    if (!isset($_SESSION['welcome_shown'])) {
        $welcome_message = "Welcome, $user_firstname $user_lastname!";
        $_SESSION['welcome_shown'] = true; // Set the session variable
    }
} else {
    echo "No user found with that email address.";
    exit();
}

$stmt->close();
$conn->close();
?>
