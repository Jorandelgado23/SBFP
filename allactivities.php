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
      <title>ALL ACTIVITIES</title>
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
</style>


   <script>
        // JavaScript to hide the notification message after 5 seconds
        window.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                const messageDiv = document.getElementById('mark-read-message');
                if (messageDiv) {
                    messageDiv.style.display = 'none';
                }
            }, 2000);
        });
    </script>

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
                        <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/LOGO.png" alt="#" /></a>

                        </div>
                    </div>
                    <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
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

                                        
                                      
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
    <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>
</a>

<div class="dropdown-menu">
                                                <a class="dropdown-item" href="adsettings.php">My Profile</a>
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
                                    <h2>ALL ACTIVITIES</h2>
                                </div>
                            </div>
                        </div>

                        <?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mark_read_message = "";

// Check if the mark_read parameter is set and true
if (isset($_GET['mark_read']) && $_GET['mark_read'] === 'true') {
    // Perform update query to mark notifications as read
    $sql_update = "UPDATE recent_activity SET status = 'read' WHERE status = 'new'";
    if ($conn->query($sql_update) === TRUE) {
        // Successfully marked notifications as read
        $mark_read_message = "Notifications marked as read.";
    } else {
        // Error occurred while updating
        $mark_read_message = "Error updating record: " . $conn->error;
    }
}

// Query recent activities count with status 'new'
$sql_count = "SELECT COUNT(*) AS activity_count FROM recent_activity WHERE status = 'new'";
$result_count = $conn->query($sql_count);

// Initialize activity count
$activity_count = 0;

// Check if query was successful
if ($result_count->num_rows > 0) {
    // Fetch the row as associative array
    $row_count = $result_count->fetch_assoc();
    // Get the activity count from the fetched row
    $activity_count = $row_count['activity_count'];
} else {
    // Handle database query error (optional)
    $mark_read_message = "Error fetching activity count: " . $conn->error;
}

// Pagination logic
$limit = 10; // Number of activities per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch activities for the current page
$sql_activities = "SELECT * FROM recent_activity ORDER BY timestamp DESC LIMIT $limit OFFSET $offset";
$result_activities = $conn->query($sql_activities);

// Fetch total activities count for pagination
$sql_total = "SELECT COUNT(*) AS total FROM recent_activity";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_activities = $row_total['total'];
$total_pages = ceil($total_activities / $limit);

// Close connection (always a good practice)
$conn->close();
?>

<div class="container">
    <?php if ($mark_read_message): ?>
        <div id="mark-read-message" class="alert alert-info">
            <?php echo htmlspecialchars($mark_read_message); ?>
        </div>
    <?php endif; ?>
    <div class="row column1">
        <div class="col-md-11">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>ALL ACTIVITIES</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive-sm">
                                <table class="table table-striped projects">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 2%">No</th>
                                            <th style="width: 30%">Activity</th>
                                            <th>User</th>
                                            <th>Timestamp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Display activities
                                        $no = $offset + 1;
                                        if ($result_activities->num_rows > 0) {
                                            while ($row = $result_activities->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . $no . '</td>';
                                                echo '<td>' . htmlspecialchars($row["activity"]) . '</td>';
                                                echo '<td>' . htmlspecialchars($row["email"]) . '</td>';
                                                echo '<td>' . htmlspecialchars($row["timestamp"]) . '</td>';
                                                echo '</tr>';
                                                $no++;
                                            }
                                        } else {
                                            echo '<tr><td colspan="4">No activities found.</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php
        // Calculate the start and end page numbers for pagination
        $start_page = max(1, $page - 4); // Show 4 pages before current page
        $end_page = min($total_pages, $start_page + 9); // Show 10 pages total

        // Adjust the start page if there are not enough pages before the current page
        if ($end_page - $start_page < 9) {
            $start_page = max(1, $end_page - 9);
        }

        for ($i = $start_page; $i <= $end_page; $i++): ?>
            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
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
