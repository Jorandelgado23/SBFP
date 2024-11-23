<?php
session_start();

include("accountconnection.php");

// Retrieve session_id and role of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id, $role);
$stmt->fetch();
$stmt->close();

// Define required fields for beneficiaries table
$required_fields = [
    'division_province', 
    'city_municipality_barangay', 
    'name_of_school', 
    'school_id_number', 
    'name_of_principal', 
    'name_of_feeding_focal_person',
    'beneficiary_first_name', // Updated for first name
    'beneficiary_last_name'   // Updated for last name
];

// Validate required fields for beneficiaries table
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $response = [
            'success' => false,
            'message' => 'Please complete all required fields.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}

// Insert into the beneficiaries table
$stmt = $conn->prepare("INSERT INTO beneficiaries (session_id, division_province, city_municipality_barangay, name_of_school, school_id_number, name_of_principal, name_of_feeding_focal_person, beneficiary_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$division_province = $_POST['division_province'];
$city_municipality_barangay = $_POST['city_municipality_barangay'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];
$name_of_principal = $_POST['name_of_principal'];
$name_of_feeding_focal_person = $_POST['name_of_feeding_focal_person'];

// Loop through each beneficiary's name and insert
foreach ($_POST['beneficiary_first_name'] as $index => $first_name) {
    $last_name = $_POST['beneficiary_last_name'][$index];
    $beneficiary_name = $first_name . ' ' . $last_name;

    $stmt->bind_param("ssssssss", $session_id, $division_province, $city_municipality_barangay, $name_of_school, $school_id_number, $name_of_principal, $name_of_feeding_focal_person, $beneficiary_name);
    $stmt->execute();
    $beneficiary_id = $stmt->insert_id; // Get the inserted beneficiary ID

    // Now update the beneficiaries table with the beneficiary_id
    $update_stmt = $conn->prepare("UPDATE beneficiaries SET beneficiary_id = ? WHERE id = ?");
    $update_stmt->bind_param("ii", $beneficiary_id, $beneficiary_id);
    $update_stmt->execute();
    $update_stmt->close();
}

// Close the statement for beneficiaries table
$stmt->close();

// Prepare statement for inserting beneficiary details
$stmt = $conn->prepare("INSERT INTO beneficiary_details (session_id, beneficiary_id, student_section, name, lrn_no, sex, grade_section, date_of_birth, date_of_weighing, age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, participation_in_4ps, beneficiary_of_sbfp_in_previous_years, parent_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Loop through each beneficiary and insert details
foreach ($_POST['beneficiary_first_name'] as $index => $first_name) {
    $last_name = $_POST['beneficiary_last_name'][$index];
    $beneficiary_name = $first_name . ' ' . $last_name;
    // Continue as in the original form
    
    $student_section = $_POST['student_section'][$index];
    $lrn_no = $_POST['lrn_no'][$index];
    $beneficiary_sex = $_POST['beneficiary_sex'][$index];
    $beneficiary_grade_section = $_POST['beneficiary_grade_section'][$index];
    $beneficiary_dob = $_POST['beneficiary_dob'][$index];
    $beneficiary_dow = $_POST['beneficiary_dow'][$index];
    $beneficiary_age = intval($_POST['beneficiary_age'][$index]);
    $beneficiary_weight = $_POST['beneficiary_weight'][$index];
    $beneficiary_height = $_POST['beneficiary_height'][$index];
    $beneficiary_bmi = $_POST['beneficiary_bmi'][$index];
    $nutritional_status_bmia = $_POST['nutritional_status_bmia'][$index];
    $nutritional_status_hfa = $_POST['nutritional_status_hfa'][$index];
    $dewormed = $_POST['dewormed'][$index];
    $parents_consent_for_milk = $_POST['parents_consent_for_milk'][$index];
    $participation_in_4ps = $_POST['participation_in_4ps'][$index];
    $beneficiary_of_sbfp_in_previous_years = $_POST['beneficiary_of_sbfp_in_previous_years'][$index];
    $parent_phone = $_POST['parent_phone'][$index];

    // Bind parameters and execute
    $stmt->bind_param("ssssssssssssssssssss", $session_id, $beneficiary_id, $student_section, $beneficiary_name, $lrn_no, $beneficiary_sex, $beneficiary_grade_section, $beneficiary_dob, $beneficiary_dow, $beneficiary_age, $beneficiary_weight, $beneficiary_height, $beneficiary_bmi, $nutritional_status_bmia, $nutritional_status_hfa, $dewormed, $parents_consent_for_milk, $participation_in_4ps, $beneficiary_of_sbfp_in_previous_years, $parent_phone);
    $stmt->execute();
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Send success response
$response = [
    'success' => true,
    'message' => 'Beneficiary details submitted successfully.'
];
header('Content-Type: application/json');
echo json_encode($response);
?>
