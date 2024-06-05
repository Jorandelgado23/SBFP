
<div class="content">
        <?php include('base.php'); ?>
</div>


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
                <!-- <tr>
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
                </thead> -->
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