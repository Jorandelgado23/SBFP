<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="admindashboard.php">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            
              <a href="#dashboard" data-toggle="collapse" aria-expanded="false" >
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text"  href="admindashboard.php">Dashboard</span><span class="sr-only">(current)</span>
              </a>
             
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">SBFP-FORM</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="form1.php"><span class="ml-1 item-text">SBFP-FORM 1</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-typograpy.html"><span class="ml-1 item-text">SBFP-FORM 2</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">SBFP-FORM 3</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">SBFP-FORM 4</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-notification.html"><span class="ml-1 item-text">SBFP-FORM 5</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">SBFP-FORM 6</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">SBFP-FORM 7</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-progress.html"><span class="ml-1 item-text">SBFP-FORM 8</span></a>
                </li>
              </ul>
            </li>
           
          </ul>
          </ul>
        

          

            <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="adschoollist.php">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">School List</span>
              </a>
            </li>
            <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adbeneficiaries.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Beneficiaries</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adaccountmanagement.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Account Management</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adanalytics.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Analytics</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="adsettings.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Settings</span>
                </a>
              </li>

              <ul class="navbar-nav flex-fill w-100 mb-2">
              <li class="nav-item w-100">
                <a class="nav-link" href="archieves.php">
                  <i class="fe fe-calendar fe-16"></i>
                  <span class="ml-3 item-text">Archieves</span>
                </a>
              </li>

          </div>
                    
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-4">
                <div class="col">
                  <h2 class="h3 mb-0 page-title">ACCOUNT MANAGEMENT</h2>
                </div>
                <div class="col-auto">
                  <!-- <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button> -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal"><span class="fe fe-filter fe-12 mr-2"></span>Create</button>
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
                        <input type="text" class="form-control" id="createRole" name="role" required>
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
              <!-- table -->
              <!-- <div class="card shadow">
                <div class="card-body">
                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="all2">
                            <label class="custom-control-label" for="all2"></label>
                          </div>
                        </th>
                        <th>ID</th>
                        <th>User</th>
                        <th>Company</th>
                        <th>Country</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2474">
                            <label class="custom-control-label" for="2474"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-3.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Brown, Asher D.</strong></p>
                          <small class="mb-0 text-muted">2474</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Accumsan Consulting</p>
                          <small class="mb-0 text-muted">Ap #331-7123 Lobortis Avenue</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(958) 421-0798</a></p>
                          <small class="mb-0 text-muted">Nigeria</small>
                        </td>
                        <td class="text-muted">13/09/2020</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2786">
                            <label class="custom-control-label" for="2786"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Leblanc, Yoshio V.</strong></p>
                          <small class="mb-0 text-muted">2786</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Fringilla Ornare Placerat Consulting</p>
                          <small class="mb-0 text-muted">287-8300 Nisl. St</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(899) 881-3833</a></p>
                          <small class="mb-0 text-muted">Papua New Guinea</small>
                        </td>
                        <td class="text-muted">04/05/2019</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2747">
                            <label class="custom-control-label" for="2747"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-2.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Hester, Nissim L.</strong></p>
                          <small class="mb-0 text-muted">2747</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Tristique Ltd</p>
                          <small class="mb-0 text-muted">4577 Cras St.</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(977) 220-6518</a></p>
                          <small class="mb-0 text-muted">Central African Republic</small>
                        </td>
                        <td class="text-muted">21/08/2019</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2639">
                            <label class="custom-control-label" for="2639"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-4.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Gardner, Leigh S.</strong></p>
                          <small class="mb-0 text-muted">2639</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Orci Luctus Et Inc.</p>
                          <small class="mb-0 text-muted">P.O. Box 228, 7512 Lectus Ave</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(537) 315-1481</a></p>
                          <small class="mb-0 text-muted">United Kingdom</small>
                        </td>
                        <td class="text-muted">04/08/2019</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2238">
                            <label class="custom-control-label" for="2238"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-5.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Higgins, Uriah L.</strong></p>
                          <small class="mb-0 text-muted">2238</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Sit Amet Lorem Industries</p>
                          <small class="mb-0 text-muted">Ap #377-5357 Sed Road</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(238) 386-0247</a></p>
                          <small class="mb-0 text-muted">Canada</small>
                        </td>
                        <td class="text-muted">26/07/2020</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2152">
                            <label class="custom-control-label" for="2152"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-6.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Wheeler, Ralph F.</strong></p>
                          <small class="mb-0 text-muted">2152</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Suspendisse LLC</p>
                          <small class="mb-0 text-muted">Ap #410-5363 Non, Avenue</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(587) 675-3258</a></p>
                          <small class="mb-0 text-muted">Chad</small>
                        </td>
                        <td class="text-muted">11/09/2019</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="2488">
                            <label class="custom-control-label" for="2488"></label>
                          </div>
                        </td>
                        <td>
                          <div class="avatar avatar-sm">
                            <img src="./assets/avatars/face-7.jpg" alt="..." class="avatar-img rounded-circle">
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><strong>Kelley, Sonya Y.</strong></p>
                          <small class="mb-0 text-muted">2488</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted">Dolor Incorporated</p>
                          <small class="mb-0 text-muted">8250 Molestie St.</small>
                        </td>
                        <td>
                          <p class="mb-0 text-muted"><a href="#" class="text-muted">(934) 582-9495</a></p>
                          <small class="mb-0 text-muted">British Indian Ocean Territory</small>
                        </td>
                        <td class="text-muted">30/03/2021</td>
                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted sr-only">Action</span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Remove</a>
                            <a class="dropdown-item" href="#">Assign</a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> -->

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

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body"> 
            <table class="table table-borderless table-hover">
                <thead>
                <tr>
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="all2">
                            <label class="custom-control-label" for="all2"></label>
                        </div>
                    </th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Birthday</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
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

                </tbody>
            </table>
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
                        <input type="text" class="form-control" id="editRole" name="role" required>
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




              <nav aria-label="Table Paging" class="my-3">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>