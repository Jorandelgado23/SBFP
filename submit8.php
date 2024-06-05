<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create division_schools table
$sql_create_table = "CREATE TABLE IF NOT EXISTS division_schools (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_id INT NOT NULL,
    division_school VARCHAR(255) NOT NULL,
    sdo_school VARCHAR(255) NOT NULL,
    target_sbfp_school INT NOT NULL,
    actual_sbfp_school INT NOT NULL,
    percent DECIMAL(5,2),
    status VARCHAR(255),
    FOREIGN KEY (report_id) REFERENCES quarterly_reportform8(report_id)
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table division_schools created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $region_division = $_POST['region_division'];
    $division_schools = $_POST['division_schools'];
    $sdo_schools = $_POST['sdo_schools'];
    $target_sbfp_schools = $_POST['target_sbfp_schools'];
    $actual_sbfp_schools = $_POST['actual_sbfp_schools'];
    $percentage = $_POST['percentage'];
    $implementation_status = $_POST['implementation_status'];
    $amount_allocated = $_POST['amount_allocated'];
    $first_liquidation = $_POST['first_liquidation'];
    $second_liquidation = $_POST['second_liquidation'];
    $remarks = $_POST['remarks'];

    // Insert data into the database
    $sql = "INSERT INTO quarterly_reportform8 (region_division, amount_allocated, first_liquidation, second_liquidation, remarks) 
            VALUES ('$region_division', '$amount_allocated', '$first_liquidation', '$second_liquidation', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        // Insert division/schools data into another table
        $report_id = $conn->insert_id;
        foreach ($division_schools as $index => $division_school) {
            $sdo_school = $sdo_schools[$index];
            $target_sbfp_school = $target_sbfp_schools[$index];
            $actual_sbfp_school = $actual_sbfp_schools[$index];
            $percent = $percentage[$index];
            $status = $implementation_status[$index];

            $sql = "INSERT INTO division_schools (report_id, division_school, sdo_school, target_sbfp_school, actual_sbfp_school, percent, status) 
                    VALUES ('$report_id', '$division_school', '$sdo_school', '$target_sbfp_school', '$actual_sbfp_school', '$percent', '$status')";
            $conn->query($sql);
        }

        echo "Report submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();

header("Location: form8.php");

?>
