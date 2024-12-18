<?php
// Start output buffering and session at the very beginning
ob_start();
session_start();

// Include necessary files
require_once('resource/components/connection.php');

// Check if the user is already logged in
if (isLoggedIn()) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if (!empty($mobile) && !empty($password)) {
        // Check if the mobile number exists
        $stmt = $conn->prepare("SELECT id, password, mobile_verify FROM users WHERE mobile = ?");
        $stmt->bind_param("s", $mobile);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Mobile number exists, attempt login
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['mobile_verify'] = $user['mobile_verify'];

                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid password";
            }
        } else {
            // Mobile number doesn't exist, register new user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $mobile_verify = 0;
            $master = 0; // Default value for master
            $permissions = 0; // Default value for permissions
            $sign_up_date = date('Y-m-d H:i:s');
            $ip_address = $_SERVER['REMOTE_ADDR'];

            $insert_stmt = $conn->prepare("INSERT INTO users (mobile, mobile_verify, password, master, permissions, sign_up_date, ip_address) 
                                          VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert_stmt->bind_param("sisiiss", $mobile, $mobile_verify, $hashed_password, $master, $permissions, $sign_up_date, $ip_address);

            if ($insert_stmt->execute()) {
                $new_user_id = $insert_stmt->insert_id;

                // Insert into wallet with a balance of 50
                $wallet_stmt = $conn->prepare("INSERT INTO wallet (userId, balance, created_at) VALUES (?, ?, ?)");
                $balance = 50; // Set balance to 50
                $created_at = date('Y-m-d H:i:s');
                $wallet_stmt->bind_param("ids", $new_user_id, $balance, $created_at);
                $wallet_stmt->execute(); // Execute the wallet insertion

                // Insert into transactions
                $transaction_stmt = $conn->prepare("INSERT INTO transactions (userId, type, amount, date) VALUES (?, ?, ?, ?)");
                $type = 1; // Transaction type
                $amount = 50; // Transaction amount
                $date = date('Y-m-d H:i:s'); // Current date
                $transaction_stmt->bind_param("iids", $new_user_id, $type, $amount, $date);
                $transaction_stmt->execute(); // Execute the transaction insertion

                // Registration successful, log in the new user
                $_SESSION['user_id'] = $new_user_id;
                $_SESSION['mobile_verify'] = 0;

                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Registration failed. Please try again!";
            }
        }
    } else {
        $error = "Please fill in all fields!";
    }
}

// Include header
include_once('resource/components/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub &copy; - Auth</title>
</head>

<body class="bg-zinc-950">
    <div class="w-full min-h-screen flex justify-center items-center">
        <div class="w-[350px] p-10 bg-black rounded-lg">
            <?php if (!empty($error)): ?>
                <p class="text-red-500 text-center mb-4 p-2 border-[1px] border-red-500">
                    <?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <img src="./public/images/logo.gif" alt="logo" class="w-32 md:w-40 m-auto mb-10">
            <form action="login.php" method="POST" class="gap-4 flex flex-col">
                <input type="text" name="mobile" placeholder="e.g. +91 8888888888"
                    class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white" />
                <input type="password" name="password" placeholder="Enter Your Password"
                    class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white" />
                <button type="submit"
                    class="w-full bg-green-600 rounded-lg p-2 text-white font-semibold hover:bg-green-800">Login / Sign
                    Up</button>
            </form>
        </div>
    </div>
    <?php include_once 'resource/components/footer.php'; ?>
</body>

</html>