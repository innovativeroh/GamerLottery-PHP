<?php
include_once("./includes/connection.php");

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $sql = "SELECT * FROM bank_verification WHERE userId = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    header('Content-Type: application/json');
    echo json_encode($data);
}