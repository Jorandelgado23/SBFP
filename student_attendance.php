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
        .attendance-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid #ccc;
            cursor: pointer;
            text-align: center;
            vertical-align: middle;
            background-color: #fff;
        }
        .attendance-box.checked {
            background-color: #007bff;
            color: #fff;
        }
        .attendance-box::before {
            content: "";
        }
        .attendance-box.checked::before {
            content: "✔";
        }

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
                            <a href="dashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
                        </li>
                        <li>
                            <!-- <a href="form2.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 2</span></a> -->
                        </li>
                        <!-- <li>
                            <a href="form3.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 3</span></a>
                        </li> -->
                        <li class="active">
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

    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown">
        <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>
</a>

<div class="dropdown-menu">
                                                <a class="dropdown-item" href="usersetting.php">My Profile</a>
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
                                    <h2>ATTENDANCE</h2>
                                </div>
                            </div>
                        </div>
                        <div class="container my-4">
    <h2 class="h4 mb-4">Attendance & Meal Monitoring</h2>
    <p>SELECT GRADE LEVEL</p>
    <div class="form-group col-md-4 p-0">
        <label class="sr-only" for="studentgrade">Status</label>
        <select class="custom-select" id="schoolSelect">
            <option selected>CHOOSE GRADE LEVEL.....</option>
            <option value="kinder">kinder</option>
            <option value="Grade1">Grade 1</option>
            <option value="Grade2">Grade 2</option>
            <option value="Grade3">Grade 3</option>
            <option value="Grade4">Grade 4</option>
            <option value="Grade5">Grade 5</option>
            <option value="Grade6">Grade 6</option>
        </select>
    </div>

    <div class="col-md-10">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                <button class="btn btn-primary float-right ml-3" type="button">Add more +</button>
                <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                    <a class="dropdown-item" href="#">Export</a>
                    <a class="dropdown-item" href="#">Delete</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>

           <!-- Attendance Table -->
<form id="attendanceForm" method="post" action="save_attendance.php">
    <div class="table-responsive">
        <table class="table table-bordered">
           
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sbfp";

            $conn = new mysqli($servername, $username, $password, $dbname);

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

            $grades = [
                'Kinder' => [],
                'Grade 1' => [],
                'Grade 2' => [],
                'Grade 3' => [],
                'Grade 4' => [],
                'Grade 5' => [],
                'Grade 6' => []
            ];

            // Fetch submitted data for the logged-in user only
            $sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY grade_section";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $session_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $grades[$row['grade_section']][] = $row;
                }
            }

            $totalDays = 120;

            foreach ($grades as $grade => $students) {
                echo "<h3>$grade</h3>";
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>NAME OF PUPIL</th>';
                for ($i = 1; $i <= $totalDays; $i++) {
                    echo '<th>' . $i . '</th>';
                }
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                if (count($students) > 0) {
                    foreach ($students as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        for ($i = 1; $i <= $totalDays; $i++) {
                            $selectId = 'attendance-' . $row['id'] . '-' . $i;
                            $selectedValue = isset($_POST['attendance'][$row['id']][$i]) ? $_POST['attendance'][$row['id']][$i] : '';
                            echo '<td><select class="attendance-select" id="' . $selectId . '" name="attendance[' . $row['id'] . '][' . $i . ']">
                                    <option value=""></option>
                                    <option value="H"' . ($selectedValue == 'H' ? ' selected' : '') . '>H</option>
                                    <option value="M"' . ($selectedValue == 'M' ? ' selected' : '') . '>M</option>
                                    <option value="H/M"' . ($selectedValue == 'H/M' ? ' selected' : '') . '>H/M</option>
                                    <option value="A"' . ($selectedValue == 'A' ? ' selected' : '') . '>A</option>
                                    <option value="H2"' . ($selectedValue == 'H2' ? ' selected' : '') . '>H2</option>
                                    <option value="M2"' . ($selectedValue == 'M2' ? ' selected' : '') . '>M2</option>
                                    <option value="H/M2"' . ($selectedValue == 'H/M2' ? ' selected' : '') . '>H/M2</option>
                                </select></td>';
                        }
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="' . (2 + $totalDays) . '">No records found for ' . $grade . '</td></tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            }

            $conn->close();
            ?>
            <button type="submit" class="btn btn-primary">Save Attendance</button>
        </form>


            <!-- Total Present and Total Absent Tables -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Total Present</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assuming $presentStudents is an array of students present
                                // Adjust this logic based on your actual database and attendance marking
                                $presentStudents = []; // Initialize array
                                foreach ($presentStudents as $student) {
                                    echo '<tr>';
                                    echo '<td>' . $student['id'] . '</td>';
                                    echo '<td>' . $student['name'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Total Absent</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assuming $absentStudents is an array of students absent
                                // Adjust this logic based on your actual database and attendance marking
                                $absentStudents = []; // Initialize array
                                foreach ($absentStudents as $student) {
                                    echo '<tr>';
                                    echo '<td>' . $student['id'] . '</td>';
                                    echo '<td>' . $student['name'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
</body>

</html>
