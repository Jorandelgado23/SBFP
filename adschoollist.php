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
      <title>SCHOOL LIST</title>
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

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
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

                        <li class="active">
                            <a href="adschoollist.php"><i class="fa fa-pie-chart"></i> <span>School List Of Laguna</span></a>
                        </li>

                        <li>
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
                                    <h2>SCHOOL LIST OF LAGUNA</h2>
                                </div>
                            </div>
                        </div>


                        <?php
include("accountconnection.php");
// Step 2: Fetch school details from the beneficiaries table based on the search query
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT id, name_of_school, division_province, city_municipality_barangay, school_id_number, name_of_principal, name_of_feeding_focal_person, session_id FROM beneficiaries WHERE name_of_school LIKE '%$search_query%' GROUP BY session_id";
$result = $conn->query($sql);




// Step 2: Retrieve all schools from the database with correct total beneficiaries count
$sql = "SELECT b.id, b.name_of_school, b.division_province, b.city_municipality_barangay AS school_district_municipality, b.school_id_number AS beis_id, b.name_of_principal AS supervisor_principal_name, b.name_of_feeding_focal_person AS barangay_name,
        u.phone_number AS contact_number, u.school_address, u.barangay_name AS user_barangay_name,
        COUNT(d.session_id) AS total_beneficiaries
        FROM beneficiaries b
        LEFT JOIN users u ON b.session_id = u.session_id
        LEFT JOIN beneficiary_details d ON b.id = d.beneficiary_id
        GROUP BY b.name_of_school";

$result = $conn->query($sql);

$schools = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $school = array(
            'id' => $row['id'],
            'name' => $row['name_of_school'],
            'division_province' => $row['division_province'],
            'school_district_municipality' => $row['school_district_municipality'],
            'beis_id' => $row['beis_id'],
            'supervisor_principal_name' => $row['supervisor_principal_name'],
            'barangay_name' => $row['barangay_name'],
            'contact_number' => $row['contact_number'] ?: 'N/A',
            'school_address' => $row['school_address'] ?: 'N/A',
            'total_beneficiaries' => $row['total_beneficiaries']
        );

        // Use user's barangay_name if it's available and not 'N/A'
        if ($row['user_barangay_name'] && $row['user_barangay_name'] !== 'N/A') {
            $school['barangay_name'] = $row['user_barangay_name'];
        }

        $schools[] = $school;
    }
} else {
    echo "No schools found.";
    exit;
}

$conn->close();
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <!-- <h2 class="h3 mb-0 page-title">SCHOOL LIST</h2> -->
                </div>
                <div class="col-auto">
                    <!-- Search form -->
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
                        <div class="form-group mr-2">
                            <input type="text" class="form-control" name="search" placeholder="Search School Name" value="<?php echo $search_query; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <!-- <div class="heading1 margin_0">
                            <h2>School Details</h2>
                        </div> -->
                    </div>
                    <div class="table-responsive">
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                                <thead style="color: #fff; background-color: #0971b8;">
                                    <tr>
                                        <th class="text-nowrap">School Name</th>
                                        <th class="text-nowrap">Division/Province</th>
                                        <th class="text-nowrap">School District/Municipality</th>
                                        <th class="text-nowrap">BEIS ID</th>
                                        <th class="text-nowrap">School Address</th>
                                        <th class="text-nowrap">Barangay Name</th>
                                        <th class="text-nowrap">Supervisor/Principal Name</th>
                                        <th class="text-nowrap">Contact Number</th>
                                        <th class="text-nowrap">Total Beneficiaries</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($schools as $school): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($school['name']); ?></td>
                                        <td><?php echo htmlspecialchars($school['division_province']); ?></td>
                                        <td><?php echo htmlspecialchars($school['school_district_municipality']); ?></td>
                                        <td><?php echo htmlspecialchars($school['beis_id']); ?></td>
                                        <td><?php echo htmlspecialchars($school['school_address']); ?></td>
                                        <td><?php echo htmlspecialchars($school['barangay_name']); ?></td>
                                        <td><?php echo htmlspecialchars($school['supervisor_principal_name']); ?></td>
                                        <td><?php echo htmlspecialchars($school['contact_number']); ?></td>
                                        <td><?php echo htmlspecialchars($school['total_beneficiaries']); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Add buttons for generating Excel and PDF -->
    <div class="text-center mt-4">
        <form action="schoollist_pdf_excel.php" method="post" target="_blank" style="display: inline;">
            <input type="hidden" name="action" value="excel">
            <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"> </i>Generate Excel</button>
        </form>
        <form action="schoollist_pdf_excel.php" method="post" target="_blank" style="display: inline;">
            <input type="hidden" name="action" value="pdf">
            <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o"> </i>Generate PDF</button>
        </form>
    </div>
</div>



<br>
<br>





                        <?php
include("accountconnection.php");

// Step 2: Fetch school details from the beneficiaries table based on the search query
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT id, name_of_school, division_province, city_municipality_barangay, school_id_number, name_of_principal, name_of_feeding_focal_person, session_id FROM beneficiaries WHERE name_of_school LIKE '%$search_query%' GROUP BY session_id";
$result = $conn->query($sql);
?>




            <div class="row">
                <?php
                // Loop through fetched data and display school names in clickable cards
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-3">';
                        echo '<a href="school_details.php?id=' . $row["id"] . '" style="text-decoration: none;">'; // Link to another PHP page
                        echo '<div class="card shadow mb-4">';
                        echo '<img src="images/origlogo.jpg" class="card-img-top" alt="School Image" style="height: 250px; object-fit: cover;">'; // Add your image here with CSS for height and object-fit
                        echo '<div class="card-body">';
                        echo '<strong class="card-title my-0">' . $row["name_of_school"] . '</strong>';
                        echo '</div>'; // ./card-body
                        echo '</div>'; // ./card
                        echo '</a>';
                        echo '</div>'; // .col-md-3
                    }
                } else {
                    echo "No results found";
                }
                ?>
            </div> <!-- ./row -->
        </div> <!-- ./col-12 -->
    </div> <!-- ./row justify-content-center -->
</div> <!-- ./container-fluid -->

<?php
// Close the database connection
$conn->close();
?>





<script>
    function printTable() {
        var tableContent = document.querySelector('#print-content .table-responsive').innerHTML;
        var printWindow = window.open('', '', 'height=600,width=1000');
        printWindow.document.write(`
            <html>
                <head>
                    <title>School Details</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }
                        .table th, .table td {
                            border: 1px solid #dee2e6;
                            padding: 12px;
                            text-align: left;
                        }
                        .table thead th {
                            background-color: #343a40;
                            color: #fff;
                            font-weight: bold;
                        }
                        .table tbody tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }
                        @media print {
                            .btn {
                                display: none;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            ${tableContent}
                        </table>
                    </div>
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    }
</script>















                       
    </div> <!-- / .col-md-12 -->
</div> <!-- end section -->
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
