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
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/semilogo.png" alt="#" /></a>
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
                        <li class="active">
                            <a href="Beneficiary_list.php"><i class="fa fa-line-chart"></i> <span>Beneficiary Improvement</span></a>
                        </li>

                        <li>
                            <a href="progress_input.php"><i class="fa fa-pencil-square"></i> <span>Progress Input</span></a>
                        </li>
                        <li>
                            <!-- <a href="form2.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 2</span></a> -->
                        </li>
                        <!-- <li>
                            <a href="form3.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 3</span></a>
                        </li> -->
                        <li>
                            <a href="student_attendance.php"><i class="fa fa-calendar"></i> <span>Student Attendance</span></a>
                        </li>
                        <!-- <li>
                            <a href="form5.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 5</span></a>
                        </li> -->
                        <li>
                            <a href="form6.php"><i class="fa fa-flask"></i> <span>Milk Component Data</span></a>
                        </li>
                        <!-- <li>
                            <a href="form7.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 7</span></a>
                        </li> -->
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
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
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
                                    <h2>Beneficiary Progress</h2>
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

// Extract month and day from the selected date
$month = date('m', strtotime($date));
$day = date('d', strtotime($date));

// Fetch beneficiaries associated with the user's session_id and their latest progress with filtering
$sql = "SELECT bd.name, bd.grade_section, bp.weight, bp.height, bp.bmi, bp.nutritional_status_bmia, bp.nutritional_status_hfa
        FROM beneficiary_details bd
        LEFT JOIN beneficiary_progress bp ON bp.beneficiary_id = bd.id
        WHERE bd.session_id = ? AND MONTH(bp.date_of_progress) = ? AND DAY(bp.date_of_progress) = ?
        ORDER BY bp.date_of_progress DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $session_id, $month, $day);
$stmt->execute();
$result = $stmt->get_result();

$beneficiary_data = [];
while ($row = $result->fetch_assoc()) {
    $beneficiary_data[] = $row;
}

// Fetch data for the line chart
$sql_chart = "SELECT bp.date_of_progress, bp.weight, bp.height, bp.bmi
              FROM beneficiary_details bd
              LEFT JOIN beneficiary_progress bp ON bp.beneficiary_id = bd.id
              WHERE bd.session_id = ? AND MONTH(bp.date_of_progress) = ? AND DAY(bp.date_of_progress) = ?
              ORDER BY bp.date_of_progress ASC";

$stmt_chart = $conn->prepare($sql_chart);
$stmt_chart->bind_param("sii", $session_id, $month, $day);
$stmt_chart->execute();
$chart_result = $stmt_chart->get_result();

$dates = [];
$weights = [];
$heights = [];
$bmis = [];

while ($chart_row = $chart_result->fetch_assoc()) {
    $dates[] = $chart_row['date_of_progress'];
    $weights[] = $chart_row['weight'];
    $heights[] = $chart_row['height'];
    $bmis[] = $chart_row['bmi'];
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

        <!-- Table Section -->
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Grade & Section</th>
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>BMI</th>
                            <th>Nutritional Status (BMI)</th>
                            <th>Nutritional Status (HFA)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($beneficiary_data as $row) { ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['grade_section'] ?></td>
                                <td><?= $row['weight'] ?></td>
                                <td><?= $row['height'] ?></td>
                                <td><?= $row['bmi'] ?></td>
                                <td><?= $row['nutritional_status_bmia'] ?></td>
                                <td><?= $row['nutritional_status_hfa'] ?></td>
                                <td><?= ($row['nutritional_status_bmia'] == 'Normal' && $row['nutritional_status_hfa'] == 'Normal') ? 'Improved' : 'No Progress' ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Line Chart Section -->
        <div style="width: 800px; margin: auto;">
            <canvas id="line_chart"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('line_chart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($dates) ?>,
                    datasets: [
                        {
                            label: 'Weight (kg)',
                            data: <?= json_encode($weights) ?>,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'Height (cm)',
                            data: <?= json_encode($heights) ?>,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'BMI',
                            data: <?= json_encode($bmis) ?>,
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });

            // Automatically submit the form when a date is selected
            function submitForm() {
                document.getElementById('dateForm').submit();
            }
        </script>

    </div>
</div>

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
