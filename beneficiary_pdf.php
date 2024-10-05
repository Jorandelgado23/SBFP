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

    // Top of the PDF with logos and headers
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

    // Add school details
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

   // Add beneficiary details table
$html .= '<table border="1" cellpadding="2" cellspacing="0">';
$html .= '<tr>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Sex</th>
            <th style="text-align: center;">Grade/Section</th>
            <th style="text-align: center;">Date of Birth</th>
            <th style="text-align: center;">Date of Weighing</th>
            <th style="text-align: center;">Age</th>
            <th style="text-align: center;">Weight</th>
            <th style="text-align: center;">Height</th>
            <th style="text-align: center;">BMI</th>
            <th style="text-align: center;">Nutritional Status (BMI-A)</th>
            <th style="text-align: center;">Nutritional Status (HFA)</th>
            <th style="text-align: center;">Dewormed</th>
            <th style="text-align: center;">Parents Consent for Milk</th>
            <th style="text-align: center;">Participation in 4Ps</th>
            <th style="text-align: center;">Beneficiary of SBFP in Previous Years</th>
          </tr>';

while ($row_details = $result_details->fetch_assoc()) {
    $html .= "<tr>
                <td style='text-align: center;'>{$row_details['name']}</td>
                <td style='text-align: center;'>{$row_details['sex']}</td>
                <td style='text-align: center;'>{$row_details['grade_section']}</td>
                <td style='text-align: center;'>{$row_details['date_of_birth']}</td>
                <td style='text-align: center;'>{$row_details['date_of_weighing']}</td>
                <td style='text-align: center;'>{$row_details['age']}</td>
                <td style='text-align: center;'>{$row_details['weight']}</td>
                <td style='text-align: center;'>{$row_details['height']}</td>
                <td style='text-align: center;'>{$row_details['bmi']}</td>
                <td style='text-align: center;'>{$row_details['nutritional_status_bmia']}</td>
                <td style='text-align: center;'>{$row_details['nutritional_status_hfa']}</td>
                <td style='text-align: center;'>{$row_details['dewormed']}</td>
                <td style='text-align: center;'>{$row_details['parents_consent_for_milk']}</td>
                <td style='text-align: center;'>{$row_details['participation_in_4ps']}</td>
                <td style='text-align: center;'>{$row_details['beneficiary_of_sbfp_in_previous_years']}</td>
              </tr>";
}

$html .= '</table>';

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

    // Output PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    $filename = 'Beneficiary_Details_' . $session_id . '.pdf';
    $pdf->Output($filename, 'D');

    // Close connections
    $stmt_details->close();
    $stmt_user->close();
    $conn->close();
}
?>
