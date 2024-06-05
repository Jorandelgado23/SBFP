<?php
if(isset($_POST['school_id'])) {
    $selectedSchool = $_POST['school_id'];
    
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

    // Prepare and bind parameters
    $stmt = $conn->prepare("SELECT * FROM beneficiaries WHERE session_id = ?");
    $stmt->bind_param("s", $selectedSchool); // 's' indicates string type
    $stmt->execute();
    $result_beneficiaries = $stmt->get_result();

    if ($result_beneficiaries->num_rows > 0) {
        while ($row = $result_beneficiaries->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . (isset($row["name"]) ? $row["name"] : "") . "</td>";
            echo "<td>" . (isset($row["sex"]) ? $row["sex"] : "") . "</td>";
            echo "<td>" . (isset($row["grade_section"]) ? $row["grade_section"] : "") . "</td>";
            echo "<td>" . (isset($row["date_of_weighing"]) ? $row["date_of_weighing"] : "") . "</td>";
            echo "<td>" . (isset($row["age_years_months"]) ? $row["age_years_months"] : "") . "</td>";
            echo "<td>" . (isset($row["weight_kg"]) ? $row["weight_kg"] : "") . "</td>";
            echo "<td>" . (isset($row["height_cm"]) ? $row["height_cm"] : "") . "</td>";
            echo "<td>" . (isset($row["bmi_above_6_years"]) ? $row["bmi_above_6_years"] : "") . "</td>";
            echo "<td>" . (isset($row["bmi_a"]) ? $row["bmi_a"] : "") . "</td>";
            echo "<td>" . (isset($row["hfa"]) ? $row["hfa"] : "") . "</td>";
            echo "<td>" . (isset($row["dewormed"]) ? $row["dewormed"] : "") . "</td>";
            echo "<td>" . (isset($row["parent_consent_milk"]) ? $row["parent_consent_milk"] : "") . "</td>";
            echo "<td>" . (isset($row["participation_4ps"]) ? $row["participation_4ps"] : "") . "</td>";
            echo "<td>" . (isset($row["beneficiary_sbfp_previous_years"]) ? $row["beneficiary_sbfp_previous_years"] : "") . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No beneficiaries found for this school</td></tr>";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
