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
                    // Extract data from columns
                    $name = trim($sheet->getCell('B' . $row)->getValue());
                    $sex = trim($sheet->getCell('C' . $row)->getValue());
                    $gradeSectionRaw = trim($sheet->getCell('D' . $row)->getValue());
                    $dob = trim($sheet->getCell('E' . $row)->getValue());
                    $dateOfWeighing = trim($sheet->getCell('F' . $row)->getValue());
                    $age = trim($sheet->getCell('G' . $row)->getValue());
                    $weight = trim($sheet->getCell('H' . $row)->getValue());
                    $height = trim($sheet->getCell('I' . $row)->getValue());
                    $bmi = trim($sheet->getCell('J' . $row)->getValue());
                    $nutritionalStatusBmiA = trim($sheet->getCell('K' . $row)->getValue());
                    $nutritionalStatusHfa = trim($sheet->getCell('L' . $row)->getValue());
                    $dewormed = trim($sheet->getCell('M' . $row)->getValue());
                    $parentsConsentForMilk = trim($sheet->getCell('N' . $row)->getValue());
                    $participationIn4Ps = trim($sheet->getCell('O' . $row)->getValue());
                    $beneficiaryOfSbfpPreviousYears = trim($sheet->getCell('P' . $row)->getValue());

                    if (empty($name)) {
                        continue; // Skip if 'name' is empty
                    }

                    // Separate gradeSection and student_section
                    $gradeSection = null;       // For the grade level (e.g., "Grade 1")
                    $studentSection = null;     // For the section (e.g., "/Sample Section")

                    if (!empty($gradeSectionRaw)) {
                        // Split the value by the first occurrence of a slash (/)
                        $parts = explode('/', $gradeSectionRaw, 2);
                        $gradeSection = trim($parts[0]); // Extract the grade level (e.g., "Grade 1")

                        if (isset($parts[1])) {
                            $studentSection = '' . trim($parts[1]); // Ensure the section starts with '/'
                        } else {
                            $studentSection = 'Default Section'; // Default if no section is specified
                        }
                    } else {
                        $gradeSection = 'Unknown Grade'; // Default if gradeSection is empty
                        $studentSection = '/Default Section'; // Default section
                    }

                    // Handle the date of birth (DOB)
                    if (!empty($dob)) {
                        if (is_numeric($dob)) {
                            $dob = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dob)->format('Y/m/d');
                        } else {
                            $dob = DateTime::createFromFormat('m/d/Y', $dob) ? DateTime::createFromFormat('m/d/Y', $dob)->format('Y/m/d') : null;
                        }
                    } else {
                        $dob = null;
                    }

                    // Handle the date of weighing
                    if (!empty($dateOfWeighing)) {
                        if (is_numeric($dateOfWeighing)) {
                            $dateOfWeighing = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateOfWeighing)->format('Y/m/d');
                        } else {
                            $dateOfWeighing = DateTime::createFromFormat('m/d/Y', $dateOfWeighing) ? DateTime::createFromFormat('m/d/Y', $dateOfWeighing)->format('Y/m/d') : null;
                        }
                    } else {
                        $dateOfWeighing = null;
                    }

                    // Calculate the school year
                    $currentYear = date("Y"); // Retrieves the current year
                    $schoolYear = "$currentYear-" . ($currentYear + 1); // Always starts in the current year and ends in the next year
                    

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
                    // Insert into beneficiary_details table
                    // Insert into beneficiary_details table
                    $sqlDetails = "INSERT INTO beneficiary_details 
                        (beneficiary_id, name, sex, grade_section, student_section, date_of_birth, date_of_weighing, age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, participation_in_4ps, beneficiary_of_sbfp_in_previous_years, session_id, school_year) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmtDetails = $conn->prepare($sqlDetails);
                    $stmtDetails->bind_param(
                        "issssssddssssssssss",
                        $beneficiaryId,
                        $name,
                        $sex,
                        $gradeSection,
                        $studentSection,
                        $dob,
                        $dateOfWeighing,
                        $age,
                        $weight,
                        $height,
                        $bmi,
                        $nutritionalStatusBmiA,
                        $nutritionalStatusHfa,
                        $dewormed,
                        $parentsConsentForMilk,
                        $participationIn4Ps,
                        $beneficiaryOfSbfpPreviousYears,
                        $session_id,
                        $schoolYear
                    );
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
