<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

$conn = new mysqli($servername, $username, $password, $dbname);

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

// Insert into beneficiaries table
$stmt = $conn->prepare("INSERT INTO beneficiaries (session_id, division_province, city_municipality_barangay, name_of_school, school_id_number, name_of_principal, name_of_feeding_focal_person) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $session_id, $division_province, $city_municipality_barangay, $name_of_school, $school_id_number, $name_of_principal, $name_of_feeding_focal_person);

$division_province = $_POST['division_province'];
$city_municipality_barangay = $_POST['city_municipality_barangay'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];
$name_of_principal = $_POST['name_of_principal'];
$name_of_feeding_focal_person = $_POST['name_of_feeding_focal_person'];
$stmt->execute();
$beneficiary_id = $stmt->insert_id;
$stmt->close();

// Insert into beneficiary_details table
$stmt = $conn->prepare("INSERT INTO beneficiary_details (session_id, beneficiary_id, name, sex, grade_section, date_of_birth, date_of_weighing, age, weight, height, bmi, nutritional_status_bmia, nutritional_status_hfa, dewormed, parents_consent_for_milk, participation_in_4ps, beneficiary_of_sbfp_in_previous_years) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($_POST['beneficiary_name'] as $index => $beneficiary_name) {
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

    $stmt->bind_param("sisssssdddsssssss", $session_id, $beneficiary_id, $beneficiary_name, $beneficiary_sex, $beneficiary_grade_section, $beneficiary_dob, $beneficiary_dow, $beneficiary_age, $beneficiary_weight, $beneficiary_height, $beneficiary_bmi, $nutritional_status_bmia, $nutritional_status_hfa, $dewormed, $parents_consent_for_milk, $participation_in_4ps, $beneficiary_of_sbfp_in_previous_years);
    $stmt->execute();
}

$stmt->close();
$conn->close();

// Return JSON response
$response = array(
    'success' => true,
    'message' => 'Data submitted successfully!'
);

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
