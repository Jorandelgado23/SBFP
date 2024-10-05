<?php
// Start session and check user login status
session_start();
if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch submitted data (beneficiary details) for the logged-in user's session
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBFP Attendance System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Beneficiary Attendance for SBFP</h2>

    <!-- Attendance Form -->
    <form method="POST" action="submit_attendance.php">
        <div class="form-group">
            <label for="attendance_date">Select Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Beneficiary Name</th>
                    <th>Grade & Section</th>
                    <th>Status (Present/Absent)</th>
                    <th>Meal Served</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['grade_section'] ?></td>
                    <td>
                        <select name="status[<?= $row['id'] ?>]" class="form-control" required>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>
                    <td>
                        <select name="meal_served[<?= $row['id'] ?>]" class="form-control" required>
                            <option value="Hot Meal">Hot Meal</option>
                            <option value="Milk">Milk</option>
                            <option value="Both">Both</option>
                        </select>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>

</div>

<?php
// Close the database connection
$conn->close();
?>

<!-- JS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



<?php

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch attendance records for a specific date and session_id
$date_filter = isset($_POST['date_filter']) ? $_POST['date_filter'] : date('Y-m-d');

$sql = "SELECT bd.name, bd.grade_section, ba.status, ba.meal_served, ba.attendance_date 
        FROM beneficiary_attendance ba
        JOIN beneficiary_details bd ON ba.beneficiary_id = bd.id
        WHERE ba.attendance_date = ? AND bd.session_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $date_filter, $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Attendance Records</h2>

    <!-- Date Filter Form -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="date_filter">Select Date to View Attendance:</label>
            <input type="date" name="date_filter" id="date_filter" class="form-control" value="<?= $date_filter ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">View Attendance</button>
    </form>

    <!-- Attendance Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Grade & Section</th>
                <th>Status</th>
                <th>Meal Served</th>
                <th>Attendance Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['grade_section'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['meal_served'] ?></td>
                <td><?= $row['attendance_date'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
$conn->close();
?>

<!-- JS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>






<?php
// Start session and check user login status

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch attendance statistics (count of absences) for each beneficiary associated with the session_id
$sql = "SELECT bd.name, bd.grade_section, COUNT(ba.status) AS absences
        FROM beneficiary_details bd
        LEFT JOIN beneficiary_attendance ba ON bd.id = ba.beneficiary_id
        WHERE ba.status = 'Absent' AND bd.session_id = ?
        GROUP BY bd.id
        HAVING absences > 0";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absence Statistics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Beneficiary Absence Statistics</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Beneficiary Name</th>
                <th>Grade & Section</th>
                <th>Number of Absences</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['grade_section'] ?></td>
                <td><?= $row['absences'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
$conn->close();
?>

<!-- JS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>











<?php

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
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

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch submitted data for the logged-in user
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch attendance records for the current month
$current_month = date('Y-m'); // Get current year and month
$attendance_sql = "SELECT beneficiary_id, status, meal_served, DAY(attendance_date) as day
                   FROM beneficiary_attendance
                   WHERE attendance_date LIKE ? AND beneficiary_id IN 
                   (SELECT id FROM beneficiary_details WHERE session_id = ?)";

$attendance_stmt = $conn->prepare($attendance_sql);

// Use variables for binding
$month_like = $current_month . '%'; // Create a variable for the LIKE clause
$attendance_stmt->bind_param("ss", $month_like, $session_id); // Now bind the variables
$attendance_stmt->execute();
$attendance_result = $attendance_stmt->get_result();

// Create an array to hold attendance data
$attendance_data = [];
while ($row = $attendance_result->fetch_assoc()) {
    $attendance_data[$row['beneficiary_id']][$row['day']] = [
        'status' => $row['status'],
        'meal_served' => $row['meal_served']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBFP Attendance System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Feeding Attendance Table</h2>

    <!-- Table Section -->
    <div class="col-md-13">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Feeding Attendance Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">Name of Pupil</th>
                                <th colspan="31">Actual Feeding</th>
                            </tr>
                            <tr>
                                <!-- Days of the month (1 to 31) -->
                                <?php for ($i = 1; $i <= 31; $i++) { echo "<th>$i</th>"; } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Loop through each student
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    // Display student name
                                    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                    
                                    // Display 31 columns for feeding days
                                    for ($i = 1; $i <= 31; $i++) {
                                        // Check if attendance data exists for the given day
                                        if (isset($attendance_data[$row['id']][$i])) {
                                            $status = $attendance_data[$row['id']][$i]['status'];
                                            echo '<td>' . htmlspecialchars($status) . '</td>'; // Display status
                                        } else {
                                            echo '<td></td>'; // Empty cell if no attendance data
                                        }
                                    }
                                    echo '</tr>';
                                }
                            } else {
                                // Placeholder rows if no data is found
                                for ($i = 1; $i <= 25; $i++) {
                                    echo '<tr>';
                                    echo '<td>Pupil ' . $i . '</td>';
                                    echo '<td colspan="31"></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                            <!-- Total row with non-editable boxes -->
                            <tr>
                                <td>Total</td>
                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                    <td style="text-align: center;"></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>

<!-- JS and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
