<?php
// Include database connection
include_once 'resource/components/connection.php';

if (isset($_POST['register'])) {
    $fname = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = $_POST['password'];
    $refer_by = trim($_POST['refer_by']);
    $error = '';

    // Validation
    if (empty($fname) || empty($email) || empty($mobile) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } elseif (!preg_match('/^\+?\d{10,15}$/', $mobile)) {
        $error = "Invalid mobile number format. Please enter a valid number.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        // Check if the mobile number or email already exists
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE mobile = ? OR email = ?");
        $check_stmt->bind_param("ss", $mobile, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error = "Mobile number or email is already registered.";
        }
    }

    if (empty($error)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $mobile_verify = 0; // Default value for mobile verification
        $master = 0; // Default value for master
        $permissions = 0; // Default value for permissions
        $sign_up_date = date('Y-m-d H:i:s');
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // Generate a random alphanumeric referral ID
        $refer_id = bin2hex(random_bytes(5)); // Generates a random 10-character alphanumeric string

        // SQL Insert Statement
        $sql = "INSERT INTO `users`(`full_name`, `email`, `mobile`, `mobile_verify`, `password`, `master`, `permissions`, `sign_up_date`, `ip_address`, `refer`, `refer_by`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $fname, $email, $mobile, $mobile_verify, $hashed_password, $master, $permissions, $sign_up_date, $ip_address, $refer_id, $refer_by);

        if ($stmt->execute()) {
            // Registration successful
            echo "<p class='text-green-500'>Registration successful!</p>";
        } else {
            echo "<p class='text-red-500'>Registration failed. Please try again!</p>";
        }
    } else {
        echo "<p class='text-red-500'>$error</p>"; // Display validation error
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="max-w-md mx-auto mt-10 p-5 bg-gray-800 rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">Register</h1>
        <form action="simple.php" method="POST" class="flex flex-col gap-4">
            <input type="text" name="fname" placeholder="Full Name" required class="p-2 bg-gray-700 border border-gray-600 rounded">
            <input type="email" name="email" placeholder="Email" required class="p-2 bg-gray-700 border border-gray-600 rounded">
            <input type="text" name="mobile" placeholder="Mobile" required class="p-2 bg-gray-700 border border-gray-600 rounded">
            <input type="password" name="password" placeholder="Password" required class="p-2 bg-gray-700 border border-gray-600 rounded">
            <input type="text" name="refer_by" placeholder="Reference Code (optional)" class="p-2 bg-gray-700 border border-gray-600 rounded">
            <button type="submit" name="register" class="bg-green-600 p-2 rounded hover:bg-green-700">Sign Up</button>
        </form>
        <p class="mt-4">Already have an account? <a href="login.php" class="text-green-400">Login here</a></p>
    </div>
</body>

</html>
