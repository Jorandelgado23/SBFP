<?php
include("accountconnection.php");
session_start();

// Get the posted data (beneficiary ID and next grade section)
$beneficiary_id = $_POST['beneficiary_id'];  
$next_grade_section = $_POST['next_grade_section'];  

// Get beneficiary details from the database
$stmt = $conn->prepare("SELECT * FROM beneficiary_details WHERE beneficiary_id = ?");
$stmt->bind_param("i", $beneficiary_id);
$stmt->execute();
$beneficiary_result = $stmt->get_result();
$beneficiary = $beneficiary_result->fetch_assoc();
$stmt->close();

// Check if the beneficiary details are found
if (!$beneficiary) {
    echo json_encode(['status' => 'danger', 'msg' => 'No beneficiary found with the provided ID.']);
    exit;
}

// Get the current year and school year
$current_year = date("Y");
$next_school_year = $current_year . "-" . ($current_year + 1);

// Check if the beneficiary's school year is older than the current year
if ($beneficiary['school_year'] < $current_year) {
    // Proceed with promoting the beneficiary
    
    // Normalize the grade section (case insensitive)
    $current_grade_section = strtolower($beneficiary['grade_section']); // Normalize to lowercase
    $new_grade_section = incrementGradeSection($current_grade_section);

    // Insert into beneficiaries table (the code you provided)
    $sqlBeneficiaries = "INSERT INTO beneficiaries (beneficiary_name, session_id) VALUES (?, ?)";
    $stmtBeneficiaries = $conn->prepare($sqlBeneficiaries);
    $stmtBeneficiaries->bind_param("ss", $beneficiary['name'], $beneficiary['session_id']);
    $stmtBeneficiaries->execute();

    // Get the auto-generated beneficiary_id
    $beneficiaryId = $conn->insert_id;  // Newly inserted beneficiary's ID

    // Update the beneficiary_id field in the beneficiaries table
    $sqlBeneficiariesUpdate = "UPDATE beneficiaries SET beneficiary_id = ? WHERE id = ?";
    $stmtBeneficiariesUpdate = $conn->prepare($sqlBeneficiariesUpdate);
    $stmtBeneficiariesUpdate->bind_param("ii", $beneficiaryId, $beneficiaryId);
    $stmtBeneficiariesUpdate->execute();
    $stmtBeneficiariesUpdate->close();

    // Insert new record for the promoted beneficiary in the database
    $stmt_insert = $conn->prepare(
        "INSERT INTO beneficiary_details 
        (beneficiary_id, name, grade_section, student_section, lrn_no, date_of_birth, date_of_weighing, 
        age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, 
        participation_in_4ps, beneficiary_of_sbfp_in_previous_years, session_id, parent_phone, school_year)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    // Correctly bind parameters based on the data types
    $stmt_insert->bind_param("isssssssssssssssssss", 
        $beneficiaryId, 
        $beneficiary['name'], 
        $new_grade_section,  // The updated grade section
        $beneficiary['student_section'], 
        $beneficiary['lrn_no'], 
        $beneficiary['date_of_birth'], 
        $beneficiary['date_of_weighing'], 
        $beneficiary['age'], 
        $beneficiary['weight'], 
        $beneficiary['height'], 
        $beneficiary['bmi'], 
        $beneficiary['nutritional_status_bmia'], 
        $beneficiary['nutritional_status_hfa'], 
        $beneficiary['dewormed'], 
        $beneficiary['parents_consent_for_milk'], 
        $beneficiary['participation_in_4ps'], 
        $beneficiary['beneficiary_of_sbfp_in_previous_years'], 
        $beneficiary['session_id'], 
        $beneficiary['parent_phone'], 
        $next_school_year
    );

    if ($stmt_insert->execute()) {
        // Successful promotion
        echo json_encode(['status' => 'success', 'msg' => 'Beneficiary promoted successfully!']);
    } else {
        // Error during promotion
        echo json_encode(['status' => 'danger', 'msg' => 'Failed to promote beneficiary: ' . $stmt_insert->error]);
    }

    $stmt_insert->close();
} else {
    // No promotion required (still in the current school year)
    echo json_encode(['status' => 'info', 'msg' => 'No promotion required. Beneficiary is still in the current school year.']);
}

// Close the database connection
$conn->close();

// Function to increment the grade section (case insensitive)
function incrementGradeSection($gradeSection) {
    // Normalize to lowercase for case insensitivity
    $gradeSection = strtolower($gradeSection); // Ensures all cases like "Grade 1", "GRADE 1", "grade 1" are treated the same

    // Increment the grade level (no sections like A, B, C involved)
    $gradeMap = [
        'grade 1' => 'grade 2',
        'grade 2' => 'grade 3',
        'grade 3' => 'grade 4',
        'grade 4' => 'grade 5',
        'grade 5' => 'grade 6',
        'grade 6' => 'grade 7'
    ];

    // Return the next grade level or the current one if not found in the map
    return isset($gradeMap[$gradeSection]) ? $gradeMap[$gradeSection] : $gradeSection;
}
?>
