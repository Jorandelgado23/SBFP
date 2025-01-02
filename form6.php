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

    .table_section {
    text-align: center;
}

.pagination-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    gap: 5px;
}

.pagination-container .btn {
    padding: 8px 12px;
    text-decoration: none;
    border: 1px solid #007bff;
    border-radius: 4px;
    color: #fff;
    background-color: #007bff;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.pagination-container .btn:hover {
    background-color: #0056b3;
    color: #fff;
}

.pagination-container .btn.active {
    background-color: #0056b3;
    color: #fff;
    pointer-events: none;
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
            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a>
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
         <li>
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

        <li class="active">
            <a href="form6.php"><i class="fa fa-flask"></i> <span>Milk Component Data</span></a>
        </li>
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
                                    <h2>Milk Component Data</h2>
                                </div>
                            </div>
                        </div>
<p class="card-text" style="font-size: large;">Click The Open Form Below To Add Data Milk Component </p>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Open Form</button>
<br>
<br>

  

  <?php


include("accountconnection.php");

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
      <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.05);">
        <form action="submit6.php" method="post" id="consolidatedForm">
          <h2>School Information</h2>
          <br>
          <div class="mb-3">
            <label for="regionDivisionDistrict" class="form-label">REGION/DIVISION/DISTRICT:</label>
            <input type="text" class="form-control" id="regionDivisionDistrict" name="region_division_district" value="<?php echo htmlspecialchars($division_province); ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nameOfSchool" class="form-label">NAME OF SCHOOL:</label>
            <input type="text" class="form-control" id="nameOfSchool" name="name_of_school" value="<?php echo htmlspecialchars($school_name); ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="schoolIdNumber" class="form-label">School ID Number:</label>
            <input type="text" class="form-control" id="schoolIdNumber" name="school_id_number" value="<?php echo htmlspecialchars($beis_id); ?>" readonly>
          </div>

          <h2 class="mt-5">Student Information</h2>
          <br>
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
          <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
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
include("accountconnection.php");

// Function to mask the name
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

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Rows per page
$offset = ($page - 1) * $limit;

// Function to fetch and display the milk data table with pagination
function displayMilkData($conn, $session_id, $page, $limit, $offset) {
    $nameSearch = isset($_GET['student_name']) ? "%" . $_GET['student_name'] . "%" : '%';
    $gradeLevelSearch = isset($_GET['grade_level']) && $_GET['grade_level'] !== '' ? $_GET['grade_level'] : '%';

    // Fetch total records
    $countQuery = $conn->prepare("SELECT COUNT(*) AS total FROM milkcomponent 
                                  WHERE session_id = ? 
                                  AND student_name LIKE ? 
                                  AND (grade_section LIKE ? OR ? = '%')");
    $countQuery->bind_param("ssss", $session_id, $nameSearch, $gradeLevelSearch, $gradeLevelSearch);
    $countQuery->execute();
    $countResult = $countQuery->get_result()->fetch_assoc();
    $totalRecords = $countResult['total'];
    $countQuery->close();

    $totalPages = ceil($totalRecords / $limit);

    // Fetch paginated records
    $stmt = $conn->prepare("SELECT * FROM milkcomponent 
                            WHERE session_id = ? 
                            AND student_name LIKE ? 
                            AND (grade_section LIKE ? OR ? = '%') 
                            LIMIT ?, ?");
    $stmt->bind_param("ssssii", $session_id, $nameSearch, $gradeLevelSearch, $gradeLevelSearch, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="mb-3">
        <form method="GET" id="filterForm">
            <div class="row justify-content-right">
                <!-- Filter by Grade Level -->
                <div class="col-md-3">
                    <label for="grade_level"><strong>Filter by Grade Level:</strong></label>
                    <select name="grade_level" id="grade_level" class="form-control" onchange="document.getElementById('filterForm').submit();">
                        <option value="">All</option>
                        <option value="Kinder" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Kinder') ? 'selected' : ''; ?>>Kinder</option>
                        <option value="Grade 1" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 1') ? 'selected' : ''; ?>>Grade 1</option>
                        <option value="Grade 2" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 2') ? 'selected' : ''; ?>>Grade 2</option>
                        <option value="Grade 3" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 3') ? 'selected' : ''; ?>>Grade 3</option>
                        <option value="Grade 4" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 4') ? 'selected' : ''; ?>>Grade 4</option>
                        <option value="Grade 5" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 5') ? 'selected' : ''; ?>>Grade 5</option>
                        <option value="Grade 6" <?php echo (isset($_GET['grade_level']) && $_GET['grade_level'] === 'Grade 6') ? 'selected' : ''; ?>>Grade 6</option>
                    </select>
                </div>

                <!-- Search by Name -->
                <div class="col-md-3">
                    <label for="student_name"><strong>Search by Name:</strong></label>
                    <div class="input-group">
                        <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Enter name to search"
                               value="<?php echo isset($_GET['student_name']) ? $_GET['student_name'] : ''; ?>" />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="white_shd full margin_bottom_30">
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead style="color: #fff; background-color: #0971b8;">
                        <tr>
                            <th>Name of School</th>
                            <th>Student Name</th>
                            <th>Grade & Section</th>
                            <th>Milk Tolerance</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $maskedStudentName = maskName($row['student_name']); // Mask the student name
                                echo "<tr>
                                    <td>{$row['name_of_school']}</td>
                                    <td>{$maskedStudentName}</td>
                                    <td>{$row['grade_section']}</td>
                                    <td>{$row['milk_tolerance']}</td>
                                    <td>
                                        <button class='btn btn-info' onclick='showEditModal({$row['id']}, \"{$row['milk_tolerance']}\")'>
                                            <i class='fa fa-edit'></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class='btn btn-danger' onclick='confirmDelete({$row['id']});'>
                                            <i class='fa fa-trash'></i>
                                        </button>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
             <!-- Pagination -->
    <div class="pagination-container">
    <?php
    // Calculate total pages
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM milkcomponent WHERE session_id = ?");
    $stmt->bind_param("s", $session_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total_rows = $row['total'];
    $total_pages = ceil($total_rows / $limit);


    // Display the "Previous" button
    if ($page > 1) {
        $prev_page = $page - 1;
        echo "<a class='btn btn-primary' href='?page=$prev_page'>&laquo;</a>";
    }

    // Display individual page numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = $i == $page ? "active" : "";
        echo "<a class='btn btn-primary $active' href='?page=$i'>$i</a>";
    }

    // Display the "Next" button
    if ($page < $total_pages) {
        $next_page = $page + 1;
        echo "<a class='btn btn-primary' href='?page=$next_page'>&raquo;</a>";
    }
    ?>
</div>
        </div>
    </div>

   

    <?php
    $stmt->close();
}





// Function to display the modal for editing milk tolerance
function displayEditModal() {
    ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Milk Tolerance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="POST" action="update_milk_tolerance.php">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label for="milk_tolerance">Milk Tolerance</label>
                            <select class="form-control" id="edit_milk_tolerance" name="milk_tolerance">
                                <option value="Without milk intolerance and will participate in milk feeding">Without milk intolerance and will participate in milk feeding</option>
                                <option value="With milk intolerance but willing to participate in milk feeding">With milk intolerance but willing to participate in milk feeding</option>
                                <option value="Not allowed by parents to participate in milk feeding">Not allowed by parents to participate in milk feeding</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to handle the form submission with SweetAlert
        document.addEventListener('DOMContentLoaded', function () {
            const editForm = document.getElementById('editForm');

            editForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Show the SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to save the changes?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        editForm.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    </script>
    <?php
}


// Fetch the session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();
?>

<div class="col-md-12">
    <!-- <div class="white_shd full margin_bottom_30">
            <div class="heading1 margin_0">
                <h1 >Milk Component Data Table</h1> -->
                <form method="POST" action="milk_regenerate.php" style="float: right;">
                    <button type="submit" name="action" value="pdf" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Generate PDF</button>
                    <!-- <button type="submit" name="action" value="excel" class="btn btn-success"><i class="fa fa-file-excel-o"> </i>Generate Excel</button> -->
                </form>
                <?php displayMilkData($conn, $session_id, $page, $limit, $offset); ?>
                <?php displayEditModal(); ?>
            </div>
        </div>
    </div>
</div>

<script>
 function confirmDelete(id) {
    console.log(id); // Log the ID to check if it's correct

    swal({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm) {
        if (isConfirm) {
            // Redirect to the PHP script to delete the item
            window.location.href = 'remove_milk.php?id=' + id;
        }
    });
}



    // Function to show the edit modal and populate the fields
    function showEditModal(id, milkTolerance) {
        $('#edit_id').val(id);
        $('#edit_milk_tolerance').val(milkTolerance);
        $('#editModal').modal('show');
    }
</script>



<?php
$conn->close();
?>


<script>
    // Automatically submit the form when the grade level changes
    function submitFilterForm() {
        document.getElementById('filterForm').submit();
    }
</script>

<!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

                        
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
