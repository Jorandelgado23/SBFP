<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";
// Check if session_id is provided in the URL
if (isset($_GET['school_id'])) {
    $school_id = $_GET['school_id'];
    
    // Fetch beneficiary details for the selected school
    $sql_details = "SELECT * FROM beneficiary_details WHERE beneficiary_id IN (SELECT id FROM beneficiaries WHERE school_id_number = '$school_id')";
    
    // Create a new connection
    $conn_details = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn_details->connect_error) {
        die("Connection failed: " . $conn_details->connect_error);
    }

    // Execute SQL query
    $result_details = $conn_details->query($sql_details);

    // Check if there are any results
    if ($result_details->num_rows > 0) {
        // Display the beneficiary details in a table
        echo "<div class='col-md-12 my-4'>
                <h2 class='h4 mb-1'>Beneficiary Details</h2>
                <div class='card shadow'>
                    <div class='card-body'>
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Grade/Section</th>
                                    <th>Date of Birth</th>
                                    <th>Date of Weighing</th>
                                    <th>Age</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>BMI</th>
                                    <th>Nutritional Status (BMI-A)</th>
                                    <th>Nutritional Status (HFA)</th>
                                    <th>Dewormed</th>
                                    <th>Parent's Consent for Milk</th>
                                    <th>Participation in 4Ps</th>
                                    <th>Beneficiary of SBFP in Previous Years</th>
                                </tr>
                            </thead>
                            <tbody>";
        
        // Output data of each row
        while ($row_details = $result_details->fetch_assoc()) {
            echo "<tr>
                    <td>{$row_details['name']}</td>
                    <td>{$row_details['sex']}</td>
                    <td>{$row_details['grade_section']}</td>
                    <td>{$row_details['date_of_birth']}</td>
                    <td>{$row_details['date_of_weighing']}</td>
                    <td>{$row_details['age']}</td>
                    <td>{$row_details['weight']}</td>
                    <td>{$row_details['height']}</td>
                    <td>{$row_details['bmi']}</td>
                    <td>{$row_details['nutritional_status_bmia']}</td>
                    <td>{$row_details['nutritional_status_hfa']}</td>
                    <td>{$row_details['dewormed']}</td>
                    <td>{$row_details['parents_consent_for_milk']}</td>
                    <td>{$row_details['participation_in_4ps']}</td>
                    <td>{$row_details['beneficiary_of_sbfp_in_previous_years']}</td>
                </tr>";
        }
        
        echo "</tbody></table></div></div></div>";
    } else {
        echo "No beneficiaries found for this school.";
    }
    
    // Close the database connection
    $conn_details->close();
} else {
    echo "School ID not provided.";
}
?>
