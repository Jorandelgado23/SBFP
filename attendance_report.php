<?php
include("accountconnection.php");
require 'vendor/autoload.php'; // Ensure Dompdf is loaded

use Dompdf\Dompdf;
use Dompdf\Options;

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch list of schools for the dropdown
$schoolQuery = "SELECT DISTINCT name_of_school FROM beneficiaries";
$schoolResult = $conn->query($schoolQuery);

// Fetch list of grade levels for the dropdown
$grades = ['Kinder', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'];

// Get filter parameters
$filter_school = isset($_POST['name_of_school']) ? $_POST['name_of_school'] : '';
$filter_grade = isset($_POST['grade_section']) ? $_POST['grade_section'] : '';

// Prepare SQL query to summarize attendance
$sql = "
    SELECT 
        b.name_of_school, 
        ba.grade_section, 
        ba.name AS student_name,
        COUNT(DISTINCT CASE WHEN ba.status = 'Present' THEN ba.id END) AS total_present,
        COUNT(DISTINCT CASE WHEN ba.status = 'Absent' THEN ba.id END) AS total_absent,
        COUNT(DISTINCT ba.id) AS total_attendance,
        (COUNT(DISTINCT CASE WHEN ba.status = 'Present' THEN ba.id END) / COUNT(DISTINCT ba.id)) * 100 AS attendance_rate
    FROM beneficiary_attendance AS ba
    JOIN beneficiaries AS b ON ba.session_id = b.session_id
    WHERE 1=1
";

if ($filter_school) $sql .= " AND b.name_of_school = ?";
if ($filter_grade) $sql .= " AND ba.grade_section = ?";

$sql .= " GROUP BY b.name_of_school, ba.grade_section, ba.name";

$stmt = $conn->prepare($sql);

// Bind parameters
$params = [];
if ($filter_school) $params[] = $filter_school;
if ($filter_grade) $params[] = $filter_grade;

// Dynamically bind parameters
if ($params) {
    $types = str_repeat('s', count($params)); // All parameters are strings
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

// Create an associative array to hold the results by school
$attendanceData = [];
while ($row = $result->fetch_assoc()) {
    $attendanceData[$row['name_of_school']][] = $row;
}

// Get paths for the logos
$leftLogoPath = __DIR__ . '/images/LOGO.png';
$rightLogoPath = __DIR__ . '/images/logo/semilogo.png';

// Ensure the images exist
if (!file_exists($leftLogoPath)) {
    echo "Left logo not found.";
    return;
}
if (!file_exists($rightLogoPath)) {
    echo "Right logo not found.";
    return;
}

$leftLogoBase64 = base64_encode(file_get_contents($leftLogoPath));
$rightLogoBase64 = base64_encode(file_get_contents($rightLogoPath));

$currentYear = date("Y");

// Start output buffering to capture the HTML content
ob_start(); 

?>

<!-- Filter Form -->
<form method="POST" action="" class="form-inline" style="margin-bottom: 20px;">
    <!-- Include form elements as before if needed for the web version -->
</form>

<!-- Header Section -->
<table style="width: 100%;">
    <tr>
        <td style="text-align: left; width: 15%;">
            <img src="data:image/png;base64,<?php echo $leftLogoBase64; ?>" alt="Left Logo" style="width: 100px;">
        </td>
        <td style="text-align: center; width: 70%;">
            <h5>Department of Education</h5>
            <h6>Region 4A</h6>
            <h5>SCHOOL-BASED FEEDING PROGRAM (SBFP) ATTENDANCE REPORT (SY <?php echo $currentYear; ?>)</h5>
        </td>
        <td style="text-align: right; width: 15%;">
            <img src="data:image/png;base64,<?php echo $rightLogoBase64; ?>" alt="Right Logo" style="width: 100px;">
        </td>
    </tr>
</table>
<table style="width: 100%; margin-top: 10px;">
    <tr>
        <td style="text-align: left;">
            <strong>Division/Province:</strong> ______________________________________<br>
            <!-- <strong>School District/City/ Municipality:</strong> ____________________________ -->
        </td>
    </tr>
</table>

<!-- Table Section -->
<div class="col-md-12">
    <div class="white_shd full margin_bottom_30">
        <div class="full graph_head">
           
        </div>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
                <?php
                foreach ($attendanceData as $schoolName => $logs): ?>
                    <h3><?php echo htmlspecialchars($schoolName); ?></h3>
                    <table class="table table-hover" border="1" cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>Grade Level</th>
                                <th>Student Name</th>
                                <th>Total Present</th>
                                <th>Total Absent</th>
                                <th>Total Attendance</th>
                                <th>Attendance Rate (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($logs as $log): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($log['grade_section']); ?></td>
                                    <td><?php echo htmlspecialchars($log['student_name']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_present']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_absent']); ?></td>
                                    <td><?php echo htmlspecialchars($log['total_attendance']); ?></td>
                                    <td><?php echo number_format($log['attendance_rate'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


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
        <br>
    </table>

<?php
$html = ob_get_clean(); // Get HTML content and stop buffering

// Create Dompdf instance
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Stream the PDF to the browser
$dompdf->stream("Attendance_Summary.pdf", ["Attachment" => 1]); // Use 0 for inline display
?>
