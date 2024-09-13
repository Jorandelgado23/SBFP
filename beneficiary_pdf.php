<?php
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch additional details for the top of the table from the users table
    $sql_user = "SELECT `Division/Province` AS division_province, supervisor_principal_name AS name_of_principal, barangay_name AS city_municipality_barangay, CONCAT(firstname, ' ', lastname) AS name_of_feeding_focal_person, school_name AS name_of_school, beis_id AS school_id_number 
                 FROM users 
                 WHERE session_id = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $session_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result()->fetch_assoc();

    if (!$result_user) {
        die("No user found for the given session ID.");
    }

    $division_province = $result_user['division_province'];
    $name_of_principal = $result_user['name_of_principal'];
    $city_municipality_barangay = $result_user['city_municipality_barangay'];
    $name_of_feeding_focal_person = $result_user['name_of_feeding_focal_person'];
    $name_of_school = $result_user['name_of_school'];
    $school_id_number = $result_user['school_id_number'];

    $sql_details = "SELECT name, sex, grade_section, date_of_birth, date_of_weighing, age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, participation_in_4ps, beneficiary_of_sbfp_in_previous_years 
                    FROM beneficiary_details bd 
                    INNER JOIN beneficiaries b ON bd.beneficiary_id = b.id 
                    WHERE b.session_id = ?";
    $stmt_details = $conn->prepare($sql_details);
    $stmt_details->bind_param("s", $session_id);
    $stmt_details->execute();
    $result_details = $stmt_details->get_result();

    if ($result_details->num_rows == 0) {
        die("No beneficiary details found for the given session ID.");
    }

    // Initialize PDF in landscape orientation with A4 size
    $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    $pdf->SetMargins(25, 15, 30); // Set margins
    $pdf->AddPage();


     // Get the current year
     $currentYear = date('Y');

     $html = '
     <table style="width: 100%;">
         <tr>
             <td style="text-align: left; width: 15%;">
                 <img src="images/logo/semilogo.png" alt="Left Logo" style="width: 100px;">
             </td>
             <td style="text-align: center; width: 70%;">
                 <h2>Department of Education</h2>
                 <h3>Region 4A</h3>
             </td>
             <td style="text-align: right; width: 15%;">
                 <img src="images/LOGO.png" alt="Right Logo" style="width: 100px;">
             </td>
         </tr>
     </table>
     <br><br><br>
     <h2 style="text-align:center;">Master List Beneficiaries for School-Based Feeding Program (SBFP) (SY ' . $currentYear . ')</h2>';

    $html .= "
    <table border='0' cellpadding='4' cellspacing='0' style='width: 100%;'>
        <tr>
            <td style='text-align: left; width: 50%;'>
                <strong>Division/Province:</strong> {$division_province}<br>
                <strong>Name of Principal:</strong> {$name_of_principal}<br>
                <strong>City/Municipality/Barangay:</strong> {$city_municipality_barangay}<br>
            </td>
            <td style='text-align: right; width: 50%;'>
                <strong>Name of Feeding Focal Person:</strong> {$name_of_feeding_focal_person}<br>
                <strong>Name of School:</strong> {$name_of_school}<br>
                <strong>School ID Number:</strong> {$school_id_number}<br>
            </td>
        </tr>
    </table>";

    $html .= '<table border="1" cellpadding="4" cellspacing="0" style="width: 50%; border-collapse: collapse;">';

    // Define column widths
    $columnWidths = [
        'name' => 15, // Name
        'sex' => 10, // Sex
        'grade_section' => 13, // Grade/Section
        'date_of_birth' => 15, // Date of Birth
        'date_of_weighing' => 15, // Date of Weighing
        'age' => 8, // Age
        'weight' => 14, // Weight
        'height' => 13, // Height
        'bmi' => 13, // BMI
        'nutritional_status_bmia' => 13, // Nutritional Status (BMI-A)
        'nutritional_status_hfa' => 13, // Nutritional Status (HFA)
        'dewormed' => 15, // Dewormed
        'parents_consent_for_milk' => 13, // Parent's Consent for Milk
        'participation_in_4ps' => 13, // Participation in 4Ps
        'beneficiary_of_sbfp_in_previous_years' => 18, // Beneficiary of SBFP in Previous Years
    ];

    // Add header row
    $html .= '<thead><tr style="background-color: #f2f2f2;">';
    foreach ($columnWidths as $header => $width) {
        $headerText = str_replace('_', ' ', ucfirst($header));
        $html .= '<th style="width:' . $width . '%; border: 1px solid #000; text-align: center; padding: 5px;">' . $headerText . '</th>';
    }
    $html .= '</tr></thead><tbody>';

    // Add data rows
    while ($row_details = $result_details->fetch_assoc()) {
        $html .= '<tr>';
        foreach ($columnWidths as $key => $width) {
            $data = $row_details[$key];
            $html .= '<td style="width:' . $width . '%; border: 1px solid #000; padding: 5px; vertical-align: middle;">' . htmlspecialchars($data) . '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    // Add "Prepared by" and "Approved by" sections
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
    </table>";

    $pdf->writeHTML($html, true, false, true, false, '');

    $filename = 'Beneficiary_Details_' . $session_id . '.pdf';

    // Output PDF
    $pdf->Output($filename, 'D');

    $stmt_details->close();
    $stmt_user->close();
    $conn->close();
}
?>
