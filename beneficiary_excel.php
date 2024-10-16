<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

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

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Beneficiary Details');

    // Set column headers
    $headers = [
        'Name', 'Sex', 'Grade/Section', 'Date of Birth', 'Date of Weighing', 'Age', 'Weight', 
        'Height', 'BMI', 'Nutritional Status (BMI-A)', 'Nutritional Status (HFA)', 'Dewormed', 
        'Parent\'s Consent for Milk', 'Participation in 4Ps', 'Beneficiary of SBFP in Previous Years'
    ];

    // Add user details
    $sheet->setCellValue('A1', 'Division/Province:')
          ->setCellValue('B1', $division_province)
          ->setCellValue('A2', 'Name of Principal:')
          ->setCellValue('B2', $name_of_principal)
          ->setCellValue('A3', 'City/Municipality/Barangay:')
          ->setCellValue('B3', $city_municipality_barangay)
          ->setCellValue('D1', 'Name of Feeding Focal Person:')
          ->setCellValue('E1', $name_of_feeding_focal_person)
          ->setCellValue('D2', 'Name of School / School District:')
          ->setCellValue('E2', $name_of_school)
          ->setCellValue('D3', 'School ID Number:')
          ->setCellValue('E3', $school_id_number);

    // Style headers
    $headerStyle = [
        'font' => ['bold' => true],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => '00000000'],
            ],
        ],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['argb' => 'FFCCCCCC'],
        ],
    ];

    // Apply header styles
    $sheet->fromArray($headers, NULL, 'A5');
    $sheet->getStyle('A5:O5')->applyFromArray($headerStyle);

    // Populate data rows
    $rowNumber = 6;
    while ($row_details = $result_details->fetch_assoc()) {
        $sheet->fromArray(array_values($row_details), NULL, 'A' . $rowNumber);
        $rowNumber++;
    }

    // Set column widths to medium size
    $sheet->getDefaultColumnDimension()->setWidth(15); // Adjust as needed for your data

    // Set paper size and margins
    $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
    $sheet->getPageMargins()->setTop(0.78740157480315);
    $sheet->getPageMargins()->setRight(0.39370078740157);
    $sheet->getPageMargins()->setLeft(0.39370078740157);
    $sheet->getPageMargins()->setBottom(0.78740157480315);

    // Add "Prepared by" and "Approved by" sections
    $prepared_by_row = $rowNumber + 2;
    $approved_by_row = $rowNumber + 4;

    $sheet->setCellValue('A' . $prepared_by_row, 'Prepared by: _____________________')
          ->setCellValue('A' . ($prepared_by_row + 1), 'Feeding Focal Person');

    $sheet->setCellValue('D' . $approved_by_row, 'Approved by: _____________________')
          ->setCellValue('D' . ($approved_by_row + 1), 'School Head');

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    $filename = 'Beneficiary_Details_' . $session_id . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $writer->save('php://output');

    $stmt_details->close();
    $stmt_user->close();
    $conn->close();
}
?>
