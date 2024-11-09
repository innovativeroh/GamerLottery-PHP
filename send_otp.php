<?php
include_once('resource/components/connection.php');

$mobile = $_GET['mobile'] ?? '';
// file deepcode ignore InsecureRandomData: <please specify a reason of ignoring this>
$otp = mt_rand(100000, 999999); // Generate a 6-digit OTP

// Use the user_id from connection.php
// Assuming $user_id is already set in connection.php

$expired = 0; // Set initial expired status to 0 (not expired)

// Update previous OTPs for this user to expired
$update_stmt = $conn->prepare("UPDATE `otp` SET `expired` = 1 WHERE `user_id` = ? AND `expired` = 0");
$update_stmt->bind_param("i", $user_id);
$update_stmt->execute();
$update_stmt->close();

// Insert new OTP
$stmt = $conn->prepare("INSERT INTO `otp` (`user_id`, `otp`, `expired`) VALUES (?, ?, ?)");
$stmt->bind_param("isi", $user_id, $otp, $expired);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // OTP stored successfully, now send it via SMS
    $apiKey = 'zUcBVJ4fNgq7bWLESOIxmlrDiyTPsQ3uMtjhkdoRCFv5wYpXa2xhprVatY8cLgbCKqT2oRHvluisSX6m';

    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=$apiKey&route=otp&variables_values=$otp&flash=0&numbers=$mobile";

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "cache-control: no-cache"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo json_encode(['success' => false, 'message' => 'cURL Error: ' . $err]);
    } else {
        $result = json_decode($response, true);

        if (isset($result['return']) && $result['return'] === true) {
            echo json_encode(['success' => true, 'message' => 'OTP sent successfully']);
        } else {
            $errorMessage = isset($result['message']) ? $result['message'] : 'Unknown error occurred';
            echo json_encode(['success' => false, 'message' => 'Failed to send OTP: ' . $errorMessage]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to store OTP in database']);
}

$stmt->close();
$conn->close();