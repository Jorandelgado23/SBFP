<?php
session_start();

require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

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

// Fetch data associated with the session_id of the logged-in user
$stmt = $conn->prepare("SELECT * FROM milkcomponent WHERE session_id = ?");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

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

// Get the current year
$currentYear = date('Y');

// Generate PDF function
function generatePDF($result, $division_province, $name_of_principal, $city_municipality_barangay, $name_of_feeding_focal_person, $name_of_school, $school_id_number, $currentYear) {
    $leftLogoPath = __DIR__ . '/images/LOGO.png';
    $rightLogoPath = __DIR__ . '/images/logo/semilogo.png';

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

    // Adding styles to the HTML
   // Adding styles to the HTML
$html = '
<table style="width: 100%;">
    <tr>
        <td style="text-align: left; width: 15%;">
            <img src="data:image/png;base64,' . $leftLogoBase64 . '" alt="Left Logo" style="width: 100px;">
        </td>
        <td style="text-align: center; width: 70%;">
            <h5>DEPARTMENT OF EDUCATION</h5>
            <h5>Region 4A</h5>
        </td>
        <td style="text-align: right; width: 15%;">
            <img src="data:image/png;base64,' . $rightLogoBase64 . '" alt="Right Logo" style="width: 100px;">
        </td>
    </tr>
</table>
<br>';

// Additional table for user-specific details
$html .= "
<table border='0' cellpadding='4' cellspacing='0' style='width: 100%;'>
    <tr>
        <td style='text-align: left; width: 50%;'>
            <strong>REGION/DIVISION/DISTRICT:</strong> {$division_province}<br>
            <strong>Name of School:</strong> {$name_of_school}<br>
            <strong>School ID Number:</strong> {$school_id_number}<br>
        </td>
    </tr>
</table>";

// Move the program title here, right after the user-specific details
$html .= '<h4 style="text-align:center;">SCHOOL-BASED FEEDING PROGRAM - MILK COMPONENT</h4>';

// Table for Milk Component Data
$html .= '<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">

        <thead>
        <tr><th colspan="5" style="text-align: center;">LIST OF BENEFICIARIES(SY ' . $currentYear . ')</th></tr>
            <tr>
                <th rowspan="2">Name</th>
                <th rowspan="2">Grade & Section</th>
                <th colspan="3" style="text-align: center;">Classification of Students in terms of Milk Tolerance</th>
            </tr>
            <tr>
                <th>Without milk intolerance and will participate in milk feeding</th>
                <th>With milk intolerance but willing to participate in milk feeding</th>
                <th>Not allowed by parents to participate in milk feeding</th>
            </tr>
        </thead>
        <tbody>';

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($row["student_name"]) . '</td>';
    $html .= '<td>' . htmlspecialchars($row["grade_section"]) . '</td>';
    
    // Automatically fill the correct columns based on milk tolerance data
    $milkTolerance = trim($row["milk_tolerance"]); // Trim any whitespace
    $html .= '<td style="font-family: \'DejaVu Sans\'; text-align: center; font-size: 30px;">' . 
                ($milkTolerance == 'Without milk intolerance and will participate in milk feeding' ? '&check;' : '') . 
              '</td>';
    $html .= '<td style="font-family: \'DejaVu Sans\'; text-align: center; font-size: 30px;">' . 
                ($milkTolerance == 'With milk intolerance but willing to participate in milk feeding' ? '&check;' : '') . 
              '</td>';
    $html .= '<td style="font-family: \'DejaVu Sans\'; text-align: center; font-size: 30px;">' . 
                ($milkTolerance == 'Not allowed by parents to participate in milk feeding' ? '&check;' : '') . 
              '</td>';
    $html .= '</tr>';
}
} else {
$html .= '<tr><td colspan="5">No data available</td></tr>'; // Adjusted to match the number of columns
}

$html .= '</tbody></table>';

    // Additional section
    $html .= "
    <table border='0' cellpadding='4' cellspacing='0' style='width: 100%; margin-top: 30px;'>
        <tr>
            <td style='text-align: left; width: 50%;'>
                <strong>Prepared by:</strong> _____________________<br>
                School Feeding Coordinator
            </td>
            <td style='text-align: right; width: 50%;'>
                <strong>Approved by:</strong> _____________________<br>
                School Head
            </td>
        </tr>
    </table>";

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Output the generated PDF
    $dompdf->stream('Milk_Component_Data.pdf', array('Attachment' => 0));
    exit();
}


// Generate Excel function
function generateExcel($result, $division_province, $name_of_principal, $city_municipality_barangay, $name_of_feeding_focal_person, $name_of_school, $school_id_number, $school_year) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Milk Component Data');

    // Set paper size and margins
    $spreadsheet->getActiveSheet()->getPageSetup()
        ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4)
        ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);

    // Set margins (optional, adjust as needed)
    $sheet->getPageMargins()->setTop(0.354330708661417);
    $sheet->getPageMargins()->setRight(0.118110236220472);
    $sheet->getPageMargins()->setLeft(0.118110236220472);
    $sheet->getPageMargins()->setBottom(0.15748031496063);
    $sheet->getPageMargins()->setFooter(0.118110236220472);
    $sheet->getPageMargins()->setHeader(0.118110236220472);

    // Load images
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
    $sheet->setCellValue('B3', 'SCHOOL-BASED FEEDING PROGRAM - MILK COMPONENT');
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

    // Set styles for the table headers
    $headerStyle = [
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
        'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => 'd9d9d9']],
    ];
    $sheet->getStyle('A9:D9')->applyFromArray($headerStyle); // Adjusted header range

    // Add headers
    $sheet->setCellValue('A9', 'Student Name');
    $sheet->setCellValue('B9', 'Grade & Section');

    $sheet->mergeCells('C9:D9');
    $sheet->setCellValue('C9', 'Milk Tolerance');
    $sheet->getStyle('C9')->getAlignment()->setWrapText(true);

    // Set data starting row
    $startRow = 10;

    // Add data
    $row = $startRow;
    while ($data = $result->fetch_assoc()) {
        // Adjusted data fields
        $sheet->setCellValue('A' . $row, $data['student_name']);
        $sheet->setCellValue('B' . $row, $data['grade_section']);
        $sheet->setCellValue('C' . $row, $data['milk_tolerance']);
        $row++;
    }

    // Auto size columns
    foreach (range('A', 'F') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(false);
    }

    // Set alignment for data cells
    $sheet->getStyle('A' . $startRow . ':F' . ($row - 1))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    // Add footer section
$footerRow = $row + 1;

// Left side
$sheet->mergeCells('A' . $footerRow . ':C' . $footerRow);
$sheet->setCellValue('A' . $footerRow, 'Prepared by: _____________________');
$sheet->getStyle('A' . $footerRow)->getFont()->setItalic(true);
$sheet->setCellValue('A' . ($footerRow + 1), 'School Feeding Coordinator');

// Right side in D cell
$sheet->mergeCells('D' . $footerRow . ':F' . $footerRow);
$sheet->setCellValue('D' . $footerRow, 'Approved by: _____________________');
$sheet->getStyle('D' . $footerRow)->getFont()->setItalic(true);
$sheet->setCellValue('D' . ($footerRow + 1), 'School Head');

// Set vertical alignment for footer cells
$sheet->getStyle('A' . $footerRow . ':F' . ($footerRow + 1))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);



    // Set row heights
    $sheet->getRowDimension($footerRow)->setRowHeight(40);

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    $filename = 'Milk_Component_Data.xlsx';

    // Send headers to download file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit();
}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // Validate session and action
    if (!isset($_SESSION['email'])) {
        die("Session not set. Please log in again.");
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

    // Fetch data associated with the session_id of the logged-in user
    $stmt = $conn->prepare("SELECT * FROM milkcomponent WHERE session_id = ?");
    $stmt->bind_param("s", $session_id);
    $stmt->execute();
    $result = $stmt->get_result();

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

    // Get the current school year
    $current_year = date('Y');
    $next_year = $current_year + 1;
    $school_year = "{$current_year}-{$next_year}";

    // Process action
    if ($_POST['action'] === 'pdf') {
        generatePDF($result, $division_province, $name_of_principal, $city_municipality_barangay, $name_of_feeding_focal_person, $name_of_school, $school_id_number, $currentYear);
    } elseif ($_POST['action'] === 'excel') {
        generateExcel($result, $division_province, $name_of_principal, $city_municipality_barangay, $name_of_feeding_focal_person, $name_of_school, $school_id_number, $school_year);
    }
}

// Close connection
$conn->close();
