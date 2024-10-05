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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

                        <li class="active">
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
                                    <h2>Master List Of Beneficiaries</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
 <div class="col-lg-12">
<div>
    <div class="container mt-5">
        <div class="col-md-10 mb-10">
            <div>
                <div>
                    <p class="card-text">Click the button below to fill out the form.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sbfpModal" data-whatever="@mdo"><i class="fa fa-plus"> </i>Open Form</button>
                </div>
            </div>
        </div>

        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve session_id of the logged-in user and necessary fields
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id, `Division/Province`, `school_district_municipality`, `school_name`, `beis_id`, `firstname`, `lastname`, `supervisor_principal_name` FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id, $division_province, $city_municipality_barangay, $name_of_school, $beis_id, $firstname, $lastname, $name_of_principal);
$stmt->fetch();
$stmt->close();
?>

<!-- HTML and Form -->
<!-- Modal -->
<div class="modal fade" id="sbfpModal" tabindex="-1" role="dialog" aria-labelledby="sbfpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="sbfpModalLabel">School-Based Feeding Program Form</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sbfpForm" class="needs-validation" novalidate action="submit.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-6" hidden>
                            <label for="division_province" class="form-label">Division/Province:</label>
                            <input type="text" class="form-control" id="division_province" name="division_province" value="<?= htmlspecialchars($division_province) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide a division/province.
                            </div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="city_municipality_barangay" class="form-label">City/Municipality/Barangay:</label>
                            <input type="text" class="form-control" id="city_municipality_barangay" name="city_municipality_barangay" value="<?= htmlspecialchars($city_municipality_barangay) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide city/municipality/barangay.
                            </div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="name_of_school" class="form-label">Name of School / School District:</label>
                            <input type="text" class="form-control" id="name_of_school" name="name_of_school" value="<?= htmlspecialchars($name_of_school) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide the name of the school/school district.
                            </div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="school_id_number" class="form-label">School ID Number (BEIS ID):</label>
                            <input type="text" class="form-control" id="school_id_number" name="school_id_number" value="<?= htmlspecialchars($beis_id) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide the school ID number.
                            </div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="name_of_principal" class="form-label">Name of Principal:</label>
                            <input type="text" class="form-control" id="name_of_principal" name="name_of_principal" value="<?= htmlspecialchars($name_of_principal) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide the name of the principal.
                            </div>
                        </div>
                        <div class="form-group col-md-6" hidden>
                            <label for="name_of_feeding_focal_person" class="form-label">Name of Feeding Focal Person:</label>
                            <input type="text" class="form-control" id="name_of_feeding_focal_person" name="name_of_feeding_focal_person" value="<?= htmlspecialchars($firstname . ' ' . $lastname) ?>" required readonly>
                            <div class="invalid-feedback">
                                Please provide the name of the feeding focal person.
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-4">Beneficiary Details</h2>
                    <div id="beneficiary_details">
    <div class="beneficiary mt-3 border rounded p-3">
        <div class="row">
        <div class="form-group col-md-6">
    <label for="lrn_no" class="form-label">LRN Number:</label>
    <input type="text" class="form-control" id="lrn_no" name="lrn_no[]" required maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits">
    <div class="invalid-feedback">
        Please provide the LRN number.
    </div>
</div>


            <div class="form-group col-md-6">
                <label for="beneficiary_name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name[]" required>
                <div class="invalid-feedback">
                    Please provide the beneficiary name.
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="student_section" class="form-label">Student Section:</label>
                <input type="text" class="form-control" id="student_section" name="student_section[]" required>
                <div class="invalid-feedback">
                    Please provide the student section.
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="beneficiary_sex" class="form-label">Sex:</label>
                <select class="form-control" id="beneficiary_sex" name="beneficiary_sex[]" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback">
                    Please select the sex of the beneficiary.
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="beneficiary_grade_section" class="form-label">Grade Level:</label>
                <select class="form-control" id="beneficiary_grade_section" name="beneficiary_grade_section[]" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Kinder">Kinder</option>
                    <option value="Grade 1">Grade 1</option>
                    <option value="Grade 2">Grade 2</option>
                    <option value="Grade 3">Grade 3</option>
                    <option value="Grade 4">Grade 4</option>
                    <option value="Grade 5">Grade 5</option>
                    <option value="Grade 6">Grade 6</option>
                </select>
                <div class="invalid-feedback">
                    Please provide the grade/section of the beneficiary.
                </div>
            </div>

                                

                                <div class="form-group col-md-6">
                                    <label for="beneficiary_dob" class="form-label">Date of Birth (MM/DD/YYYY):</label>
                                    <input type="date" class="form-control" id="beneficiary_dob" name="beneficiary_dob[]" required onchange="calculateAgeAndBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the date of birth of the beneficiary.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_dow" class="form-label">Date of Weighing/Measuring (MM/DD/YYYY):</label>
                                    <input type="date" class="form-control" id="beneficiary_dow" name="beneficiary_dow[]" required onchange="calculateAgeAndBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the date of weighing/measuring of the beneficiary.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_age" class="form-label">Age:</label>
                                    <input type="text" class="form-control" id="beneficiary_age" name="beneficiary_age[]" readonly required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_weight" class="form-label">Weight (Kg):</label>
                                    <input type="number" step="0.01" class="form-control" id="beneficiary_weight" name="beneficiary_weight[]" required oninput="calculateBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the weight of the beneficiary.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_height" class="form-label">Height (cm):</label>
                                    <input type="number" step="0.01" class="form-control" id="beneficiary_height" name="beneficiary_height[]" required oninput="calculateBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the height of the beneficiary.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_bmi" class="form-label">BMI for 6 y.o. and above:</label>
                                    <input type="text" class="form-control" id="beneficiary_bmi" name="beneficiary_bmi[]" readonly required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nutritional_status_bmia" class="form-label">Nutritional Status (BMI-A):</label>
                                    <input type="text" class="form-control" id="nutritional_status_bmia" name="nutritional_status_bmia[]" readonly required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nutritional_status_hfa" class="form-label">Nutritional Status (HFA):</label>
                                    <input type="text" class="form-control" id="nutritional_status_hfa" name="nutritional_status_hfa[]" readonly required>
                                    <div class="invalid-feedback">
                                        Please provide the nutritional status (HFA) of the beneficiary.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dewormed" class="form-label">Dewormed (Yes/No):</label>
                                    <select class="form-control" id="dewormed" name="dewormed[]" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please specify if the beneficiary is dewormed.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="parents_consent_for_milk" class="form-label">Parent's Consent for Milk (Yes/No):</label>
                                    <select class="form-control" id="parents_consent_for_milk" name="parents_consent_for_milk[]" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please specify if there is parent's consent for milk.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="participation_in_4ps" class="form-label">Participation in 4Ps (Yes/No):</label>
                                    <select class="form-control" id="participation_in_4ps" name="participation_in_4ps[]" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please specify if there is participation in 4Ps.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_of_sbfp_in_previous_years" class="form-label">Beneficiary of SBFP in Previous Years (Yes/No):</label>
                                    <select class="form-control" id="beneficiary_of_sbfp_in_previous_years" name="beneficiary_of_sbfp_in_previous_years[]" required>
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please specify if the beneficiary was part of SBFP in previous years.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>

    </div>

    <script>
// Intercept form submission
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('sbfpForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(this);
        var isValid = true;

        // Iterate through form data to check for empty fields
        for (var pair of formData.entries()) {
            if (!pair[1]) { // Check if the value is empty
                isValid = false;
                break;
            }
        }

        if (isValid) {
            // Submit form data asynchronously using AJAX
            fetch('submit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Expect JSON response
            .then(data => {
                if (data.success) {
                    // Display SweetAlert notification upon successful submission
                    Swal.fire({
                        title: 'Success!',
                        text: 'Beneficiaries data submitted successfully!', // Custom success message
                        icon: 'success',
                        showConfirmButton: false, // Hide the "OK" button
                        timer: 2000 // Timer for auto-close (2 seconds)
                    });
                    // Optionally, you can reset the form after successful submission
                    document.getElementById('sbfpForm').reset();
                } else {
                    // Display SweetAlert notification for server-side error
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Display SweetAlert notification for error handling
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while submitting the form.',
                    icon: 'error'
                });
            });
        } else {
            // Display SweetAlert notification for missing fields
            Swal.fire({
                title: 'Error!',
                text: 'Please fill out all required fields before submitting the form.',
                icon: 'error'
            });
        }
    });
});
</script>



<!-- Include SweetAlert library from CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</section>

<?php

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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

// Fetch submitted data for the logged-in user only
$selected_grade = isset($_POST['grade_level']) ? $_POST['grade_level'] : '';

$sql = "SELECT * FROM beneficiary_details WHERE session_id = ?";

if (!empty($selected_grade)) {
    $sql .= " AND grade_section LIKE ?";
    $selected_grade = "%$selected_grade%";
}

$stmt = $conn->prepare($sql);
if (!empty($selected_grade)) {
    $stmt->bind_param("ss", $session_id, $selected_grade);
} else {
    $stmt->bind_param("s", $session_id);
}
$stmt->execute();
$result = $stmt->get_result();

// Function to partially mask the student's name
function maskName($name) {
    $parts = explode(' ', $name);
    $maskedName = '';

    // Mask the first name
    if (isset($parts[0])) {
        $firstName = $parts[0];
        $maskedFirstName = substr($firstName, 0, 1) . str_repeat('*', strlen($firstName) - 1);
        $maskedName = $maskedFirstName;
    }

    // Mask the last name
    if (isset($parts[1])) {
        $lastName = $parts[1];
        $maskedLastName = substr($lastName, 0, 1) . str_repeat('*', strlen($lastName) - 1);
        $maskedName .= ' ' . $maskedLastName;
    }

    return $maskedName;
}

?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12 my-4">
      <div class="card shadow">
        <div class="card-body">
          <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
              <div class="heading1 margin_0">
                <h2>Master List Beneficiaries</h2>
              </div>
            </div>
            <div class="mb-3">
              <form method="POST" id="filterForm">
                <label for="grade_level">Filter by Grade Level:</label>
                <select name="grade_level" id="grade_level" class="form-control" onchange="document.getElementById('filterForm').submit();">
                  <option value="">All</option>
                  <?php
                  $grades = array("Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5", "Grade 6");
                  foreach ($grades as $grade) {
                      echo "<option value=\"$grade\"" . ($selected_grade == "%$grade%" ? " selected" : "") . ">$grade</option>";
                  }
                  ?>
                </select>
              </form>
            </div>
            <div class="table_section padding_infor_info">
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="display:none;">No.</th> <!-- Hidden column -->
                      <th>LRN No.</th>
                      <th>Name</th>
                      <th>Sex</th>
                      <th>Grade Level</th>
                      <th>Student Section</th>
                      <th>Date of Birth</th>
                      <th>Date of Weighing</th>
                      <th>Age</th>
                      <th>Weight (Kg)</th>
                      <th>Height (cm)</th>
                      <th>BMI</th>
                      <th>Nutritional Status (BMI-A)</th>
                      <th>Nutritional Status (HFA)</th>
                      <th>Dewormed?</th>
                      <th>Parent's consent for milk?</th>
                      <th>Participation in 4Ps?</th>
                      <th>Beneficiary of SBFP in Previous Years?</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
if ($result->num_rows > 0) {
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='display:none;'>" . $count++ . "</td>"; // Hidden column
        echo "<td>" . $row["lrn_no"] . "</td>";
        echo "<td>" . maskName($row["name"]) . "</td>"; // Masked name
        echo "<td>" . $row["sex"] . "</td>";
        echo "<td>" . $row["grade_section"] . "</td>";
        echo "<td>" . $row["student_section"] . "</td>";
        echo "<td>" . $row["date_of_birth"] . "</td>";
        echo "<td>" . $row["date_of_weighing"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["weight"] . "</td>";
        echo "<td>" . $row["height"] . "</td>";
        echo "<td>" . $row["bmi"] . "</td>";
        echo "<td>" . $row["nutritional_status_bmia"] . "</td>";
        echo "<td>" . $row["nutritional_status_hfa"] . "</td>";
        echo "<td>" . $row["dewormed"] . "</td>";
        echo "<td>" . $row["parents_consent_for_milk"] . "</td>";
        echo "<td>" . $row["participation_in_4ps"] . "</td>";
        echo "<td>" . $row["beneficiary_of_sbfp_in_previous_years"] . "</td>";
        
        // Separate Edit and Delete buttons into different cells
        echo "<td>";
        echo "<button class='btn btn-primary edit-btn' data-id='" . $row["id"] . "'>";
        echo "<i class='fa fa-edit'></i> ";
        echo "</button>";
        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-danger remove-btn' data-id='" . $row["id"] . "'>";
        echo "<i class='fa fa-trash'></i> ";
        echo "</button>";
        echo "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='18'>No data available</td></tr>";
}
$stmt->close();
$conn->close();
?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Beneficiary Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="edit-id">

          <div class="form-group">
            <label for="edit-lrn_no">LRN (Learner Reference Number)</label>
            <input type="text" class="form-control" id="edit-lrn_no" required>
          </div>

          <div class="form-group">
            <label for="edit-name">Name</label>
            <input type="text" class="form-control" id="edit-name" required>
          </div>

          <div class="form-group">
            <label for="edit-sex">Sex</label>
            <select class="form-control" id="edit-sex" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="form-group">
            <label for="edit-grade_section">Grade/Section</label>
            <input type="text" class="form-control" id="edit-grade_section" required>
          </div>

          <div class="form-group">
            <label for="edit-student_section">Student Section</label>
            <input type="text" class="form-control" id="edit-student_section" required>
          </div>

          <div class="form-group">
            <label for="edit-date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" id="edit-date_of_birth" required>
          </div>

          <div class="form-group">
            <label for="edit-date_of_weighing">Date of Weighing</label>
            <input type="date" class="form-control" id="edit-date_of_weighing" required>
          </div>

          <div class="form-group">
            <label for="edit-age">Age</label>
            <input type="text" class="form-control" id="edit-age" readonly>
          </div>

          <div class="form-group">
            <label for="edit-weight">Weight (Kg)</label>
            <input type="number" class="form-control" id="edit-weight" step="0.01" required>
          </div>

          <div class="form-group">
            <label for="edit-height">Height (cm)</label>
            <input type="number" class="form-control" id="edit-height" step="0.01" required>
          </div>

          <div class="form-group">
            <label for="edit-bmi">BMI</label>
            <input type="text" class="form-control" id="edit-bmi" readonly>
          </div>

          <div class="form-group">
            <label for="edit-nutritional_status_bmia">Nutritional Status (BMI-A)</label>
            <input type="text" class="form-control" id="edit-nutritional_status_bmia" readonly>
          </div>

          <div class="form-group">
            <label for="edit-nutritional_status_hfa">Nutritional Status (HFA)</label>
            <input type="text" class="form-control" id="edit-nutritional_status_hfa" readonly>
          </div>

          <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>




<script>
$(document).ready(function() {
    // Nutritional Status Calculation Function
    function calculateNutritionalStatus(bmi, beneficiary) {
        // Calculate BMI-A
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
        beneficiary.querySelector('#edit-nutritional_status_bmia').value = nutritionalStatusBMI;

        // Calculate HFA
        const height = parseFloat(beneficiary.querySelector('#edit-height').value);
        const dob = beneficiary.querySelector('#edit-date_of_birth').value;
        if (height && dob) {
            const birthDate = new Date(dob);
            const now = new Date();
            const ageMonths = (now.getFullYear() - birthDate.getFullYear()) * 12 + now.getMonth() - birthDate.getMonth();
            let nutritionalStatusHFA = "Normal";

            // Example thresholds; replace with your actual criteria
            if (ageMonths < 60 && height < 90) {
                nutritionalStatusHFA = "Stunted";
            } else if (ageMonths >= 60 && ageMonths < 120 && height < 115) {
                nutritionalStatusHFA = "Stunted";
            } else if (ageMonths >= 120 && height < 130) {
                nutritionalStatusHFA = "Stunted";
            } else if (ageMonths < 60 && height > 110) {
                nutritionalStatusHFA = "Tall";
            } else if (ageMonths >= 60 && ageMonths < 120 && height > 140) {
                nutritionalStatusHFA = "Tall";
            } else if (ageMonths >= 120 && height > 160) {
                nutritionalStatusHFA = "Tall";
            }
            beneficiary.querySelector('#edit-nutritional_status_hfa').value = nutritionalStatusHFA;
        }
    }

    // Handle Edit button click
    $('.edit-btn').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'fetch_beneficiary.php',
            type: 'post',
            data: { id: id },
            success: function(response) {
                response = JSON.parse(response);
                $('#edit-id').val(response.id);
                $('#edit-lrn_no').val(response.lrn_no);  // Add LRN field
                $('#edit-name').val(response.name);
                $('#edit-sex').val(response.sex);
                $('#edit-grade_section').val(response.grade_section);
                $('#edit-student_section').val(response.student_section);  // Add Student Section field
                $('#edit-date_of_birth').val(response.date_of_birth);
                $('#edit-date_of_weighing').val(response.date_of_weighing);
                $('#edit-age').val(response.age);
                $('#edit-weight').val(response.weight);
                $('#edit-height').val(response.height);
                
                // Calculate BMI
                const weight = parseFloat(response.weight);
                const heightInMeters = parseFloat(response.height) / 100; // Convert cm to m
                const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2); // Calculate BMI
                $('#edit-bmi').val(bmi);
                
                // Calculate Nutritional Status
                calculateNutritionalStatus(bmi, document.getElementById('editModal'));

                $('#editModal').modal('show');
            }
        });
    });


  // Handle Save Changes button click
$('#saveChanges').on('click', function() {
    var id = $('#edit-id').val();
    var lrn_no = $('#edit-lrn_no').val();
    var name = $('#edit-name').val();
    var sex = $('#edit-sex').val();
    var grade_section = $('#edit-grade_section').val();
    var student_section = $('#edit-student_section').val();
    var date_of_birth = $('#edit-date_of_birth').val();
    var date_of_weighing = $('#edit-date_of_weighing').val();
    var age = $('#edit-age').val();
    var weight = $('#edit-weight').val();
    var height = $('#edit-height').val();
    var bmi = $('#edit-bmi').val();
    var nutritional_status_bmia = $('#edit-nutritional_status_bmia').val();
    var nutritional_status_hfa = $('#edit-nutritional_status_hfa').val();

    $.ajax({
        url: 'update_beneficiary.php',
        type: 'post',
        data: {
            id: id,
            lrn_no: lrn_no,
            name: name,
            sex: sex,
            grade_section: grade_section,
            student_section: student_section,
            date_of_birth: date_of_birth,
            date_of_weighing: date_of_weighing,
            age: age,
            weight: weight,
            height: height,
            bmi: bmi,
            nutritional_status_bmia: nutritional_status_bmia,
            nutritional_status_hfa: nutritional_status_hfa
        },
        success: function(response) {
            Swal.fire({
                title: response.success ? 'Success!' : 'Error!',
                text: response.message,
                icon: response.success ? 'success' : 'error',
                confirmButtonText: 'Okay'
            }).then(() => {
                if (response.success) {
                    $('#editModal').modal('hide');
                    location.reload();
                }
            });
        }
    });
});


  // Handle Remove button click
$('.remove-btn').on('click', function() {
    var id = $(this).data('id');
    // Use SweetAlert for confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33', // Custom color for confirm button
        cancelButtonColor: '#007bff', // Custom color for cancel button
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        background: '#f8f9fa', // Custom background color
        color: '#343a40', // Custom text color
        padding: '1.5rem', // Custom padding
        customClass: {
            title: 'alert-title', // Custom class for title
            htmlContainer: 'alert-content' // Custom class for content
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'remove_beneficiary.php',
                type: 'post',
                data: { id: id },
                success: function(response) {
                    const res = JSON.parse(response);
                    Swal.fire({
                        title: res.success ? 'Deleted!' : 'Error!',
                        text: res.message,
                        icon: res.success ? 'success' : 'error',
                        confirmButtonText: 'Okay',
                        background: res.success ? '#d4edda' : '#f8d7da', // Custom success/error background
                        color: res.success ? '#155724' : '#721c24', // Custom success/error text color
                        confirmButtonColor: '#28a745', // Custom color for confirm button
                        padding: '1.5rem', // Custom padding
                        customClass: {
                            title: 'alert-title', // Custom class for title
                            htmlContainer: 'alert-content' // Custom class for content
                        }
                    }).then(() => {
                        if (res.success) {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
});

  // Auto-compute age
  $('#edit-date_of_birth, #edit-date_of_weighing').on('change', function() {
    var dob = new Date($('#edit-date_of_birth').val());
    var dow = new Date($('#edit-date_of_weighing').val());
    if (dob && dow) {
      var age = dow.getFullYear() - dob.getFullYear();
      var m = dow.getMonth() - dob.getMonth();
      if (m < 0 || (m === 0 && dow.getDate() < dob.getDate())) {
        age--;
      }
      $('#edit-age').val(age);
    }
  });

  // Auto-compute BMI and Nutritional Status (BMI-A) and (HFA)
  $('#edit-weight, #edit-height').on('input', function() {
    var weight = parseFloat($('#edit-weight').val());
    var height = parseFloat($('#edit-height').val());
    if (weight && height) {
      var bmi = (weight / Math.pow(height / 100, 2)).toFixed(2);
      $('#edit-bmi').val(bmi);

      // Compute Nutritional Status (BMI-A)
      var bmi_status = 'Normal';
      if (bmi < 16) {
        bmi_status = 'Severely Wasted';
      } else if (bmi < 18.5) {
        bmi_status = 'Wasted';
      } else if (bmi > 25) {
        bmi_status = 'Overweight';
      } else if (bmi > 30) {
        bmi_status = 'Obese';
      }
      $('#edit-nutritional_status_bmia').val(bmi_status);

      // Compute Nutritional Status (HFA)
      var age = parseInt($('#edit-age').val());
      var hfa_status = 'Normal';
      if (age) {
        if (height < (age * 5)) {  // Simple assumption for stunted
          hfa_status = 'Stunted';
        } else if (height > (age * 8)) {  // Simple assumption for tall
          hfa_status = 'Tall';
        }
      }
      $('#edit-nutritional_status_hfa').val(hfa_status);
    }
  });
});
</script>
    <script>
        function addBeneficiary() {
            let beneficiaryDetails = document.getElementById('beneficiary_details');
            let newBeneficiary = beneficiaryDetails.children[0].cloneNode(true);
            beneficiaryDetails.appendChild(newBeneficiary);
        }

        function calculateAgeAndBMI(element) {
            const beneficiary = element.closest('.beneficiary');
            const dob = beneficiary.querySelector('[name="beneficiary_dob[]"]').value;
            const dow = beneficiary.querySelector('[name="beneficiary_dow[]"]').value;
            if (dob && dow) {
                const birthDate = new Date(dob);
                const weighingDate = new Date(dow);
                let ageYears = weighingDate.getFullYear() - birthDate.getFullYear();
                let ageMonths = weighingDate.getMonth() - birthDate.getMonth();
                if (ageMonths < 0) {
                    ageYears--;
                    ageMonths += 12;
                }
                beneficiary.querySelector('[name="beneficiary_age[]"]').value = `${ageYears} years, ${ageMonths} months`;
            }
            calculateBMI(element);
        }

        function calculateBMI(element) {
            const beneficiary = element.closest('.beneficiary');
            const weight = beneficiary.querySelector('[name="beneficiary_weight[]"]').value;
            const height = beneficiary.querySelector('[name="beneficiary_height[]"]').value;
            if (weight && height) {
                const heightInMeters = height / 100;
                const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2);
                beneficiary.querySelector('[name="beneficiary_bmi[]"]').value = bmi;
                calculateNutritionalStatus(bmi, beneficiary);
            }
        }

        function calculateNutritionalStatus(bmi, beneficiary) {
            // Calculate BMI-A
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
            beneficiary.querySelector('[name="nutritional_status_bmia[]"]').value = nutritionalStatusBMI;

            // Calculate HFA
            const height = beneficiary.querySelector('[name="beneficiary_height[]"]').value;
            const dob = beneficiary.querySelector('[name="beneficiary_dob[]"]').value;
            if (height && dob) {
                const birthDate = new Date(dob);
                const now = new Date();
                const ageMonths = (now.getFullYear() - birthDate.getFullYear()) * 12 + now.getMonth() - birthDate.getMonth();
                let nutritionalStatusHFA = "Normal";

                // Example thresholds, replace with your actual criteria
                if (ageMonths < 60 && height < 90) {
                    nutritionalStatusHFA = "Stunted";
                } else if (ageMonths >= 60 && ageMonths < 120 && height < 115) {
                    nutritionalStatusHFA = "Stunted";
                } else if (ageMonths >= 120 && height < 130) {
                    nutritionalStatusHFA = "Stunted";
                } else if (ageMonths < 60 && height > 110) {
                    nutritionalStatusHFA = "Tall";
                } else if (ageMonths >= 60 && ageMonths < 120 && height > 140) {
                    nutritionalStatusHFA = "Tall";
                } else if (ageMonths >= 120 && height > 160) {
                    nutritionalStatusHFA = "Tall";
                }
                beneficiary.querySelector('[name="nutritional_status_hfa[]"]').value = nutritionalStatusHFA;
            }
        }
    </script>
                     
                        
                    </div>
                   
                </div>
                <!-- End Dashboard Inner -->
            </div>
        </div>
    </div>
 

   
    <!-- Bootstrap Bundle JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="js/custom.js"></script>
    
    
    
</body>

</html>