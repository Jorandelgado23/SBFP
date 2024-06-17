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
    <span class="name_user"><?php echo $user_role; ?></span>
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
           

                 <!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form id="createUserForm">
        <div class="form-group">
            <label for="createRole">Role</label>
            <select class="form-control" id="createRole" name="role" required>
                <option value="sbfp">sbfp</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="createFirstName">First Name</label>
            <input type="text" class="form-control" id="createFirstName" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="createLastName">Last Name</label>
            <input type="text" class="form-control" id="createLastName" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="createEmail">Email</label>
            <input type="email" class="form-control" id="createEmail" name="email" required>
        </div>
        <div class="form-group">
            <label for="createPhoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="createPhoneNumber" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="createBirthday">Birthday</label>
            <input type="date" class="form-control" id="createBirthday" name="birthday" required>
        </div>
        <div class="form-group">
            <label for="createPassword">Password</label>
            <input type="password" class="form-control" id="createPassword" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>

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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<div class="container-fluid">
    <div class="row justify-content-between mb-4"> <!-- Added justify-content-between class for right alignment -->
        <div class="col-md-12">
            <div class="text-right"> <!-- Align button to the right -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                    <span class="fe fe-filter fe-12 mr-2"></span>Create
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="white_shd full margin_bottom_30">
                        <?php
                        include 'accountconnection.php';

                        // Fetch Admin Accounts
                        $sql_admin = "SELECT id, firstname, lastname, email, phone_number, birthday, role FROM users WHERE role = 'admin'";
                        $result_admin = $conn->query($sql_admin);

                        // Display Admin Accounts
                        if ($result_admin->num_rows > 0) {
                            echo "<h2>Admin Accounts</h2>";
                            echo "<table class='table table-borderless table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Phone Number</th>";
                            echo "<th>Birthday</th>";
                            echo "<th>Role</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result_admin->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["firstname"] . "</td>";
                                echo "<td>" . $row["lastname"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["birthday"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>
                                        <button class='btn btn-sm btn-primary' onclick=\"editUser('" . $row['id'] . "', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['email'] . "', '" . $row['phone_number'] . "', '" . $row['birthday'] . "', '" . $row['role'] . "')\">Edit</button>
                                        <button class='btn btn-sm btn-danger' onclick=\"removeUser('" . $row['id'] . "')\">Remove</button>
                                      </td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "<p>No admin accounts found</p>";
                        }

                        // Fetch SBFP Accounts
                        $sql_sbfp = "SELECT id, firstname, lastname, email, phone_number, birthday, role FROM users WHERE role = 'sbfp'";
                        $result_sbfp = $conn->query($sql_sbfp);

                        // Display SBFP Accounts
                        if ($result_sbfp->num_rows > 0) {
                            echo "<h2>SBFP Accounts</h2>";
                            echo "<table class='table table-borderless table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Phone Number</th>";
                            echo "<th>Birthday</th>";
                            echo "<th>Role</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result_sbfp->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["firstname"] . "</td>";
                                echo "<td>" . $row["lastname"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["birthday"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "<td>
                                        <button class='btn btn-sm btn-primary' onclick=\"editUser('" . $row['id'] . "', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['email'] . "', '" . $row['phone_number'] . "', '" . $row['birthday'] . "', '" . $row['role'] . "')\">Edit</button>
                                        <button class='btn btn-sm btn-danger' onclick=\"removeUser('" . $row['id'] . "')\">Remove</button>
                                      </td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "<p>No SBFP accounts found</p>";
                        }

                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" id="editUserId" name="id">
                    <div class="form-group">
                        <label for="editFirstName">First Name</label>
                        <input type="text" class="form-control" id="editFirstName" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="editLastName">Last Name</label>
                        <input type="text" class="form-control" id="editLastName" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editPhoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="editPhoneNumber" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="editBirthday">Birthday</label>
                        <input type="date" class="form-control" id="editBirthday" name="birthday" required>
                    </div>
                    <div class="form-group">
            <label for="editRole">Role</label>
            <select class="form-control" id="editRole"  name="role" required>
                <option value="sbfp">sbfp</option>
                <option value="admin">admin</option>
            </select>
        </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Remove User Modal -->
<div class="modal fade" id="removeUserModal" tabindex="-1" role="dialog" aria-labelledby="removeUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUserModalLabel">Remove User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmRemoveUser">Remove</button>
            </div>
        </div>
    </div>
</div>

<script>
    let editUserModal = document.getElementById('editUserModal');
    let removeUserModal = document.getElementById('removeUserModal');
    let editUserId;
    let removeUserId;

    function editUser(id, firstname, lastname, email, phone_number, birthday, role) {
        document.getElementById('editUserId').value = id;
        document.getElementById('editFirstName').value = firstname;
        document.getElementById('editLastName').value = lastname;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhoneNumber').value = phone_number;
        document.getElementById('editBirthday').value = birthday;
        document.getElementById('editRole').value = role;
        $('#editUserModal').modal('show');
    }

    function removeUser(id) {
        removeUserId = id;
        $('#removeUserModal').modal('show');
    }

    document.getElementById('editUserForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch('edit_user.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error updating user');
            }
        });
    });

    document.getElementById('confirmRemoveUser').addEventListener('click', function() {
        fetch('remove_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: removeUserId })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error removing user');
            }
        });
    });
</script>

<script>
    document.getElementById('createUserForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch('create_user.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error creating user');
            }
        });
    });
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
