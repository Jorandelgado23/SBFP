
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
      <title>VIEW DETAILS</title>
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

      <style>
       .bold-dark-text {
    font-weight: bold;
    color: #333; /* Adjust color to your preference */
}
.active {
        background-color: lightblue; /* Background color */
        color: #fff; /* Text color */
        font-weight: bold; /* Bold text */
    }


      </style>

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
                        <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/LOGO.png" alt="#" /></a>


                        </div>
                    </div>
                    <div class="sidebar_user_info">
    <div class="icon_setting"></div>
    <div class="user_profle_side">
    <div class="user_img"><img class="img-responsive" src="images/origlogo.jpg" alt="#" /></div>
    <div class="user_info">
    <h6><?php echo $user_firstname . ' ' . $user_lastname; ?></h6>
        
    <p><span class="online_animation"></span> Logged In</p>

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
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar"></i> <span>School Attendance</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="monthly_attendance_reports.php">> <span>Monthly Report</span></a></li> 
                           <li><a href="adattendance.php">> <span>Attendance Logs</span></a></li> 
                          
                        </ul>
                     </li>
                       
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university"></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li >
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>

                        <li>
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>

                        <li>
                            <a href="age_gender_analysis.php"><i class="fa fa-archive"></i> <span>age and gender Analysis</span></a>
                        </li>
                       
                        <li class="active">
                            <a href="school_report.php"><i class="fa fa-file-zip-o"></i> <span>Monthly School Report</span></a>
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
                                    <li>

                                    <?php
// Fetch recent activities from database
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

// Query recent activities count with status 'new'
$sql = "SELECT COUNT(*) AS activity_count FROM recent_activity WHERE status = 'new'";
$result = $conn->query($sql);

// Get activity count
$activity_count = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activity_count = $row['activity_count'];
}

// Close connection
$conn->close();
?>


<a href="allactivities.php?mark_read=true">
    <i class="fa fa-bell-o"></i>
    <?php if ($activity_count > 0): ?>
        <span class="badge"><?php echo $activity_count; ?></span>
    <?php endif; ?>
</a>

</li>

                                        
                                       
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user light_color"></i>
        <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>
</a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="usersetting.php">My Profile</a>
                                                <a class="dropdown-item" href="#" id="logoutLink">
    <span>Log Out</span> <i class="fa fa-sign-out"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('logoutLink').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default link action

        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out of your account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to logout.php if confirmed
                window.location.href = 'logout.php';
            }
        });
    });
</script>

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
                                    <h2>BENEFICIARIES LIST</h2>
                                </div>
                            </div>
                        </div>

<?php
include("accountconnection.php");

// Validate the `school_name` parameter
if (!isset($_GET['school_name']) || empty($_GET['school_name'])) {
    echo "Invalid school name.";
    exit;
}

$school_name = urldecode($_GET['school_name']);

// Fetch school details from `division_schools` and `quarterly_reportform8`
$sql_details = "
    SELECT 
        ds.division_school,
        ds.target_sbfp_school,
        ds.actual_sbfp_school,
        ds.completion_percentage,
        ds.target_beneficiaries,
        ds.actual_beneficiaries,
        ds.status,
        qrf.amount_allocated,
        qrf.amount_downloaded,
        qrf.status_fund_downloading,
        qrf.first_liquidation,
        qrf.second_liquidation,
        qrf.total_liquidation,
        qrf.liquidation_status,
        qrf.remarks
    FROM 
        division_schools ds
    LEFT JOIN 
        quarterly_reportform8 qrf 
    ON 
        ds.report_id = qrf.report_id
    WHERE 
        ds.division_school = ?";
$stmt = $conn->prepare($sql_details);
$stmt->bind_param("s", $school_name);
$stmt->execute();
$result = $stmt->get_result();

// Check if any data is found
if ($result->num_rows === 0) {
    echo "No details found for the selected school.";
    exit;
}

$school_details = $result->fetch_assoc();
?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Details for School: <?php echo htmlspecialchars($school_details['division_school']); ?></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Target SBFP School</th>
                            <td><?php echo htmlspecialchars($school_details['target_sbfp_school']); ?></td>
                        </tr>
                        <tr>
                            <th>Actual SBFP School</th>
                            <td><?php echo htmlspecialchars($school_details['actual_sbfp_school']); ?></td>
                        </tr>
                        <tr>
                            <th>Completion Percentage</th>
                            <td><?php echo htmlspecialchars($school_details['completion_percentage']); ?>%</td>
                        </tr>
                        <tr>
                            <th>Target Beneficiaries</th>
                            <td><?php echo htmlspecialchars($school_details['target_beneficiaries']); ?></td>
                        </tr>
                        <tr>
                            <th>Actual Beneficiaries</th>
                            <td><?php echo htmlspecialchars($school_details['actual_beneficiaries']); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?php echo htmlspecialchars($school_details['status']); ?></td>
                        </tr>
                        <tr>
                            <th>Amount Allocated</th>
                            <td><?php echo number_format($school_details['amount_allocated'], 2); ?></td>
                        </tr>
                        <tr>
                            <th>Amount Downloaded</th>
                            <td><?php echo number_format($school_details['amount_downloaded'], 2); ?></td>
                        </tr>
                        <tr>
                            <th>Fund Downloading Status</th>
                            <td><?php echo htmlspecialchars($school_details['status_fund_downloading']); ?></td>
                        </tr>
                        <tr>
                            <th>First Liquidation</th>
                            <td><?php echo number_format($school_details['first_liquidation'], 2); ?></td>
                        </tr>
                        <tr>
                            <th>Second Liquidation</th>
                            <td><?php echo number_format($school_details['second_liquidation'], 2); ?></td>
                        </tr>
                        <tr>
                            <th>Total Liquidation</th>
                            <td><?php echo number_format($school_details['total_liquidation'], 2); ?></td>
                        </tr>
                        <tr>
                            <th>Liquidation Status</th>
                            <td><?php echo htmlspecialchars($school_details['liquidation_status']); ?></td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td><?php echo nl2br(htmlspecialchars($school_details['remarks'])); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-sm-6">
        <form action="school_report.php" method="get">
            <button type="submit" class="btn btn-primary"> Back</button>
        </form>
            </div>
        </div>
    </div>
   

<?php
$stmt->close();
$conn->close();
?>



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