<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

include("accountconnection.php");

// Start the session to retrieve session variables
session_start(); // Start the session

// Ensure that the email is available in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch the session_id from the 'users' table based on the email
    $stmt = $conn->prepare("SELECT session_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($session_id);
    $stmt->fetch();
    $stmt->close();
} else {
    // Handle the case where the session doesn't contain an email
    echo "User is not logged in.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['excel_file']['tmp_name'];
        $fileName = $_FILES['excel_file']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileExtension === 'xlsx' || $fileExtension === 'xls') {
            try {
                // Load the Excel file
                $spreadsheet = IOFactory::load($fileTmpPath);

                // Get the sheet named "SBFP-FORM 1"
                $sheet = $spreadsheet->getSheetByName('SBFP-FORM 1');

                // Loop through rows 14 to 26 to extract data
                for ($row = 14; $row <= 26; $row++) {
                    // Extract data from columns B, C, D, and E for each row
                    $name = trim($sheet->getCell('B' . $row)->getValue());
                    $sex = trim($sheet->getCell('C' . $row)->getValue());
                    $gradeSection = trim($sheet->getCell('D' . $row)->getValue());
                    $dob = trim($sheet->getCell('E' . $row)->getValue());

                    // Check if 'name' is empty, if so, skip this row
                    if (empty($name)) {
                        continue; // Skip the current row if 'name' is empty
                    }

                    // Handle the date of birth (DOB) - Check if it's a valid date
                    if (!empty($dob)) {
                        if (is_numeric($dob)) {
                            // Convert Excel serial date format to DateTime object
                            $dob = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dob)->format('m/d/Y');
                        }

                        // Parse the date as MM/DD/YYYY and reformat it to YYYY/MM/DD
                        $dateObject = DateTime::createFromFormat('m/d/Y', $dob);
                        if ($dateObject) {
                            $dob = $dateObject->format('Y/m/d');
                        } else {
                            $dob = null; // Set to null if date conversion fails
                        }
                    } else {
                        $dob = null; // Default to null if DOB is empty
                    }

                    // Insert into beneficiaries table
                    $sqlBeneficiaries = "INSERT INTO beneficiaries 
                        (beneficiary_name, session_id) 
                        VALUES (?, ?)";

                    $stmtBeneficiaries = $conn->prepare($sqlBeneficiaries);
                    $stmtBeneficiaries->bind_param("ss", $name, $session_id);
                    $stmtBeneficiaries->execute();

                    // Get the auto-generated beneficiary_id
                    $beneficiaryId = $conn->insert_id;

                    // Update the beneficiary_id field in the beneficiaries table
                    $sqlBeneficiariesUpdate = "UPDATE beneficiaries SET beneficiary_id = ? WHERE id = ?";
                    $stmtBeneficiariesUpdate = $conn->prepare($sqlBeneficiariesUpdate);
                    $stmtBeneficiariesUpdate->bind_param("ii", $beneficiaryId, $beneficiaryId);
                    $stmtBeneficiariesUpdate->execute();

                    // Insert into beneficiary_details table with beneficiary_id
                    $sqlDetails = "INSERT INTO beneficiary_details 
                        (beneficiary_id, name, sex, grade_section, date_of_birth, session_id) 
                        VALUES (?, ?, ?, ?, ?, ?)";

                    $stmtDetails = $conn->prepare($sqlDetails);
                    $stmtDetails->bind_param("isssss", $beneficiaryId, $name, $sex, $gradeSection, $dob, $session_id);
                    $stmtDetails->execute();
                }

                // Close the prepared statements and connection
                $stmtBeneficiaries->close();
                $stmtBeneficiariesUpdate->close();
                $stmtDetails->close();
                $conn->close();

                // Set the response message for success
                $res_status = 'success';
                $res_msg = 'Student data has been imported successfully.';
            } catch (Exception $e) {
                // Set the response message for failure
                $res_status = 'danger';
                $res_msg = 'Error loading the Excel file: ' . $e->getMessage();
            }
        } else {
            $res_status = 'danger';
            $res_msg = 'Invalid file format. Please upload an Excel file.';
        }
    } else {
        $res_status = 'danger';
        $res_msg = 'Error uploading the file. Please try again.';
    }

    // Store status in SESSION
    $_SESSION['response'] = array(
        'status' => $res_status,
        'msg' => $res_msg
    );
}

// Redirect to the listing page
header("Location: form1.php");
exit();
?>
