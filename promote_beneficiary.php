<?php
include("accountconnection.php");
session_start();

// Function to increment the grade section
function incrementGradeSection($grade_section) {
    // Example: "Grade 1"
    if (preg_match('/Grade (\d+)/', $grade_section, $matches)) {
        $current_grade_number = (int) $matches[1];
        $next_grade_number = $current_grade_number + 1;  // Increment by 1
        return "Grade " . $next_grade_number;
    }
    return $grade_section;  // If not matching the pattern, return the same grade section
}

// Get posted data
$beneficiary_id = $_POST['beneficiary_id'];  // Use the beneficiary ID to get details
$next_grade_section = $_POST['next_grade_section'];  // You can pass this from the form or derive it as needed

// Get beneficiary details
$stmt = $conn->prepare("SELECT * FROM beneficiary_details WHERE beneficiary_id = ?");
$stmt->bind_param("i", $beneficiary_id);
$stmt->execute();
$beneficiary_result = $stmt->get_result();
$beneficiary = $beneficiary_result->fetch_assoc();
$stmt->close();

// Check if the beneficiary details are found
if (!$beneficiary) {
    $_SESSION['response'] = [
        'status' => 'danger',
        'msg' => 'No beneficiary found with the provided ID.'
    ];
    header("Location: form1.php");
    exit;
}

// Get the current year and school year
$current_year = date("Y");
$next_school_year = $current_year . "-" . ($current_year + 1);

// Check if the beneficiary's school year is older than the current school year
if ($beneficiary['school_year'] < $current_year) {
    // If the school year is older, promote the beneficiary

    // Determine the current grade section and promote it
    $current_grade_section = $beneficiary['grade_section'];  // Example: "Grade 1"
    $new_grade_section = incrementGradeSection($current_grade_section);  // Increment the grade section

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

    // Now insert into beneficiary_details with the new beneficiary_id
    $stmt_insert = $conn->prepare(
        "INSERT INTO beneficiary_details
        (beneficiary_id, name, grade_section, student_section, lrn_no, date_of_birth, date_of_weighing, 
        age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, 
        participation_in_4ps, beneficiary_of_sbfp_in_previous_years, session_id, parent_phone, school_year)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    // Corrected bind_param with proper data types
    $stmt_insert->bind_param("isssssssssssssssssss", 
        $beneficiaryId, 
        $beneficiary['name'], 
        $new_grade_section, 
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
        $next_school_year // New school year
    );

    if ($stmt_insert->execute()) {
        $_SESSION['response'] = [
            'status' => 'success',
            'msg' => 'Beneficiary promoted successfully!'
        ];
    } else {
        $_SESSION['response'] = [
            'status' => 'danger',
            'msg' => 'Failed to promote beneficiary: ' . $stmt_insert->error
        ];
    }

    $stmt_insert->close();
    $stmtBeneficiaries->close();
} else {
    $_SESSION['response'] = [
        'status' => 'info',
        'msg' => 'No promotion required. Beneficiary is still in the current school year.'
    ];
}

header("Location: form1.php");
exit;
?>
