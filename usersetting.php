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


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Update user information
    $sql = "UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $firstname, $lastname, $email, $id);
    $stmt->execute();

    // Check if new password is set and update password if valid
    if (!empty($new_password) && $new_password === $confirm_password) {
        $check_password_sql = "SELECT password FROM users WHERE id=?";
        $stmt = $conn->prepare($check_password_sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($old_password, $hashed_password)) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password_sql = "UPDATE users SET password=? WHERE id=?";
                $stmt = $conn->prepare($update_password_sql);
                $stmt->bind_param("si", $hashed_new_password, $id);
                $stmt->execute();
            } else {
                echo "Old password is incorrect.";
            }
        }
    }

    // Update profile picture
    if ($_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["profile_picture"]["tmp_name"];
        $name = basename($_FILES["profile_picture"]["name"]);
        $destination_dir = "./assets/avatars/";
        if (!file_exists($destination_dir)) {
            mkdir($destination_dir, 0777, true);
        }
        $destination = $destination_dir . $name;
        if (move_uploaded_file($tmp_name, $destination)) {
            $update_picture_sql = "UPDATE users SET profile_picture=? WHERE id=?";
            $stmt = $conn->prepare($update_picture_sql);
            $stmt->bind_param("si", $name, $id);
            $stmt->execute();
            echo "Profile picture updated successfully.";
        } else {
            echo "Error uploading profile picture.";
        }
    }
}

$conn->close();
?>

                       
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>User profile</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <form action="update_profile.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="profile_img">
                                        <img width="180" class="rounded-circle" src="./assets/avatars/<?php echo $user_profile_picture; ?>" alt="...">
                                        <input type="file" name="profile_picture" class="form-control mt-3">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="profile_contant">
                                        <h3><?php echo $user_firstname . ' ' . $user_lastname; ?></h3>
                                       
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-envelope-o"></i> : <?php echo $email; ?></li>
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
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $user_firstname; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname:</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $user_lastname; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" name="old_password" class="form-control" id="old_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
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
