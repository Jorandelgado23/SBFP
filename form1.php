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
$stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_firstname, $user_lastname);

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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      

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
                            <a href="dashboard.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
    <div class="icon_setting"></div>
    <div class="user_profle_side">
        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
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
                            <a href="form1.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 1</span></a>
                        </li>
                        <li>
                            <a href="form2.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 2</span></a>
                        </li>
                        <li>
                            <a href="form3.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 3</span></a>
                        </li>
                        <li>
                            <a href="form4.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 4</span></a>
                        </li>
                        <li>
                            <a href="form5.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 5</span></a>
                        </li>
                        <li>
                            <a href="form6.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 6</span></a>
                        </li>
                        <li>
                            <a href="form7.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 7</span></a>
                        </li>
                        <li>
                            <a href="form8.php"><i class="fa fa-file-excel-o "></i> <span>SBFP-FORM 8</span></a>
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
                                <a href="dashboard.html"><img class="img-responsive" src="images/logo/logo_black.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown">
    <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" />
    <span class="name_user"><?php echo $user_firstname . ' ' . $user_lastname; ?></span>
</a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="profile.html">My Profile</a>
                                                <a class="dropdown-item" href="settings.html">Settings</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
 <div class="col-lg-12">
<div class="card">
    <div class="card-body">
    <h1>School-Based Feeding Program Form</h1>
    <div class="container mt-5">
        <div class="col-md-12 mb-12">
            <div class="card shadow">
                <div class="card-body">
                    <p class="card-title"><strong>Master List Beneficiaries for School-Based Feeding Program (SBFP)</strong></p>
                    <p class="card-text">Click the button below to fill out the form.</p>
                    <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#sbfpModal" data-whatever="@mdo">Open Form</button>
                </div>
            </div>
        </div>

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
                        <div class="form-group col-md-6">
                            <label for="division_province" class="form-label">Division/Province:</label>
                            <select class="form-control" id="division_province" name="division_province" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="Santa Cruz, Laguna">Santa Cruz, Laguna</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a division/province.
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                            <label for="city_municipality_barangay" class="form-label">City/Municipality/Barangay:</label>
                            <select class="form-control" id="city_municipality_barangay" name="city_municipality_barangay" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="Bagumbayan">Bagumbayan</option>
                                <option value="Calios">Calios</option>
                                <option value="Duhat">Duhat</option>
                                <option value="Gatid">Gatid</option>
                                <option value="Jasaaan">Jasaaan</option>
                                <option value="Labuin">Labuin</option>
                                <option value="Malinao">Malinao</option>
                                <option value="Oogong">Oogong</option>
                                <option value="Pagsawitan">Pagsawitan</option>
                                <option value="Palasan">Palasan</option>
                                <option value="Patimbao">Patimbao</option>
                                <option value="Poblacion I">Poblacion I</option>
                                <option value="Poblacion II">Poblacion II</option>
                                <option value="Poblacion III">Poblacion III</option>
                                <option value="San Juan">San Juan</option>
                                <option value="Santisima Cruz">Santisima Cruz</option>
                                <option value="Santo Angel">Santo Angel</option>
                                <option value="Santo Cristo">Santo Cristo</option>
                                <option value="Santo Domingo">Santo Domingo</option>
                                <option value="Sinalhan">Sinalhan</option>
                                <option value="Tagumpay">Tagumpay</option>
                                <option value="Tibig">Tibig</option>
                                <option value="Tranca">Tranca</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Villa Apolonia">Villa Apolonia</option>
                                <option value="Yakal">Yakal</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide city/municipality/barangay.
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                            <label for="name_of_school" class="form-label">Name of School / School District:</label>
                            <select class="form-control" id="name_of_school" name="name_of_school" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="Bagumbayan Elementary School">Bagumbayan Elementary School</option>
                                <option value="Calios Elementary School">Calios Elementary School</option>
                                <option value="Duhat Elementary School">Duhat Elementary School</option>
                                <option value="Gatid Elementary School">Gatid Elementary School</option>
                                <option value="Jasaaan Elementary School">Jasaaan Elementary School</option>
                                <option value="Labuin Elementary School">Labuin Elementary School</option>
                                <option value="Malinao Elementary School">Malinao Elementary School</option>
                                <option value="Oogong Elementary School">Oogong Elementary School</option>
                                <option value="Pagsawitan Elementary School">Pagsawitan Elementary School</option>
                                <option value="Palasan Elementary School">Palasan Elementary School</option>
                                <option value="Patimbao Elementary School">Patimbao Elementary School</option>
                                <option value="Poblacion I Elementary School">Poblacion I Elementary School</option>
                                <option value="Poblacion II Elementary School">Poblacion II Elementary School</option>
                                <option value="Poblacion III Elementary School">Poblacion III Elementary School</option>
                                <option value="San Juan Elementary School">San Juan Elementary School</option>
                                <option value="Santisima Cruz Elementary School">Santisima Cruz Elementary School</option>
                                <option value="Santo Angel Elementary School">Santo Angel Elementary School</option>
                                <option value="Santo Cristo Elementary School">Santo Cristo Elementary School</option>
                                <option value="Santo Domingo Elementary School">Santo Domingo Elementary School</option>
                                <option value="Sinalhan Elementary School">Sinalhan Elementary School</option>
                                <option value="Tagumpay Elementary School">Tagumpay Elementary School</option>
                                <option value="Tibig Elementary School">Tibig Elementary School</option>
                                <option value="Tranca Elementary School">Tranca Elementary School</option>
                                <option value="Victoria Elementary School">Victoria Elementary School</option>
                                <option value="Villa Apolonia Elementary School">Villa Apolonia Elementary School</option>
                                <option value="Yakal Elementary School">Yakal Elementary School</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide the name of the school/school district.
                            </div>
                        </div>
                            <div class="col-md-6">
                                <label for="school_id_number" class="form-label">School ID Number:</label>
                                <input type="text" class="form-control" id="school_id_number" name="school_id_number" required>
                                <div class="invalid-feedback">
                                    Please provide the school ID number.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name_of_principal" class="form-label">Name of Principal:</label>
                                <input type="text" class="form-control" id="name_of_principal" name="name_of_principal" required>
                                <div class="invalid-feedback">
                                    Please provide the name of the principal.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name_of_feeding_focal_person" class="form-label">Name of Feeding Focal Person:</label>
                                <input type="text" class="form-control" id="name_of_feeding_focal_person" name="name_of_feeding_focal_person" required>
                                <div class="invalid-feedback">
                                    Please provide the name of the feeding focal person.
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-4">Beneficiary Details</h2>
                        <div id="beneficiary_details">
                            <div class="beneficiary mt-3 border rounded p-3">
                                <div class="col-md-6">
                                    <label for="beneficiary_no" class="form-label">No.:</label>
                                    <input type="text" class="form-control" id="beneficiary_no" name="beneficiary_no[]" required>
                                    <div class="invalid-feedback">
                                        Please provide the beneficiary number.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name[]" required>
                                    <div class="invalid-feedback">
                                        Please provide the beneficiary name.
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
                                <div class="col-md-6">
                                    <label for="beneficiary_grade_section" class="form-label">Grade/Section:</label>
                                    <input type="text" class="form-control" id="beneficiary_grade_section" name="beneficiary_grade_section[]" required>
                                    <div class="invalid-feedback">
                                        Please provide the grade/section of the beneficiary.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_dob" class="form-label">Date of Birth (MM/DD/YYYY):</label>
                                    <input type="date" class="form-control" id="beneficiary_dob" name="beneficiary_dob[]" required onchange="calculateAgeAndBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the date of birth of the beneficiary.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_dow" class="form-label">Date of Weighing/Measuring (MM/DD/YYYY):</label>
                                    <input type="date" class="form-control" id="beneficiary_dow" name="beneficiary_dow[]" required onchange="calculateAgeAndBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the date of weighing/measuring of the beneficiary.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_age" class="form-label">Age:</label>
                                    <input type="text" class="form-control" id="beneficiary_age" name="beneficiary_age[]" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_weight" class="form-label">Weight (Kg):</label>
                                    <input type="number" step="0.01" class="form-control" id="beneficiary_weight" name="beneficiary_weight[]" required oninput="calculateBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the weight of the beneficiary.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_height" class="form-label">Height (cm):</label>
                                    <input type="number" step="0.01" class="form-control" id="beneficiary_height" name="beneficiary_height[]" required oninput="calculateBMI(this)">
                                    <div class="invalid-feedback">
                                        Please provide the height of the beneficiary.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_bmi" class="form-label">BMI for 6 y.o. and above:</label>
                                    <input type="text" class="form-control" id="beneficiary_bmi" name="beneficiary_bmi[]" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nutritional_status_bmia" class="form-label">Nutritional Status (BMI-A):</label>
                                    <input type="text" class="form-control" id="nutritional_status_bmia" name="nutritional_status_bmia[]" readonly required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nutritional_status_hfa" class="form-label">Nutritional Status (HFA):</label>
                                    <input type="text" class="form-control" id="nutritional_status_hfa" name="nutritional_status_hfa[]" readonly required>
                                </div>
                                <div class="form-group col-md-6">
    <label for="dewormed" class="form-label">Dewormed?</label>
    <select class="form-control" id="dewormed" name="dewormed[]" required>
        <option selected disabled>Choose...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <div class="invalid-feedback">
        Please select if the beneficiary was dewormed.
    </div>
</div>
<div class="form-group col-md-6">
    <label for="parents_consent_for_milk" class="form-label">Parent's consent for milk?</label>
    <select class="form-control" id="parents_consent_for_milk" name="parents_consent_for_milk[]" required>
        <option selected disabled>Choose...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <div class="invalid-feedback">
        Please select if parent's consent for milk is given.
    </div>
</div>
<div class="form-group col-md-6">
    <label for="participation_in_4ps" class="form-label">Participation in 4Ps?</label>
    <select class="form-control" id="participation_in_4ps" name="participation_in_4ps[]" required>
        <option selected disabled>Choose...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <div class="invalid-feedback">
        Please select if there is participation in 4Ps.
    </div>
</div>
<div class="form-group col-md-6">
    <label for="beneficiary_of_sbfp_in_previous_years" class="form-label">Beneficiary of SBFP in Previous Years?</label>
    <select class="form-control" id="beneficiary_of_sbfp_in_previous_years" name="beneficiary_of_sbfp_in_previous_years[]" required>
        <option selected disabled>Choose...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <div class="invalid-feedback">
        Please select if the beneficiary was part of SBFP in previous years.
    </div>
</div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

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
            <div class="table_section padding_infor_info">
              <div class="table-responsive-sm">
                <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Grade/Section</th>
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
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $count = 1;
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $count++ . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["sex"] . "</td>";
                        echo "<td>" . $row["grade_section"] . "</td>";
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
                        echo "<td><button class='btn btn-primary edit-btn' data-id='" . $row["id"] . "'>Edit</button> <button class='btn btn-danger remove-btn' data-id='" . $row["id"] . "'>Remove</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='17'>No data available</td></tr>";
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
            <select class="form-control" id="edit-nutritional_status_bmia" required>
              <option value="Severely Wasted">Severely Wasted</option>
              <option value="Wasted">Wasted</option>
              <option value="Normal">Normal</option>
              <option value="Overweight">Overweight</option>
              <option value="Obese">Obese</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-nutritional_status_hfa">Nutritional Status (HFA)</label>
            <select class="form-control" id="edit-nutritional_status_hfa" required>
              <option value="Stunted">Stunted</option>
              <option value="Normal">Normal</option>
              <option value="Tall">Tall</option>
            </select>
          </div>
          <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>

          
        </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
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
        $('#edit-name').val(response.name);
        $('#edit-sex').val(response.sex);
        $('#edit-grade_section').val(response.grade_section);
        $('#edit-date_of_birth').val(response.date_of_birth);
        $('#edit-date_of_weighing').val(response.date_of_weighing);
        $('#edit-age').val(response.age);
        $('#edit-weight').val(response.weight);
        $('#edit-height').val(response.height);
        $('#edit-bmi').val(response.bmi);
        $('#edit-nutritional_status_bmia').val(response.nutritional_status_bmia);
        $('#edit-nutritional_status_hfa').val(response.nutritional_status_hfa);
        $('#editModal').modal('show');
      }
    });
  });

  // Handle Save Changes button click
  $('#saveChanges').on('click', function() {
    var id = $('#edit-id').val();
    var name = $('#edit-name').val();
    var sex = $('#edit-sex').val();
    var grade_section = $('#edit-grade_section').val();
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
        name: name,
        sex: sex,
        grade_section: grade_section,
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
        alert(response);
        $('#editModal').modal('hide');
        location.reload();
      }
    });
  });

  // Handle Remove button click
  $('.remove-btn').on('click', function() {
    var id = $(this).data('id');
    if (confirm('Are you sure you want to remove this record?')) {
      $.ajax({
        url: 'remove_beneficiary.php',
        type: 'post',
        data: { id: id },
        success: function(response) {
          alert(response);
          location.reload();
        }
      });
    }
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
<!-- Bootstrap JS and jQuery (assuming you use Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  

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
