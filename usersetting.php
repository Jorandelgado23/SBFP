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
      <title>My Setting</title>
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
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/origlogo.jpg" alt="#" /></a>
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
            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a>
        </li>

        <li>
            <a href="form1.php"><i class="fa fa-group"></i> <span>Master List Of Student</span></a>
        </li>

        <!-- Dropdown for Beneficiary Improvement and Progress Input -->
        <li>
            <a href="#beneficiaryDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-line-chart"></i> <span>Beneficiary</span>
            </a>
            <ul class="collapse list-unstyled" id="beneficiaryDropdown">
                <li><a href="Beneficiary_list.php">> <span>Beneficiary Improvement</span></a></li>
                <li><a href="progress_input.php">> <span>Progress Input</span></a></li>
            </ul>
        </li>

        <!-- Dropdown for Student Attendance and Beneficiary Attendance -->
        <li>
            <a href="#attendanceDropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-calendar"></i> <span>Attendance</span>
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
            <a href="form8.php"><i class="fa fa-file-text-o"></i> <span>QUARTERLY REPORT</span></a>
        </li>

        <li class="active">
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
                    <h2>Profile</h2>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-md-12"></div>
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head" style="background-color:#0971b8;">
                        <div class="heading1 margin_0">
                            <h2 style="color:#fff;">User Profile</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form action="update_user_profile.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id); ?>">
                            <div class="row align-items-center">
                                <!-- <div class="col-lg-3">
                                    <div class="profile_img text-center mb-3">
                                        <img width="180" class="rounded-circle mb-2" src="./uploads/<?php echo htmlspecialchars($user_profile_picture); ?>" alt="Profile Picture">
                                        <div class="custom-file">
                                            <input type="file" name="profile_picture" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose new picture</label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-9">
                                    <div class="profile_contant">
                                        <h3><?php echo htmlspecialchars($user_firstname . ' ' . $user_lastname); ?></h3>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i> <?php echo htmlspecialchars($email); ?></li>
                                            <!-- Add more user details as needed -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname:</label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($user_firstname); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname:</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($user_lastname); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="old_password">Old Password:</label>
                                        <div class="input-group">
                                            <input type="password" name="old_password" class="form-control" id="old_password">
                                            <div class="input-group-append">
                                                <button class="btn toggle-password show-password btn-primary" type="button" data-target="old_password">
                                                    <i class="fa fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password:</label>
                                        <div class="input-group">
                                            <input type="password" name="new_password" class="form-control" id="new_password">
                                            <div class="input-group-append">
                                                <button class="btn toggle-password show-password btn-primary" type="button" data-target="new_password">
                                                    <i class="fa fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <div class="input-group">
                                            <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                            <div class="input-group-append">
                                                <button class="btn toggle-password show-password btn-primary" type="button" data-target="confirm_password">
                                                    <i class="fa fa-eye-slash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float: right;">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Function to toggle password visibility
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');
        togglePasswordButtons.forEach(button => {
            const targetId = button.dataset.target;
            const targetInput = document.getElementById(targetId);
            
            button.addEventListener('click', function () {
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    button.innerHTML = '<i class="fa fa-eye"></i>';
                } else {
                    targetInput.type = 'password';
                    button.innerHTML = '<i class="fa fa-eye-slash"></i>';
                }
            });
        });

        // Handle form submission
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            
            // Show the SweetAlert notification
            Swal.fire({
                title: 'Profile Updated!',
                text: 'Your profile has been successfully updated.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form after confirming
                }
            });
        });
    });
</script>

    <div class="col-md-2"></div>
</div>
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
