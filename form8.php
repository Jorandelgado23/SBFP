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
      <title>MONTHLY/QUARTERLY REPORT</title>
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
                        <li>
                            <a href="form6.php"><i class="fa fa-flask"></i> <span>Milk Component Data</span></a>
                        </li>
                        <!-- <li>
                            <a href="form7.php"><i class="fa fa-file-excel-o"></i> <span>SBFP-FORM 7</span></a>
                        </li> -->
                        <li class="active">
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
                    <h2>MONTHLY/QUARTERLY REPORT</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-15">
                    <h1 class="page-title">SCHOOL-BASED FEEDING PROGRAM MONTHLY/QUARTERLY REPORT</h1>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <form action="submit8.php" method="POST">
                            <div class="form-group">
                                <label for="region_division">Region/Division:</label>
                                <input type="text" class="form-control" name="region_division" id="region_division" required>
                            </div>

                            <h3 class="mt-4">Division/Schools</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Division/Schools</th>
                                            <th>No. of SDO Schools</th>
                                            <th>Target No. of SBFP Schools</th>
                                            <th>Actual No. of SBFP Schools</th>
                                            <th>% (SBFP Schools/SDO Schools)</th>
                                            <th>Status of Implementation</th>
                                            <th>No. of Target Beneficiaries</th>
                                            <th>No. of Actual Beneficiaries</th>
                                            <th>% of Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="division_schools[]" required></td>
                                            <td><input type="number" class="form-control" name="sdo_schools[]" required></td>
                                            <td><input type="number" class="form-control" name="target_sbfp_schools[]" required></td>
                                            <td><input type="number" class="form-control" name="actual_sbfp_schools[]" required></td>
                                            <td><input type="number" class="form-control" name="percentage[]" required></td>
                                            <td><input type="text" class="form-control" name="implementation_status[]" required></td>
                                            <td><input type="number" class="form-control" name="target_beneficiaries[]" oninput="calculateCompletion()" required></td>
                                            <td><input type="number" class="form-control" name="actual_beneficiaries[]" oninput="calculateCompletion()" required></td>
                                            <td><input type="number" step="0.01" class="form-control" name="completion_percentage[]" readonly></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="mt-4">Financial Status</h3>
                            <div class="form-group">
                                <label for="amount_allocated">Amount Allocated:</label>
                                <input type="number" class="form-control" name="amount_allocated" id="amount_allocated" required>
                            </div>

                            <div class="form-group">
                                <label for="amount_downloaded">Amount Downloaded to Schools:</label>
                                <input type="number" class="form-control" name="amount_downloaded" id="amount_downloaded" required>
                            </div>

                            <div class="form-group">
                                <label for="disbursed">Status of Downloading of Funds:</label>
                                <input type="text" class="form-control" name="status_fund_downloading" id="status_fund_downloading" required>
                            </div>

                            <h3 class="mt-4">Liquidation</h3>
                            <div class="form-group">
                                <label for="first_liquidation">1st Liquidation:</label>
                                <input type="number" class="form-control" name="first_liquidation" id="first_liquidation" oninput="calculateTotalLiquidation()" required>
                            </div>
                            <div class="form-group">
                                <label for="second_liquidation">2nd Liquidation:</label>
                                <input type="number" class="form-control" name="second_liquidation" id="second_liquidation" oninput="calculateTotalLiquidation()" required>
                            </div>
                            <div class="form-group">
                                <label for="total_liquidation">Total Liquidation:</label>
                                <input type="number" class="form-control" name="total_liquidation" id="total_liquidation" readonly>
                            </div>

                            <h3 class="mt-4">Remarks</h3>
                            <div class="form-group">
                                <label for="liquidation_status">Fully/Partially Liquidated:</label>
                                <select name="liquidation_status" class="form-control" id="liquidation_status">
                                    <option value="Fully">Fully Liquidated</option>
                                    <option value="Partially">Partially Liquidated</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="5" placeholder="Enter remarks here"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to compute % of Completion
    function calculateCompletion() {
        var targetBeneficiaries = document.getElementsByName('target_beneficiaries[]');
        var actualBeneficiaries = document.getElementsByName('actual_beneficiaries[]');
        var completionPercentage = document.getElementsByName('completion_percentage[]');

        for (let i = 0; i < targetBeneficiaries.length; i++) {
            var target = parseFloat(targetBeneficiaries[i].value) || 0;
            var actual = parseFloat(actualBeneficiaries[i].value) || 0;

            if (target > 0) {
                completionPercentage[i].value = ((actual / target) * 100).toFixed(2);
            } else {
                completionPercentage[i].value = 0;
            }
        }
    }

    // Function to compute total liquidation
    function calculateTotalLiquidation() {
        var firstLiquidation = parseFloat(document.getElementById('first_liquidation').value) || 0;
        var secondLiquidation = parseFloat(document.getElementById('second_liquidation').value) || 0;
        var totalLiquidation = firstLiquidation + secondLiquidation;
        document.getElementById('total_liquidation').value = totalLiquidation.toFixed(2);
    }

    window.onload = function() {
        document.getElementById('first_liquidation').addEventListener('input', calculateTotalLiquidation);
        document.getElementById('second_liquidation').addEventListener('input', calculateTotalLiquidation);
    };
</script>


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
