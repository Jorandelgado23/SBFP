<?php
include("accountconnection.php");

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$new_status = $data->is_active;

// Fetch the logged-in user's email
session_start();
$current_user_email = $_SESSION['email']; // Assuming email is stored in the session

$response = array();

if ($current_user_email == 'mainadmin@sbfp.ph') {
    $sql = "UPDATE users SET is_active = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_status, $id);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to update user status.';
    }
    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Only the main admin can perform this action.';
}

$conn->close();
echo json_encode($response);
?>
