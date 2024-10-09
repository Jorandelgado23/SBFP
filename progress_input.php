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
      <title>Master List Of Beneficiaries</title>
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
                            <a href="dashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
                        </li>

                        
                        <li>
                            <a href="Beneficiary_list.php"><i class="fa fa-line-chart"></i> <span>Beneficiary Improvement</span></a>
                        </li>

                        <li class="active">
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
                                    <h2>Beneficiary Progress</h2>
                                </div>
                            </div>
                        </div>



                        <?php
// Include database connection
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

// Fetch beneficiaries associated with the user's session_id
$sql = "SELECT id, name, date_of_birth FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission
    $beneficiary_id = $_POST['beneficiary_id'];
    $date_of_progress = $_POST['date_of_progress'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi']; // Will be calculated via JavaScript
    $nutritional_status_bmia = $_POST['nutritional_status_bmia']; // Will be set via JavaScript
    $nutritional_status_hfa = $_POST['nutritional_status_hfa']; // Will be set via JavaScript
    
    // Check if a record for this beneficiary and date already exists
    $sql_check = "SELECT * FROM beneficiary_progress WHERE beneficiary_id = ? AND date_of_progress = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('is', $beneficiary_id, $date_of_progress);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // Initialize improvement message
    $improvement_message = "No Improvement Detected.";

    if ($result_check->num_rows > 0) {
        // Record exists, update it
        $previous_record = $result_check->fetch_assoc();

        // Check for improvement based on nutritional status
        if (
            ($previous_record['nutritional_status_bmia'] == "Severely Wasted" && $nutritional_status_bmia == "Normal") ||
            ($previous_record['nutritional_status_bmia'] == "Wasted" && $nutritional_status_bmia == "Normal")
        ) {
            $improvement_message = "Improvement Detected!";
        }

        // Check if weight has increased
        if ($weight > $previous_record['weight']) {
            $improvement_message .= " Weight has increased.";
        } else {
            $improvement_message .= " Weight has not improved.";
        }

        // Update the existing record
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
            $date_of_progress // Include this for the WHERE clause
        );
        $stmt_update->execute();

    } else {
        // No existing record, insert new progress
        $sql_insert = "INSERT INTO beneficiary_progress (beneficiary_id, date_of_progress, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, session_id)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param('issddsss', $beneficiary_id, $date_of_progress, $weight, $height, $bmi, $nutritional_status_bmia, $nutritional_status_hfa, $session_id);
        $stmt_insert->execute();

        // Initialize improvement message if this is the first record
        $improvement_message = "New record added.";
    }
    
    // Update beneficiary_details with the latest weight, height, and nutritional statuses
    $sql_details_update = "UPDATE beneficiary_details SET weight = ?, height = ?, nutritional_status_bmia = ?, nutritional_status_hfa = ? WHERE id = ?";
    $stmt_details_update = $conn->prepare($sql_details_update);
    $stmt_details_update->bind_param('ddssi', $weight, $height, $nutritional_status_bmia, $nutritional_status_hfa, $beneficiary_id);
    $stmt_details_update->execute();
    
    echo $improvement_message; // Display improvement message
}
?>


    <title>Input Beneficiary Progress</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Nutritional Status Calculation Function
            function calculateNutritionalStatus() {
                const weight = parseFloat($('#weight').val());
                const heightCm = parseFloat($('#height').val());

                if (weight > 0 && heightCm > 0) {
                    // Calculate BMI
                    const heightM = heightCm / 100;
                    const bmi = weight / (heightM * heightM);
                    $('#bmi').val(bmi.toFixed(2)); // Display BMI

                    // Calculate BMI nutritional status
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
                    $('#nutritional_status_bmia').val(nutritionalStatusBMI);

                    // Calculate HFA nutritional status
                    const dob = new Date($('#date_of_birth').val());
                    const now = new Date();
                    const ageMonths = (now.getFullYear() - dob.getFullYear()) * 12 + now.getMonth() - dob.getMonth();
                    let nutritionalStatusHFA = "Normal";

                    // Example thresholds; replace with your actual criteria
                    if (ageMonths < 60 && heightCm < 90) {
                        nutritionalStatusHFA = "Stunted";
                    } else if (ageMonths >= 60 && ageMonths < 120 && heightCm < 115) {
                        nutritionalStatusHFA = "Stunted";
                    } else if (ageMonths >= 120 && heightCm < 130) {
                        nutritionalStatusHFA = "Stunted";
                    } else if (ageMonths < 60 && heightCm > 110) {
                        nutritionalStatusHFA = "Tall";
                    } else if (ageMonths >= 60 && ageMonths < 120 && heightCm > 140) {
                        nutritionalStatusHFA = "Tall";
                    } else if (ageMonths >= 120 && heightCm > 160) {
                        nutritionalStatusHFA = "Tall";
                    }

                    $('#nutritional_status_hfa').val(nutritionalStatusHFA);
                }
            }

            // Event listeners for weight and height inputs
            $('#weight, #height').on('input', calculateNutritionalStatus);

            // Get session_id and date_of_birth from the selected beneficiary
            $('#beneficiary_id').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                $('#session_id').val(selectedOption.data('session_id'));
                $('#date_of_birth').val(selectedOption.data('date_of_birth'));
                calculateNutritionalStatus(); // Recalculate in case of a new beneficiary
            });
        });
    </script>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Progress for Beneficiary</h4>
            <form action="" method="post" class="forms-sample">
                <div class="form-group row">
                    <label for="beneficiary_id" class="col-sm-4 col-form-label">Beneficiary:</label>
                    <div class="col-sm-8">
                        <select name="beneficiary_id" id="beneficiary_id" class="form-control" required>
                            <option value="">Select a beneficiary</option>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?= $row['id'] ?>" 
                                        data-date_of_birth="<?= $row['date_of_birth'] ?>" 
                                        data-session_id="<?= $session_id ?>">
                                    <?= $row['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_of_progress" class="col-sm-4 col-form-label">Date of Progress:</label>
                    <div class="col-sm-8">
                        <input type="date" name="date_of_progress" id="date_of_progress" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="weight" class="col-sm-4 col-form-label">Weight (kg):</label>
                    <div class="col-sm-8">
                        <input type="number" name="weight" id="weight" class="form-control" step="0.01" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="height" class="col-sm-4 col-form-label">Height (cm):</label>
                    <div class="col-sm-8">
                        <input type="number" name="height" id="height" class="form-control" step="0.01" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bmi" class="col-sm-4 col-form-label">BMI:</label>
                    <div class="col-sm-8">
                        <input type="text" name="bmi" id="bmi" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nutritional_status_bmia" class="col-sm-4 col-form-label">Nutritional Status (BMI-A):</label>
                    <div class="col-sm-8">
                        <input type="text" name="nutritional_status_bmia" id="nutritional_status_bmia" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nutritional_status_hfa" class="col-sm-4 col-form-label">Nutritional Status (HFA):</label>
                    <div class="col-sm-8">
                        <input type="text" name="nutritional_status_hfa" id="nutritional_status_hfa" class="form-control" readonly>
                    </div>
                </div>

                <input type="hidden" name="session_id" id="session_id" value="<?= $session_id ?>">
                <input type="hidden" name="date_of_birth" id="date_of_birth">

                <button type="submit" class="btn btn-primary me-2" style="float: right;">Submit</button>

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
