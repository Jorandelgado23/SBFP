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

        .active {
        background-color: lightblue; /* Background color */
        color: #fff; /* Text color */
        font-weight: bold; /* Bold text */
    }
        .filter-section {
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 0px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            
            gap: 45px;
        }
        label {
            font-weight: bold;
        }
        select, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #0971b8;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #0971b8;
            color:#f1f1f1
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .attendance-table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }
        .attendance-table th, .attendance-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .attendance-table th {
            background-color: #f2f2f2;
        }
        .attendance-table tr:hover {
            background-color: #f9f9f9;
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
                    <li>
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

                        <li class="active">
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
                                    <h2>AGE AND GENDER ANALYSIS</h2>
                                </div>
                            </div>
                        </div>





                        <?php 
include("accountconnection.php"); 
?>
  <d class="row">
<div class="container-fluid">

        <!-- Filter Section -->
        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                               
            <form method="POST" action="">
                <label for="age_group">Select Age Group:</label>
                <select name="age_group">
                    <option value="">All</option>
                    <option value="5-7">5-7</option>
                    <option value="8-10">8-10</option>
                    <option value="11-13">11-13</option>
                    <option value="14+">14+</option>
                </select>
                
                <label for="gender">Select Gender:</label>
                <select name="gender">
                    <option value="">All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="school">Select School:</label>
                <select name="school">
                    <option value="">All</option>
                    <?php
                    // Fetch schools from the beneficiaries table
                    $schoolQuery = "SELECT DISTINCT name_of_school FROM beneficiaries ORDER BY name_of_school";
                    $schoolResult = mysqli_query($conn, $schoolQuery);
                    if (mysqli_num_rows($schoolResult) > 0) {
                        while ($schoolRow = mysqli_fetch_assoc($schoolResult)) {
                            echo "<option value='" . htmlspecialchars($schoolRow['name_of_school']) . "'>" . htmlspecialchars($schoolRow['name_of_school']) . "</option>";
                        }
                    } else {
                        echo "<option value=''>No schools available</option>";
                    }
                    ?>
                </select>

                <button type="submit" name="filter">Filter</button>
            </form>
        </div>

        <!-- Results Section -->
        <div>
            <?php
            if (isset($_POST['filter'])) {
                $ageGroup = $_POST['age_group'];
                $gender = $_POST['gender'];
                $school = $_POST['school'];
                $conditions = [];

                // Filter conditions based on age group
                if ($ageGroup) {
                    switch ($ageGroup) {
                        case "5-7":
                            $conditions[] = "age BETWEEN 5 AND 7";
                            break;
                        case "8-10":
                            $conditions[] = "age BETWEEN 8 AND 10";
                            break;
                        case "11-13":
                            $conditions[] = "age BETWEEN 11 AND 13";
                            break;
                        case "14+":
                            $conditions[] = "age >= 14";
                            break;
                    }
                }

                // Filter condition based on gender
                if ($gender) {
                    $conditions[] = "bd.sex = '$gender'"; // Use alias for beneficiary_details
                }

                // Filter condition based on school
                if ($school) {
                    $conditions[] = "b.name_of_school = '$school'"; // Use alias for beneficiaries
                }

                // Create the base query with JOIN
                $query = "
                    SELECT bd.*, b.name_of_school 
                    FROM beneficiary_details bd
                    JOIN beneficiaries b ON bd.beneficiary_id = b.id
                ";
                
                // Add conditions to the query if any
                if (count($conditions) > 0) {
                    $query .= " WHERE " . implode(" AND ", $conditions);
                }

                // Execute the query
                $result = mysqli_query($conn, $query);

                // Check if any records were found
                if (mysqli_num_rows($result) > 0) {
                    // Display each beneficiary’s details in a table format
                    echo "<table class='table table-hover'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Name</th>";
                    echo "<th>Age</th>";
                    echo "<th>Gender</th>";
                    echo "<th>School</th>";
                    echo "<th>Nutritional Status (BMI)</th>";
                    echo "<th>Nutritional Status (Height-for-Age)</th>";
                    echo "<th>Latest Health Progress</th>";
                    echo "<th>Attendance Records</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        $beneficiary_id = $row['id'];

                        // Fetch progress data
                        $progressQuery = "SELECT date_of_progress, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa FROM beneficiary_progress WHERE beneficiary_id = $beneficiary_id ORDER BY date_of_progress DESC LIMIT 1";
                        $progressResult = mysqli_query($conn, $progressQuery);
                        $latestProgress = mysqli_fetch_assoc($progressResult);

                        // Fetch attendance data
                        $attendanceQuery = "SELECT attendance_date, status FROM beneficiary_attendance WHERE beneficiary_id = $beneficiary_id ORDER BY attendance_date DESC";
                        $attendanceResult = mysqli_query($conn, $attendanceQuery);

                        // Construct attendance records string
                        $attendanceRecords = "";
                        if (mysqli_num_rows($attendanceResult) > 0) {
                            while ($attendanceRow = mysqli_fetch_assoc($attendanceResult)) {
                                $attendanceRecords .= "Date: " . htmlspecialchars($attendanceRow['attendance_date']) . " - Status: " . htmlspecialchars($attendanceRow['status']) . "<br>";
                            }
                        } else {
                            $attendanceRecords = "No attendance data available.";
                        }

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sex']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name_of_school']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nutritional_status_bmia']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nutritional_status_hfa']) . "</td>";
                        echo "<td>";
                        if ($latestProgress) {
                            echo "Date: " . htmlspecialchars($latestProgress['date_of_progress']) . "<br>";
                            echo "Weight: " . htmlspecialchars($latestProgress['weight']) . " kg<br>";
                            echo "Height: " . htmlspecialchars($latestProgress['height']) . " cm<br>";
                            echo "BMI: " . htmlspecialchars($latestProgress['bmi']) . "<br>";
                            echo "Nutritional Status (BMI): " . htmlspecialchars($latestProgress['nutritional_status_bmia']) . "<br>";
                            echo "Nutritional Status (Height-for-Age): " . htmlspecialchars($latestProgress['nutritional_status_hfa']);
                        } else {
                            echo "No health progress data available.";
                        }
                        echo "</td>";
                        echo "<td>" . $attendanceRecords . "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No records found for the selected filters.</p>";
                }
            }
            ?>
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