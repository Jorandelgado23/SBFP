<?php
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

// Prepare the statement
$stmt = $conn->prepare("INSERT INTO milkcomponent (region_division_district, name_of_school, school_id_number, student_name, grade_section, milk_tolerance) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $region_division_district, $name_of_school, $school_id_number, $student_name, $grade_section, $milk_tolerance);

$region_division_district = $_POST['region_division_district'];
$name_of_school = $_POST['name_of_school'];
$school_id_number = $_POST['school_id_number'];

foreach ($_POST['student_name'] as $index => $student_name) {
    $student_name = $student_name;
    $grade_section = $_POST['grade_section'][$index];
    $milk_tolerance = $_POST['milk_tolerance'][$index];
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "<script>
Swal.fire(
    'Submitted!',
    'Information has been submitted.',
    'success'
).then(function() {
    window.location = 'form.php';
});
</script>";
?>
