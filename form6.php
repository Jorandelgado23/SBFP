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
      <link rel="icon" href="images/fevicon.png" type="image/png" />
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
                       
                     <div class="container mt-5">
<div class="container">
  <h1>Submit School and Student Information</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    Open Form
  </button>

  <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">School and Student Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="submit6.php" method="post" id="consolidatedForm">
            <h2>School Information</h2>
            <div class="mb-3">
              <label for="regionDivisionDistrict" class="form-label">REGION/DIVISION/DISTRICT:</label>
              <input type="text" class="form-control" id="regionDivisionDistrict" name="region_division_district" required>
            </div>
            <div class="mb-3">
              <label for="nameOfSchool" class="form-label">NAME OF SCHOOL:</label>
              <input type="text" class="form-control" id="nameOfSchool" name="name_of_school" required>
            </div>
            <div class="mb-3">
              <label for="schoolIdNumber" class="form-label">School ID Number:</label>
              <input type="text" class="form-control" id="schoolIdNumber" name="school_id_number" required>
            </div>

            <h2 class="mt-5">Student Information</h2>
            <div id="studentSection">
              <div class="student-info">
                <div class="mb-3">
                  <label for="studentName" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="studentName" name="student_name[]" required>
                </div>
                <div class="mb-3">
                  <label for="gradeSection" class="form-label">Grade & Section:</label>
                  <input type="text" class="form-control" id="gradeSection" name="grade_section[]" required>
                </div>
                <div class="mb-3">
                  <label>Classification of Students in terms of Milk Tolerance (Please check one):</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="milk_tolerance[0]" value="Without milk intolerance and will participate in milk feeding" required>
                    <label class="form-check-label">Without milk intolerance and will participate in milk feeding</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="milk_tolerance[0]" value="With milk intolerance but willing to participate in milk feeding" required>
                    <label class="form-check-label">With milk intolerance but willing to participate in milk feeding</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="milk_tolerance[0]" value="Not allowed by parents to participate in milk feeding" required>
                    <label class="form-check-label">Not allowed by parents to participate in milk feeding</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addStudent()">Add Another Student</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  let studentIndex = 1;

  function addStudent() {
    const studentSection = document.getElementById('studentSection');
    const newStudent = document.createElement('div');
    newStudent.classList.add('student-info');
    newStudent.innerHTML = `
      <div class="mb-3">
        <label for="studentName" class="form-label">Name:</label>
        <input type="text" class="form-control" id="studentName" name="student_name[]" required>
      </div>
      <div class="mb-3">
        <label for="gradeSection" class="form-label">Grade & Section:</label>
        <input type="text" class="form-control" id="gradeSection" name="grade_section[]" required>
      </div>
      <div class="mb-3">
        <label>Classification of Students in terms of Milk Tolerance (Please check one):</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="milk_tolerance[${studentIndex}]" value="Without milk intolerance and will participate in milk feeding" required>
          <label class="form-check-label">Without milk intolerance and will participate in milk feeding</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="milk_tolerance[${studentIndex}]" value="With milk intolerance but willing to participate in milk feeding" required>
          <label class="form-check-label">With milk intolerance but willing to participate in milk feeding</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="milk_tolerance[${studentIndex}]" value="Not allowed by parents to participate in milk feeding" required>
          <label class="form-check-label">Not allowed by parents to participate in milk feeding</label>
        </div>
      </div>
    `;
    studentSection.appendChild(newStudent);
    studentIndex++;
  }
  

  document.getElementById('consolidatedForm').addEventListener('submit', function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, submit it!'
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  });
</script>


<?php


// Redirect to login page if the user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch data associated with the session_id of the logged-in user
$stmt = $conn->prepare("SELECT * FROM milkcomponent WHERE session_id = ?");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-5">
    <h1>School-Based Feeding Program - Milk Component Data</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Region/Division/District</th>
                <th>Name of School</th>
                <th>School ID Number</th>
                <th>Student Name</th>
                <th>Grade & Section</th>
                <th>Milk Tolerance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['region_division_district']}</td>
                            <td>{$row['name_of_school']}</td>
                            <td>{$row['school_id_number']}</td>
                            <td>{$row['student_name']}</td>
                            <td>{$row['grade_section']}</td>
                            <td>{$row['milk_tolerance']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>




<?php
$conn->close();
?>
                        
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
