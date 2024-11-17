<?php
include("adminauth.php");
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
      <title>ACCOUNT MANAGEMENT</title>
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
                        <a href="admindashboard.php"><img class="logo_icon img-responsive" src="images/origlogo.jpg" alt="#" /></a>


                        </div>
                    </div>
                    <div class="sidebar_user_info">
    <div class="icon_setting"></div>
    <div class="user_profle_side">
    <div class="user_img"><img class="img-responsive" src="images/origlogo.jpg" alt="#" /></div>
    <div class="user_info">
    <h6><?php echo $user_firstname . ' ' . $user_lastname; ?></h6>
        
    <p><span class="online_animation"></span> Logged In</p>

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
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar"></i> <span>School Attendance</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="monthly_attendance_reports.php">> <span>Monthly Report</span></a></li> 
                           <li><a href="adattendance.php">> <span>Attendance Logs</span></a></li> 
                          
                        </ul>
                     </li>
                       
                        <li>
                            <a href="adbeneficiaries.php"><i class="fa fa-university""></i> <span>All School Beneficiaries</span></a>
                        </li>

                        <li>
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>

                        <li class="active">
                            <a href="adaccountmanagement.php"><i class="fa fa-group"></i> <span>Account Management</span></a>
                        </li>

                        <li>
                            <a href="age_gender_analysis.php"><i class="fa fa-archive"></i> <span>age and gender Analysis</span></a>
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
                                    <li>

                                    <?php
include("accountconnection.php");

// Query recent activities count with status 'new'
$sql = "SELECT COUNT(*) AS activity_count FROM recent_activity WHERE status = 'new'";
$result = $conn->query($sql);

// Get activity count
$activity_count = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activity_count = $row['activity_count'];
}

// Close connection
$conn->close();
?>


<a href="allactivities.php?mark_read=true">
    <i class="fa fa-bell-o"></i>
    <?php if ($activity_count > 0): ?>
        <span class="badge"><?php echo $activity_count; ?></span>
    <?php endif; ?>
</a>

</li>

                                        
                                       
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            
                                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user light_color"></i>
        <!-- <img class="img-responsive rounded-circle" src="images/origlogo.jpg" alt="#" /> -->

    <span class="name_user"><?php echo $user_role; ?></span>
</a>

<div class="dropdown-menu">
                                                <a class="dropdown-item" href="adsettings.php">My Profile</a>
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
                                    <h2>ACCOUNT MANAGEMENT</h2>
                                </div>
                            </div>
                        </div>
    <!-- Create User Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.05);">
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
    <input type="text" class="form-control" id="createPhoneNumber" name="phone_number" required maxlength="11" pattern="\d{11}" title="Please enter an 11-digit phone number">
</div>

                    <div class="form-group">
                        <label for="createBirthday">Birthday</label>
                        <input type="date" class="form-control" id="createBirthday" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="createPassword">Password</label>
                        <input type="password" class="form-control" id="createPassword" name="password" required>
                    </div>
                    <!-- New Fields -->
                    <div class="form-group">
                        <label for="createDivisionProvince">Division/Province</label>
                        <input type="text" class="form-control" id="createDivisionProvince" name="division_province" value="Laguna" readonly>
                    </div>
                    <div class="form-group">
                        <label for="createSchoolDistrict">School District/Municipality</label>
                        <input type="text" class="form-control" id="createSchoolDistrict" name="school_district_municipality" value="Santa Cruz" readonly>
                    </div>
                    <div class="form-group">
                        <label for="createSchoolName">School Name</label>
                        <select class="form-control" id="createSchoolName" name="school_name" required onchange="updateSchoolDetails()">
                            <option value="">Select School</option>
                            <option value="Santa Cruz Central Elementary School">Santa Cruz Central Elementary School</option>
                            <option value="Aplaya Elementary School">Aplaya Elementary School</option>
                            <option value="Bagumbayan Elementary School">Bagumbayan Elementary School</option>
                            <option value="Callios Elementary School">Callios Elementary School</option>
                            <option value="Duhat Elementary School">Duhat Elementary School</option>
                            <option value="Gatid Elementary School">Gatid Elementary School</option>
                            <option value="Labuin Elementary School">Labuin Elementary School</option>
                            <option value="Linga Elementary School">Linga Elementary School</option>
                            <option value="Malinao Elementary School">Malinao Elementary School</option>
                            <option value="Oogong Elementary School">Oogong Elementary School</option>
                            <option value="Pagsawitan Elementary School">Pagsawitan Elementary School</option>
                            <option value="Palanan Elementary School">Palanan Elementary School</option>
                            <option value="Patimbao Elementary School">Patimbao Elementary School</option>
                            <option value="San Juan Elementary School">San Juan Elementary School</option>
                            <option value="San Pablo Sur Elementary School">San Pablo Sur Elementary School</option>
                            <option value="San Roque Elementary School">San Roque Elementary School</option>
                            <option value="Santisima Elementary School">Santisima Elementary School</option>
                            <option value="Saoe Elementary School">Saoe Elementary School</option>
                            <option value="Sapang Elementary School">Sapang Elementary School</option>
                            <option value="Talangan Elementary School">Talangan Elementary School</option>
                            <option value="Tibig Elementary School">Tibig Elementary School</option>
                            <option value="Tubigan Elementary School">Tubigan Elementary School</option>
                            <option value="Valencia Elementary School">Valencia Elementary School</option>
                            <option value="Wawa Elementary School">Wawa Elementary School</option>
                            <option value="San Agustin Elementary School">San Agustin Elementary School</option>
                            <option value="San Antonio Elementary School">San Antonio Elementary School</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="createBEISID">BEIS ID</label>
                        <input type="text" class="form-control" id="createBEISID" name="beis_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="createSchoolAddress">School Address</label>
                        <input type="text" class="form-control" id="createSchoolAddress" name="school_address" readonly>
                    </div>
                    <div class="form-group">
                        <label for="createBarangayName">Barangay Name</label>
                        <input type="text" class="form-control" id="createBarangayName" name="barangay_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="createSupervisorPrincipal">Supervisor/Principal Name</label>
                        <input type="text" class="form-control" id="createSupervisorPrincipal" name="supervisor_principal_name">
                    </div>
                    <!-- End of New Fields -->
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function updateSchoolDetails() {
    const schoolDetails = {
        "Santa Cruz Central Elementary School": { address: "P. Guevarra Street, Santa Cruz, Laguna", beis_id: "123456", barangay: "Barangay Santo Angel Central" },
        "Aplaya Elementary School": { address: "Aplaya, Santa Cruz, Laguna", beis_id: "123457", barangay: " Barangay Aplaya" },
        "Bagumbayan Elementary School": { address: "Bagumbayan, Santa Cruz, Laguna", beis_id: "123458", barangay: "Barangay Bagumbayan" },
        "Callios Elementary School": { address: "Callios, Santa Cruz, Laguna", beis_id: "123459", barangay: "Barangay Callios" },
        "Duhat Elementary School": { address: "Duhat, Santa Cruz, Laguna", beis_id: "123460", barangay: "Barangay Duhat" },
        "Gatid Elementary School": { address: "Gatid, Santa Cruz, Laguna", beis_id: "123461", barangay: "Barangay Gatid" },
        "Labuin Elementary School": { address: "Labuin, Santa Cruz, Laguna", beis_id: "123462", barangay: "Barangay Labuin" },
        "Linga Elementary School": { address: "Linga, Santa Cruz, Laguna", beis_id: "123463", barangay: "Barangay Linga" },
        "Malinao Elementary School": { address: "Malinao, Santa Cruz, Laguna", beis_id: "123464", barangay: "Barangay Malinao" },
        "Oogong Elementary School": { address: "Oogong, Santa Cruz, Laguna", beis_id: "123465", barangay: "Barangay Oogong" },
        "Pagsawitan Elementary School": { address: "Pagsawitan, Santa Cruz, Laguna", beis_id: "123466", barangay: "Barangay Pagsawitan" },
        "Palanan Elementary School": { address: "Palanan, Santa Cruz, Laguna", beis_id: "123467", barangay: "Barangay Palanan" },
        "Patimbao Elementary School": { address: "Patimbao, Santa Cruz, Laguna", beis_id: "123468", barangay: "Barangay Patimbao" },
        "San Juan Elementary School": { address: "San Juan, Santa Cruz, Laguna", beis_id: "123469", barangay: "Barangay San Juan" },
        "San Pablo Sur Elementary School": { address: "San Pablo Sur, Santa Cruz, Laguna", beis_id: "123470", barangay: "Barangay San Pablo Sur" },
        "San Roque Elementary School": { address: "San Roque, Santa Cruz, Laguna", beis_id: "123471", barangay: "Barangay San Roque" },
        "Santisima Elementary School": { address: "Santisima, Santa Cruz, Laguna", beis_id: "123472", barangay: "Barangay Santisima" },
        "Saoe Elementary School": { address: "Saoe, Santa Cruz, Laguna", beis_id: "123473", barangay: "Barangay Saoe" },
        "Sapang Elementary School": { address: "Sapang, Santa Cruz, Laguna", beis_id: "123474", barangay: "Barangay Sapang" },
        "Talangan Elementary School": { address: "Talangan, Santa Cruz, Laguna", beis_id: "123475", barangay: "Barangay Talangan" },
        "Tibig Elementary School": { address: "Tibig, Santa Cruz, Laguna", beis_id: "123476", barangay: "Barangay Tibig" },
        "Tubigan Elementary School": { address: "Tubigan, Santa Cruz, Laguna", beis_id: "123477", barangay: "Barangay Tubigan" },
        "Valencia Elementary School": { address: "Valencia, Santa Cruz, Laguna", beis_id: "123478", barangay: "Barangay Valencia" },
        "Wawa Elementary School": { address: "Wawa, Santa Cruz, Laguna", beis_id: "123479", barangay: "Wawa" },
        "San Agustin Elementary School": { address: "San Agustin, Santa Cruz, Laguna", beis_id: "123480", barangay: "Barangay San Agustin" },
        "San Antonio Elementary School": { address: "San Antonio, Santa Cruz, Laguna", beis_id: "123481", barangay: "Barangay San Antonio" }
    };
    
    const schoolNameSelect = document.getElementById('createSchoolName');
    const schoolAddressInput = document.getElementById('createSchoolAddress');
    const beisIDInput = document.getElementById('createBEISID');
    const barangayNameInput = document.getElementById('createBarangayName');

    const selectedSchool = schoolNameSelect.value;
    
    if (selectedSchool in schoolDetails) {
        schoolAddressInput.value = schoolDetails[selectedSchool].address;
        beisIDInput.value = schoolDetails[selectedSchool].beis_id;
        barangayNameInput.value = schoolDetails[selectedSchool].barangay;
    } else {
        schoolAddressInput.value = '';
        beisIDInput.value = '';
        barangayNameInput.value = '';
    }
}
</script>





   

<div class="container-fluid">
    <div class="row justify-content-between mb-4">
        <div class="col-md-12">
            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                    <span class="fe fe-filter fe-12 mr-2"></span><i class="fa fa-pencil"></i>Create
                </button>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head" style="background-color:#0971b8;">
                <div class="heading1 margin_0">
                    <h2 style="color:#fff;">Admin Accounts</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <!-- <th>Division/Province</th>
                                <th>School District/Municipality</th>
                                <th>School Name</th>
                                <th>BEIS ID</th>
                                <th>School Address</th>
                                <th>Barangay Name</th>
                                <th>Supervisor/Principal Name</th>
                                <th>Actions</th>  -->
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'accountconnection.php';

                        // Fetch Admin Accounts excluding the main admin account
                        $sql_admin = "SELECT id, firstname, lastname, email, phone_number, role, `Division/Province`, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name FROM users WHERE role = 'admin' AND email != 'mainadmin@sbfp.ph'";
                        $result_admin = $conn->query($sql_admin);

                        // Display Admin Accounts
                        if ($result_admin->num_rows > 0) {
                            while ($row = $result_admin->fetch_assoc()) {
                                echo "<tr>";
                                // echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["firstname"] . "</td>";
                                echo "<td>" . $row["lastname"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone_number"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                // echo "<td>" . $row["Division/Province"] . "</td>";
                                // echo "<td>" . $row["school_district_municipality"] . "</td>";
                                // echo "<td>" . $row["school_name"] . "</td>";
                                // echo "<td>" . $row["beis_id"] . "</td>";
                                // echo "<td>" . $row["school_address"] . "</td>";
                                // echo "<td>" . $row["barangay_name"] . "</td>";
                                // echo "<td>" . $row["supervisor_principal_name"] . "</td>";
                                echo "<td class='text-center'>";
                                echo "<button class='btn btn-sm btn-info' onclick=\"editUser('" . $row['id'] . "', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['email'] . "', '" . $row['phone_number'] . "', '', '". $row['role'] . "')\"><i class='fa fa-edit'></i></button>";
                                echo "</td>";
                                echo "<td class='text-center'>";
                                echo "<button class='btn btn-sm btn-danger' onclick=\"removeUser('" . $row['id'] . "')\"><i class='fa fa-trash'></i></button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No admin accounts found</td></tr>";
                        }

                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head" style="background-color:#0971b8;">
            <div class="heading1 margin_0">
                <h2 style="color:#fff;">SBFP Accounts</h2>
            </div>
        </div>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Birthday</th>
                            <th>Role</th>
                            <th>Division/Province</th>
                            <th>School District/Municipality</th>
                            <th>School Name</th>
                            <th>BEIS ID</th>
                            <th>School Address</th>
                            <th>Barangay Name</th>
                            <th>Supervisor/Principal Name</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'accountconnection.php';

                    // Fetch SBFP Accounts
                    $sql_sbfp = "SELECT id, firstname, lastname, email, phone_number, birthday, role, `Division/Province`, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name FROM users WHERE role = 'sbfp'";
                    $result_sbfp = $conn->query($sql_sbfp);

                    // Display SBFP Accounts
                    if ($result_sbfp->num_rows > 0) {
                        while ($row = $result_sbfp->fetch_assoc()) {
                            echo "<tr>";
                            // echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["firstname"] . "</td>";
                            echo "<td>" . $row["lastname"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            echo "<td>" . $row["birthday"] . "</td>";
                            echo "<td>" . $row["role"] . "</td>";
                            echo "<td>" . $row["Division/Province"] . "</td>";
                            echo "<td>" . $row["school_district_municipality"] . "</td>";
                            echo "<td>" . $row["school_name"] . "</td>";
                            echo "<td>" . $row["beis_id"] . "</td>";
                            echo "<td>" . $row["school_address"] . "</td>";
                            echo "<td>" . $row["barangay_name"] . "</td>";
                            echo "<td>" . $row["supervisor_principal_name"] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<button class='btn btn-sm btn-info' onclick=\"editUser('" . $row['id'] . "', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['email'] . "', '" . $row['phone_number'] . "', '" . $row['birthday'] . "', '" . $row['role'] . "', '" . $row['Division/Province'] . "', '" . $row['school_district_municipality'] . "', '" . $row['school_name'] . "', '" . $row['beis_id'] . "', '" . $row['school_address'] . "', '" . $row['barangay_name'] . "', '" . $row['supervisor_principal_name'] . "')\"><i class='fa fa-edit'></i></button>";
                            echo "</td>";
                            echo "<td class='text-center'>";
                            echo "<button class='btn btn-sm btn-danger' onclick=\"removeUser('" . $row['id'] . "')\"><i class='fa fa-trash'></i></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14'>No SBFP accounts found</td></tr>";
                    }

                    $conn->close();
                    ?>
                    </tbody>
                </table>
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
            <form id="editUserForm">
                <div class="modal-body" style="background-color: rgba(0, 0, 0, 0.05);">
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
    <input type="text" class="form-control" id="editPhoneNumber" name="phone_number" required maxlength="11" pattern="\d{11}" title="Please enter an 11-digit phone number">
</div>

                    <div class="form-group">
                        <label for="editBirthday">Birthday</label>
                        <input type="date" class="form-control" id="editBirthday" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="editRole">Role</label>
                        <input type="text" class="form-control" id="editRole" name="role" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDivisionProvince">Division/Province</label>
                        <input type="text" class="form-control" id="editDivisionProvince" name="division_province">
                    </div>
                    <div class="form-group">
                        <label for="editSchoolDistrict">School District/Municipality</label>
                        <input type="text" class="form-control" id="editSchoolDistrict" name="school_district_municipality">
                    </div>
                    <div class="form-group">
                        <label for="editSchoolName">School Name</label>
                        <input type="text" class="form-control" id="editSchoolName" name="school_name">
                    </div>
                    <div class="form-group">
                        <label for="editBEISID">BEIS ID</label>
                        <input type="text" class="form-control" id="editBEISID" name="beis_id">
                    </div>
                    <div class="form-group">
                        <label for="editSchoolAddress">School Address</label>
                        <input type="text" class="form-control" id="editSchoolAddress" name="school_address">
                    </div>
                    <div class="form-group">
                        <label for="editBarangayName">Barangay Name</label>
                        <input type="text" class="form-control" id="editBarangayName" name="barangay_name">
                    </div>
                    <div class="form-group">
                        <label for="editSupervisorPrincipal">Supervisor/Principal Name</label>
                        <input type="text" class="form-control" id="editSupervisorPrincipal" name="supervisor_principal_name">
                    </div>
                    <!-- Password Change Fields -->
                    <div class="form-group">
                        <label for="editPassword">New Password</label>
                        <input type="password" class="form-control" id="editPassword" name="password">
                    </div>
                    <div class="form-group">
                        <label for="editConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="editConfirmPassword" name="confirm_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
                <p>Are you sure you want to remove this user?</p>
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
    let removeUserId;

    function editUser(id, firstname, lastname, email, phone_number, birthday, role, division_province, school_district_municipality, school_name, beis_id, school_address, barangay_name, supervisor_principal_name) {
        document.getElementById('editUserId').value = id;
        document.getElementById('editFirstName').value = firstname;
        document.getElementById('editLastName').value = lastname;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhoneNumber').value = phone_number;
        document.getElementById('editBirthday').value = birthday;
        document.getElementById('editRole').value = role;
        document.getElementById('editDivisionProvince').value = division_province;
        document.getElementById('editSchoolDistrict').value = school_district_municipality;
        document.getElementById('editSchoolName').value = school_name;
        document.getElementById('editBEISID').value = beis_id;
        document.getElementById('editSchoolAddress').value = school_address;
        document.getElementById('editBarangayName').value = barangay_name;
        document.getElementById('editSupervisorPrincipal').value = supervisor_principal_name;

        // Clear password fields
        document.getElementById('editPassword').value = '';
        document.getElementById('editConfirmPassword').value = '';

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
                Swal.fire({
                    icon: 'success',
                    title: 'User Updated!',
                    text: 'The user has been successfully updated.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error updating the user. Please try again.',
                    confirmButtonText: 'OK'
                });
            }
        }).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was a problem with the request. Please try again later.',
                confirmButtonText: 'OK'
            });
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
                Swal.fire({
                    icon: 'success',
                    title: 'User Removed!',
                    text: 'The user has been successfully removed.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error removing the user. Please try again.',
                    confirmButtonText: 'OK'
                });
            }
        }).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was a problem with the request. Please try again later.',
                confirmButtonText: 'OK'
            });
        });
    });
</script>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('createUserForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch('create_user.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json()).then(data => {
            if (data.success) {
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'User Created!',
                    text: 'The user has been successfully created.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                // Show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error creating the user. Please try again.',
                    confirmButtonText: 'OK'
                });
            }
        }).catch(error => {
            // Handle fetch errors
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was a problem with the request. Please try again later.',
                confirmButtonText: 'OK'
            });
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
  
    
</body>

</html>