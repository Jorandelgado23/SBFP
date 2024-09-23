<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

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

// Retrieve session_id and role of the logged-in user
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT session_id, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($session_id, $role);
$stmt->fetch();
$stmt->close();

// Validate required fields for beneficiaries table
$required_fields = [
    'division_province', 
    'city_municipality_barangay', 
    'name_of_school', 
    'school_id_number', 
    'name_of_principal', 
    'name_of_feeding_focal_person'
];

foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $response = [
            'success' => false,
            'message' => 'Please complete all required fields.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}

// Insert into beneficiaries table
$stmt = $conn->prepare("INSERT INTO beneficiaries (session_id, division_province, city_municipality_barangay, name_of_school, school_id_number, name_of_principal, name_of_feeding_focal_person) VALUES (?, ?, ?, ?, ?, ?, ?)");
$division_province = $_POST['division_province'];
$city_municipality_barangay = $_POST['city_municipality_barangay'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];
$name_of_principal = $_POST['name_of_principal'];
$name_of_feeding_focal_person = $_POST['name_of_feeding_focal_person'];
$stmt->bind_param("sssssss", $session_id, $division_province, $city_municipality_barangay, $name_of_school, $school_id_number, $name_of_principal, $name_of_feeding_focal_person);
$stmt->execute();
$beneficiary_id = $stmt->insert_id;
$stmt->close();

// Validate beneficiary details
if (!isset($_POST['beneficiary_name']) || !is_array($_POST['beneficiary_name'])) {
    $response = [
        'success' => false,
        'message' => 'Beneficiary details are missing.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Prepare statement for inserting beneficiary details
$stmt = $conn->prepare("INSERT INTO beneficiary_details (session_id, beneficiary_id, name, lrn_no, student_section, sex, grade_section, date_of_birth, date_of_weighing, age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, participation_in_4ps, beneficiary_of_sbfp_in_previous_years) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($_POST['beneficiary_name'] as $index => $beneficiary_name) {
    $lrn_no = $_POST['lrn_no'][$index];
    $student_section = $_POST['student_section'][$index]; // New student_section field
    $beneficiary_sex = $_POST['beneficiary_sex'][$index];
    $beneficiary_grade_section = $_POST['beneficiary_grade_section'][$index];
    $beneficiary_dob = $_POST['beneficiary_dob'][$index];
    $beneficiary_dow = $_POST['beneficiary_dow'][$index];
    $beneficiary_age = $_POST['beneficiary_age'][$index];
    $beneficiary_weight = $_POST['beneficiary_weight'][$index];
    $beneficiary_height = $_POST['beneficiary_height'][$index];
    $beneficiary_bmi = $_POST['beneficiary_bmi'][$index];
    $nutritional_status_bmia = $_POST['nutritional_status_bmia'][$index];
    $nutritional_status_hfa = $_POST['nutritional_status_hfa'][$index];
    $dewormed = $_POST['dewormed'][$index];
    $parents_consent_for_milk = $_POST['parents_consent_for_milk'][$index];
    $participation_in_4ps = $_POST['participation_in_4ps'][$index];
    $beneficiary_of_sbfp_in_previous_years = $_POST['beneficiary_of_sbfp_in_previous_years'][$index];

    // Validate each beneficiary detail
    if (empty($beneficiary_name) || empty($lrn_no) || empty($student_section) || empty($beneficiary_sex) || empty($beneficiary_grade_section) || empty($beneficiary_dob)) {
        $response = [
            'success' => false,
            'message' => 'Please complete all beneficiary details, including LRN number and student section.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $stmt->bind_param("sissssssdddsssssss", $session_id, $beneficiary_id, $beneficiary_name, $lrn_no, $student_section, $beneficiary_sex, $beneficiary_grade_section, $beneficiary_dob, $beneficiary_dow, $beneficiary_age, $beneficiary_weight, $beneficiary_height, $beneficiary_bmi, $nutritional_status_bmia, $nutritional_status_hfa, $dewormed, $parents_consent_for_milk, $participation_in_4ps, $beneficiary_of_sbfp_in_previous_years);
    $stmt->execute();
}

// Log activity into recent_activity table
$activity = "Inserted beneficiaries data";
$activity_type = "data_insert";
$timestamp = date("Y-m-d H:i:s");

// Insert into recent_activity table for all users
$log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
$log_stmt->bind_param("ssss", $activity, $email, $activity_type, $timestamp);
$log_stmt->execute();
$log_stmt->close();

// Insert into sbfp_recent_activity for SBFP role only
if ($role === 'sbfp') {
    $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (email, activity, activity_type, timestamp) VALUES (?, ?, ?, ?)");
    $sbfp_activity_stmt->bind_param("ssss", $email, $activity, $activity_type, $timestamp);
    $sbfp_activity_stmt->execute();
    $sbfp_activity_stmt->close();
}

$conn->close();

// Return JSON response
$response = [
    'success' => true,
    'message' => 'Beneficiaries data submitted successfully!'
];

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
