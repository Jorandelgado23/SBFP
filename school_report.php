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
      <title>SCHOOL REPORTS</title>
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
                            <a href="admindashboard.php"><i class="fa fa-dashboard""></i> <span>Dashboard</span></a>
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

                                        
                                        
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user light_color"></i></a>
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
                <!-- End Topbar -->
              <!-- Dashboard Inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>SCHOOL REPORTS</h2>
                </div>
            </div>
        </div>

        <?php
include("accountconnection.php");

// Define the date for filtering
$filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : '';

// Fetch list of schools with their data from `division_schools` table
$sql_schools = "SELECT ds.division_school, ds.target_sbfp_school, ds.actual_sbfp_school, ds.completion_percentage, qrf.amount_allocated, qrf.amount_downloaded, qrf.date_submitted 
                FROM division_schools ds
                LEFT JOIN quarterly_reportform8 qrf ON ds.report_id = qrf.report_id";

// Apply date filter if provided
if (!empty($filter_date)) {
    $sql_schools .= " WHERE DATE(qrf.date_submitted) = '$filter_date'";
}

$result_schools = $conn->query($sql_schools);

// Store the data in an array
$schools_data = array();
if ($result_schools->num_rows > 0) {
    while ($row = $result_schools->fetch_assoc()) {
        $schools_data[] = $row;
    }
}

// Search filtering
$search_term = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($search_term)) {
    $filtered_schools = array_filter($schools_data, function ($school) use ($search_term) {
        return stripos($school['division_school'], $search_term) !== false;
    });
} else {
    $filtered_schools = $schools_data;
}
?>

<div class="mb-3">
    <!-- Filter form -->
    <form method="get" class="mb-4">
    <div class="row justify-content-end">
            <div class="col-md-3">
                <input type="text" class="form-control" name="search" placeholder="Search by school name" value="<?php echo htmlspecialchars($search_term); ?>">
            </div>
            <!-- Date filter -->
            <div>
                <input type="date" class="form-control" name="filter_date" value="<?php echo htmlspecialchars($filter_date); ?>">
            </div>
            <!-- Submit button -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-filter"></i> Filter
                </button>
            </div>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="color: #fff; background-color: #0971b8;">
                            <th style="text-align: center;">School Name</th>
                            <th style="text-align: center;">Date Submitted</th>
                            <th style="text-align: center;">View Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($filtered_schools)) : ?>
                            <?php foreach ($filtered_schools as $school) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($school['division_school']); ?></td>
                                    <td style="text-align: center;"><?php echo htmlspecialchars($school['date_submitted']); ?></td>
                                    <td style="text-align: center;">
                                        <a href="view_report.php?school_name=<?php echo urlencode($school['division_school']); ?>" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" style="text-align: center;">No records found for the selected criteria.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $conn->close(); ?>


                <!-- End Dashboard Inner -->
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
