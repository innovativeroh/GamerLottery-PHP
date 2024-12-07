<?php
include_once("./includes/connection.php");
// Add authentication check here

if(isset($_POST['action']) && isset($_POST['bank_id'])) {
    $bank_id = mysqli_real_escape_string($conn, $_POST['bank_id']);
    $action = $_POST['action'];
    
    if($action === 'approve') {
        $sql = "UPDATE bank_details SET isVerified = 1 WHERE id = '$bank_id'";
    } else if($action === 'reject') {
        $sql = "UPDATE bank_details SET isVerified = 2 WHERE id = '$bank_id'";
    }
    
    if(mysqli_query($conn, $sql)) {
        header("Location: dashboard.php?status=success");
    } else {
        header("Location: dashboard.php?status=error");
    }
} else {
    header("Location: dashboard.php");
}
exit(); 