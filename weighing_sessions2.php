<?php
   include'user_topNav.php';
   ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user_session_id for the logged-in user
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_session_id);
    $stmt->fetch();
    $stmt->close();
} else {
    die("Error: User email not found in session.");
}

// Check if the success parameter is set in the URL
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $_SESSION['success'] = true; // Set a session variable
}

// Check if there's a success message to display
$showSuccessModal = isset($_SESSION['success']);
if ($showSuccessModal) {
    unset($_SESSION['success']); // Clear the session variable to avoid showing it again on refresh
}

// Get the first section for grade_id = 1
$first_section_sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 3 ORDER BY section_id LIMIT 1";
$first_section_result = $conn->query($first_section_sql);

$first_section = null;
$school_year = "N/A"; // Default value if not found
$weighing_date = "N/A"; // Default value if not found

if ($first_section_result->num_rows > 0) {
    $first_section = $first_section_result->fetch_assoc();
    $section_id = $first_section['section_id'];

    // Now get the latest weighing session for this section and user
    $latest_weighing_sql = "
        SELECT ws.session_date, ws.school_year 
        FROM weighing_sessions ws 
        WHERE ws.section_id = ? AND ws.user_session_id = ?
        ORDER BY ws.session_date DESC 
        LIMIT 1";

    $latest_weighing_stmt = $conn->prepare($latest_weighing_sql);
    $latest_weighing_stmt->bind_param("is", $section_id, $user_session_id);
    $latest_weighing_stmt->execute();
    $latest_weighing_stmt->bind_result($weighing_date, $school_year);
    $latest_weighing_stmt->fetch();
    $latest_weighing_stmt->close();
}

// Close the database connection
$conn->close();
?>


<div class="col-lg-12 grid-margin stretch-card py-4 px-0">
   <div class="card">
      <div class="card-body">
         <div class="mb-3 p-2">
            <div class="d-flex justify-content-between align-items-center mb-0">
               <h4 class="card-title">Student Nutritional Status List <span>Kindergarten</span></h4>
               <!-- HTML Part -->
               <p class="card-description mb-0">School Year: <code id="schoolYear"><?php echo htmlspecialchars($school_year); ?></code></p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
               <div class="form-group">
                  <label>Section: </label>
                  <select class="js-example-basic-single w-100" id="section" name="section_id" required onchange="updateWeighingSessionDetails()">
                  <?php

                     // Database connection
                     $conn = new mysqli('localhost', 'root', '', 'sbfp');

                     // Check for connection errors
                     if ($conn->connect_error) {
                         die("Connection failed: " . $conn->connect_error);
                     }

                     // Get the session_id of the logged-in user
                     $email = $_SESSION['email']; // Assuming email is stored in session after login
                     $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
                     $stmt->bind_param("s", $email);
                     $stmt->execute();
                     $stmt->bind_result($session_id);
                     $stmt->fetch();
                     $stmt->close();

                     // Fetch sections from the database based on session_id
                     $sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 3 AND session_id = ?";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("s", $session_id);
                     $stmt->execute();
                     $result = $stmt->get_result();

                     // Display sections
                     if ($result->num_rows > 0) {
                         // Display each section as an option
                         while ($row = $result->fetch_assoc()) {
                             echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
                         }
                     } else {
                         echo "<option value=''>No sections available for Kinder</option>";
                     }

                     // Close the database connection
                     $conn->close();
                  ?>
                  </select>
               </div>
               <script>
                  // Function to update the weighing session details based on the selected section
                  function updateWeighingSessionDetails() {
                      const sectionId = document.getElementById('section').value;
                  
                      // Fetch the latest weighing session for the selected section
                      fetch(`get_weighing_session.php?section_id=${sectionId}`)
                          .then(response => response.json())
                          .then(data => {
                              // Update the school year and weighing date on the page
                              document.getElementById('schoolYear').innerText = data.school_year !== 'N/A' ? data.school_year : 'N/A';
                              document.getElementById('weighingDate').innerText = data.weighing_date !== 'N/A' ? data.weighing_date : 'N/A';
                              
                              // Show message if no session is found
                              const message = (data.school_year === 'N/A' && data.weighing_date === 'N/A') 
                                  ? 'No weighing session available for this section.' 
                                  : '';
                              document.getElementById('sessionMessage').innerText = message;
                          })
                          .catch(error => console.error('Error fetching weighing session:', error));
                  }
                  
                  // Trigger the update for the first section on page load
                  document.addEventListener('DOMContentLoaded', function() {
                  // Call the backend to get the first section's latest weighing session details
                  fetch(`get_weighing_session.php?section_id=${first_section_id}`)
                      .then(response => response.json())
                      .then(data => {
                          // Update the school year and weighing date for the first section
                          document.getElementById('schoolYear').innerText = data.school_year !== 'N/A' ? data.school_year : 'N/A';
                          document.getElementById('weighingDate').innerText = data.weighing_date !== 'N/A' ? data.weighing_date : 'N/A';
                      })
                      .catch(error => console.error('Error fetching weighing session for first section:', error));
                  });
                  
               </script>
               <p class="card-description pb-4">Date of Weighing: <code id="weighingDate"><?php echo htmlspecialchars($weighing_date); ?></code></p>
            </div>
         </div>
         <div class="d-sm-flex align-items-center justify-content-between border-bottom pt-2 pb-3">
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-bs-toggle="modal" data-bs-target="#weighingSessionModal" role="tab" aria-controls="overview" aria-selected="false">+ Weighing Session</a>
               </li>
               <li class="nav-item">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addStudentModal">+ Add Student</a>
</li>

               <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="sectionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Sections
    </a>
    <ul class="dropdown-menu" aria-labelledby="sectionDropdown">
        <li>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addSectionModal" href="#">+ Add Section</a>
        </li>
        <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteSectionsModal">Delete Sections</a>
        </li>
    </ul>
</li>



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
         <?php


// Database connection
$conn = new mysqli('localhost', 'root', '', 'sbfp');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the session_id of the logged-in user
$email = $_SESSION['email']; // Assuming email is stored in session after login
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();

// Fetch students from the database based on the session_id
$sql = "SELECT * FROM students WHERE session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

echo '<div class="table-responsive pt-3">
         <table class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th> # </th>
                  <th> Name </th>
                  <th> Birthday (dd/mm/yy) </th>
                  <th> Weight (kg) </th>
                  <th> Height (cm) </th>
                  <th> Gender </th>
                  <th> Age (y,m) </th>
                  <th> BMI </th>
                  <th> Nutritional Status (BMI) </th>
                  <th> Height-for-Age </th>
                  <th> Actions </th>
               </tr>
            </thead>
            <tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Age calculation
        $birthDate = new DateTime($row['birthday']);
        $today = new DateTime('today');
        $age = $today->diff($birthDate);
        $ageFormatted = $age->y . " years, " . $age->m . " months"; // age in years and months

        // Convert height to cm (assuming it's stored in meters)
        $heightCm = $row['height'] * 100; // Convert meters to cm

        // Calculate BMI (Height in meters needed for BMI calculation)
        $heightInMeters = $heightCm / 100; // Convert cm to meters for BMI calculation
        $bmi = $row['weight'] / ($heightInMeters * $heightInMeters);

        // Nutritional Status Logic (BMI Ranges)
        $nutritionalStatusBMI = '';
        if ($bmi < 16) {
            $nutritionalStatusBMI = 'Severely Wasted';
        } elseif ($bmi >= 16 && $bmi < 18.5) {
            $nutritionalStatusBMI = 'Wasted';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $nutritionalStatusBMI = 'Normal';
        } elseif ($bmi >= 25 && $bmi < 30) {
            $nutritionalStatusBMI = 'Overweight';
        } else {
            $nutritionalStatusBMI = 'Obese';
        }

        // Height-for-Age Logic (based on age in months and height thresholds)
        $heightForAge = 'N/A'; // Default value if no threshold data
        $ageMonths = ($age->y * 12) + $age->m; // Convert age to months

        // Example thresholds for height-for-age based on age ranges
        if ($ageMonths < 60 && $heightCm < 90) {
            $heightForAge = 'Stunted';
        } elseif ($ageMonths >= 60 && $ageMonths < 120 && $heightCm < 115) {
            $heightForAge = 'Stunted';
        } elseif ($ageMonths >= 120 && $heightCm < 130) {
            $heightForAge = 'Stunted';
        } elseif ($ageMonths < 60 && $heightCm >= 110) {
            $heightForAge = 'Tall';
        } elseif ($ageMonths >= 60 && $ageMonths < 120 && $heightCm >= 140) {
            $heightForAge = 'Tall';
        } elseif ($ageMonths >= 120 && $heightCm >= 160) {
            $heightForAge = 'Tall';
        }

        // Format weight and height to remove the decimal places if they are .00
        $formattedWeight = $row['weight'] == (int)$row['weight'] ? (int)$row['weight'] : number_format($row['weight'], 2);
        $formattedHeight = $row['height'] == (int)$row['height'] ? (int)$row['height'] : number_format($row['height'], 2);

        // Output the table row
        echo "<tr>
                <td>{$row['student_id']}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['birthday']}</td>
                <td>{$formattedWeight}</td> <!-- Weight display with formatting -->
                <td>{$formattedHeight}</td> <!-- Height display with formatting -->
                <td>{$row['gender']}</td> <!-- Sex display -->
                <td>{$ageFormatted}</td> <!-- Age calculation -->
                <td>{$row['bmi']}</td> <!-- BMI Calculation -->
                <td>{$nutritionalStatusBMI}</td> <!-- Nutritional Status (BMI) -->
                <td>{$heightForAge}</td> <!-- Height-for-Age Logic -->
                <td>
                    <!-- Add action buttons if needed (e.g., Edit, Delete) -->
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No students found.</td></tr>";
}

echo '</tbody></table></div>'; // Closing the table and div

$conn->close();
?>













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
                        // Start the session to access session data
                        session_start();

                        // Database connection
                        $conn = new mysqli('localhost', 'root', '', 'sbfp');

                        // Check for connection errors
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Get the session_id of the logged-in user
                        $email = $_SESSION['email']; // Assuming email is stored in session after login
                        $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $stmt->bind_result($session_id);
                        $stmt->fetch();
                        $stmt->close();

                        // Fetch sections from the database based on session_id
                        $sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 3 AND session_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $session_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<option value=''>Select a section</option>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No sections available for Kinder</option>";
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
         <p class="text-center text-warning px-3" style="margin-top: 10px;">
            Note: Creating a new weighing session for the same section will replace the existing session if there are no students or weighing records.
         </p>
      </div>
   </div>
</div>




<!-- SUCCESS MODAL -->
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





<!-- ADDING SECTIONS MODAL -->
<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionModalLabel">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSectionForm">
                    <div class="mb-3">
                        <label for="sectionName" class="form-label">Section Name</label>
                        <input type="text" class="form-control" id="sectionName" name="section_name" required>
                        <div id="sectionNameFeedback" class="invalid-feedback" style="display: none;">
                            This section name already exists. Please choose a different one.
                        </div>
                    </div>
                    <p class="text-warning">Note: The section will be created for Grade ID 1.</p>
                    <input type="hidden" name="grade_id" value="1">
                    <button type="submit" class="btn btn-primary">Save Section</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Section added successfully!
            </div>
        </div>
    </div>
</div>



<?php
// your_page.php
if ($showSuccessModal) {
   echo "
   <div class='modal fade' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' aria-hidden='true'>
       <div class='modal-dialog'>
           <div class='modal-content'>
               <div class='modal-header'>
                   <h5 class='modal-title' id='successModalLabel'>Success</h5>
                   <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
               </div>
               <div class='modal-body'>
                   Section added successfully!
               </div>
           </div>
       </div>
   </div>
   <script>
       // Use jQuery to show the modal and hide it after 2 seconds
       $(document).ready(function() {
           $('#successModal').modal('show');
           setTimeout(function() {
               $('#successModal').modal('hide');
           }, 2000); // 2000 milliseconds = 2 seconds
       });
   </script>
   ";
}

// Display the modal (if needed)
// Include the modal code here
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#addSectionForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        $.ajax({
            type: 'POST',
            url: 'add_section.php', // The PHP file that handles the submission
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                if (response.includes("Error:")) {
                    // Show invalid feedback
                    $('#sectionNameFeedback').show();
                } else {
                    // Hide the modal and show success modal
                    $('#addSectionModal').modal('hide');
                    showSuccessModal();
                }
            },
            error: function() {
                alert('Error adding section. Please try again.');
            }
        });
    });

    function showSuccessModal() {
        $('#successModal').modal('show');
        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 2000); // Hide after 2 seconds
    }
});
</script>



<!-- Delete Sections Modal -->
<div class="modal fade" id="deleteSectionsModal" tabindex="-1" aria-labelledby="deleteSectionsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSectionsModalLabel">Delete Sections</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected sections?</p>
                <form id="deleteSectionsForm" method="POST" action="delete_sections.php">
                    <div id="sectionsList">
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'root', '', 'sbfp');

                    // Check for connection errors
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get the session_id of the logged-in user
                    $email = $_SESSION['email']; // Assuming email is stored in session after login
                    $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($session_id);
                    $stmt->fetch();
                    $stmt->close();

                    // Fetch sections from the database based on session_id
                    $sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 3 AND session_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $session_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='section_ids[]' value='{$row['section_id']}' id='section_{$row['section_id']}'>
                                <label class='form-check-label' for='section_{$row['section_id']}'>{$row['section_name']}</label>
                            </div>
                            ";
                        }
                    } else {
                        echo "<p>No sections available.</p>";
                    }

                    $conn->close();
                    ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="deleteSectionsForm">Delete Sections</button>
            </div>
        </div>
    </div>
</div>





<!-- PHP BACK END OF THIS MODAL -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'sbfp');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $school_year = $_POST['school_year'];
    $weighing_date = $_POST['weighing_date'];
    $section_id = $_POST['section_id'];

    // Get the session_id of the logged-in user based on their email
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($user_session_id);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("Error: User email not found in session.");
    }

    // Ensure all form fields are filled
    if (!empty($school_year) && !empty($weighing_date) && !empty($section_id) && !empty($user_session_id)) {
        // Check if there's already a pending weighing session for this section
        $check_session_sql = "
            SELECT session_id 
            FROM weighing_sessions 
            WHERE section_id = ? AND session_date = ? AND school_year = ? AND status = 'pending'
        ";
        $check_session_stmt = $conn->prepare($check_session_sql);
        $check_session_stmt->bind_param("iss", $section_id, $weighing_date, $school_year);
        $check_session_stmt->execute();
        $check_session_stmt->store_result();

        // If a pending session exists, delete it
        if ($check_session_stmt->num_rows > 0) {
            $check_session_stmt->bind_result($existing_session_id);
            $check_session_stmt->fetch();

            $delete_session_sql = "DELETE FROM weighing_sessions WHERE session_id = ?";
            $delete_session_stmt = $conn->prepare($delete_session_sql);
            $delete_session_stmt->bind_param("i", $existing_session_id);
            $delete_session_stmt->execute();
            $delete_session_stmt->close();
        }

        // Insert the new weighing session
        $insert_sql = "
            INSERT INTO weighing_sessions (session_date, school_year, section_id, status, user_session_id) 
            VALUES (?, ?, ?, 'pending', ?)
        ";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssis", $weighing_date, $school_year, $section_id, $user_session_id);
        $insert_stmt->execute();

        // Display success message in modal
        if ($insert_stmt->affected_rows > 0) {
            echo "
                <script>
                    document.getElementById('modalMessage').innerText = 'Weighing session created successfully!';
                    var myModal = new bootstrap.Modal(document.getElementById('responseModal'), {});
                    myModal.show();
                </script>
            ";
        } else {
            echo "
                <script>
                    document.getElementById('modalMessage').innerText = 'Error creating weighing session.';
                    var myModal = new bootstrap.Modal(document.getElementById('responseModal'), {});
                    myModal.show();
                </script>
            ";
        }

        $insert_stmt->close();
        $conn->close();
    } else {
        echo "
            <script>
                document.getElementById('modalMessage').innerText = 'Required form data is missing. Please fill in all fields.';
                var myModal = new bootstrap.Modal(document.getElementById('responseModal'), {});
                myModal.show();
            </script>
        ";
    }
}
?>











<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addStudentForm" action="add_student.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="studentName" name="student_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="birthDate" name="birth_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (kg)</label>
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height (meters)</label>
                        <input type="number" step="0.01" class="form-control" id="height" name="height" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sectionId" class="form-label">Section</label>
                        <select class="form-select" id="sectionId" name="section_id" required>
                            <?php
                            // Start the session to access session data
                            session_start();

                            // Database connection
                            $conn = new mysqli('localhost', 'root', '', 'sbfp');

                            // Check for connection errors
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Get the session_id of the logged-in user
                            $email = $_SESSION['email']; // Assuming email is stored in session after login
                            $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $stmt->bind_result($session_id);
                            $stmt->fetch();
                            $stmt->close();

                                 // Fetch sections from the database based on session_id
                        $sql = "SELECT section_id, section_name FROM sections WHERE grade_id = 3 AND session_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $session_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<option value=''>Select a section</option>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No sections available for Kinder</option>";
                        }

                        $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>



















<!-- END OF MODALSSSSSSSS -->
<?php include'user_botNav.php';
   ?>