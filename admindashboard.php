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
      <title>ADMIN DASHBOARD</title>
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
        /* CSS styles for the welcome message */
        #welcomeMessage {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            padding: 10px 80px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            border-width: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: fadeOut 5s forwards; /* Animation to fade out after 4 seconds */
          
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

    /* Container for the Gantt Chart */
.gantt_chart_alternative {
    display: flex;
    height: 50px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    background: #f7f7f7;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1);
}

/* Segments for Healthy and Unhealthy */
.gantt_segment {
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-weight: bold;
    font-size: 14px;
    position: relative;
    transition: transform 0.2s;
}

/* Segment Colors */
.gantt_segment.healthy {
    background-color: #4CAF50; /* Green for healthy */
}

.gantt_segment.unhealthy {
    background-color: #FF6F61; /* Orange-red for unhealthy */
}

/* Hover Effect for Segments */
.gantt_segment:hover {
    transform: scale(1.05);
    z-index: 1;
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.3);
}

/* Labels Inside the Segments */
.segment_label {
    position: absolute;
    padding: 5px;
    font-size: 13px;
    color: white;
    text-align: center;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    pointer-events: none;
}

/* Text Summary Below the Chart */
.gantt_summary {
    margin-top: 10px;
    font-size: 14px;
    line-height: 1.6;
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
                            <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/origlogo.jpg" alt="#" /></a>
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
                    <li class="active">
                            <a href="admindashboard.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar"></i> <span>School Attendance</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="monthly_attendance_reports.php">> <span>Monthly Report</span></a></li> 
                           <li><a href="adattendance.php">> <span>Attendance Logs</span></a></li> 
                          
                        </ul>
                     </li>
                       
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
                            <a href="age_gender_analysis.php"><i class="fa fa-archive"></i> <span>age and gender Analysis</span></a>
                        </li>

                        <li>
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <?php
include("accountconnection.php");

// Query to get the number of admin users
$sql_admin_users = "SELECT COUNT(*) as total_admin_users FROM users WHERE role = 'admin'";
$result_admin_users = $conn->query($sql_admin_users);
$total_admin_users = $result_admin_users->fetch_assoc()['total_admin_users'];

// Query to get the number of SBFP personnel users
$sql_sbfp_users = "SELECT COUNT(*) as total_sbfp_users FROM users WHERE role = 'sbfp'";
$result_sbfp_users = $conn->query($sql_sbfp_users);
$total_sbfp_users = $result_sbfp_users->fetch_assoc()['total_sbfp_users'];

// Query to get the total number of beneficiaries from beneficiary_details table
$sql_total_beneficiaries = "SELECT COUNT(*) as total_beneficiaries FROM beneficiary_details";
$result_total_beneficiaries = $conn->query($sql_total_beneficiaries);
$total_beneficiaries = $result_total_beneficiaries->fetch_assoc()['total_beneficiaries'];

// Query to get the number of schools for SBFP personnel users
$sql_schools = "SELECT COUNT(*) as total_schools FROM users WHERE role = 'sbfp'";
$result_schools = $conn->query($sql_schools);
$total_schools = $result_schools->fetch_assoc()['total_schools'];


$conn->close();
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row column1">
                <!-- ADMIN ACCOUNT -->
                <div class="col-md-6 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-user darkblue_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no" style="color: black;"><?php echo $total_admin_users; ?></p>
                                <p class="head_couter" style="color: #99abb4;">ADMIN ACCOUNT</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SBFP PERSONNEL -->
                <div class="col-md-6 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-user blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no" style="color: black;"><?php echo $total_sbfp_users; ?></p>
                                <p class="head_couter" style="color: #99abb4;">SBFP PERSONNEL</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- OVERALL BENEFICIARIES -->
                <div class="col-md-6 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users darkgreen_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no" style="color: black;"><?php echo $total_beneficiaries; ?></p>
                                <p class="head_couter" style="color: #99abb4;">OVERALL BENEFICIARIES</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NUMBER OF SCHOOLS -->
                <div class="col-md-6 col-lg-6">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-graduation-cap purple_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no" style="color: black;"><?php echo $total_schools; ?></p>
                                <p class="head_couter" style="color: #99abb4;">NUMBER OF SCHOOLS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("accountconnection.php");

// Query to get the number of beneficiaries per school
$sql = "SELECT name_of_school, COUNT(*) as num_beneficiaries 
        FROM beneficiaries 
        GROUP BY name_of_school";
$result = $conn->query($sql);

$schools = [];
$beneficiaries = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $schools[] = $row['name_of_school'];
        $beneficiaries[] = $row['num_beneficiaries'];
    }
}

// Pass the data to the JavaScript as JSON
$schools_json = json_encode($schools);
$beneficiaries_json = json_encode($beneficiaries);
?>

<div class="col-lg-13">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
            <div class="heading1 margin_0">
                <h2>Number Of Beneficiaries Per School</h2>
            </div>
        </div>
        <div class="map_section padding_infor_info">
            <canvas id="bar_chart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get data from PHP
    var schools = <?php echo $schools_json; ?>;
    var beneficiaries = <?php echo $beneficiaries_json; ?>;

    // Generate bar chart with updated design
    var ctx = document.getElementById('bar_chart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: schools, // Schools as labels
            datasets: [{
                label: 'Number of Beneficiaries',
                data: beneficiaries, // Number of beneficiaries per school
                backgroundColor: function(context) {
                    var index = context.dataIndex;
                    var colors = [
                        'rgba(255, 99, 132, 0.6)', 
                        'rgba(54, 162, 235, 0.6)', 
                        'rgba(255, 206, 86, 0.6)', 
                        'rgba(75, 192, 192, 0.6)', 
                        'rgba(153, 102, 255, 0.6)', 
                        'rgba(255, 159, 64, 0.6)'
                    ];
                    return colors[index % colors.length];
                },
                borderColor: function(context) {
                    var index = context.dataIndex;
                    var colors = [
                        'rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(255, 206, 86, 1)', 
                        'rgba(75, 192, 192, 1)', 
                        'rgba(153, 102, 255, 1)', 
                        'rgba(255, 159, 64, 1)'
                    ];
                    return colors[index % colors.length];
                },
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' beneficiaries';
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Schools',
                        font: {
                            size: 14,
                            family: 'Arial, sans-serif',
                            weight: 'bold'
                        },
                        color: '#333'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Beneficiaries',
                        font: {
                            size: 14,
                            family: 'Arial, sans-serif',
                            weight: 'bold'
                        },
                        color: '#333'
                    },
                    grid: {
                        borderColor: '#ddd',
                        borderWidth: 1,
                        tickColor: '#ddd'
                    }
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
</script>





<?php
include("accountconnection.php");

// SQL query to get counts of each nutritional status
$sql = "SELECT nutritional_status_bmia, COUNT(*) as count FROM beneficiary_details GROUP BY nutritional_status_bmia";
$result = $conn->query($sql);

// Initialize $data as an empty array
$data = array();
$total_students = 0;
$healthy_students = 0;
$unhealthy_students = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['nutritional_status_bmia']] = $row['count'];
        $total_students += $row['count'];

        // Count the number of "Normal" (Healthy) students
        if ($row['nutritional_status_bmia'] == 'Normal') {
            $healthy_students = $row['count'];
        } else {
            $unhealthy_students += $row['count']; // Count unhealthy students
        }
    }
} else {
    echo "No data found";
}

// Calculate the percentage of healthy and unhealthy students
$healthy_percentage = $total_students > 0 ? ($healthy_students / $total_students) * 100 : 0;
$unhealthy_percentage = $total_students > 0 ? ($unhealthy_students / $total_students) * 100 : 0;

// Prepare data for JavaScript (JSON format)
$labels = array_keys($data);
$values = array_values($data);

// Convert to JSON
$labels_json = json_encode($labels);
$values_json = json_encode($values);

$conn->close(); // Close the database connection
?>

<div class="row">
    <!-- Pie Chart Section -->
    <div class="col-lg-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Nutritional Status of All Students</h2>
                </div>
            </div>
            <div class="map_section padding_infor_info" style="background-color: white; padding: 20px;">
                <canvas id="pie_chart"></canvas>
            </div>
        </div>
    </div>

    <!-- Progress Bar Section for Healthy and Unhealthy Students -->
 <!-- Alternative Gantt Chart Section for Healthy and Unhealthy Students -->
<div class="col-md-6">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
            <div class="heading1 margin_0">
                <h2>Students Progress (Gantt Chart)</h2>
            </div>
        </div>
        <div class="full gantt_chart_inner">
            <div class="gantt_chart_alternative">
                <!-- Healthy Students Segment -->
                <div class="gantt_segment healthy" style="width: <?php echo round($healthy_percentage); ?>%;">
                    <span class="segment_label">Healthy: <?php echo round($healthy_percentage); ?>%</span>
                </div>
                <!-- Unhealthy Students Segment -->
                <div class="gantt_segment unhealthy" style="width: <?php echo round($unhealthy_percentage); ?>%;">
                    <span class="segment_label">Unhealthy: <?php echo round($unhealthy_percentage); ?>%</span>
                </div>
            </div>

            <br>
            <br>
            <!-- Text Summary -->
            <div class="gantt_summary">
                <p style="color: #4CAF50; font-weight: bold;">Total Healthy Students: <?php echo $healthy_students; ?> out of <?php echo $total_students; ?> students</p>
                <p style="color: red; font-weight: bold;">Total Unhealthy Students: <?php echo $unhealthy_students; ?> out of <?php echo $total_students; ?> students</p>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    var ctx = document.getElementById('pie_chart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo $labels_json; ?>,
            datasets: [{
                data: <?php echo $values_json; ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',   // Red
                    'rgba(255, 159, 64, 0.8)',   // Orange
                    'rgba(54, 162, 235, 0.8)',   // Blue
                    'rgba(75, 192, 192, 0.8)',   // Green
                    'rgba(255, 102, 204, 0.8)'   // Magenta
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'left', // Align legend to the left
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    // Function to download chart as an image
    function downloadChart(canvasId, filename, scale = 2) {
        var canvas = document.getElementById(canvasId);
        var newCanvas = document.createElement('canvas');
        newCanvas.width = canvas.width * scale;
        newCanvas.height = canvas.height * scale;

        var newContext = newCanvas.getContext('2d');
        newContext.scale(scale, scale);
        newContext.fillStyle = 'white';
        newContext.fillRect(0, 0, newCanvas.width / scale, newCanvas.height / scale);
        newContext.drawImage(canvas, 0, 0);

        var link = document.createElement('a');
        link.href = newCanvas.toDataURL('image/png');
        link.download = filename;
        link.click();
    }

    document.getElementById('download_btn').addEventListener('click', function() {
        downloadChart('pie_chart', 'nutrition_status_chart.png');
    });
</script>
















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

                                // Query recent activities
                                $sql = "SELECT * FROM recent_activity ORDER BY timestamp DESC LIMIT 10"; // Fetch last 10 activities
                                $result = $conn->query($sql);

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
                                        echo '<li><a href="allactivities.php?mark_read=true">See More</a></li>';
                                    }
                                } else {
                                    echo '<li>No recent activities found.</li>';
                                }

                                // Close connection
                                $conn->close();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Include Bootstrap JS (adjust the path as necessary) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

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
