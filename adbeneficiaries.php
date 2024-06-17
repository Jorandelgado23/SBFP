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
                        <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/logo/semilogo.png" alt="#" /></a>

                        </div>
                    </div>
                    <div class="sidebar_user_info">
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
                            <a href="admindashboard.php"><i class="fa fa-dashboard""></i> <span>DASHBOARD</span></a>
                        </li>

                        <li>
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li>
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>
                       
                       
                      
                      
            
                        
                        <li>
                            <a href="adsettings.php"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a>
                        </li>
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
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                        <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown">
    <img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" />
    <span class="name_user"><?php echo $user_role ?></span>
</a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="usersetting.php">My Profile</a>
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
                                    <h2>ALL SCHOOL BENEFICIARIES</h2>
                                </div>
                            </div>
                        </div>
                        <?php
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

// Fetch list of schools with their session IDs
$sql_schools = "SELECT DISTINCT session_id, name_of_school, school_id_number FROM beneficiaries";
$result_schools = $conn->query($sql_schools);

// Group schools by session ID
$schools_by_session = array();
if ($result_schools->num_rows > 0) {
    while ($row_schools = $result_schools->fetch_assoc()) {
        $session_id = $row_schools['session_id'];
        $school_name = $row_schools['name_of_school'];
        $schools_by_session[$session_id][$school_name][] = $row_schools;
    }
}

// Filtering functionality
if (isset($_GET['search'])) {
  $search_term = $_GET['search'];
  $filtered_schools = array_filter($schools_by_session, function ($schools) use ($search_term) {
      foreach ($schools as $school_name => $school_data) {
          if (stripos($school_name, $search_term) !== false) {
              return true;
          }
      }
      return false;
  });
} else {
  $filtered_schools = $schools_by_session;
}
?>

<div class="col-md-12 my-4">
    <h2 class="h4 mb-1">BENEFICIARIES LIST</h2>
    <!-- Search form -->
    <form method="get" class="mb-3">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search by school name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="card shadow">
        <div class="card-body">
            <!-- table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name of School</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($filtered_schools as $session_id => $schools) {
                        foreach ($schools as $school_name => $school_data) {
                            echo "<tr>
                                    <td>$school_name</td>"; // School name cell
                            echo "<td><a href='view_details.php?session_id=$session_id' class='btn btn-primary'>View</a></td>
                                </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$conn->close(); // Close database connection
?>


 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_schools = "SELECT DISTINCT session_id, name_of_school FROM beneficiaries";
$result_schools = $conn->query($sql_schools);

$schools_by_session = array();
if ($result_schools->num_rows > 0) {
    while ($row_schools = $result_schools->fetch_assoc()) {
        $session_id = $row_schools['session_id'];
        $school_name = $row_schools['name_of_school'];
        $schools_by_session[$session_id][$school_name] = true;
    }
}
?>

<div class="col-md-12 my-4">
    <h1 class="h4 mb-1">BENEFICIARIES</h1>
    <p>Choose School</p>
    <div class="form-group col-2 p-0">
        <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref">Status</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option selected>Choose...</option>
            <?php
            foreach ($schools_by_session as $session_id => $schools) {
                foreach ($schools as $school_name => $value) {
                    echo "<option value='$session_id'>$school_name</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="toolbar row mb-3">
                <div class="col">
                    <form class="form-inline">
                        <div class="form-row">
                            <div class="form-group col-auto">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" id="search" value="" placeholder="Search">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col ml-auto">
                    <div class="dropdown float-right">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Download PDF </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Grade/Section</th>
                        <th>Date of Weighing / Measuring (MM/DD/YYYY)</th>
                        <th>Age in Years / Months</th>
                        <th>Weight (Kg)</th>
                        <th>Height (cm)</th>
                        <th>BMI for 6 y.o. and above</th>
                        <th>BMI-A</th>
                        <th>HFA</th>
                        <th>Dewormed?</th>
                        <th>Parent's consent for milk?</th>
                        <th>Participation in 4Ps</th>
                        <th>Beneficiary of SBFP in Previous Years</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $sql_beneficiaries = "SELECT * FROM beneficiaries";
                    $result_beneficiaries = $conn->query($sql_beneficiaries);
                    
                    if ($result_beneficiaries->num_rows > 0) {
                        while ($row = $result_beneficiaries->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . (isset($row["name"]) ? $row["name"] : "") . "</td>";
                            echo "<td>" . (isset($row["sex"]) ? $row["sex"] : "") . "</td>";
                            echo "<td>" . (isset($row["grade_section"]) ? $row["grade_section"] : "") . "</td>";
                            echo "<td>" . (isset($row["date_of_weighing"]) ? $row["date_of_weighing"] : "") . "</td>";
                            echo "<td>" . (isset($row["age_years_months"]) ? $row["age_years_months"] : "") . "</td>";
                            echo "<td>" . (isset($row["weight_kg"]) ? $row["weight_kg"] : "") . "</td>";
                            echo "<td>" . (isset($row["height_cm"]) ? $row["height_cm"] : "") . "</td>";
                            echo "<td>" . (isset($row["bmi_above_6_years"]) ? $row["bmi_above_6_years"] : "") . "</td>";
                            echo "<td>" . (isset($row["bmi_a"]) ? $row["bmi_a"] : "") . "</td>";
                            echo "<td>" . (isset($row["hfa"]) ? $row["hfa"] : "") . "</td>";
                            echo "<td>" . (isset($row["dewormed"]) ? $row["dewormed"] : "") . "</td>";
                            echo "<td>" . (isset($row["parent_consent_milk"]) ? $row["parent_consent_milk"] : "") . "</td>";
                            echo "<td>" . (isset($row["participation_4ps"]) ? $row["participation_4ps"] : "") . "</td>";
                            echo "<td>" . (isset($row["beneficiary_sbfp_previous_years"]) ? $row["beneficiary_sbfp_previous_years"] : "") . "</td>";
                            echo "</tr  ";
                          }
                      } else {
                          echo "<tr><td colspan='15'>No beneficiaries found</td></tr>";
                      }
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  
  <script>
  $(document).ready(function(){
      $('#inlineFormCustomSelectPref').change(function(){
          var selectedSchool = $(this).val();
          $.ajax({
              url: 'get_filtered_data.php',
              type: 'POST',
              data: {school_id: selectedSchool},
              success: function(response){
                  $('#tableBody').html(response);
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });
      });
  });
  </script>

<?php
$conn->close();
?>

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
