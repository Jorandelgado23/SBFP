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
      <title>Student Attendance</title>
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
        /* Custom styles for the attendance table */
       

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
            <p><span class="online_animation"></span> Logged In</p>

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

        <!-- <li>
    <a href="#snsDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <i class="fa fa-dashboard"></i> <span>SNS List</span>
    </a>
    <ul class="collapse list-unstyled" id="snsDropdown">
        <li><a href="weighing_sessions.php?kinder">> <span>Kinder</span></a></li>
        <li><a href="weighing_sessions1.php?grade1">> <span>Grade 1</span></a></li>
        <li><a href="weighing_sessions2.php?grade2">> <span>Grade 2</span></a></li>
        <li><a href="weighing_sessions3.php?grade3">> <span>Grade 3</span></a></li>
        <li><a href="weighing_sessions4.php?grade4">> <span>Grade 4</span></a></li>
        <li><a href="weighing_sessions5.php?grade5">> <span>Grade 5</span></a></li>
        <li><a href="weighing_sessions6.php?grade6">> <span>Grade 6</span></a></li>
        <li><a href="sns_summary.php">> <span>SNS Summary</span></a></li>
    </ul>
</li> -->

        <li>
            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
        </li>

         <!-- Dropdown for Beneficiary Improvement and Progress Input -->
         <li>
            <a href="#beneficiaryDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-line-chart"></i> <span>Beneficiary Section</span>
            </a>
            <ul class="collapse list-unstyled" id="beneficiaryDropdown">
                <li><a href="progress_input.php">> <span>Progress Input</span></a></li>
                <li><a href="Beneficiary_list.php">> <span>Beneficiary Improvement</span></a></li>
            </ul>
        </li>

        <!-- Dropdown for Student Attendance and Beneficiary Attendance -->
        <li class="active">
            <a href="#attendanceDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-calendar"></i> <span>Attendance Section</span>
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
                                    <h2>Attendance Table</h2>
                                </div>
                            </div>
                        </div>
                        <p class="card-text" style="font-size: large;">Click The Download PDF To Generate</p>

                        <form method="post" action="download.php">
    <!-- <button type="submit" name="action" value="excel" class="btn btn-success">Download Excel</button> -->
    <button type="submit" name="action" value="pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Download PDF</button>
</form>

<div>
    <br>
    <?php
// Session check
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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

// Handle start date input
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01'); // Default to the first day of the current month
$selected_month = date('Y-m', strtotime($start_date)); // Extract year and month from the selected date

// Fetch submitted data for the logged-in user
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch attendance records for the selected month
$attendance_sql = "SELECT beneficiary_id, meal_served, DAY(attendance_date) as day
                   FROM beneficiary_attendance
                   WHERE attendance_date LIKE ? AND beneficiary_id IN 
                   (SELECT id FROM beneficiary_details WHERE session_id = ?)";

$attendance_stmt = $conn->prepare($attendance_sql);
$month_like = $selected_month . '%'; // Create a variable for the LIKE clause
$attendance_stmt->bind_param("ss", $month_like, $session_id);
$attendance_stmt->execute();
$attendance_result = $attendance_stmt->get_result();

// Create an array to hold meal served data
$meal_data = [];
while ($row = $attendance_result->fetch_assoc()) {
    $meal_data[$row['beneficiary_id']][$row['day']] = $row['meal_served'];
}
?>

<!-- Date Selection Form -->
<div class="row">
    <div class="col-md-12">
        <form method="GET" action="">
            <label for="start_date">Select Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($start_date); ?>">
            <button type="submit" class="btn btn-primary">View Attendance</button>
        </form>
    </div>
</div>

<br>
<br>

<!-- Attendance Table -->
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="3">Name of Pupil</th>
                            <th colspan="31" style="text-align: center;">Actual Feeding</th>
                            <th colspan="3" style="text-align: center;">ATTENDANCE</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 31; $i++) { echo "<th></th>"; } ?>
                            <th rowspan="2" style="text-align: center;">No. of Days Present (A)</th>
                            <th rowspan="2" style="text-align: center;">No. of Feeding Days (B)</th>
                            <th rowspan="2" style="text-align: center;">Percentage (A/B) * 100</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 31; $i++) { echo "<th>$i</th>"; } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $counter = 1; // Initialize counter for student numbering
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $counter++ . '. ' . htmlspecialchars($row['name']) . '</td>';
                                
                                $days_present = 0; // Track the number of present days

                                for ($i = 1; $i <= 31; $i++) {
                                    if (isset($meal_data[$row['id']][$i])) {
                                        $meal_served = $meal_data[$row['id']][$i];
                                        echo '<td>' . htmlspecialchars($meal_served) . '</td>';
                                        if ($meal_served !== 'A') {
                                            $days_present++;
                                        }
                                    } else {
                                        echo '<td></td>';
                                    }
                                }
                                echo '<td>' . $days_present . '</td>'; // Total days present
                                echo '<td></td>'; // Placeholder for total feeding days
                                echo '<td></td>'; // Placeholder for percentage
                                echo '</tr>';
                            }

                            // Total Row for Meal Count
                            echo '<tr>';
                            echo '<td>Total:</td>';
                            for ($i = 1; $i <= 31; $i++) {
                                $daily_total = 0;

                                foreach ($meal_data as $beneficiary_id => $meals) {
                                    if (isset($meals[$i]) && $meals[$i] !== 'A') {
                                        $daily_total++;
                                    }
                                }

                                echo '<td style="text-align: center;">' . ($daily_total > 0 ? $daily_total : '') . '</td>';
                            }

                            echo '<td colspan="2" style="text-align: center;">Average:</td>';
                            echo '<td></td>'; // Empty cell for total present days
                            echo '</tr>';
                        } else {
                            // Placeholder rows if no data is found
                            for ($i = 1; $i <= 25; $i++) {
                                echo '<tr>';
                                echo '<td>' . $i . '. Pupil ' . $i . '</td>';
                                echo '<td colspan="31"></td>';
                                echo '<td>0</td>';
                                echo '<td>0</td>';
                                echo '<td>0%</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>










        

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script>
// JavaScript to handle clickable boxes and toggle checkboxes
document.addEventListener('DOMContentLoaded', function () {
    const attendanceSelects = document.querySelectorAll('.attendance-select');

    // Check localStorage for previously selected options
    for (const select of attendanceSelects) {
        const selectId = select.id;
        const selectedValue = localStorage.getItem(selectId);

        if (selectedValue) {
            select.value = selectedValue;
        }

        select.addEventListener('change', function () {
            localStorage.setItem(selectId, this.value);
        });
    }
});

</script>


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
