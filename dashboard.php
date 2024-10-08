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
      <title>SBFP DASHBOARD</title>
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
        /* CSS styles for the welcome message */
        #welcomeMessage {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: fadeOut 4s forwards; /* Animation to fade out after 4 seconds */
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

        #loadingOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        z-index: 1000; /* Ensure it's on top of other content */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #loadingText {
        font-size: 24px;
        font-weight: bold;
        color: #333; /* Dark text color */
    }

    .large-image {
            width: 20%; /* Adjust this width to fit your design */
            max-width: 200px; /* Max width to ensure the image does not exceed this size */
            height: auto; /* Maintain aspect ratio */
            display: block;
            margin: 0 auto; /* Center the image horizontally */
        }
        .active {
        background-color: lightblue; /* Background color */
        color: #fff; /* Text color */
        font-weight: bold; /* Bold text */
    }  
    </style>



<body class="dashboard dashboard_2">

<div id="loadingOverlay">
        <img src="images/origlogo.jpg" alt="Large GIF Image" class="large-image" /> <!-- Replace with your loading spinner or animation -->
    </div>
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
                    <li class="active">
                            <a href="dashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
                        </li>

                        <li>
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
                        <li>
                            <a href="beneficiary_attendance.php"><i class="fa fa-file-excel-o"></i> <span>beneficiary attendance</span></a>
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
                                    <h2>Dashboard</h2>

                                    
                                </div>

                                
                            </div>
                        </div>
                        <?php

include("accountconnection.php");

// Retrieve session_id of the logged-in user
$email = $_SESSION['email']; // Assuming email is stored in session
$stmt = $conn->prepare("SELECT session_id, school_name FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id, $school_name);
$stmt->fetch();
$stmt->close();

// Fetch total number of beneficiaries
$sql = "SELECT COUNT(*) AS total_beneficiaries FROM beneficiary_details WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_beneficiaries = $row['total_beneficiaries'];
$stmt->close();

// Fetch counts for BMI-A categories
$statuses_bmi = ['Normal', 'Severely Wasted', 'Wasted', 'Overweight', 'Obese'];
$status_counts_bmi = [];

foreach ($statuses_bmi as $status) {
    $sql = "SELECT COUNT(*) AS count FROM beneficiary_details WHERE session_id = ? AND nutritional_status_bmia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $session_id, $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $status_counts_bmi[$status] = $row['count'];
    $stmt->close();
}

// Fetch counts for HFA categories
$statuses_hfa = ['Normal', 'Stunted', 'Tall'];
$status_counts_hfa = [];

foreach ($statuses_hfa as $status) {
    $sql = "SELECT COUNT(*) AS count FROM beneficiary_details WHERE session_id = ? AND nutritional_status_hfa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $session_id, $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $status_counts_hfa[$status] = $row['count'];
    $stmt->close();
}

$conn->close();

// Calculate percentages for BMI-A
$percentages_bmi = [];
foreach ($statuses_bmi as $status) {
    $percentages_bmi[$status] = $total_beneficiaries > 0 ? ($status_counts_bmi[$status] / $total_beneficiaries) * 100 : 0;
}

// Calculate percentages for HFA
$percentages_hfa = [];
foreach ($statuses_hfa as $status) {
    $percentages_hfa[$status] = $total_beneficiaries > 0 ? ($status_counts_hfa[$status] / $total_beneficiaries) * 100 : 0;
}

// Output data as JSON for Chart.js and school name
$data_bmi = [
    'labels' => $statuses_bmi,
    'data' => array_values($percentages_bmi),
];
$data_hfa = [
    'labels' => $statuses_hfa,
    'data' => array_values($percentages_hfa),
];

echo '<script>const chartDataBMI = ' . json_encode($data_bmi) . ';</script>';
echo '<script>const chartDataHFA = ' . json_encode($data_hfa) . ';</script>';
echo '<script>const schoolName = ' . json_encode($school_name) . ';</script>';
?>





<!-- HTML Part -->
<div class="row column1">
    <!-- First Row: Beneficiaries, Normal Students, Severely Wasted Students -->
    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                <i class="fa fa-users dark_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $total_beneficiaries; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Beneficiaries</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-smile-o darkgreen_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $status_counts_bmi['Normal']; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Normal</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-exclamation-triangle green_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $status_counts_bmi['Severely Wasted']; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Severely Wasted</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row column1">
    <!-- Second Row: Wasted Students, Overweight Students, Obese Students -->
    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-exclamation-circle red_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $status_counts_bmi['Wasted']; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Wasted</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-balance-scale orange_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $status_counts_bmi['Overweight']; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Overweight</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
                <div> 
                    <i class="fa fa-heartbeat purple_color"></i>
                </div>
            </div>
            <div class="counter_no">
                <div>
                    <p class="total_no" style="color: black;"><?php echo $status_counts_bmi['Obese']; ?></p>
                    <p class="head_couter" style="color: #99abb4;">Obese</p>
                </div>
            </div>
        </div>
    </div>
</div>



                 

<div class="row column1">
    <!-- BMI-A Bar Chart -->
    <div class="col-lg-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Nutritional Status (BMI-A) - <span id="school_name"></span></h2>
                </div>
            </div>
            <div class="map_section padding_infor_info">
                <canvas id="bar_chart_bmi"></canvas>
                <!-- Button to download the chart -->
                <button onclick="downloadChart('bar_chart_bmi', 'BMI-A_Chart.png', 3)" class="btn btn-info">Download BMI-A Chart</button>
            </div>
        </div>
    </div>

    <!-- HFA Bar Chart -->
    <div class="col-lg-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Nutritional Status (HFA) - <span id="school_name_hfa"></span></h2>
                </div>
            </div>
            <div class="map_section padding_infor_info">
                <canvas id="bar_chart_hfa"></canvas>
                <!-- Button to download the chart -->
                <button onclick="downloadChart('bar_chart_hfa', 'HFA_Chart.png', 3)" class="btn btn-info">Download HFA Chart</button>
            </div>
        </div>
    </div>
</div>


<div class="row column1">
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

// Default value for the date
$date = date('Y-m-d'); // Current date

// Check if a date was submitted
if (isset($_POST['date'])) {
    $date = $_POST['date'];
}

// Fetch submitted data for the logged-in user, ensuring only beneficiaries with the same session_id are shown
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data for chart visualization based on the selected date and session_id
$sql_improved = "SELECT COUNT(*) AS improved_count FROM beneficiary_progress 
                 WHERE (nutritional_status_bmia = 'Normal' OR nutritional_status_hfa = 'Normal') 
                 AND session_id = ? AND DATE(date_of_progress) = ?";
$sql_no_progress = "SELECT COUNT(*) AS no_progress_count FROM beneficiary_progress 
                    WHERE (nutritional_status_bmia != 'Normal' AND nutritional_status_hfa != 'Normal') 
                    AND session_id = ? AND DATE(date_of_progress) = ?";

$stmt_improved = $conn->prepare($sql_improved);
$stmt_improved->bind_param("ss", $session_id, $date);
$stmt_improved->execute();
$result_improved = $stmt_improved->get_result();

$stmt_no_progress = $conn->prepare($sql_no_progress);
$stmt_no_progress->bind_param("ss", $session_id, $date);
$stmt_no_progress->execute();
$result_no_progress = $stmt_no_progress->get_result();

$improved_count = $result_improved->fetch_assoc()['improved_count'];
$no_progress_count = $result_no_progress->fetch_assoc()['no_progress_count'];

?>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <div class="col-lg-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head d-flex justify-content-between align-items-center">
                <div class="heading1 margin_0">
                    <h2>Beneficiaries Progress</h2>
                </div>
                <!-- Form with date picker placed to the right of the heading -->
                <form method="post" class="mb-0" id="dateForm">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="date">Select Date:</label>
                            <input type="date" name="date" id="date" class="form-control" value="<?= $date ?>" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="map_section padding_infor_info" style="background-color: white; padding: 20px;">
                <canvas id="pie_chart"></canvas>
            </div>
            <!-- Button to download the chart -->
            <div class="text-center mt-3">
                <button onclick="downloadChart('pie_chart', 'Nutritional_Status_Chart.png', 3)" class="btn btn-info">Download Chart as Image</button>
            </div>
        </div>
    </div>

    <script>
        // Automatically submit the form when the date changes
        document.getElementById('date').addEventListener('change', function() {
            document.getElementById('dateForm').submit();
        });

        var ctx = document.getElementById('pie_chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Improved', 'No Progress'],
                datasets: [{
                    data: [<?= $improved_count ?>, <?= $no_progress_count ?>],
                    backgroundColor: ['#4CAF50', '#F44336'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Function to download chart as image
        function downloadChart(chartId, filename, quality) {
            var canvas = document.getElementById(chartId);
            var image = canvas.toDataURL("image/png", quality);
            var link = document.createElement('a');
            link.href = image;
            link.download = filename;
            link.click();
        }
    </script>


<?php
$conn->close(); // Close the database connection
?>



<div class="col-lg-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Recent Activity</h2>
                </div>
            </div>
            <div class="full progress_bar_inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="msg_list_main">
                            <ul class="msg_list">
                            <?php

include("accountconnection.php");

// Retrieve email of the logged-in user
$email = $_SESSION['email'];

// Prepare and execute the query for recent activities
$sql = "SELECT * FROM sbfp_recent_activity WHERE email = ? ORDER BY timestamp DESC LIMIT 10";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Display activities
$activity_count = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($activity_count < 3) {
            echo '<li>';
            echo '<span>';
            echo '<span class="name_user">' . htmlspecialchars($row["email"]) . '</span>';
            echo '<span class="msg_user">' . htmlspecialchars($row["activity"]) . '</span>';
            echo '<span class="time_ago">' . htmlspecialchars($row["timestamp"]) . '</span>';
            echo '</span>';
            echo '</li>';
        }
        $activity_count++;
    }
    // Check if there are more than 5 activities
    if ($activity_count > 5) {
        echo '<li><a href="sbfp_activity.php?mark_read=true">See More</a></li>';
    }
} else {
    echo '<li>No recent activities found.</li>';
}

// Close statement and connection
$stmt->close();
$conn->close();
?>














    <!-- Include Bootstrap JS (adjust the path as necessary) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



                   
    
    






                        
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
const ctxBMI = document.getElementById('bar_chart_bmi').getContext('2d');
const ctxHFA = document.getElementById('bar_chart_hfa').getContext('2d');

// Set school name in headings
document.getElementById('school_name').textContent = schoolName;
document.getElementById('school_name_hfa').textContent = schoolName;

// Bar Chart for BMI-A
const barChartBMI = new Chart(ctxBMI, {
    type: 'bar',
    data: {
        labels: chartDataBMI.labels,
        datasets: [{
            label: 'Percentage (%)',
            data: chartDataBMI.data,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',   // Blue
                'rgba(255, 99, 132, 0.2)',   // Red
                'rgba(255, 206, 86, 0.2)',   // Yellow
                'rgba(75, 192, 192, 0.2)',   // Teal
                'rgba(153, 102, 255, 0.2)',  // Purple
                'rgba(255, 159, 64, 0.2)',   // Orange
                'rgba(199, 199, 199, 0.2)',  // Gray
                'rgba(255, 99, 255, 0.2)'    // Pink
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',    // Blue
                'rgba(255, 99, 132, 1)',    // Red
                'rgba(255, 206, 86, 1)',    // Yellow
                'rgba(75, 192, 192, 1)',    // Teal
                'rgba(153, 102, 255, 1)',   // Purple
                'rgba(255, 159, 64, 1)',    // Orange
                'rgba(199, 199, 199, 1)',   // Gray
                'rgba(255, 99, 255, 1)'     // Pink
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) { return value + '%' }
                }
            }
        }
    }
});

// Bar Chart for HFA
const barChartHFA = new Chart(ctxHFA, {
    type: 'bar',
    data: {
        labels: chartDataHFA.labels,
        datasets: [{
            label: 'Percentage (%)',
            data: chartDataHFA.data,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',   // Blue
                'rgba(255, 99, 132, 0.2)',   // Red
                'rgba(255, 206, 86, 0.2)',   // Yellow
                'rgba(75, 192, 192, 0.2)',   // Teal
                'rgba(153, 102, 255, 0.2)',  // Purple
                'rgba(255, 159, 64, 0.2)'    // Orange
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',    // Blue
                'rgba(255, 99, 132, 1)',    // Red
                'rgba(255, 206, 86, 1)',    // Yellow
                'rgba(75, 192, 192, 1)',    // Teal
                'rgba(153, 102, 255, 1)',   // Purple
                'rgba(255, 159, 64, 1)'     // Orange
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) { return value + '%' }
                }
            }
        }
    }
});

// Download chart function
function downloadChart(canvasId, filename, scale = 2) {
    // Get the original canvas element
    var canvas = document.getElementById(canvasId);
    
    // Create a new canvas element to draw the chart with a white background
    var newCanvas = document.createElement('canvas');
    newCanvas.width = canvas.width * scale;  // Scale the width
    newCanvas.height = canvas.height * scale; // Scale the height
    
    // Get the context of the new canvas
    var newContext = newCanvas.getContext('2d');
    
    // Set the scale for the new canvas
    newContext.scale(scale, scale);
    
    // Fill the new canvas with a white background
    newContext.fillStyle = 'white';
    newContext.fillRect(0, 0, newCanvas.width / scale, newCanvas.height / scale);
    
    // Draw the original chart (canvas) onto the new canvas with the white background
    newContext.drawImage(canvas, 0, 0);
    
    // Create a link to download the new canvas as an image
    var link = document.createElement('a');
    link.href = newCanvas.toDataURL('image/png');
    link.download = filename;
    
    // Trigger the download
    link.click();
}
</script>




<script>
    // Wait for the page to load
    document.addEventListener("DOMContentLoaded", function () {
        // Hide the loading overlay after 3 seconds (3000 milliseconds)
        setTimeout(function () {
            document.getElementById('loadingOverlay').style.display = 'none';
        }, 1000); // Adjust the delay as needed (in milliseconds)
    });
</script>



</body>

</html>
