<?php
include("connection.php");
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
      <title>beneficiaries Progress page</title>
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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      

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
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/origlogo.jpg" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
    <div class="icon_setting"></div>
    <div class="user_profle_side">
        <div class="user_img"><img class="img-responsive" src="images/origlogo.jpg" alt="#" /></div>
        <div class="user_info">
            <h6><?php echo $school_name; ?></h6> <!-- Display school name here -->
            <p><span class="online_animation"></span> Online</p>
        </div>
    </div>
</div>


                </div>
                <div class="sidebar_blog_2">
    <h4>General</h4>
    <ul class="list-unstyled components">
        <li>
            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a>
        </li>

        <li>
            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
        </li>

        <!-- Dropdown for Beneficiary Improvement and Progress Input -->
        <li class="active">
            <a href="#beneficiaryDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-line-chart"></i> <span>Beneficiary</span>
            </a>
            <ul class="collapse list-unstyled" id="beneficiaryDropdown">
                <li><a href="Beneficiary_list.php">> <span>Beneficiary Improvement</span></a></li>
                <li><a href="progress_input.php">> <span>Progress Input</span></a></li>
            </ul>
        </li>

        <!-- Dropdown for Student Attendance and Beneficiary Attendance -->
        <li>
            <a href="#attendanceDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-calendar"></i> <span>Attendance</span>
            </a>
            <ul class="collapse list-unstyled" id="attendanceDropdown">
            <li><a href="beneficiary_attendance.php">> <span>Beneficiary Attendance</span></a></li>
                <li><a href="student_attendance.php">> <span>Attendance Table</span></a></li>
            </ul>
        </li>

        <li>
            <a href="form6.php"><i class="fa fa-flask"></i> <span>Milk Component Data</span></a>
        </li>
        <li>
            <a href="form8.php"><i class="fa fa-file-text-o"></i> <span>QUARTERLY REPORT</span></a>
        </li>

        <li>
            <a href="usersetting.php"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a>
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
                            <a href="dashboard.php"><img class="img-responsive" src="images/logo/semilogo.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                    <li>

<?php
include("accountconnection.php");

// Query recent activities count with status 'new'
$sql = "SELECT COUNT(*) AS activity_count FROM sbfp_recent_activity WHERE status = 'new'";
$result = $conn->query($sql);

// Initialize activity count
$activity_count = 0;

// Fetch activity count if available
if ($result && $result->num_rows > 0) {
$row = $result->fetch_assoc();
$activity_count = $row['activity_count'];
}

// Close the connection after query execution
$conn->close();
?>

<!-- Notification Icon with Activity Count -->
<a href="sbfp_activity.php?mark_read=true">
<i class="fa fa-bell-o"></i>
<?php if ($activity_count > 0): ?>
<span class="badge"><?php echo htmlspecialchars($activity_count); ?></span>
<?php endif; ?>
</a>

  
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
                                    <h2>Beneficiary Improvement Page</h2>
                                </div>
                            </div>
                            
                        </div>  



             



                        <?php
include("accountconnection.php");

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Initialize variables for filtering
$date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d'); // Default to current date

// Extract month and year from the selected date
$month = date('m', strtotime($date));
$year = date('Y', strtotime($date));
$prev_month = date('m', strtotime("-1 month", strtotime($date)));
$prev_year = date('Y', strtotime("-1 month", strtotime($date)));

// Fetch beneficiaries associated with the user's session_id for the current month
$sql_current = "SELECT bd.name, bd.grade_section, bd.student_section, bp.weight, bp.height, bp.bmi, bp.nutritional_status_bmia, bp.nutritional_status_hfa, bp.date_of_progress
                FROM beneficiary_details bd
                LEFT JOIN beneficiary_progress bp ON bp.beneficiary_id = bd.id
                WHERE bd.session_id = ? AND MONTH(bp.date_of_progress) = ? AND YEAR(bp.date_of_progress) = ?
                ORDER BY bp.date_of_progress DESC";

$stmt_current = $conn->prepare($sql_current);
$stmt_current->bind_param("sii", $session_id, $month, $year);
$stmt_current->execute();
$result_current = $stmt_current->get_result();

$beneficiary_data_current = [];
while ($row = $result_current->fetch_assoc()) {
    $beneficiary_data_current[] = $row;
}

// Fetch beneficiaries associated with the user's session_id for the previous month
$sql_previous = "SELECT bd.name, bd.grade_section, bd.student_section, bp.weight, bp.height, bp.bmi, bp.nutritional_status_bmia, bp.nutritional_status_hfa, bp.date_of_progress
                 FROM beneficiary_details bd
                 LEFT JOIN beneficiary_progress bp ON bp.beneficiary_id = bd.id
                 WHERE bd.session_id = ? AND MONTH(bp.date_of_progress) = ? AND YEAR(bp.date_of_progress) = ?
                 ORDER BY bp.date_of_progress DESC";

$stmt_previous = $conn->prepare($sql_previous);
$stmt_previous->bind_param("sii", $session_id, $prev_month, $prev_year);
$stmt_previous->execute();
$result_previous = $stmt_previous->get_result();

$beneficiary_data_previous = [];
while ($row = $result_previous->fetch_assoc()) {
    $beneficiary_data_previous[] = $row;
}

// Prepare data for line chart comparison
function prepareChartData($session_id, $month, $year, $conn) {
    $sql_chart = "SELECT bp.date_of_progress, bp.weight, bp.height, bp.bmi
                  FROM beneficiary_details bd
                  LEFT JOIN beneficiary_progress bp ON bp.beneficiary_id = bd.id
                  WHERE bd.session_id = ? AND MONTH(bp.date_of_progress) = ? AND YEAR(bp.date_of_progress) = ?
                  ORDER BY bp.date_of_progress ASC";

    $stmt_chart = $conn->prepare($sql_chart);
    $stmt_chart->bind_param("sii", $session_id, $month, $year);
    $stmt_chart->execute();
    return $stmt_chart->get_result();
}

// Get data for current month
$chart_result_current = prepareChartData($session_id, $month, $year, $conn);
$dates_current = [];
$weights_current = [];
$heights_current = [];
$bmis_current = [];
while ($chart_row = $chart_result_current->fetch_assoc()) {
    $dates_current[] = $chart_row['date_of_progress'];
    $weights_current[] = $chart_row['weight'];
    $heights_current[] = $chart_row['height'];
    $bmis_current[] = $chart_row['bmi'];
}

// Get data for previous month
$chart_result_previous = prepareChartData($session_id, $prev_month, $prev_year, $conn);
$dates_previous = [];
$weights_previous = [];
$heights_previous = [];
$bmis_previous = [];
while ($chart_row = $chart_result_previous->fetch_assoc()) {
    $dates_previous[] = $chart_row['date_of_progress'];
    $weights_previous[] = $chart_row['weight'];
    $heights_previous[] = $chart_row['height'];
    $bmis_previous[] = $chart_row['bmi'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Filter Form -->
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
            <div class="heading1 margin_0">
                <h2>Filtering of Beneficiary Progress</h2>
            </div>
        </div>
        <div class="padding_infor_info">
            <form method="POST" action="" id="dateForm" class="mb-0">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="date">Select Date:</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?= $date ?>" required onchange="submitForm()">
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section for Current Month -->
        <div class="table_section padding_infor_info">
            <h3>Current Month Progress</h3>
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead style="color: #fff; background-color: #0971b8;">
                        <tr>
                            <th>Date of Progress</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Section</th> <!-- New Column for Student Section -->
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>BMI</th>
                            <th>Nutritional Status (BMI)</th>
                            <th>Nutritional Status (HFA)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($beneficiary_data_current as $row) { ?>
                            <tr>
                                <td><?= $row['date_of_progress'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['grade_section'] ?></td>
                                <td><?= $row['student_section'] ?></td> <!-- Display Student Section -->
                                <td><?= $row['weight'] ?></td>
                                <td><?= $row['height'] ?></td>
                                <td><?= $row['bmi'] ?></td>
                                <td><?= $row['nutritional_status_bmia'] ?></td>
                                <td><?= $row['nutritional_status_hfa'] ?></td>
                                <td style="color: <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? 'white' : 'white' ?>; 
                                    background-color: <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? '#59CE8F' : '#FC2947' ?>; 
                                    padding: 5px; border-radius: 4px; font-weight:400; text-align: center;">
                                    <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? 'Improved' : 'No Progress' ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Table Section for Previous Month -->
        <div class="table_section padding_infor_info">
            <h3>Previous Month Progress</h3>
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead style="color: #fff; background-color: #0971b8;">
                        <tr>
                            <th>Date of Progress</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Section</th> <!-- New Column for Student Section -->
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>BMI</th>
                            <th>Nutritional Status (BMI)</th>
                            <th>Nutritional Status (HFA)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($beneficiary_data_previous as $row) { ?>
                            <tr>
                                <td><?= $row['date_of_progress'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['grade_section'] ?></td>
                                <td><?= $row['student_section'] ?></td> <!-- Display Student Section -->
                                <td><?= $row['weight'] ?></td>
                                <td><?= $row['height'] ?></td>
                                <td><?= $row['bmi'] ?></td>
                                <td><?= $row['nutritional_status_bmia'] ?></td>
                                <td><?= $row['nutritional_status_hfa'] ?></td>
                                <td style="color: <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? 'white' : 'white' ?>; 
                                    background-color: <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? '#59CE8F' : '#FC2947' ?>; 
                                    padding: 5px; border-radius: 4px; font-weight:400; text-align: center;">
                                    <?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? 'Improved' : 'No Progress' ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
    // Automatically submit the form when a date is selected
    function submitForm() {
        document.getElementById('dateForm').submit();
    }
</script>

<?php
// Close the database connection
$conn->close();
?>










                        
                    </div>
                   
                </div>
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
