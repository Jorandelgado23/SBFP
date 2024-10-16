<?php
   include'user_topNav.php';
   ?>
   
<div class="col-lg-12 grid-margin stretch-card py-4 px-0">
   <div class="card">
      <div class="card-body">
         <div class="mb-3 p-2">
            <div class="d-flex justify-content-between align-items-center mb-0">
               <h4 class="card-title">Student Nutritional Status List <span>Kindergarten</span></h4>
               <p class="card-description mb-0">School Year: <code>2024-2025</code></p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
            <div class="form-group">
    <label>Section: </label>
    <select class="js-example-basic-single w-100" id="section" name="section_id" required>
    <?php
// Assuming you have a database connection established
 $conn = new mysqli('localhost', 'root', '', 'sbfp');

// SQL query to select sections for grade_id 1
$section_sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 1";

// Execute the query
$section_result = $conn->query($section_sql);

// Check if sections are found
if ($section_result->num_rows > 0) {
    // Display sections
    while ($row = $section_result->fetch_assoc()) {
        echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
    }
} else {
    // Display message if no sections are found
    echo "<option value=''>No sections available for grade 1</option>";
}

// Close the database connection
$conn->close();
?>
    </select>
</div>
               <p class="card-description pb-4">Date of Weighing: <code>12-10-2024</code></p>
            </div>
         </div>
         <div class="d-sm-flex align-items-center justify-content-between border-bottom pt-2 pb-3">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
   <a class="nav-link" id="home-tab" data-bs-toggle="modal" data-bs-target="#weighingSessionModal" role="tab" aria-controls="overview" aria-selected="false">+ Weighing Session</a>
</li>
               <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="false">+ Students</a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">SNS List</a>
               </li> -->
               <!-- <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">SNS Summary</a>
               </li> -->
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="snsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  SNS History
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="snsDropdown">
                     <li><a class="dropdown-item" href="#sns-list" role="tab" aria-selected="false">SNS List</a></li>
                     <li><a class="dropdown-item" href="#sns-summary" role="tab" aria-selected="false">SNS Summary</a></li>
                  </ul>
               </li>
            </ul>
            <div>
               <div class="btn-wrapper">
                  <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Download</a>
               </div>
            </div>
         </div>
         <div class="table-responsive pt-3">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th> # </th>
                     <th> Name </th>
                     <th> Birthday(dd/mm/yy) </th>
                     <th> Weight(kg) </th>
                     <th> Height(meters) </th>
                     <th> Sex </th>
                     <th> Height2(m2) </th>
                     <th> Age(y,m) </th>
                     <th> BMI </th>
                     <th> Nutritional Status </th>
                     <th> Height-for-Age </th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>






<!-- MODALS -->
<!-- Modal Structure -->
<div class="modal fade" id="weighingSessionModal" tabindex="-1" aria-labelledby="weighingSessionModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="weighingSessionModalLabel">Create Weighing Session for Kindergarten</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="weighing_sessions.php" method="POST">
               <!-- School Year -->
               <div class="mb-3">
                  <label for="schoolYear" class="form-label">School Year</label>
                  <select class="form-select" id="schoolYear" name="school_year" required>
                     <?php
                        $currentYear = date('Y');
                        for ($i = 0; $i <= 5; $i++) {
                            $nextYear = $currentYear + $i;
                            $schoolYear = $nextYear . '-' . ($nextYear + 1);
                            echo "<option value=\"$schoolYear\">$schoolYear</option>";
                        }
                     ?>
                  </select>
               </div>

               <!-- Weighing Date -->
               <div class="mb-3">
                  <label for="weighingDate" class="form-label">Weighing Date</label>
                  <input type="date" class="form-control" id="weighingDate" name="weighing_date" required>
               </div>

<!-- Section Selection -->
<div class="mb-3">
    <label for="section" class="form-label">Section</label>
    <select class="form-control" id="section" name="section_id" required>
        <?php
        // Assuming you have a database connection established
        $conn = new mysqli('localhost', 'root', '', 'sbfp');
        $section_sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 1";
        $section_result = $conn->query($section_sql);

        if ($section_result->num_rows > 0) {
            echo "<option value=''>Select a section</option>";
            while ($row = $section_result->fetch_assoc()) {
                echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
            }
        } else {
            echo "<option value=''>No sections available for grade 1</option>";
        }

        $conn->close();
        ?>
    </select>
</div>
               <button type="submit" class="btn btn-primary">Create Weighing Session</button>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal Structure -->
<div id="responseModal" class="modal fade" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="responseModalLabel">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
            </div>
        </div>
    </div>
</div>






<!-- PHP BACK END OF THIS MODAL -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli ('localhost', 'root', '', 'sbfp');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $school_year = $_POST['school_year'];
    $weighing_date = $_POST['weighing_date'];
    $section_id = $_POST['section_id']; // Get the selected section ID
    
    // Get the Kindergarten grade ID (which is 1)
    $grade_id = 1;

    // Check if the school year already exists
    $check_year_sql = "SELECT school_year_id FROM school_years WHERE school_year = ?";
    $check_year_stmt = $conn->prepare($check_year_sql);
    $check_year_stmt->bind_param("s", $school_year);
    $check_year_stmt->execute();
    $check_year_stmt->store_result();

    if ($check_year_stmt->num_rows > 0) {
        $check_year_stmt->bind_result($school_year_id);
        $check_year_stmt->fetch();
    } else {
        // Insert the new school year
        $insert_year_sql = "INSERT INTO school_years (school_year) VALUES (?)";
        $insert_year_stmt = $conn->prepare($insert_year_sql);
        $insert_year_stmt->bind_param("s", $school_year);
        $insert_year_stmt->execute();
        $school_year_id = $insert_year_stmt->insert_id; // Get the new school year ID
        $insert_year_stmt->close();
    }
    $check_year_stmt->close();

    // Check if students are linked to the current weighing session
    $check_students_sql = "SELECT * FROM students WHERE section_id = ? AND weighing_session_id IS NOT NULL";
    $check_students_stmt = $conn->prepare($check_students_sql);
    $check_students_stmt->bind_param("i", $section_id);
    $check_students_stmt->execute();
    $check_students_stmt->store_result();

    if ($check_students_stmt->num_rows === 0) {
        // Replace the current weighing session
        $replace_sql = "UPDATE weighing_sessions SET school_year_id = ?, session_date = ?, grade_id = ?, section_id = ? WHERE section_id = ?";
        $replace_stmt = $conn->prepare($replace_sql);
        $replace_stmt->bind_param("ssiis", $school_year_id, $weighing_date, $grade_id, $section_id, $section_id);
        $replace_stmt->execute();
        $message = "Weighing session replaced successfully!";
    } else {
        // Insert the new weighing session
        $sql = "INSERT INTO weighing_sessions (school_year_id, session_date, grade_id, section_id)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $school_year_id, $weighing_date, $grade_id, $section_id);
        $stmt->execute();
        $message = "Weighing session created successfully!";
    }

    if (empty($_POST['section_id'])) {
        echo "<script>document.getElementById('sectionError').innerHTML = 'No sections available.';</script>";
    } else {
        // Proceed with form submission
    }
    $stmt->close();
    $conn->close();
    
    // Output JavaScript to show the modal
    echo "
        <script>
            var modal = new bootstrap.Modal(document.getElementById('responseModal'), {});
            document.getElementById('modalMessage').innerText = '$message';
            modal.show();
            setTimeout(function() {
                modal.hide();
            }, 2000); // Hide modal after 2 seconds
        </script>
    ";
}
?>

















<!-- END OF MODALSSSSSSSS -->


<?php include'user_botNav.php';
   ?>