<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve the school ID from the URL parameter
if (isset($_GET['id'])) {
    $school_id = $_GET['id'];

    // Step 3: Fetch school details based on the provided ID
    $sql = "SELECT * FROM schools WHERE id = $school_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $school_name = $row['school_name'];
        $division_province = $row['division_province'];
        $school_district_municipality = $row['school_district_municipality'];
        $beis_id = $row['beis_id'];
        $school_address = $row['school_address'];
        $barangay_name = $row['barangay_name'];
        $supervisor_principal_name = $row['supervisor_principal_name'];
        $contact_number = $row['contact_number'];
        $email_address = $row['email_address'];
        $total_beneficiaries = $row['total_beneficiaries'];
    } else {
        echo "School not found.";
    }
} else {
    echo "School ID not provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>School Details</title>
   
     <!-- Simple bar CSS -->
     <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
</head>
<body class="vertical  light  ">
<div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];

// Prepare and bind
$stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
} else {
    echo "No user found with that email address.";
    exit();
}

$stmt->close();
$conn->close();
?>

    <div>
        <span class="avatar avatar-sm mt-2">
            <!-- Removed the img tag to only display the user's name -->
        </span>
        <span><?php echo htmlspecialchars($user_firstname . ' ' . $user_lastname); ?></span>
    </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
              <a class="dropdown-item" href="logout.php">logout</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="admindashboard.php">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            
              <a href="#dashboard" data-toggle="collapse" aria-expanded="false" >
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text"  href="admindashboard.php">Dashboard</span><span class="sr-only">(current)</span>
              </a>
             
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">SBFP-FORM</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="form1.php"><span class="ml-1 item-text">SBFP-FORM 1</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="form2.php"><span class="ml-1 item-text">SBFP-FORM 2</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">SBFP-FORM 3</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">SBFP-FORM 4</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-notification.html"><span class="ml-1 item-text">SBFP-FORM 5</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">SBFP-FORM 6</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">SBFP-FORM 7</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-progress.html"><span class="ml-1 item-text">SBFP-FORM 8</span></a>
                </li>
              </ul>
            </li>
           
          </ul>
          </ul>
        

          

            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="adschoollist.php">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">School List</span>
              </a>
            </li>
            <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adbeneficiaries.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Beneficiaries</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adaccountmanagement.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Account Management</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adanalytics.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Analytics</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adsettings.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Settings</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="archieves.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Archieves</span>
                </a>
              </li>

          </div>
          <main role="main" class="main-content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $school_name; ?> Details</h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Division/Province</th>
                            <td><?php echo $division_province; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">School District/Municipality</th>
                            <td><?php echo $school_district_municipality; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">BEIS ID</th>
                            <td><?php echo $beis_id; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">School Address</th>
                            <td><?php echo $school_address; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Barangay Name</th>
                            <td><?php echo $barangay_name; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Supervisor/Principal Name</th>
                            <td><?php echo $supervisor_principal_name; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Contact Number</th>
                            <td><?php echo $contact_number; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email Address</th>
                            <td><?php echo $email_address; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Beneficiaries</th>
                            <td><?php echo $total_beneficiaries; ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</main>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script></script>
</body>
</html>