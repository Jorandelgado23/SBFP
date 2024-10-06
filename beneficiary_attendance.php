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
$stmt = $conn->prepare("SELECT firstname, lastname, school_name, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname, $school_name, $user_role);

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
      <title>MONTHLY/QUARTERLY REPORT</title>
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
                        <li class="active">
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
// Database connection details
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
                    <h2>Beneficiaries Attendance</h2>
                </div>
            </div>
        </div>

      
        <?php

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch submitted data (beneficiary details) for the logged-in user's session
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>


    <title>SBFP Attendance System</title>
  


<div class="container">
    <h2 class="mt-4">Beneficiary Attendance for SBFP</h2>

    <!-- Attendance Form -->
    <form method="POST" action="submit_attendance.php">
        <div class="form-group">
            <label for="attendance_date">Select Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Beneficiary Name</th>
                    <th>Grade & Section</th>
                    <th>Status (Present/Absent)</th>
                    <th>Meal Served</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['grade_section'] ?></td>
                    <td>
                        <select name="status[<?= $row['id'] ?>]" class="form-control" required>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>
                    <td>
                        <select name="meal_served[<?= $row['id'] ?>]" class="form-control" required>
                            <option value="H">Hot Meal (H)</option>
                            <option value="M">Milk (M)</option>
                            <option value="H/M">Hot Meal & Milk (H/M)</option>
                            <option value="A">Absent (A)</option>
                            <option value="H2">Hot Meal Twice (H2)</option>
                            <option value="M2">Milk Twice (M2)</option>
                            <option value="H/M2">Hot Meal & Milk Twice (H/M2)</option>
                        </select>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>

</div>

<?php
// Close the database connection
$conn->close();
?>







<?php

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch attendance records for a specific date and session_id
$date_filter = isset($_POST['date_filter']) ? $_POST['date_filter'] : date('Y-m-d');

$sql = "SELECT bd.name, bd.grade_section, ba.status, ba.meal_served, ba.attendance_date 
        FROM beneficiary_attendance ba
        JOIN beneficiary_details bd ON ba.beneficiary_id = bd.id
        WHERE ba.attendance_date = ? AND bd.session_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $date_filter, $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>


    <title>View Attendance Records</title>



<div class="container">
    <h2 class="mt-4">Attendance Records</h2>

    <!-- Date Filter Form -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="date_filter">Select Date to View Attendance:</label>
            <input type="date" name="date_filter" id="date_filter" class="form-control" value="<?= $date_filter ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">View Attendance</button>
    </form>

    <!-- Attendance Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Grade & Section</th>
                <th>Status</th>
                <th>Meal Served</th>
                <th>Attendance Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['grade_section'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['meal_served'] ?></td>
                <td><?= $row['attendance_date'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
$conn->close();
?>










<?php
// Start session and check user login status

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch attendance statistics (count of absences) for each beneficiary associated with the session_id
$sql = "SELECT bd.name, bd.grade_section, COUNT(ba.status) AS absences
        FROM beneficiary_details bd
        LEFT JOIN beneficiary_attendance ba ON bd.id = ba.beneficiary_id
        WHERE ba.status = 'Absent' AND bd.session_id = ?
        GROUP BY bd.id
        HAVING absences > 0";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>


    <title>Absence Statistics</title>



<div class="container">
    <h2 class="mt-4">Beneficiary Absence Statistics</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Beneficiary Name</th>
                <th>Grade & Section</th>
                <th>Number of Absences</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['grade_section'] ?></td>
                <td><?= $row['absences'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
$conn->close();
?>












<?php

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch submitted data for the logged-in user
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch attendance records for the current month
$current_month = date('Y-m'); // Get current year and month
$attendance_sql = "SELECT beneficiary_id, meal_served, DAY(attendance_date) as day
                   FROM beneficiary_attendance
                   WHERE attendance_date LIKE ? AND beneficiary_id IN 
                   (SELECT id FROM beneficiary_details WHERE session_id = ?)";

$attendance_stmt = $conn->prepare($attendance_sql);

// Use variables for binding
$month_like = $current_month . '%'; // Create a variable for the LIKE clause
$attendance_stmt->bind_param("ss", $month_like, $session_id); // Now bind the variables
$attendance_stmt->execute();
$attendance_result = $attendance_stmt->get_result();

// Create an array to hold meal served data
$meal_data = [];
while ($row = $attendance_result->fetch_assoc()) {
    $meal_data[$row['beneficiary_id']][$row['day']] = $row['meal_served'];
}
?>

<title>SBFP Attendance System</title>

<div class="container">
    <!-- Form Details Section -->
    <div class="form-header">
        <h4>SCHOOL-BASED FEEDING PROGRAM FORM 4 (2020)</h4>
        <table class="table table-borderless">
            <tr>
                <td>Region: ____________________________</td>
                <td>Division: ___________________________</td>
            </tr>
            <tr>
                <td>School: ____________________________</td>
                <td>District: ___________________________</td>
            </tr>
            <tr>
                <td>Grade: __________</td>
                <td>Section: ___________________________</td>
            </tr>
            <tr>
                <td>School ID Number: _________________________</td>
            </tr>
        </table>
    </div>

    <!-- Table Section -->
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Feeding Attendance Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="3">Name of Pupil</th>
                                <th colspan="31" style="padding: 10px; text-align: center; font-size: 12px;">Actual Feeding</th>
                                <th colspan="3" style="text-align: center;">ATTENDANCE</th>
                            </tr>
                            <tr>
                                <!-- Blank Row Under "Actual Feeding" -->
                                <?php for ($i = 1; $i <= 31; $i++) { echo "<th></th>"; } ?>
                                <th rowspan="2" style="text-align: center;">No. of Days Present (A)</th>
                                <th rowspan="2" style="text-align: center;">No. of Feeding Days (B)</th>
                                <th rowspan="2" style="text-align: center;">Percentage (A/B) * 100</th>
                            </tr>
                            <tr>
                                <!-- Days of the month (1 to 31) -->
                                <?php for ($i = 1; $i <= 31; $i++) { echo "<th>$i</th>"; } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Loop through each student
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    // Display student name
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    
                                    $days_present = 0; // Track the number of present days

                                    // Display 31 columns for feeding days
                                    for ($i = 1; $i <= 31; $i++) {
                                        // Check if meal data exists for the given day
                                        if (isset($meal_data[$row['id']][$i])) {
                                            $meal_served = $meal_data[$row['id']][$i];
                                            echo '<td>' . htmlspecialchars($meal_served) . '</td>'; // Display meal served
                                            if ($meal_served !== 'A') {
                                                $days_present++; // Increment for every non-absent day
                                            }
                                        } else {
                                            echo '<td></td>'; // Empty cell if no meal data
                                        }
                                    }
                                    echo '<td>' . $days_present . '</td>'; // Total number of days present
                                    echo '<td>--</td>'; // Placeholder for total feeding days
                                    echo '<td>--</td>'; // Placeholder for percentage
                                    echo '</tr>';
                                }
                            } else {
                                // Placeholder rows if no data is found
                                for ($i = 1; $i <= 25; $i++) {
                                    echo '<tr>';
                                    echo '<td>Pupil ' . $i . '</td>';
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
</div>

<?php
// Close the database connection
$conn->close();
?>



<!-- JS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
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
    
</body>

</html>
