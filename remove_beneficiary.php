<?php
session_start(); // Ensure session is started

include("accountconnection.php");

// Fetch data from AJAX request
$beneficiary_id = $_POST['beneficiary_id']; // Get beneficiary_id from AJAX request

// Start a transaction to ensure data integrity
$conn->begin_transaction();

$response = array(); // Initialize response array

try {
    // Delete from beneficiary_details table (using beneficiary_id to identify the record)
    $sql1 = "DELETE FROM beneficiary_details WHERE beneficiary_id=?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $beneficiary_id); // Bind beneficiary_id as the parameter
    $stmt1->execute();

    // Delete from beneficiaries table (using beneficiary_id to identify the record)
    $sql2 = "DELETE FROM beneficiaries WHERE beneficiary_id=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $beneficiary_id); // Bind beneficiary_id as the parameter
    $stmt2->execute();

    // Commit the transaction
    $conn->commit();

    // Log the activity if the email is set and the role is 'sbfp'
    if (isset($_SESSION['email']) && $_SESSION['role'] === 'sbfp') {
        $activity = "Deleted beneficiary details for Beneficiary ID: $beneficiary_id";
        $activity_type = "delete"; // Define the activity type
        $timestamp = date("Y-m-d H:i:s");

        // Prepare statement for logging recent_activity
        $log_stmt = $conn->prepare("INSERT INTO recent_activity (activity, email, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $log_stmt->bind_param("ssss", $activity, $_SESSION['email'], $activity_type, $timestamp);
        $log_stmt->execute();
        $log_stmt->close();

        // Prepare statement for logging sbfp_recent_activity
        $sbfp_activity_stmt = $conn->prepare("INSERT INTO sbfp_recent_activity (email, activity, activity_type, timestamp) VALUES (?, ?, ?, ?)");
        $sbfp_activity_stmt->bind_param("ssss", $_SESSION['email'], $activity, $activity_type, $timestamp);
        $sbfp_activity_stmt->execute();
        $sbfp_activity_stmt->close();
    }

    // Success response
    $response['success'] = true;
    $response['message'] = "Record deleted successfully"; // Success message
} catch (Exception $e) {
    // If any error occurs, roll back the transaction
    $conn->rollback();

    $response['success'] = false; // Indicate failure
    $response['message'] = "Error deleting record: " . $e->getMessage(); // Error message
}

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the statements and connection
$stmt1->close();
$stmt2->close();
$conn->close();
?>
