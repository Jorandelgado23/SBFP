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
                    <li>
                            <a href="admindashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li>
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
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
    <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" />
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <?php
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

// Query to get the number of admin users
$sql_admin_users = "SELECT COUNT(*) as total_admin_users FROM users WHERE role = 'admin'";
$result_admin_users = $conn->query($sql_admin_users);
$total_admin_users = $result_admin_users->fetch_assoc()['total_admin_users'];

// Query to get the number of SBFP personnel users
$sql_sbfp_users = "SELECT COUNT(*) as total_sbfp_users FROM users WHERE role = 'sbfp'";
$result_sbfp_users = $conn->query($sql_sbfp_users);
$total_sbfp_users = $result_sbfp_users->fetch_assoc()['total_sbfp_users'];

// Query to get the total number of beneficiaries
$sql_beneficiaries = "SELECT SUM(total_beneficiaries) as total_beneficiaries FROM schools";
$result_beneficiaries = $conn->query($sql_beneficiaries);
$total_beneficiaries = $result_beneficiaries->fetch_assoc()['total_beneficiaries'];

// Query to get the number of schools
$sql_schools = "SELECT COUNT(*) as total_schools FROM schools";
$result_schools = $conn->query($sql_schools);
$total_schools = $result_schools->fetch_assoc()['total_schools'];

$conn->close();
?>

 <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-user fe-16"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">ADMIN ACCOUNT</p>
                                        <span class="h3 mb-0"><?php echo $total_admin_users; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-user fe-16"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">SBFP PERSONNEL ACCOUNT</p>
                                        <span class="h3 mb-0"><?php echo $total_sbfp_users; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-24 fe-users"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">OVERALL BENEFICIARIES</p>
                                        <span class="h3 mb-0"><?php echo $total_beneficiaries; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-24 fe-database"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">NUMBER OF SCHOOLS</p>
                                        <span class="h3 mb-0"><?php echo $total_schools; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="row">
    <!-- School table with total beneficiaries -->
    <div class="col-md-12">
        <h6 class="mb-3">Schools with Total Beneficiaries</h6>
        <table class="table table-borderless table-striped">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>School Name</th>
                    <th>Total Beneficiaries</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the database
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

                // Query to fetch school names and total beneficiaries per school
                $sql = "SELECT id, school_name, total_beneficiaries FROM schools";

                $result = $conn->query($sql);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $row["id"] . '</td>
                                <td>' . $row["school_name"] . '</td>
                                <td>' . $row["total_beneficiaries"] . '</td>
                              </tr>';
                    }
                } else {
                    echo "<tr><td colspan='3'>No schools found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div> <!-- / .col-md-12 -->
</div> <!-- end section -->
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
