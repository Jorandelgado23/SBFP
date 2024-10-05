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
    if (!isset($_SESSION['welcome_shown'])) {
        $welcome_message = "Welcome, $user_firstname $user_lastname!";
        $_SESSION['welcome_shown'] = true; // Set the session variable
    }
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

<li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                       
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
            <!-- Button to download the chart -->
            <div class="text-center mt-3">
                <button onclick="downloadChart('pie_chart', 'Nutritional_Status_Chart.png', 3)" class="btn btn-info">Download Chart as Image</button>
            </div>
        </div>
    </div>

    <!-- Progress Bar Section for Healthy and Unhealthy Students -->
    <div class="col-md-6">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Students Progress</h2>
                </div>
            </div>
            <div class="full progress_bar_inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress_bar">
                            <!-- Healthy Students Progress Bar -->
                            <span class="skill" style="width:<?php echo round($healthy_percentage); ?>%;">Healthy Students <span class="info_valume"><?php echo round($healthy_percentage); ?>%</span></span>
                            <div class="progress skill-bar">
                                <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo round($healthy_percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($healthy_percentage); ?>%;">
                                </div>
                            </div>
                            <!-- Unhealthy Students Progress Bar -->
                            <span class="skill" style="width:<?php echo round($unhealthy_percentage); ?>%;">Unhealthy Students <span class="info_valume"><?php echo round($unhealthy_percentage); ?>%</span></span>
                            <div class="progress skill-bar">
                                <div class="progress-bar progress-bar-danger progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php echo round($unhealthy_percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($unhealthy_percentage); ?>%;">
                                </div>
                            </div>
                            <!-- Display total healthy and unhealthy students -->
                            <p>Total Healthy Students: <?php echo $healthy_students; ?> out of <?php echo $total_students; ?> students</p>
                            <p>Total Unhealthy Students: <?php echo $unhealthy_students; ?> out of <?php echo $total_students; ?> students</p>
                        </div>
                    </div>
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
                    position: 'top',
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
