
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>SBFP FORM 1</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
  </head>
 
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

// Now you can use $user_firstname and $user_lastname in your code to display user information.
// For example:
echo "Welcome, $user_firstname $user_lastname!";
?>


    <div>
        <span class="avatar avatar-sm mt-2">
            <!-- Removed the img tag to only display the user's name -->
        </span>
        <span><?php echo htmlspecialchars($user_firstname . ' ' . $user_lastname); ?></span>
    </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <p></p>
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
              <a class="dropdown-item" href="logout.php">logout</a>

            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="dashboard.php">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            
          <a href="#dashboard" data-toggle="collapse" aria-expanded="false" >
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text"  href="dashboard.php">Dashboard</span><span class="sr-only">(current)</span>
              </a>
             
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item">
                <a class="nav-link pl-3" href="form1.php"><span class="ml-1 item-text">SBFP-FORM 1</span></a>
                <i class="fe fe-file fe-16"></i>
              </li>

              </a>
             
            </li>
            <li class="nav-item w-100">
            <li class="nav-item">
            <a class="nav-link pl-3" href="form2.php"><span class="ml-1 item-text">SBFP-FORM 2</span></a>
            <i class="fe fe-file fe-16"></i>
            </li>
            <li class="nav-item">
            <a class="nav-link pl-3" href="form3.php"><span class="ml-1 item-text">SBFP-FORM 3</span></a>
            <i class="fe fe-file fe-16"></i>
            </li>
             
            </li>
            <li class="nav-item">
            <a class="nav-link pl-3" href="form4.php"><span class="ml-1 item-text">SBFP-FORM 4</span></a>
            <i class="fe fe-file fe-16"></i>
            </li>
            <li class="nav-item">
            <a class="nav-link pl-3" href="form5.php"><span class="ml-1 item-text">SBFP-FORM 5</span></a>
            <i class="fe fe-file fe-16"></i>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="./form6.php"><span class="ml-1 item-text">SBFP-FORM 6</span></a>
            <i class="fe fe-file fe-16"></i>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="./form7.php"><span class="ml-1 item-text">SBFP-FORM 7</span></a>
            <i class="fe fe-file fe-16"></i>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="./form8.php"><span class="ml-1 item-text">SBFP-FORM 8</span></a>
            <i class="fe fe-file fe-16"></i>
          </li>

          
          </ul>

          <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
              <a class="nav-link" href="usersetting.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Settings</span>
                </a>
              </li>
         
          </div>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <!-- <h1 class="page-title">Let's start</h1> -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <section class="section">
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
                            <div class="col-md-6">
                                <label for="division_province" class="form-label">Division/Province:</label>
                                <input type="text" class="form-control" id="division_province" name="division_province" required>
                                <div class="invalid-feedback">
                                    Please provide a division/province.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="city_municipality_barangay" class="form-label">City/Municipality/Barangay:</label>
                                <input type="text" class="form-control" id="city_municipality_barangay" name="city_municipality_barangay" required>
                                <div class="invalid-feedback">
                                    Please provide city/municipality/barangay.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name_of_school" class="form-label">Name of School / School District:</label>
                                <input type="text" class="form-control" id="name_of_school" name="name_of_school" required>
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
                                <div class="col-md-6">
                                    <label for="beneficiary_sex" class="form-label">Sex:</label>
                                    <select class="form-select" id="beneficiary_sex" name="beneficiary_sex[]" required>
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
                                <div class="col-md-6">
                                    <label for="dewormed" class="form-label">Dewormed?</label>
                                    <select class="form-select" id="dewormed" name="dewormed[]" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select if the beneficiary was dewormed.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="parents_consent_for_milk" class="form-label">Parent's consent for milk?</label>
                                    <select class="form-select" id="parents_consent_for_milk" name="parents_consent_for_milk[]" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select if parent's consent for milk is given.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="participation_in_4ps" class="form-label">Participation in 4Ps?</label>
                                    <select class="form-select" id="participation_in_4ps" name="participation_in_4ps[]" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select if there is participation in 4Ps.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="beneficiary_of_sbfp_in_previous_years" class="form-label">Beneficiary of SBFP in Previous Years?</label>
                                    <select class="form-select" id="beneficiary_of_sbfp_in_previous_years" name="beneficiary_of_sbfp_in_previous_years[]" required>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

    </div>

    <script>
// Intercept form submission
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('sbfpForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Submit form data asynchronously using AJAX
        var formData = new FormData(this);
        fetch('submit.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Display SweetAlert notification upon successful submission
            Swal.fire({
                title: 'Success!',
                text: data,
                icon: 'success',
                showConfirmButton: false, // Hide the "OK" button
                timer: 2000 // Timer for auto-close (3 seconds)
            });
            // Optionally, you can reset the form after successful submission
            document.getElementById('sbfpForm').reset();
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
    <div class="row my-4">
      <!-- Small table -->
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <!-- table -->
            <table class="table datatables" id="dataTable-1">
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



        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>