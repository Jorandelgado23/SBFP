<?php
session_start(); // Make sure to start the session at the beginning
require 'vendor/autoload.php'; // Include the DOMPDF autoload file

use Dompdf\Dompdf;
use Dompdf\Options;

if (!isset($_SESSION['email'])) {
    // Redirect to login if the user is not logged in
    header("Location: login.php");
    exit();
}

include("accountconnection.php");

// Retrieve session_id of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id);
$stmt->fetch();
$stmt->close();
// Fetch additional details for the top of the table from the users table
$sql_user = "SELECT `Division/Province` AS division_province, 
                    supervisor_principal_name AS name_of_principal, 
                    barangay_name AS city_municipality_barangay, 
                    CONCAT(firstname, ' ', lastname) AS name_of_feeding_focal_person, 
                    school_name AS name_of_school, 
                    beis_id AS school_id_number 
             FROM users 
             WHERE session_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("s", $session_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result()->fetch_assoc();

if (!$result_user) {
    die("No user found for the given session ID.");
}

// Extract user details
$division_province = $result_user['division_province'];
$name_of_principal = $result_user['name_of_principal'];
$city_municipality_barangay = $result_user['city_municipality_barangay'];
$name_of_feeding_focal_person = $result_user['name_of_feeding_focal_person'];
$name_of_school = $result_user['name_of_school'];
$school_id_number = $result_user['school_id_number'];

// Fetch submitted data for the logged-in user
$sql = "SELECT * FROM beneficiary_details WHERE session_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch attendance records for the current month
$current_month = date('Y-m'); // Get current year and month
$attendance_sql = "SELECT beneficiary_id, meal_served, DAY(attendance_date) as day
                   FROM beneficiary_attendance
                   WHERE attendance_date LIKE ? AND beneficiary_id IN 
                   (SELECT id FROM beneficiary_details WHERE session_id = ?)";

$attendance_stmt = $conn->prepare($attendance_sql);

// Use variables for binding
$month_like = $current_month . '%'; // Create a variable for the LIKE clause
$attendance_stmt->bind_param("ss", $month_like, $session_id); // Now bind the variables
$attendance_stmt->execute();
$attendance_result = $attendance_stmt->get_result();

// Create an array to hold meal served data
$meal_data = [];
while ($row = $attendance_result->fetch_assoc()) {
    $meal_data[$row['beneficiary_id']][$row['day']] = $row['meal_served'];
}

// Get the current year
$currentYear = date('Y');

// Fetch and encode the logos
$leftLogoPath = 'images/LOGO.png';
$rightLogoPath = 'images/logo/semilogo.png';

$leftLogoBase64 = @base64_encode(file_get_contents($leftLogoPath));
$rightLogoBase64 = @base64_encode(file_get_contents($rightLogoPath));

// Optional error handling for logos (fail gracefully)
if (!$leftLogoBase64 || !$rightLogoBase64) {
    $leftLogoBase64 = $rightLogoBase64 = '';
}

// Generate PDF
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

// Start output buffering
ob_start(); ?>
   <!-- Logo and Header Section -->
   <table style="width: 100%;">
        <tr>
            <td style="text-align: left; width: 15%;">
                <img src="data:image/png;base64,<?php echo $leftLogoBase64; ?>" alt="Left Logo" style="width: 100px;">
            </td>
            <td style="text-align: center; width: 70%;">
                <h5>SCHOOL-BASED FEEDING PROGRAM </h5>
                <h4>FOR THE MONTH OF <?php echo strtoupper(date('F')); ?> , SY <?php echo $currentYear; ?></h4>


            </td>
            <td style="text-align: right; width: 15%;">
                <img src="data:image/png;base64,<?php echo $rightLogoBase64; ?>" alt="Right Logo" style="width: 100px;">
            </td>
        </tr>
    </table>
    <br>

    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="text-align: left;">
                <strong>Region ____________________________</strong><br>
                <strong>Division ___________________________</strong><br>
                <strong>District ___________________________</strong><br>
            </td>
            <td style="text-align: right;">
                <strong>School:</strong> <?php echo htmlspecialchars($name_of_school); ?><br>
                <strong>Grade: __________ Section _____________________</strong><br>
                <strong>School  ID Number:</strong> <?php echo htmlspecialchars($school_id_number); ?><br>
            </td>
        </tr>
    </table>

    <!-- Table Section -->
    <div style="font-family: Arial;">
        <div>
            <table border="1" cellpadding="1" cellspacing="0" style="width: 100%; border-collapse: collapse; border-color: black;">
                <thead>
                    <tr>
                        <th rowspan="3" style="border: 1px solid black;">Name of Pupil</th>
                        <th colspan="31" style="border: 1px solid black; text-align: center;">Actual Feeding</th>
                        <th colspan="3" style="border: 1px solid black; text-align: center;">ATTENDANCE</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 31; $i++) { echo "<th style='border: 1px solid black;'></th>"; } ?>
                        <th rowspan="2" style="border: 1px solid black; text-align: center;">No. of Days Present (A)</th>
                        <th rowspan="2" style="border: 1px solid black; text-align: center;">No. of Feeding Days (B)</th>
                        <th rowspan="2" style="border: 1px solid black; text-align: center;">Percentage (A/B) * 100</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 31; $i++) { echo "<th style='border: 1px solid black;'>$i</th>"; } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $counter = 1; // Initialize counter for student numbering
                        // Loop through each student
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            // Display student name with numbering
                            echo '<td style="border: 1px solid black;">' . $counter++ . '. ' . htmlspecialchars($row['name']) . '</td>'; // Numbering included
                            
                            $days_present = 0; // Track the number of present days

                            // Display 31 columns for feeding days
                            for ($i = 1; $i <= 31; $i++) {
                                // Check if meal data exists for the given day
                                if (isset($meal_data[$row['id']][$i])) {
                                    $meal_served = $meal_data[$row['id']][$i];
                                    echo '<td style="border: 1px solid black;">' . htmlspecialchars($meal_served) . '</td>'; // Display meal served
                                    if ($meal_served !== 'A') {
                                        $days_present++; // Increment for every non-absent day
                                    }
                                } else {
                                    echo '<td style="border: 1px solid black;"></td>'; // Empty cell if no meal data
                                }
                            }
                            echo '<td style="border: 1px solid black;">' . $days_present . '</td>'; // Total number of days present
                            echo '<td style="border: 1px solid black;"></td>'; // Placeholder for total feeding days
                            echo '<td style="border: 1px solid black;"></td>'; // Placeholder for percentage
                            echo '</tr>';
                        }

                        // Total Row for Meal Count
                        echo '<tr>';
                        echo '<td style="border: 1px solid black; text-align: right;">Total:</td>';
                        for ($i = 1; $i <= 31; $i++) {
                            $daily_total = 0;

                            // Loop through meal_data to sum meals served for each day
                            foreach ($meal_data as $beneficiary_id => $meals) {
                                if (isset($meals[$i]) && $meals[$i] !== 'A') {
                                    $daily_total++;
                                }
                            }

                            // Display the total meals served for each day, or leave empty if no meals served
                            echo '<td style="border: 1px solid black; text-align: center;">' . ($daily_total > 0 ? $daily_total : '') . '</td>';
                        }

                        // No average calculation
                        echo '<td colspan="2" style="border: 1px solid black; text-align: right;">Average:</td>'; // Display average label without calculation
                        echo '<td></td>'; // Empty cell for total present days
                        echo '</tr>';

                    } else {
                        // Placeholder rows if no data is found
                        for ($i = 1; $i <= 25; $i++) {
                            echo '<tr>';
                            echo '<td style="border: 1px solid black;">' . $i . '. Pupil ' . $i . '</td>'; // Numbering included for placeholder pupils
                            echo '<td colspan="31" style="border: 1px solid black;"></td>';
                            echo '<td>0</td>';
                            echo '<td>0</td>';
                            echo '<td>0%</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
// Get the content of the output buffer
$html = ob_get_clean();

// Load the HTML content into DOMPDF
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("feeding_attendance.pdf", ["Attachment" => false]);

// Close the database connection
$conn->close();
?>
