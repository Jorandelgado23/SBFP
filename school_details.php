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
$stmt = $conn->prepare("SELECT firstname, lastname, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname, $user_role);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
} else {
    echo "No user found with that email address.";
    exit();
}

$stmt->close();
$conn->close();
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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
      <link rel="stylesheet" href="css/color_2.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />

      

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/logo/semilogo.png" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="icon_setting"></div>
<div class="user_profle_side">
    <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
    <div class="user_info">
    <h6><?php echo $user_firstname . ' ' . $user_lastname; ?></h6>
        
        <p><span class="online_animation"></span> Online</p>
    </div>
</div>
</div>

                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    <ul class="list-unstyled components">
                    <li class="active">
                            <a href="admindashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <!-- <li>
                            <a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a>
                        </li> -->

                       
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li>
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>

                        <li>
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>
                       
                       
                      
                      
            
                        
                        <li>
                            <a href="adsettings.php"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Sidebar -->
            <!-- Right Content -->
            <div id="content">
                <!-- Topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="admindashboard.php"><img class="img-responsive" src="images/logo/semilogo.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown">
       <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>
</a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="usersetting.php">My Profile</a>
                                                <a class="dropdown-item" href="settings.html">Settings</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
                                                <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- End Topbar -->
                <!-- Dashboard Inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>SCHOOL DETAILS</h2>
                                </div>
                            </div>
                        </div>
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
    $sql = "SELECT *, (SELECT COUNT(*) FROM beneficiary_details WHERE session_id = beneficiaries.session_id) AS total_beneficiaries FROM beneficiaries WHERE id = $school_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $school_name = $row['name_of_school'];
        $division_province = $row['division_province'];
        $school_district_municipality = $row['city_municipality_barangay'];
        $beis_id = $row['school_id_number'];
        $school_address = $row['name_of_principal'];
        $barangay_name = $row['name_of_feeding_focal_person'];
        $supervisor_principal_name = $row['name_of_principal'];

        // Retrieve additional details from users table based on session_id
        $session_id = $row['session_id'];
        $sql_user = "SELECT phone_number, school_address, barangay_name FROM users WHERE session_id = '$session_id'";
        $result_user = $conn->query($sql_user);

        if ($result_user->num_rows > 0) {
            $row_user = $result_user->fetch_assoc();
            $contact_number = $row_user['phone_number'];
            $school_address = $row_user['school_address'];
            $barangay_name = $row_user['barangay_name']; // Assign barangay_name correctly here
        } else {
            echo "User details not found.";
            exit;
        }

        // Total beneficiaries count
        $total_beneficiaries = $row['total_beneficiaries'];
    } else {
        echo "School not found.";
        exit;
    }
} else {
    echo "School ID not provided.";
    exit;
}

$conn->close();
?>

<div class="container">
    <div class="text-left mt-4">
        <a href="javascript:history.back()" class="btn btn-primary">Back</a>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="white_shd full margin_bottom_0">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>SCHOOL DETAILS</h2>
                    </div>
                </div>
                <div class="table-responsive">
              <div class="table-responsive-sm">
                <table class="table table-bordered">
        <thead class="thead-light">
                                <tr>
                                    <th class="text-nowrap">School Name</th>
                                    <th class="text-nowrap">Division/Province</th>
                                    <th class="text-nowrap">School District/Municipality</th>
                                    <th class="text-nowrap">BEIS ID</th>
                                    <th class="text-nowrap">School Address</th>
                                    <th class="text-nowrap">Barangay Name</th>
                                    <th class="text-nowrap">Supervisor/Principal Name</th>
                                    <th class="text-nowrap">Contact Number</th>
                                    <th class="text-nowrap">Total Beneficiaries</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $school_name; ?></td>
                                    <td><?php echo $division_province; ?></td>
                                    <td><?php echo $school_district_municipality; ?></td>
                                    <td><?php echo $beis_id; ?></td>
                                    <td><?php echo $school_address; ?></td>
                                    <td><?php echo $barangay_name; ?></td>
                                    <td><?php echo $supervisor_principal_name; ?></td>
                                    <td><?php echo $contact_number; ?></td>
                                    <td><?php echo $total_beneficiaries; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>





            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Bundle JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="js/custom.js"></script>
    <!-- Chart Plugins -->
    <script src="js/Chart.min.js"></script>
    <!-- Init Charts -->
    <script>
        var ctx = document.getElementById('chartjs_area').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Dataset 1',
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },
            options: {}
        });

        var ctx = document.getElementById('chartjs_bar').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Dataset 1',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },
            options: {}
        });

        var ctx = document.getElementById('chartjs_line').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Dataset 1',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },
            options: {}
        });
    </script>
</body>

</html>
