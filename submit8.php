<?php
session_start();

// Include Composer's autoloader and database connection
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
include("accountconnection.php");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $region_division = $_POST['region_division'];
    $amount_allocated = $_POST['amount_allocated'];
    $amount_downloaded = $_POST['amount_downloaded'];
    $status_fund_downloading = $_POST['status_fund_downloading'];
    $first_liquidation = $_POST['first_liquidation'];
    $second_liquidation = $_POST['second_liquidation'];
    $total_liquidation = $_POST['total_liquidation'];
    $liquidation_status = $_POST['liquidation_status'];
    $remarks = $_POST['remarks'];

    // Insert data into `quarterly_reportform8` table
    $sql = "INSERT INTO quarterly_reportform8 (region_division, amount_allocated, amount_downloaded, status_fund_downloading, first_liquidation, second_liquidation, total_liquidation, liquidation_status, remarks)
            VALUES ('$region_division', '$amount_allocated', '$amount_downloaded', '$status_fund_downloading', '$first_liquidation', '$second_liquidation', '$total_liquidation', '$liquidation_status', '$remarks')";

    if ($conn->query($sql) === TRUE) {
        $report_id = $conn->insert_id; // Get the report_id of the newly inserted row

        // Insert division schools data
        $division_schools = $_POST['division_schools'];
        $sdo_schools = $_POST['sdo_schools'];
        $target_sbfp_schools = $_POST['target_sbfp_schools'];
        $actual_sbfp_schools = $_POST['actual_sbfp_schools'];
        $percentage = $_POST['percentage'];
        $implementation_status = $_POST['implementation_status'];
        $target_beneficiaries = $_POST['target_beneficiaries'];
        $actual_beneficiaries = $_POST['actual_beneficiaries'];
        $completion_percentage = $_POST['completion_percentage'];

        for ($i = 0; $i < count($division_schools); $i++) {
            $sql_school = "INSERT INTO division_schools (report_id, division_school, sdo_school, target_sbfp_school, actual_sbfp_school, percent, status, target_beneficiaries, actual_beneficiaries, completion_percentage)
                           VALUES ('$report_id', '".$division_schools[$i]."', '".$sdo_schools[$i]."', '".$target_sbfp_schools[$i]."', '".$actual_sbfp_schools[$i]."', '".$percentage[$i]."', '".$implementation_status[$i]."', '".$target_beneficiaries[$i]."', '".$actual_beneficiaries[$i]."', '".$completion_percentage[$i]."')";

            if (!$conn->query($sql_school)) {
                echo "Error: " . $conn->error . "<br>SQL: " . $sql_school;
            }
        }

        // Generate PDF after successful submission
        generatePDF($report_id, $conn);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to generate PDF
function generatePDF($report_id, $conn) {
    // Fetch the report data
    $report_query = "SELECT * FROM quarterly_reportform8 WHERE report_id = $report_id";
    $report_result = $conn->query($report_query);
    $report_data = $report_result->fetch_assoc();

    // Fetch division schools data
    $division_query = "SELECT * FROM division_schools WHERE report_id = $report_id";
    $division_result = $conn->query($division_query);

    $currentYear = date('Y'); // Current year

    // Initialize Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($options);

    // Create the PDF content
    $html = '
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left; width: 15%;">
                <img src="data:image/png;base64,' . base64_encode(file_get_contents(__DIR__ . '/images/logo/semilogo.png')) . '" alt="Left Logo" style="width: 100px;">
            </td>
            <td style="text-align: center; width: 70%;">
                <h2>Department of Education</h2>
                <h3>Region 4A</h3>
            </td>
            <td style="text-align: right; width: 15%;">
                <img src="data:image/png;base64,' . base64_encode(file_get_contents(__DIR__ . '/images/LOGO.png')) . '" alt="Right Logo" style="width: 100px;">
            </td>
        </tr>
    </table>

    <br><br><br>
    <h2 style="text-align:center;">LIST OF BENEFICIARIES (SBFP) (SY ' . $currentYear . ')</h2>

    <table border="0" cellpadding="4" cellspacing="0" style="width: 100%;">
        <tr>
            <td style="text-align: left; width: 50%;">
                <strong>Division/Province:</strong> ' . $report_data['region_division'] . '<br>
                <strong>Amount Allocated:</strong> ' . $report_data['amount_allocated'] . '<br>
            </td>
            <td style="text-align: right; width: 50%;">
                <strong>Amount Downloaded:</strong> ' . $report_data['amount_downloaded'] . '<br>
                <strong>Status of Fund Downloading:</strong> ' . $report_data['status_fund_downloading'] . '<br>
            </td>
        </tr>
    </table>

    <table border="1" cellpadding="4" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Division/Schools</th>
                <th>No. of SDO Schools</th>
                <th>Target No. of SBFP Schools</th>
                <th>Actual No. of SBFP Schools</th>
                <th>% (SBFP Schools/SDO Schools)</th>
                <th>Status of Implementation</th>
                <th>No. of Target Beneficiaries</th>
                <th>No. of Actual Beneficiaries</th>
                <th>percent of Completion</th>
            </tr>
        </thead>
        <tbody>';

    while ($row = $division_result->fetch_assoc()) {
        $html .= "<tr>
                    <td>{$row['division_school']}</td>
                    <td>{$row['sdo_school']}</td>
                    <td>{$row['target_sbfp_school']}</td>
                    <td>{$row['actual_sbfp_school']}</td>
                    <td>{$row['percent']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['target_beneficiaries']}</td>
                    <td>{$row['actual_beneficiaries']}</td>
                    <td>{$row['completion_percentage']}</td>
                </tr>";
    }

    $html .= '</tbody></table>';

    $html .= "
    <table border='0' cellpadding='4' cellspacing='0' style='width: 100%; margin-top: 30px;'>
        <tr>
            <td style='text-align: left; width: 50%;'>
                <strong>Prepared by:</strong> _____________________<br>
                                                Feeding Focal Person
            </td>
            <td style='text-align: right; width: 50%;'>
                <strong>Approved by:</strong> _____________________<br>
                                                School Head
            </td>
        </tr>
    </table>";

    // Load HTML to Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("report_$report_id.pdf", array("Attachment" => false));

    // Optional: Provide a success message
    echo "<h2>Report submitted successfully! PDF generated.</h2>";
}

$conn->close();
?>
