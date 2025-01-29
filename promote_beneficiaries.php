<?php
include("accountconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['beneficiaries'])) {
    $selectedBeneficiaries = $_POST['beneficiaries']; // Array of selected beneficiary IDs

    // Loop through selected beneficiaries
    foreach ($selectedBeneficiaries as $beneficiaryId) {
        // Get current beneficiary data (you can get it based on $beneficiaryId)
        $stmt = $conn->prepare("SELECT grade_section FROM beneficiary_details WHERE id = ?");
        $stmt->bind_param("i", $beneficiaryId);
        $stmt->execute();
        $stmt->bind_result($currentGradeSection);
        $stmt->fetch();
        $stmt->close();

        // Promote to next grade level (for example, you could simply increment grade level here)
        $grades = array("Kinder", "Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5", "Grade 6");
        $nextGradeIndex = array_search($currentGradeSection, $grades) + 1;
        $nextGradeSection = isset($grades[$nextGradeIndex]) ? $grades[$nextGradeIndex] : $currentGradeSection; // Ensure it doesn't go out of bounds

        // Update the beneficiary with the new grade_section
        $updateStmt = $conn->prepare("UPDATE beneficiary_details SET grade_section = ? WHERE id = ?");
        $updateStmt->bind_param("si", $nextGradeSection, $beneficiaryId);
        $updateStmt->execute();
        $updateStmt->close();
    }

    $_SESSION['response'] = ['status' => 'success', 'msg' => 'Selected beneficiaries have been promoted.'];
    header("Location: form1.php");
}
?>
