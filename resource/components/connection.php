<?php
// Database connection parameters
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gamerlottery";

// Create connection
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Set charset to utf8mb4
mysqli_set_charset($conn, "utf8mb4");
// Set default timezone
date_default_timezone_set("Asia/Calcutta");

// Start session
@session_start();

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Only proceed with user data retrieval if logged in
if (isLoggedIn()) {
    $user = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $mobile = $row['mobile'];
        $user_id = $row['id'];
        $mobile_verify = $row['mobile_verify'];
    }
    mysqli_stmt_close($stmt);
}

// You can add other global functions or configurations here
