<?php
include_once ("./includes/connection.php");

header('Content-Type: application/json');

if(isset($_POST['user_id']) && isset($_POST['status'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    $sql = "UPDATE bank_verification SET isVerify = '$status' WHERE userId = '$user_id'";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating status: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters']);
} 