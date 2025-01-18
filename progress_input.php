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
      <title>Beneficiary Progress Input and Nutritional Tracking</title>
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

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      

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
    
    .table_section {
    text-align: center;

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
            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
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
         <li  class="active">
            <a href="#beneficiaryDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-line-chart"></i> <span>Beneficiary Section</span>
            </a>
            <ul class="collapse list-unstyled" id="beneficiaryDropdown">
                <li><a href="progress_input.php">> <span>Progress Input</span></a></li>
                <li><a href="Beneficiary_list.php">> <span>Beneficiary Improvement</span></a></li>
            </ul>
        </li>

        <!-- Dropdown for Student Attendance and Beneficiary Attendance -->
        <li>
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
            <a href="form8.php"><i class="fa fa-file-text-o"></i> <span>Quaterly  Report</span></a>
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
                                    <h2>Beneficiary Progress Input and Nutritional Tracking</h2>
                                </div>
                            </div>
                        </div>



                        <?php
// Include database connection
include("accountconnection.php");

// Initialize variables for success message and error message
$success_message = "";
$error_message = "";

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch beneficiaries associated with the user's session_id
$sql = "SELECT id, name, date_of_birth, student_section FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission
    foreach ($_POST['beneficiary'] as $beneficiary_id => $data) {
        $date_of_progress = $data['date_of_progress'];
        $weight = $data['weight'];
        $height = $data['height'];
        $bmi = $data['bmi'];
        $nutritional_status_bmia = $data['nutritional_status_bmia'];
        $nutritional_status_hfa = $data['nutritional_status_hfa'];
        $student_section = $data['student_section'];

        // Check if a record for this beneficiary and date already exists
        $sql_check = "SELECT * FROM beneficiary_progress WHERE beneficiary_id = ? AND date_of_progress = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('is', $beneficiary_id, $date_of_progress);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        $improvement_message = "No Improvement Detected.";

        if ($result_check->num_rows > 0) {
            // Update record
            $previous_record = $result_check->fetch_assoc();

            if (
                ($previous_record['nutritional_status_bmia'] == "Severely Wasted" && $nutritional_status_bmia == "Normal") ||
                ($previous_record['nutritional_status_bmia'] == "Wasted" && $nutritional_status_bmia == "Normal")
            ) {
                $improvement_message = "Improvement Detected!";
            }

            if ($weight > $previous_record['weight']) {
                $improvement_message .= " Weight has increased.";
            } else {
                $improvement_message .= " Weight has not improved.";
            }

            $sql_update = "UPDATE beneficiary_progress 
                           SET date_of_progress = ?, weight = ?, height = ?, bmi = ?, 
                               nutritional_status_bmia = ?, nutritional_status_hfa = ?, session_id = ? 
                           WHERE beneficiary_id = ? AND date_of_progress = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param('sddssssis', 
                $date_of_progress, 
                $weight, 
                $height, 
                $bmi, 
                $nutritional_status_bmia, 
                $nutritional_status_hfa, 
                $session_id, 
                $beneficiary_id,
                $date_of_progress 
            );
            $stmt_update->execute();

            $activity = "Updated progress for beneficiary ID: $beneficiary_id on date: $date_of_progress";
            $activity_type = "progress_update";
        } else {
            // Insert new record
            $sql_insert = "INSERT INTO beneficiary_progress (beneficiary_id, date_of_progress, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, session_id)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('issddsss', $beneficiary_id, $date_of_progress, $weight, $height, $bmi, $nutritional_status_bmia, $nutritional_status_hfa, $session_id);
            $stmt_insert->execute();

            $activity = "Inserted progress for beneficiary ID: $beneficiary_id on date: $date_of_progress";
            $activity_type = "progress_insert";
            $improvement_message = "New record added.";
        }

        $sql_details_update = "UPDATE beneficiary_details SET weight = ?, height = ?, bmi = ?, nutritional_status_bmia = ?, nutritional_status_hfa = ?, student_section = ?, date_of_weighing = ? WHERE id = ?";
        $stmt_details_update = $conn->prepare($sql_details_update);
        $stmt_details_update->bind_param('ddsssssi', $weight, $height, $bmi, $nutritional_status_bmia, $nutritional_status_hfa, $student_section, $date_of_progress, $beneficiary_id);
        $stmt_details_update->execute();

        $activity .= " Updated beneficiary details.";
        $activity_type .= "_details_update";

        $timestamp = date("Y-m-d H:i:s");
        $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
        $log_stmt->execute();
        $log_stmt->close();

        if ($_SESSION['role'] === 'sbfp') {
            $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
            $sbfp_activity_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
            $sbfp_activity_stmt->execute();
            $sbfp_activity_stmt->close();
        }
    }

    // Display success message
    $success_message = $improvement_message;
}
?>

<script>
// Show SweetAlert based on PHP messages
document.addEventListener('DOMContentLoaded', function() {
    <?php if (!empty($success_message)) { ?>
        Swal.fire({
            title: 'Success!',
            text: "<?= $success_message ?>",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    <?php } elseif (!empty($error_message)) { ?>
        Swal.fire({
            title: 'Error!',
            text: "<?= $error_message ?>",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php } ?>
});
</script>

<title>Input Beneficiary Progress</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Nutritional Status Calculation Function
    function calculateNutritionalStatus(row) {
        const weight = parseFloat(row.find('.weight').val());
        const heightCm = parseFloat(row.find('.height').val());

        if (weight > 0 && heightCm > 0) {
            // Calculate BMI
            const heightM = heightCm / 100;
            const bmi = weight / (heightM * heightM);
            row.find('.bmi').val(bmi.toFixed(2)); // Display BMI

            // Calculate BMI nutritional status based on BMI value
            let nutritionalStatusBMI = "Normal";
            if (bmi < 16) {
                nutritionalStatusBMI = "Severely Wasted";
            } else if (bmi < 18.5) {
                nutritionalStatusBMI = "Wasted";
            } else if (bmi >= 25 && bmi < 30) {
                nutritionalStatusBMI = "Overweight";
            } else if (bmi >= 30) {
                nutritionalStatusBMI = "Obese";
            }
            row.find('.nutritional_status_bmia').val(nutritionalStatusBMI);

            // Calculate HFA nutritional status based on age and height
            const dob = new Date(row.find('.date_of_birth').val());
            const now = new Date();
            const ageMonths = (now.getFullYear() - dob.getFullYear()) * 12 + now.getMonth() - dob.getMonth();
            let nutritionalStatusHFA = "Normal";

            if (ageMonths < 60) {
                nutritionalStatusHFA = heightCm < 90 ? "Stunted" : heightCm > 110 ? "Tall" : "Normal";
            } else if (ageMonths < 120) {
                nutritionalStatusHFA = heightCm < 115 ? "Stunted" : heightCm > 140 ? "Tall" : "Normal";
            } else {
                nutritionalStatusHFA = heightCm < 130 ? "Stunted" : heightCm > 160 ? "Tall" : "Normal";
            }
            row.find('.nutritional_status_hfa').val(nutritionalStatusHFA);
        }
    }

    // Event listeners for weight and height inputs
    $(document).on('input', '.weight, .height', function() {
        const row = $(this).closest('tr');
        calculateNutritionalStatus(row);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Restore saved values from session storage
    const formInputs = document.querySelectorAll('input, select, textarea');
    formInputs.forEach((input) => {
        const savedValue = sessionStorage.getItem(input.name);
        if (savedValue) {
            input.value = savedValue;
        }
    });

    // Save form input values to session storage on input change
    formInputs.forEach((input) => {
        input.addEventListener('input', () => {
            sessionStorage.setItem(input.name, input.value);
        });
    });

    // Clear session storage on form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', () => {
        sessionStorage.clear();
    });
});
</script>

<div class="white_shd full margin_bottom_30">
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
            <form action="" method="post" class="forms-sample">
            <table class="table table-bordered">
                <thead style="color: #fff; background-color: #0971b8;">
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Student Section</th>
                            <th>Weight (kg)</th>
                            <th>Height (cm)</th>
                            <th>BMI</th>
                            <th>Nutritional Status (BMI-A)</th>
                            <th>Nutritional Status (HFA)</th>
                            <th>Date of Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['date_of_birth'] ?></td>
                                <td><?= $row['student_section'] ?></td>
                                <td><input type="number" step="0.01" name="beneficiary[<?= $row['id'] ?>][weight]" class="form-control weight" required></td>
                                <td><input type="number" step="0.01" name="beneficiary[<?= $row['id'] ?>][height]" class="form-control height" required></td>
                                <td><input type="text" name="beneficiary[<?= $row['id'] ?>][bmi]" class="form-control bmi" readonly></td>
                                <td><input type="text" name="beneficiary[<?= $row['id'] ?>][nutritional_status_bmia]" class="form-control nutritional_status_bmia" readonly></td>
                                <td><input type="text" name="beneficiary[<?= $row['id'] ?>][nutritional_status_hfa]" class="form-control nutritional_status_hfa" readonly></td>
                                <td><input type="date" name="beneficiary[<?= $row['id'] ?>][date_of_progress]" class="form-control" required></td>
                                <input type="hidden" name="beneficiary[<?= $row['id'] ?>][student_section]" value="<?= $row['student_section'] ?>">
                                <input type="hidden" name="beneficiary[<?= $row['id'] ?>][date_of_birth]" value="<?= $row['date_of_birth'] ?>">
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-light btn-block mt-4" 
                        style="border-radius: 25px; font-weight: bold; letter-spacing: 1px; background-color: #58a75a; color: #fff;">Submit Progress</button>
            </form>
        </div>
    </div>
</div>








                        
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
    
</body>

</html>
