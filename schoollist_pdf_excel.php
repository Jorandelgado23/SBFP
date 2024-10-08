<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Retrieve action (excel or pdf)
    $action = $_POST['action'];

    include("accountconnection.php");

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

    // Step 3: Generate Excel or PDF based on action
    if ($action === 'excel') {
        // Generate Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('School Details');

        // Add headers
        $sheet->setCellValue('A1', 'School Name')
              ->setCellValue('B1', 'Division/Province')
              ->setCellValue('C1', 'School District/Municipality')
              ->setCellValue('D1', 'BEIS ID')
              ->setCellValue('E1', 'School Address')
              ->setCellValue('F1', 'Barangay Name')
              ->setCellValue('G1', 'Supervisor/Principal Name')
              ->setCellValue('H1', 'Contact Number')
              ->setCellValue('I1', 'Total Beneficiaries');

        // Add data
        $row = 2;
        foreach ($schools as $school) {
            $sheet->setCellValue('A' . $row, $school['name'])
                  ->setCellValue('B' . $row, $school['division_province'])
                  ->setCellValue('C' . $row, $school['school_district_municipality'])
                  ->setCellValue('D' . $row, $school['beis_id'])
                  ->setCellValue('E' . $row, $school['school_address'])
                  ->setCellValue('F' . $row, $school['barangay_name'])
                  ->setCellValue('G' . $row, $school['supervisor_principal_name'])
                  ->setCellValue('H' . $row, $school['contact_number'])
                  ->setCellValue('I' . $row, $school['total_beneficiaries']);
            $row++;
        }

        // Set auto size for columns
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Save Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = 'School_Details.xlsx';
        $writer->save($filename);

        // Download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filename);
        exit;
    } elseif ($action === 'pdf') {
        // Generate PDF
        require_once 'vendor/autoload.php';

        $leftLogoPath = __DIR__ . '/images/logo/semilogo.png';
        $rightLogoPath = __DIR__ . '/images/LOGO.png';

        // Ensure the images exist
        if (!file_exists($leftLogoPath)) {
            echo "Left logo not found.";
            return;
        }
        if (!file_exists($rightLogoPath)) {
            echo "Right logo not found.";
            return;
        }

        $leftLogoBase64 = base64_encode(file_get_contents($leftLogoPath));
        $rightLogoBase64 = base64_encode(file_get_contents($rightLogoPath));

        $currentYear = date("Y");

        $html = '
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left; width: 15%;">
                        <img src="data:image/png;base64,' . $leftLogoBase64 . '" alt="Left Logo" style="width: 100px;">
                    </td>
                    <td style="text-align: center; width: 70%;">
                        <h2>Department of Education</h2>
                        <h3>Region 4A</h3>
                        <h4>SCHOOL-BASED FEEDING PROGRAM (SBFP) LIST OF SCHOOLS (SY ' . $currentYear . ')</h4>
                    </td>
                    <td style="text-align: right; width: 15%;">
                        <img src="data:image/png;base64,' . $rightLogoBase64 . '" alt="Right Logo" style="width: 100px;">
                    </td>
                </tr>
            </table>
            <table style="width: 100%; margin-top: 10px;">
                <tr>
                    <td style="text-align: left;">
                        <strong>Division/Province:</strong> ______________________________________<br>
                        <strong>School District/City/ Municipality:</strong> ____________________________
                    </td>
                </tr>
            </table>
            <h2>School Details</h2>
            <table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>School Name</th>
                        <th>Division/Province</th>
                        <th>School District/Municipality</th>
                        <th>BEIS ID</th>
                        <th>School Address</th>
                        <th>Barangay Name</th>
                        <th>Supervisor/Principal Name</th>
                        <th>Contact Number</th>
                        <th>Total Beneficiaries</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($schools as $school) {
            $html .= '<tr>
                        <td>' . htmlspecialchars($school['name']) . '</td>
                        <td>' . htmlspecialchars($school['division_province']) . '</td>
                        <td>' . htmlspecialchars($school['school_district_municipality']) . '</td>
                        <td>' . htmlspecialchars($school['beis_id']) . '</td>
                        <td>' . htmlspecialchars($school['school_address']) . '</td>
                        <td>' . htmlspecialchars($school['barangay_name']) . '</td>
                        <td>' . htmlspecialchars($school['supervisor_principal_name']) . '</td>
                        <td>' . htmlspecialchars($school['contact_number']) . '</td>
                        <td>' . htmlspecialchars($school['total_beneficiaries']) . '</td>
                    </tr>';
        }

        $html .= '</tbody></table>';

        // Additional section
        $html .= "
        <table border='0' cellpadding='4' cellspacing='0' style='width: 100%; margin-top: 30px;'>
            <tr>
                <td style='text-align: left; width: 50%;'>
                    <strong>Prepared by:</strong> _____________________<br>
                    SBFP DepED Focal
                </td>
                <td style='text-align: right; width: 50%;'>
                    <strong>Approved by:</strong> _____________________<br>
                    Schools Division Superintendent
                </td>
            </tr>
        </table>";

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('School_Details.pdf');
        exit;
    }
}
?>
