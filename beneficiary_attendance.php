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
      <title>Beneficiary Attendance</title>
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
                    <h2>Beneficiary Attendance</h2>
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

// Define grade levels for filtering
$grades = ["Kinder", "Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5", "Grade 6"];
$sections = [];

// Fetch distinct student sections available for the logged-in user's session
$sql = "SELECT DISTINCT student_section FROM beneficiary_details WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $sections[] = $row['student_section'];
}
$stmt->close();

// Apply filters if set
$selected_grade = isset($_POST['grade_section']) ? $_POST['grade_section'] : '';
$selected_section = isset($_POST['student_section']) ? $_POST['student_section'] : '';

$sql = "SELECT * FROM beneficiary_details WHERE session_id = ?";
$params = [$session_id];
$types = "s";

if (!empty($selected_grade)) {
    $sql .= " AND grade_section = ?";
    $params[] = $selected_grade;
    $types .= "s";
}

if (!empty($selected_section)) {
    $sql .= " AND student_section = ?";
    $params[] = $selected_section;
    $types .= "s";
}

$sql .= " ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
?>



<!-- Filter Form -->
<form method="POST" action="beneficiary_attendance.php" class="form-inline mb-3">
    <label for="grade_section" class="mr-2">Grade Level:</label>
    <select name="grade_section" id="grade_section" class="form-control mr-3">
        <option value="">All</option>
        <?php foreach ($grades as $grade): ?>
            <option value="<?= $grade ?>" <?= ($selected_grade == $grade) ? 'selected' : '' ?>><?= $grade ?></option>
        <?php endforeach; ?>
    </select>

    <label for="student_section" class="mr-2">Section:</label>
    <select name="student_section" id="student_section" class="form-control mr-3">
        <option value="">All</option>
        <?php foreach ($sections as $section): ?>
            <option value="<?= $section ?>" <?= ($selected_section == $section) ? 'selected' : '' ?>><?= $section ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- Attendance Form -->
<form method="POST" action="submit_attendance.php">
    <div class="form-row align-items-center">
        <div class="col-auto">
            <label for="attendance_date">Select Date of Attendance:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" value="<?= date('Y-m-d'); ?>" required>
        </div>
    </div>

    <!-- Toggle Attendance Mode Button -->
    <button type="button" id="toggleMode" class="btn btn-secondary mb-3">Switch to Mark Absent Mode</button>
    <input type="hidden" name="attendance_mode" id="attendance_mode" value="Present">

    <!-- Table Section -->
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Beneficiary Attendance</h2>
                </div>
            </div>

            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
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
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['grade_section'] . " - " . $row['student_section']) ?></td>
                                    <td>
                                        <!-- Checkbox with hidden input for unchecked state -->
                                        <input type="hidden" name="status[<?= $row['id'] ?>]" value="Absent">
                                        <input type="checkbox" name="status[<?= $row['id'] ?>]" value="Present" class="attendance-checkbox">
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
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit Attendance</button>
</form>

<script>
    // JavaScript for toggling between Present and Absent modes
    document.getElementById('toggleMode').addEventListener('click', function() {
        const modeInput = document.getElementById('attendance_mode');
        const isPresentMode = modeInput.value === 'Present';

        // Toggle mode
        modeInput.value = isPresentMode ? 'Absent' : 'Present';
        
        // Update button text
        this.textContent = isPresentMode ? 'Switch to Mark Present Mode' : 'Switch to Mark Absent Mode';
    });
</script>

<br>
<br>







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

<div class="container">

    <form method="POST" action="">
    <div class="form-row align-items-center">
                    <div class="col-auto">
            <label for="date_filter" style="font-size: large;">Select Date To View Attendance</label>
            <input type="date" name="date_filter" id="date_filter" class="form-control" value="<?= htmlspecialchars($date_filter) ?>" required onchange="this.form.submit()">
        </div>
    </form>


    <!-- table section -->
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Attendance Records Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
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
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['grade_section']) ?></td>
                                <td><?= htmlspecialchars($row['status']) ?></td>
                                <td><?= htmlspecialchars($row['meal_served']) ?></td>
                                <td><?= htmlspecialchars($row['attendance_date']) ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- table section -->
</div>

<?php
$conn->close();
?>






<br>
<br>





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




    <div class="container">

    <!-- Table Section -->
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Beneficiary Absence Statistics Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
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
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['grade_section']) ?></td>
                                <td><?= htmlspecialchars($row['absences']) ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$conn->close();
?>




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
