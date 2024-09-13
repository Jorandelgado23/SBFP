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
      <title>Milk Component Data</title>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


      

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
                        <li>
                            <a href="student_attendance.php"><i class="fa fa-calendar"></i> <span>Student Attendance</span></a>
                        </li>
                        <!-- <li>
                            <a href="form5.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 5</span></a>
                        </li> -->
                        <li class="active">
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
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown">
        <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>

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
                                    <h2>Milk Component Data</h2>
                                </div>
                            </div>
                        </div>
                       
                     <div class="container mt-5">
<div class="container">
  <h1>Submit School and Student Information</h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    Open Form
  </button>

  <?php


// Database credentials
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
$stmt = $conn->prepare("SELECT session_id, `Division/Province`, school_name, beis_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id, $division_province, $school_name, $beis_id);
$stmt->fetch();
$stmt->close();

// Fetch student names and grades from beneficiary_details where selected is false
$sql_students = "SELECT name, grade_section FROM beneficiary_details WHERE session_id = ? AND selected = FALSE";
$stmt_students = $conn->prepare($sql_students);
$stmt_students->bind_param("s", $session_id);
$stmt_students->execute();
$result_students = $stmt_students->get_result();
$students = [];
while ($row = $result_students->fetch_assoc()) {
    $students[] = $row;
}
$stmt_students->close();

// Close database connection
$conn->close();
?>

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
            <input type="text" class="form-control" id="regionDivisionDistrict" name="region_division_district" value="<?php echo htmlspecialchars($division_province); ?>" required>
          </div>
          <div class="mb-3">
            <label for="nameOfSchool" class="form-label">NAME OF SCHOOL:</label>
            <input type="text" class="form-control" id="nameOfSchool" name="name_of_school" value="<?php echo htmlspecialchars($school_name); ?>" required>
          </div>
          <div class="mb-3">
            <label for="schoolIdNumber" class="form-label">School ID Number:</label>
            <input type="text" class="form-control" id="schoolIdNumber" name="school_id_number" value="<?php echo htmlspecialchars($beis_id); ?>" required>
          </div>

          <h2 class="mt-5">Student Information</h2>
          <div id="studentSection">
            <!-- Initial student info section -->
            <div class="student-info">
              <div class="mb-3">
                <label for="studentName" class="form-label">Name:</label>
                <select class="form-control student-name" id="studentName" name="student_name[]" onchange="updateGradeSection(this)" required>
                  <option value="">Select Student</option>
                  <?php foreach ($students as $student): ?>
                    <option value="<?php echo htmlspecialchars($student['name']); ?>"><?php echo htmlspecialchars($student['name']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="gradeSection" class="form-label">Grade & Section:</label>
                <select class="form-control grade-section" id="gradeSection" name="grade_section[]" required>
                  <option value="">Select Grade & Section</option>
                </select>
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
          <!-- Add student button
          <button type="button" class="btn btn-secondary" onclick="addStudent()">Add Another Student</button> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function updateGradeSection(select) {
    const selectedName = select.value;
    const selectedStudent = <?php echo json_encode($students); ?>.find(student => student.name === selectedName);

    const gradeSectionSelect = select.closest('.student-info').querySelector('.grade-section');
    gradeSectionSelect.innerHTML = ''; // Clear existing options

    if (selectedStudent) {
      const option = document.createElement('option');
      option.value = selectedStudent.grade_section;
      option.text = selectedStudent.grade_section;
      gradeSectionSelect.add(option);
    } else {
      const defaultOption = document.createElement('option');
      defaultOption.text = 'Select Grade & Section';
      gradeSectionSelect.add(defaultOption);
    }
  }

  let studentIndex = 1;

  function addStudent() {
    const studentSection = document.getElementById('studentSection');
    const newStudent = document.createElement('div');
    newStudent.classList.add('student-info');
    newStudent.innerHTML = `
      <div class="mb-3">
        <label for="studentName${studentIndex}" class="form-label">Name:</label>
        <select class="form-control student-name" id="studentName${studentIndex}" name="student_name[]" onchange="updateGradeSection(this)" required>
          <option value="">Select Student</option>
          <?php foreach ($students as $student): ?>
            <option value="<?php echo htmlspecialchars($student['name']); ?>"><?php echo htmlspecialchars($student['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="gradeSection${studentIndex}" class="form-label">Grade & Section:</label>
        <select class="form-control grade-section" id="gradeSection${studentIndex}" name="grade_section[]" required>
          <option value="">Select Grade & Section</option>
        </select>
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




<div class="col-md-10">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
    <h1>School-Based Feeding Program - Milk Component Data</h1>
    <form method="POST" action="milk_regenerate.php">
        <button type="submit" name="action" value="pdf" class="btn btn-primary">Generate PDF</button>
        <button type="submit" name="action" value="excel" class="btn btn-success">Generate Excel</button>
    </form>
    <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Region/Division/District</th>
                <th>Name of School</th>
                <th>School ID Number</th>
                <th>Student Name</th>
                <th>Grade & Section</th>
                <th>Milk Tolerance</th>
                <th>Actions</th>
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
                            <td>
                                <button class='btn btn-warning' data-toggle='modal' data-target='#editModal' data-id='{$row['id']}' data-rdd='{$row['region_division_district']}' data-ns='{$row['name_of_school']}' data-sid='{$row['school_id_number']}' data-sn='{$row['student_name']}' data-gs='{$row['grade_section']}' data-mt='{$row['milk_tolerance']}'>Edit</button>
                                <a href='remove_milk.php?id={$row['id']}' class='btn btn-danger'>Remove</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit_milk.php" method="post" id="editForm">
          <input type="hidden" name="id" id="edit-id">
          <div class="mb-3">
            <label for="edit-regionDivisionDistrict" class="form-label">REGION/DIVISION/DISTRICT:</label>
            <input type="text" class="form-control" id="edit-regionDivisionDistrict" name="region_division_district" required>
          </div>
          <div class="mb-3">
            <label for="edit-nameOfSchool" class="form-label">NAME OF SCHOOL:</label>
            <input type="text" class="form-control" id="edit-nameOfSchool" name="name_of_school" required>
          </div>
          <div class="mb-3">
            <label for="edit-schoolIdNumber" class="form-label">School ID Number:</label>
            <input type="text" class="form-control" id="edit-schoolIdNumber" name="school_id_number" required>
          </div>
          <div class="mb-3">
            <label for="edit-studentName" class="form-label">Name:</label>
            <input type="text" class="form-control" id="edit-studentName" name="student_name" required>
          </div>
          <div class="mb-3">
            <label for="edit-gradeSection" class="form-label">Grade & Section:</label>
            <input type="text" class="form-control" id="edit-gradeSection" name="grade_section" required>
          </div>
          <div class="mb-3">
            <label>Classification of Students in terms of Milk Tolerance (Please check one):</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="milk_tolerance" id="edit-milkTolerance1" value="Without milk intolerance and will participate in milk feeding" required>
              <label class="form-check-label" for="edit-milkTolerance1">Without milk intolerance and will participate in milk feeding</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="milk_tolerance" id="edit-milkTolerance2" value="With milk intolerance but willing to participate in milk feeding" required>
              <label class="form-check-label" for="edit-milkTolerance2">With milk intolerance but willing to participate in milk feeding</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="milk_tolerance" id="edit-milkTolerance3" value="Not allowed by parents to participate in milk feeding" required>
              <label class="form-check-label" for="edit-milkTolerance3">Not allowed by parents to participate in milk feeding</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var regionDivisionDistrict = button.data('rdd');
    var nameOfSchool = button.data('ns');
    var schoolIdNumber = button.data('sid');
    var studentName = button.data('sn');
    var gradeSection = button.data('gs');
    var milkTolerance = button.data('mt');

    var modal = $(this);
    modal.find('#edit-id').val(id);
    modal.find('#edit-regionDivisionDistrict').val(regionDivisionDistrict);
    modal.find('#edit-nameOfSchool').val(nameOfSchool);
    modal.find('#edit-schoolIdNumber').val(schoolIdNumber);
    modal.find('#edit-studentName').val(studentName);
    modal.find('#edit-gradeSection').val(gradeSection);

    // Check the correct radio button based on milk tolerance
    if (milkTolerance === "Without milk intolerance and will participate in milk feeding") {
      modal.find('#edit-milkTolerance1').prop('checked', true);
    } else if (milkTolerance === "With milk intolerance but willing to participate in milk feeding") {
      modal.find('#edit-milkTolerance2').prop('checked', true);
    } else if (milkTolerance === "Not allowed by parents to participate in milk feeding") {
      modal.find('#edit-milkTolerance3').prop('checked', true);
    }
  });
</script>







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
