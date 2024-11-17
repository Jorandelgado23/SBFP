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
      <title>VIEW DETAILS</title>
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

      <style>
       .bold-dark-text {
    font-weight: bold;
    color: #333; /* Adjust color to your preference */
}
.active {
        background-color: lightblue; /* Background color */
        color: #fff; /* Text color */
        font-weight: bold; /* Bold text */
    }


      </style>

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <body class="dashboard dashboard_2">
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
                    <li>
                            <a href="admindashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar"></i> <span>School Attendance</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="monthly_attendance_reports.php">> <span>Monthly Report</span></a></li> 
                           <li><a href="adattendance.php">> <span>Attendance Logs</span></a></li> 
                          
                        </ul>
                     </li>
                       
                        <li class="active">
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li >
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>

                        <li>
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>
                        <li>
                            <a href="age_gender_analysis.php"><i class="fa fa-archive"></i> <span>age and gender Analysis</span></a>
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
                                    <h2>BENEFICIARIES LIST</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->

                        <div class="row">
    <div class="col-sm-6">
        <form action="adbeneficiaries.php" method="get">
            <button type="submit" class="btn btn-primary"> Back</button>
        </form>
    </div>
    <div class="col ml-auto">
    <div class="dropdown float-right">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            GENERATE PDF
        </button>
        <div class="dropdown-menu" aria-labelledby="actionMenuButton">
            <!-- <form action="beneficiary_excel.php" method="get" class="dropdown-item">
                <input type="hidden" name="session_id" value="<?php echo $_GET['session_id']; ?>">
                <button type="submit" class="btn btn-link">Download as Excel</button>
            </form> -->
            <form action="beneficiary_pdf.php" method="get" class="dropdown-item">
                <input type="hidden" name="session_id" value="<?php echo $_GET['session_id']; ?>">
                <button type="submit" class="btn btn-link">Download as PDF</button>
            </form>
        </div>
    </div>
</div>

</div>
                       
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Check if session_id is provided in the URL
if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch beneficiary information for the given session ID
    $sql_beneficiary = "SELECT b.division_province, b.name_of_principal, b.city_municipality_barangay, 
                               b.name_of_feeding_focal_person, b.name_of_school, b.school_id_number 
                        FROM beneficiaries b
                        WHERE b.session_id = ? 
                        LIMIT 1";

    // Prepare and bind SQL statement
    $stmt = $conn->prepare($sql_beneficiary);
    $stmt->bind_param("s", $session_id);
    $stmt->execute();
    $stmt->store_result();

    // Check if session ID exists
    if ($stmt->num_rows > 0) {
        // Fetch beneficiary information
        $stmt->bind_result($division_province, $name_of_principal, $city_municipality_barangay, 
                           $name_of_feeding_focal_person, $name_of_school, $school_id_number);
        $stmt->fetch();

        // Fetch beneficiary details for schools with the same session ID
        $sql_details = "SELECT bd.* 
                        FROM beneficiary_details bd 
                        INNER JOIN beneficiaries b ON bd.beneficiary_id = b.id 
                        WHERE b.session_id = ? 
                        ORDER BY bd.grade_section, bd.student_section";

        // Prepare and bind SQL statement for details
        $stmt_details = $conn->prepare($sql_details);
        $stmt_details->bind_param("s", $session_id);
        $stmt_details->execute();
        $result_details = $stmt_details->get_result();

        // Close statement after fetching results
        $stmt_details->close();

        // HTML output for beneficiary details
        if ($result_details->num_rows > 0) {
            // Initialize array to hold data by grade level and section
            $beneficiaries_by_grade_and_section = [];
            
            // Organize data by grade level and section
            while ($row_details = $result_details->fetch_assoc()) {
                $grade = $row_details['grade_section'];
                $section = $row_details['student_section'];
                
                if (!isset($beneficiaries_by_grade_and_section[$grade][$section])) {
                    $beneficiaries_by_grade_and_section[$grade][$section] = [];
                }
                $beneficiaries_by_grade_and_section[$grade][$section][] = $row_details;
            }

            // Start printing HTML content
            echo "<div id='print-content' class='col-md-12 my-4'>
                    <div class='white_shd full margin_bottom_30'>
                        <div class='full graph_head'>
                            <div class='heading1 margin_0'>
                          
                            </div>
                        </div>
                       ";

            // Print tables for each grade level and section
            foreach ($beneficiaries_by_grade_and_section as $grade => $sections) {
                foreach ($sections as $section => $details) {
                    echo "<h3 style='font-size: 18px;'>$grade - $section</h3>
                          <div class='table-responsive-sm'>
                              <table class='table table-striped table-hover'>
                                  <thead style='color: #fff; background-color: #0971b8;'>
                                      <tr>
                                          <th>Name</th>
                                          <th>Sex</th>
                                          <th>Date of Birth</th>
                                          <th>Date of Weighing</th>
                                          <th>Age</th>
                                          <th>Weight</th>
                                          <th>Height</th>
                                          <th>BMI</th>
                                          <th>Nutritional Status (BMI-A)</th>
                                          <th>Nutritional Status (HFA)</th>
                                          <th>Dewormed</th>
                                          <th>Parent's Consent for Milk</th>
                                          <th>Participation in 4Ps</th>
                                          <th>Beneficiary of SBFP in Previous Years</th>
                                      </tr>
                                  </thead>
                                  <tbody>";

                    foreach ($details as $row_details) {
                        $bmi_status_class = getBMIStatusClass($row_details['nutritional_status_bmia']);
                        $hfa_status_class = getHFAStatusClass($row_details['nutritional_status_hfa']);
                        echo "<tr>
                                <td>{$row_details['name']}</td>
                                <td>{$row_details['sex']}</td>
                                <td>{$row_details['date_of_birth']}</td>
                                <td>{$row_details['date_of_weighing']}</td>
                                <td>{$row_details['age']}</td>
                                <td>{$row_details['weight']}</td>
                                <td>{$row_details['height']}</td>
                                <td>{$row_details['bmi']}</td>
                                <td class='$bmi_status_class'>{$row_details['nutritional_status_bmia']}</td>
                                <td class='$hfa_status_class'>{$row_details['nutritional_status_hfa']}</td>
                                <td>{$row_details['dewormed']}</td>
                                <td>{$row_details['parents_consent_for_milk']}</td>
                                <td>{$row_details['participation_in_4ps']}</td>
                                <td>{$row_details['beneficiary_of_sbfp_in_previous_years']}</td>
                            </tr>";
                    }

                    echo "</tbody></table></div>";
                }
            }

            echo "</div></div></div></div>";

        } else {
            echo "<div class='alert alert-warning' role='alert'>No beneficiaries found for this session.</div>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>Session ID not found in beneficiaries table.</div>";
    }

    // Close statement after fetching results
    $stmt->close();
    // Close the database connection
    $conn->close();
}
?>

<?php
// Function to return BMI status class
function getBMIStatusClass($status) {
    switch ($status) {
        case 'Normal':
            return 'table-success';
        case 'Severely Wasted':
        case 'Wasted':
            return 'table-danger';
        case 'Overweight':
        case 'Obese':
            return 'table-warning';
        default:
            return '';
    }
}

// Function to return HFA status class
function getHFAStatusClass($status) {
    switch ($status) {
        case 'Normal':
            return 'table-success';
        case 'Stunted':
            return 'table-danger';
        case 'Tall':
            return 'table-info';
        default:
            return '';
    }
}
?>




<script>
    function printTable() {
        var content = document.getElementById('print-content').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=1000');
        printWindow.document.write(`
           
        <html>
                <head>
                    <title>LIST OF BENEFICIARIES</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }
                        .table th, .table td {
                            border: 1px solid #dee2e6;
                            padding: 12px;
                            text-align: left;
                        }
                        .table thead th {
                            background-color: #343a40;
                            color: #fff;
                            font-weight: bold;
                        }
                        .table tbody tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }
                        .table-success {
                            background-color: #d4edda !important;
                        }
                        .table-danger {
                            background-color: #f8d7da !important;
                        }
                        .table-warning {
                            background-color: #fff3cd !important;
                        }
                        .table-info {
                            background-color: #d1ecf1 !important;
                        }
                        h2 {
                            margin-bottom: 20px;
                        }
                        @media print {
                            .btn {
                                display: none;
                            }
                        }
                    </style>
                </head>
                <body>
                    ${content}
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    }
</script>





    </div> <!-- / .col-md-12 -->
</div> <!-- end section -->
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
