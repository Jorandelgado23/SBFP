<?php
// Load Composer's autoloader for DOMPDF
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Check if session_id is provided
if (isset($_GET['session_id']) && isset($_GET['school_year'])) {
    $session_id = $_GET['session_id'];
    $school_year = $_GET['school_year'];

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    // Fetch beneficiary details
    $sql_details = "SELECT name, sex, grade_section, date_of_birth, date_of_weighing, age, 
                           weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, 
                           dewormed, parents_consent_for_milk, participation_in_4ps, 
                           beneficiary_of_sbfp_in_previous_years 
                    FROM beneficiary_details bd 
                    INNER JOIN beneficiaries b ON bd.beneficiary_id = b.id 
                    WHERE b.session_id = ? AND bd.school_year = ?";
    $stmt_details = $conn->prepare($sql_details);
    $stmt_details->bind_param("ss", $session_id, $school_year);
    $stmt_details->execute();
    $result_details = $stmt_details->get_result();
    // Initialize DOMPDF and set options
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);  // Allow remote image loading (optional)
    $dompdf = new Dompdf($options);
    
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

    // Build the HTML structure
    $html = '
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left; width: 15%;">
                <img src="data:image/png;base64,' . $leftLogoBase64 . '" alt="Left Logo" style="width: 100px;">
            </td>
            <td style="text-align: center; width: 70%;">
                <h5>Department of Education</h5>
                <h6>Region 4A</h6>
                <h4>Master List Beneficiaries for School-Based Feeding Program (SY ' . $currentYear . ')</h4>
            </td>
            <td style="text-align: right; width: 15%;">
                <img src="data:image/png;base64,' . $rightLogoBase64 . '" alt="Right Logo" style="width: 100px;">
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="text-align: left;">
                <strong>Division/Province:</strong> ' . $division_province . '<br>
                <strong>City/Municipality/Barangay:</strong> ' . $city_municipality_barangay . '<br>
                <strong>Name of School / School District :</strong> ' . $name_of_school . '<br>
                <strong>School ID Number:</strong> ' . $school_id_number . '
            </td>
            <td style="text-align: right;">
                <strong>Name of Principal:</strong> ' . $name_of_principal . '<br>
                <strong>Name of Feeding Focal Person:</strong> ' . $name_of_feeding_focal_person . '<br>
            </td>
        </tr>
    </table>
    <br>
    <table border="1" cellpadding="1" cellspacing="0" style="width: 60%; border-collapse: collapse; border-color: black;">
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Sex</th>
                <th rowspan="2">Grade/Section</th>
                <th rowspan="2">Date of Birth (MM/DD/YYYY)</th>
                <th rowspan="2">Date of Weighing / Measuring (MM/DD/YYYY)</th>
                <th rowspan="2">Age in Years / Months</th>
                <th rowspan="2">Weight (Kg)</th>
                <th rowspan="2">Height (cm)</th>
                <th rowspan="2">BMI for 6 y.o. and above</th>
                <th colspan="2">Nutritional Status (NS)</th>
                <th rowspan="2">Dewormed? (yes or no)</th>
                <th rowspan="2">Parent\'s consent for milk? (yes or no)</th>
                <th rowspan="2">Participation in 4Ps (yes or no)</th>
                <th rowspan="2">Beneficiary of SBFP in Previous Years (yes or no)</th>
            </tr>
            <tr>
                <th>BMI-A</th>
                <th>HFA</th>
            </tr>
        </thead>
        <tbody>';

    // Row number counter
    $no = 1;

    // Add beneficiary details to the table
    while ($row_details = $result_details->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . $no++ . '</td> <!-- Increment row number -->
                    <td>' . htmlspecialchars($row_details['name']) . '</td>
                    <td>' . htmlspecialchars($row_details['sex']) . '</td>
                    <td>' . htmlspecialchars($row_details['grade_section']) . '</td>
                    <td>' . htmlspecialchars($row_details['date_of_birth']) . '</td>
                    <td>' . htmlspecialchars($row_details['date_of_weighing']) . '</td>
                    <td>' . htmlspecialchars($row_details['age']) . '</td>
                    <td>' . htmlspecialchars($row_details['weight']) . '</td>
                    <td>' . htmlspecialchars($row_details['height']) . '</td>
                    <td>' . htmlspecialchars($row_details['bmi']) . '</td>
                    <td>' . htmlspecialchars($row_details['nutritional_status_bmia']) . '</td>
                    <td>' . htmlspecialchars($row_details['nutritional_status_hfa']) . '</td>
                    <td>' . htmlspecialchars($row_details['dewormed']) . '</td>
                    <td>' . htmlspecialchars($row_details['parents_consent_for_milk']) . '</td>
                    <td>' . htmlspecialchars($row_details['participation_in_4ps']) . '</td>
                    <td>' . htmlspecialchars($row_details['beneficiary_of_sbfp_in_previous_years']) . '</td>
                  </tr>';
    }

    $html .= '</tbody></table>';

    // Add prepared by and approved by sections
    $html .= "
    <table border='0' cellpadding='4' cellspacing='0' style='width: 100%; margin-top: 30px;'>
        <tr>
            <td style='text-align: left; width: 50%;'>
                <strong>Prepared by:</strong> _____________________<br>
                Feeding Focal Person
            </td>
            <td style='text-align: right; width: 50%;'>
                <strong>Approved by:</strong> _____________________<br>
                School Head
            </td>
        </tr>
        <br>
        <strong>Note: This form shall be prepared by the school before the start of feeding to be compiled by the SDO.</strong>
    </table>";


    // Load the HTML into DOMPDF
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation, use A4 or another standard format
    $dompdf->setPaper([0, 0, 900, 500]);

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (for download or preview)
    $dompdf->stream("SBFP_Beneficiaries_List_" . $name_of_school . ".pdf", array("Attachment" => 0));

    // Close the database connection
    $conn->close();
} else {
    echo "Session ID is not provided.";
}
?>
