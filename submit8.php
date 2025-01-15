<?php
session_start();

// Include Composer's autoloader and database connection
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
include("accountconnection.php");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $region_division = $conn->real_escape_string($_POST['region_division']);
    $amount_allocated = $conn->real_escape_string($_POST['amount_allocated']);
    $amount_downloaded = $conn->real_escape_string($_POST['amount_downloaded']);
    $status_fund_downloading = $conn->real_escape_string($_POST['status_fund_downloading']);
    $first_liquidation = $conn->real_escape_string($_POST['first_liquidation']);
    $second_liquidation = $conn->real_escape_string($_POST['second_liquidation']);
    $total_liquidation = $conn->real_escape_string($_POST['total_liquidation']);
    $liquidation_status = $conn->real_escape_string($_POST['liquidation_status']);
    $remarks = $conn->real_escape_string($_POST['remarks']);
    $current_date = date('Y-m-d');

    // Check if a report already exists for today
    $check_sql = "SELECT report_id FROM quarterly_reportform8 WHERE date_submitted = '$current_date' AND region_division = '$region_division'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Update existing report
        $row = $check_result->fetch_assoc();
        $report_id = $row['report_id'];

        $update_sql = "UPDATE quarterly_reportform8 
                       SET amount_allocated = '$amount_allocated', 
                           amount_downloaded = '$amount_downloaded', 
                           status_fund_downloading = '$status_fund_downloading', 
                           first_liquidation = '$first_liquidation', 
                           second_liquidation = '$second_liquidation', 
                           total_liquidation = '$total_liquidation', 
                           liquidation_status = '$liquidation_status', 
                           remarks = '$remarks' 
                       WHERE report_id = '$report_id'";
        $conn->query($update_sql);

        // Delete old division schools data for this report
        $conn->query("DELETE FROM division_schools WHERE report_id = '$report_id'");
    } else {
        // Insert new report
        $insert_sql = "INSERT INTO quarterly_reportform8 (region_division, amount_allocated, amount_downloaded, status_fund_downloading, first_liquidation, second_liquidation, total_liquidation, liquidation_status, remarks, date_submitted)
                       VALUES ('$region_division', '$amount_allocated', '$amount_downloaded', '$status_fund_downloading', '$first_liquidation', '$second_liquidation', '$total_liquidation', '$liquidation_status', '$remarks', '$current_date')";

        if ($conn->query($insert_sql) === TRUE) {
            $report_id = $conn->insert_id; // Get the report_id of the newly inserted row
        } else {
            echo "Error inserting into quarterly_reportform8: " . $conn->error . "<br>SQL: " . $insert_sql;
            exit;
        }
    }

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
        $sql_school = "INSERT INTO division_schools (report_id, division_school, sdo_school, target_sbfp_school, actual_sbfp_school, percent, status, target_beneficiaries, actual_beneficiaries, completion_percentage, date_submitted)
                       VALUES ('$report_id', '" . $conn->real_escape_string($division_schools[$i]) . "', 
                               '" . $conn->real_escape_string($sdo_schools[$i]) . "', 
                               '" . $conn->real_escape_string($target_sbfp_schools[$i]) . "', 
                               '" . $conn->real_escape_string($actual_sbfp_schools[$i]) . "', 
                               '" . $conn->real_escape_string($percentage[$i]) . "', 
                               '" . $conn->real_escape_string($implementation_status[$i]) . "', 
                               '" . $conn->real_escape_string($target_beneficiaries[$i]) . "', 
                               '" . $conn->real_escape_string($actual_beneficiaries[$i]) . "', 
                               '" . $conn->real_escape_string($completion_percentage[$i]) . "', 
                               '$current_date')";

        if (!$conn->query($sql_school)) {
            echo "Error inserting into division_schools: " . $conn->error . "<br>SQL: " . $sql_school;
        }
    }


        // Generate PDF after successful submission
        generatePDF($report_id, $conn);
    } else {
        echo "Error inserting into quarterly_reportform8: " . $conn->error . "<br>SQL: " . $sql;
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
    <h4 style="text-align:center;">LIST OF BENEFICIARIES (SBFP) (SY ' . $currentYear . ')</h4>
    <table border="0" cellpadding="4" cellspacing="0" style="width: 100%;">
    <tr>
        <td style="text-align: left; width: 50%;">
            <strong>Region/Division:___________________</strong>
           
    </tr>
</table>

<br>
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
                <th>Percent of Completion</th>
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

    // Add additional details
    $html .= "<br><br>
    <table border='1' cellpadding='4' cellspacing='0' style='width: 100%; border-collapse: collapse;'>
        <tr>
            <th>Amount Allocated</th>
            <th>Amount Downloaded</th>
            <th>Fund Downloading Status</th>
            <th>First Liquidation</th>
            <th>Second Liquidation</th>
            <th>Total Liquidation</th>
            <th>Liquidation Status</th>
            <th>Remarks</th>
        </tr>
        <tr>
            <td>{$report_data['amount_allocated']}</td>
            <td>{$report_data['amount_downloaded']}</td>
            <td>{$report_data['status_fund_downloading']}</td>
            <td>{$report_data['first_liquidation']}</td>
            <td>{$report_data['second_liquidation']}</td>
            <td>{$report_data['total_liquidation']}</td>
            <td>{$report_data['liquidation_status']}</td>
            <td>{$report_data['remarks']}</td>
        </tr>
    </table>";

    // Add signatures
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
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // Stream the generated PDF
    $dompdf->stream("Quarterly_Report_Form_8", ["Attachment" => false]);
    exit;
}
?>
