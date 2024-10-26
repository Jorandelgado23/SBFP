<?php
include("adminauth.php");
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
      <title>monthly attendance reports</title>
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

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <style>


        .active {
        background-color: lightblue; /* Background color */
        color: #fff; /* Text color */
        font-weight: bold; /* Bold text */
    }


    </style>

<body class="dashboard dashboard_2">

    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/origlogo.jpg" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
               
<div class="user_profle_side">
    <div class="user_img"><img class="img-responsive" src="images/origlogo.jpg" alt="#" /></div>
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

                        <li class="active">
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar"></i> <span>School Attendance</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="monthly_attendance_reports.php">> <span>Monthly Report</span></a></li> 
                           <li><a href="adattendance.php">> <span>Attendance Logs</span></a></li> 
                          
                        </ul>
                     </li>
                       
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li >
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
                                    <li>

                                    <?php
include("accountconnection.php");

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

<li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                       
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user light_color"></i>
    <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->
    <span class="name_user"><?php echo $user_role; ?></span>
</a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="adsettings.php">My Profile</a>
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
                <?php if (isset($welcome_message)) { ?>
                                <div class="alert alert-success" id="welcomeMessage">
                                    <?php echo $welcome_message; ?>
                                </div>
                                <?php } ?>
                <!-- End Topbar -->
                <!-- Dashboard Inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>monthly attendance reports</h2>
                                </div>
                            </div>
                        </div>

                   <?php
include("accountconnection.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch list of schools for the dropdown
$schoolQuery = "SELECT DISTINCT name_of_school FROM beneficiaries";
$schoolResult = $conn->query($schoolQuery);

// Fetch list of grade levels for the dropdown
$grades = ['Kinder', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'];

// Get filter parameters
$filter_school = isset($_POST['name_of_school']) ? $_POST['name_of_school'] : '';
$filter_grade = isset($_POST['grade_section']) ? $_POST['grade_section'] : '';

// Prepare SQL query to summarize attendance
$sql = "
    SELECT 
        b.name_of_school, 
        ba.grade_section, 
        ba.name AS student_name,
        COUNT(DISTINCT CASE WHEN ba.status = 'Present' THEN ba.id END) AS total_present,
        COUNT(DISTINCT CASE WHEN ba.status = 'Absent' THEN ba.id END) AS total_absent,
        COUNT(DISTINCT ba.id) AS total_attendance,
        (COUNT(DISTINCT CASE WHEN ba.status = 'Present' THEN ba.id END) / COUNT(DISTINCT ba.id)) * 100 AS attendance_rate
    FROM beneficiary_attendance AS ba
    JOIN beneficiaries AS b ON ba.session_id = b.session_id
    WHERE 1=1
";

if ($filter_school) $sql .= " AND b.name_of_school = ?";
if ($filter_grade) $sql .= " AND ba.grade_section = ?";

$sql .= " GROUP BY b.name_of_school, ba.grade_section, ba.name";

$stmt = $conn->prepare($sql);

// Bind parameters
$params = [];
if ($filter_school) $params[] = $filter_school;
if ($filter_grade) $params[] = $filter_grade;

// Dynamically bind parameters
if ($params) {
    $types = str_repeat('s', count($params)); // All parameters are strings
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Create an associative array to hold the results by school
$attendanceData = [];
while ($row = $result->fetch_assoc()) {
    $attendanceData[$row['name_of_school']][] = $row;
}
?>

<!-- Filter Form -->
<form method="POST" action="" class="form-inline" style="margin-bottom: 20px;">
    <div class="form-group">
        <label for="name_of_school">School Name:</label>
        <select name="name_of_school" id="name_of_school" class="form-control">
            <option value="">Select a School</option>
            <?php while ($school = $schoolResult->fetch_assoc()): ?>
                <option value="<?php echo htmlspecialchars($school['name_of_school']); ?>" <?php echo ($filter_school === $school['name_of_school']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($school['name_of_school']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="grade_section">Grade Level:</label>
        <select name="grade_section" id="grade_section" class="form-control">
            <option value="">Select Grade Level</option>
            <?php foreach ($grades as $grade): ?>
                <option value="<?php echo $grade; ?>" <?php echo ($filter_grade === $grade) ? 'selected' : ''; ?>>
                    <?php echo $grade; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Generate Report</button>
</form>

<!-- Table Section -->
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
            <div class="heading1 margin_0">
                <h2>Attendance Summary</h2>
            </div>
        </div>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <?php
                // Generate separate tables for each school
                foreach ($attendanceData as $schoolName => $logs): ?>
                    <h3><?php echo htmlspecialchars($schoolName); ?></h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Grade Level</th>
                                <th>Student Name</th>
                                <th>Total Present</th>
                                <th>Total Absent</th>
                                <th>Total Attendance</th>
                                <th>Attendance Rate (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($log['grade_section']); ?></td>
                                    <td><?php echo htmlspecialchars($log['student_name']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_present']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_absent']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_attendance']); ?></td>
                                    <td><?php echo number_format($log['attendance_rate'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
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
</body>
</html>



