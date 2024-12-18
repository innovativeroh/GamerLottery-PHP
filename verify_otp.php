<?php
header('Content-Type: application/json');
include_once('resource/components/connection.php');

$entered_otp = $_POST['otp'] ?? '';
$full_name = $_POST['full_name'] ?? '';

try {
    // Verify OTP
    $stmt = $conn->prepare("SELECT * FROM `otp` WHERE `user_id` = ? AND `otp` = ? AND `expired` = 0 ORDER BY `id` DESC LIMIT 1");
    $stmt->bind_param("is", $user_id, $entered_otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // OTP is valid
        // Start a transaction
        $conn->begin_transaction();

        try {
            // Mark the OTP as expired
            $expire_stmt = $conn->prepare("UPDATE `otp` SET `expired` = 1 WHERE `user_id` = ?");
            $expire_stmt->bind_param("i", $user_id);
            $expire_stmt->execute();
            $expire_stmt->close();

            // Update user's mobile verification status
            $verify_stmt = $conn->prepare("UPDATE `users` SET `mobile_verify` = 1 WHERE `id` = ?");
            $verify_stmt->bind_param("i", $user_id);
            $verify_stmt->execute();
            $verify_stmt->close();

            // Commit the transaction
            $conn->commit();
            
            echo json_encode(['success' => true, 'message' => 'Mobile verified successfully!']);
        } catch (Exception $e) {
            // An error occurred; rollback the transaction
            $conn->rollback();
            echo json_encode(['success' => false, 'message' => 'Error updating verification status: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}