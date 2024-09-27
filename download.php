<?php
session_start(); // Start the session
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Retrieve action (excel or pdf)
    $action = $_POST['action'];

    // Step 1: Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sbfp";

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

    // Fetch additional details for the top of the table from the users table
    $sql_user = "SELECT `Division/Province` AS division_province, supervisor_principal_name AS name_of_principal, barangay_name AS city_municipality_barangay, CONCAT(firstname, ' ', lastname) AS name_of_feeding_focal_person, school_name AS name_of_school, beis_id AS school_id_number FROM users WHERE session_id = ?";
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

    // Get the current year
    $currentYear = date('Y');

    if ($action === 'excel') {
        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('ATTENDANCE');
    
        // Set paper size and orientation to landscape
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4)
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set margins (optional, adjust as needed)
        $sheet->getPageMargins()->setTop(0.354);
        $sheet->getPageMargins()->setRight(0.118);
        $sheet->getPageMargins()->setLeft(0.118);
        $sheet->getPageMargins()->setBottom(0.157);
        $sheet->getPageMargins()->setFooter(0.118);
        $sheet->getPageMargins()->setHeader(0.118);

        // Load images
        $leftLogoPath = __DIR__ . '/images/logo/semilogo.png';
        $rightLogoPath = __DIR__ . '/images/LOGO.png';

        // Ensure the images exist
        if (!file_exists($leftLogoPath) || !file_exists($rightLogoPath)) {
            die("Logo images not found.");
        }

        // Add left logo
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setPath($leftLogoPath);
        $drawing->setCoordinates('A1');
        $drawing->setHeight(70);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());

        // Add right logo
        $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing2->setPath($rightLogoPath);
        $drawing2->setCoordinates('D1');
        $drawing2->setHeight(90);
        $drawing2->setWorksheet($spreadsheet->getActiveSheet());

        // Merge cells for headers and center align text
        $sheet->mergeCells('B1:C1');
        $sheet->setCellValue('B1', 'DEPARTMENT OF EDUCATION');
        $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(16);

        $sheet->mergeCells('B2:C2');
        $sheet->setCellValue('B2', 'Region 4A');
        $sheet->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B2')->getFont()->setBold(true)->setSize(14);

        $sheet->mergeCells('B3:C3');
        $sheet->setCellValue('B3', 'SCHOOL-BASED FEEDING PROGRAM - ATTENDANCE');
        $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('B3')->getFont()->setBold(true)->setSize(11);

        $sheet->getRowDimension('1')->setRowHeight(25);
        $sheet->getRowDimension('2')->setRowHeight(20);
        $sheet->getRowDimension('3')->setRowHeight(20);

        // Additional table for user-specific details
        $sheet->mergeCells('A5:B5');
        $sheet->setCellValue('A5', 'Division/Province: ' . $division_province);
        $sheet->getStyle('A5')->getAlignment()->setWrapText(true);

        $sheet->mergeCells('A6:B6');
        $sheet->setCellValue('A6', 'Name of Principal: ' . $name_of_principal);
        $sheet->getStyle('A6')->getAlignment()->setWrapText(true);

        $sheet->mergeCells('A7:B7');
        $sheet->setCellValue('A7', 'City/Municipality/Barangay: ' . $city_municipality_barangay);
        $sheet->getStyle('A7')->getAlignment()->setWrapText(true);

        // Merge cells and set values for specific fields
        $sheet->mergeCells('C5:D5');
        $sheet->setCellValue('C5', 'Name of Feeding Focal Person: ' . $name_of_feeding_focal_person);
        $sheet->getStyle('C5')->getAlignment()->setWrapText(true);

        $sheet->mergeCells('C6:D6');
        $sheet->setCellValue('C6', 'Name of School: ' . $name_of_school);
        $sheet->getStyle('C6')->getAlignment()->setWrapText(true);

        $sheet->mergeCells('C7:D7');
        $sheet->setCellValue('C7', 'School ID Number: ' . $school_id_number);
        $sheet->getStyle('C7')->getAlignment()->setWrapText(true);

        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);

       // Add headers for pupil data
$header = ['Name of Pupil'];
for ($i = 1; $i <= 31; $i++) {
    $header[] = $i; // Add day headers
}

// Set the header in the sheet
$sheet->fromArray($header, NULL, 'A8');

// Set column width for better visibility
foreach (range('A', 'AF') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// Start populating pupil data
$rowNumber = 9; // Start from the ninth row
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = [$row['name']];
        for ($i = 1; $i <= 31; $i++) {
            $data[] = ''; // Empty cells for each day
        }
        $sheet->fromArray($data, NULL, 'A' . $rowNumber);
        $rowNumber++;
    }
}

// Add the total row
$totalRow = ['Total'];
for ($i = 1; $i <= 31; $i++) {
    $totalRow[] = ''; // Empty cells for totals
}
$sheet->fromArray($totalRow, NULL, 'A' . $rowNumber);

// Set borders around the entire table including the total row
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
];

// Apply borders to the data range including the total row
$sheet->getStyle('A8:' . $sheet->getCell('AF' . $rowNumber)->getCoordinate())->applyFromArray($styleArray);


        // Add total row
        $sheet->setCellValue('A' . $rowNumber, 'Total');
        for ($i = 1; $i <= 31; $i++) {
            $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i + 1);
            $sheet->setCellValue($column . $rowNumber, ''); // Empty cells for totals
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="attendance.xlsx"');
        $writer->save('php://output');
        exit();
    } elseif ($action === 'pdf') {
        // Create PDF file
        $pdf = new Dompdf();

        // Generate the header section with logos and details
        $leftLogoPath = __DIR__ . '/images/logo/semilogo.png';
        $rightLogoPath = __DIR__ . '/images/LOGO.png';

        // Ensure the images exist
        if (!file_exists($leftLogoPath) || !file_exists($rightLogoPath)) {
            die("Logo images not found.");
        }

        $leftLogoBase64 = base64_encode(file_get_contents($leftLogoPath));
        $rightLogoBase64 = base64_encode(file_get_contents($rightLogoPath));

        $html = '
        <table style="width: 100%;">
            <tr>
                <td style="text-align: left; width: 15%;">
                    <img src="data:image/png;base64,' . $leftLogoBase64 . '" alt="Left Logo" style="width: 100px;">
                </td>
                <td style="text-align: center; width: 70%;">
                    <h2>Department of Education</h2>
                    <h3>Region 4A</h3>
                </td>
                <td style="text-align: right; width: 15%;">
                    <img src="data:image/png;base64,' . $rightLogoBase64 . '" alt="Right Logo" style="width: 100px;">
                </td>
            </tr>
        </table>
        <br><br><br>
        <h2 style="text-align:center;">LIST OF BENEFICIARIES (SBFP) (SY ' . $currentYear . ')</h2>';

        // Additional table for user-specific details
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

        // Create the attendance table
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
        $html .= '<thead>';
        $html .= '<tr><th rowspan="2">Name of Pupil</th><th colspan="31">Actual Feeding</th></tr>';
        $html .= '<tr>';
        for ($i = 1; $i <= 31; $i++) {
            $html .= '<th>' . $i . '</th>';
        }
        $html .= '</tr>';
        $html .= '</thead><tbody>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $html .= '<tr>';
                $html .= '<td>' . htmlspecialchars($row['name']) . '</td>';
                for ($i = 1; $i <= 31; $i++) {
                    $html .= '<td></td>'; // Empty cells for each day
                }
                $html .= '</tr>';
            }
        }

        // Add total row
        $html .= '<tr><td>Total</td>';
        for ($i = 1; $i <= 31; $i++) {
            $html .= '<td></td>'; // Empty cells for totals
        }
        $html .= '</tr>';
        $html .= '</tbody></table>';

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('attendance.pdf', ['Attachment' => true]);
        exit();
    }

    $conn->close();
}
