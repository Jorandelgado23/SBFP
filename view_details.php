<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png" type="image/x-icon">

    <title>VIEW DETAILS</title>

    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="light">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbfp";

// Check if session_id is provided in the URL
if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch beneficiary details for schools with the same session ID
    $sql_details = "SELECT bd.* 
                    FROM beneficiary_details bd 
                    INNER JOIN beneficiaries b ON bd.beneficiary_id = b.id 
                    WHERE b.session_id = '$session_id'";

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

        // Close the database connection
        $conn_details->close();
    } else {
        echo "No beneficiaries found for this session.";
    }
}
?>

<!-- Back Button -->
<form action="adbeneficiaries.php" method="get">
    <button type="submit" class="btn btn-primary">Back</button>
</form>

<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

</body>

</html>
