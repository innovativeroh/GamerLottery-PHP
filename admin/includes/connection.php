<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gamerlottery";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");
if (!$conn == true) {
    echo "Database Error!";
}
session_start();
$global_full_name = "";
$global_master = "";
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    $sql = "SELECT * FROM `users` WHERE `email`='$user'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $global_id = $row["id"];
        $global_full_name = $row["full_name"];
        if($global_full_name == "") {
            $global_full_name = "Student";
        } else {
            $global_full_name;
        }
        $global_mobile = $row["mobile"];
        $global_email = $row["email"];
        $global_permissions = $row["permissions"];
        $global_master = $row['master'];
    }
    if($global_permissions == "1") {
        $power = "Administrator";
    } else if($global_permissions == "2") {
        $power = "Teacher";
    } else {
        $power = "Student";
    }
}
else {
    $user = "No User!";
}