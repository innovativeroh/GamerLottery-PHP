<?php include_once 'resource/components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub - Your Premier Gaming Destination</title>
</head>

<body class="bg-gray-950">
    <!-- Hero Section -->
    <div class="relative bg-[#0A1128] min-h-screen pt-16 sm:pt-20 overflow-hidden">
        <!-- Ludo Board Animation Background -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Animated Dice -->
            <div
                class="absolute animate-float opacity-10 top-20 left-20 w-24 h-24 border-2 border-white/20 rounded-lg rotate-12">
            </div>
            <div
                class="absolute animate-float-delayed opacity-10 bottom-40 right-20 w-16 h-16 border-2 border-white/20 rounded-lg -rotate-12">
            </div>

            <!-- Animated Ludo Tokens -->
            <div class="absolute animate-spin-slow top-40 right-40 w-8 h-8 rounded-full bg-red-500/20"></div>
            <div class="absolute animate-spin-slow-delayed bottom-60 left-40 w-8 h-8 rounded-full bg-yellow-500/20">
            </div>
            <div class="absolute animate-spin-slow top-1/2 left-1/3 w-8 h-8 rounded-full bg-green-500/20"></div>
            <div class="absolute animate-spin-slow-delayed bottom-40 right-1/3 w-8 h-8 rounded-full bg-blue-500/20">
            </div>

            <!-- Ludo Path Lines -->
            <div
                class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-white/5 to-transparent">
            </div>
            <div
                class="absolute top-0 right-1/4 w-px h-full bg-gradient-to-b from-transparent via-white/5 to-transparent">
            </div>
            <div
                class="absolute top-1/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/5 to-transparent">
            </div>
            <div
                class="absolute bottom-1/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/5 to-transparent">
            </div>
        </div>

        <!-- Subtle animated gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-transparent to-red-900/20"></div>

        <!-- Minimal particles effect -->
        <div class="particles-container absolute inset-0" id="particles-js"></div>

        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="min-h-[calc(100vh-4rem)] sm:min-h-[calc(100vh-5rem)] w-full flex flex-col md:flex-row items-center justify-center py-12 md:py-0">
                <!-- Left Content -->
                <div class="flex-1 text-center md:text-left mb-8 md:mb-0">
                    <div class="flex flex-col gap-6 md:gap-8 animate-fadeIn">
                        <div class="space-y-4">
                            <h1 class="text-white text-5xl sm:text-6xl md:text-7xl font-bold leading-tight">
                                Master the Game <br>
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-500">Win
                                    Big</span>
                            </h1>
                            <p class="text-gray-300 text-lg sm:text-xl max-w-xl">
                                Experience the thrill of classic Ludo with a modern twist.
                                Compete, strategize, and earn rewards.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                            <button
                                class="group relative px-8 py-4 bg-gradient-to-r from-red-500 to-yellow-500 rounded-lg text-white font-semibold hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                                Play Now
                                <span
                                    class="absolute -right-2 -top-2 bg-green-500 text-xs px-2 py-1 rounded-full animate-pulse">
                                    LIVE
                                </span>
                            </button>
                            <button
                                class="px-8 py-4 border border-gray-600 rounded-lg text-gray-300 font-semibold hover:bg-white/5 transition-all duration-300">
                                Learn More
                            </button>
                        </div>

                        <!-- Minimal Stats -->
                        <div class="flex gap-8 justify-center md:justify-start mt-8">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">50K+</div>
                                <div class="text-gray-400 text-sm">Players</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">₹1000</div>
                                <div class="text-gray-400 text-sm">Top Prize</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">24/7</div>
                                <div class="text-gray-400 text-sm">Live Games</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="flex-1 relative">
                    <div class="relative max-w-[90%] mx-auto">
                        <!-- Subtle glow effect -->
                            
                        
                        <div
                            class="flex flex-wrap justify-start items-center m-[40px] bg-black bg-opacity-50 p-10 rounded-xl">
                            <br />
                            <br />
                            <form action="index.php" method="POST" class="gap-4 flex flex-col flex-[1]">
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
                                } elseif (!empty($refer_by)) {
                                    // Validate reference code only if refer_by is not empty
                                    $refer_check_stmt = $conn->prepare("SELECT id FROM users WHERE refer = ?");
                                    $refer_check_stmt->bind_param("s", $refer_by);
                                    $refer_check_stmt->execute();
                                    $refer_check_result = $refer_check_stmt->get_result();

                                    if ($refer_check_result->num_rows === 0) {
                                        $error = "Reference code is invalid.";
                                    }
                                }

                                // Check if the mobile number or email already exists
                                if (empty($error)) {
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

                                        // Determine coin amounts
                                        $new_user_coins = 80; // Coins for the new user
                                        $referrer_coins = 30; // Coins for the referrer
                                        $new_user_id = $stmt->insert_id; // Get the new user's ID

                                        // Check if a valid referral code was used
                                        if (!empty($refer_by)) {
                                            // Check if the new user already has a wallet entry
                                            $wallet_check_stmt = $conn->prepare("SELECT balance FROM wallet WHERE userId = ?");
                                            $wallet_check_stmt->bind_param("i", $new_user_id);
                                            $wallet_check_stmt->execute();
                                            $wallet_check_result = $wallet_check_stmt->get_result();

                                            if ($wallet_check_result->num_rows > 0) {
                                                // Update the existing wallet balance
                                                $wallet_row = $wallet_check_result->fetch_assoc();
                                                $new_balance = $wallet_row['balance'] + $new_user_coins; // Update balance
                                                $update_wallet_stmt = $conn->prepare("UPDATE wallet SET balance = ? WHERE userId = ?");
                                                $update_wallet_stmt->bind_param("di", $new_balance, $new_user_id);
                                                $update_wallet_stmt->execute(); // Execute the wallet update
                                            } else {
                                                // Insert into wallet for the new user
                                                $created_at = date('Y-m-d H:i:s');
                                                $wallet_stmt = $conn->prepare("INSERT INTO wallet (userId, balance, created_at) VALUES (?, ?, ?)");
                                                $wallet_stmt->bind_param("ids", $new_user_id, $new_user_coins, $created_at);
                                                $wallet_stmt->execute(); // Execute the wallet insertion
                                            }

                                            // Add coins to the referrer
                                            $referrer_stmt = $conn->prepare("SELECT id FROM users WHERE refer = ?");
                                            $referrer_stmt->bind_param("s", $refer_by);
                                            $referrer_stmt->execute();
                                            $referrer_result = $referrer_stmt->get_result();

                                            if ($referrer_result->num_rows > 0) {
                                                $referrer_row = $referrer_result->fetch_assoc();
                                                $referrer_id = $referrer_row['id'];

                                                // Check if the referrer already has a wallet entry
                                                $referrer_wallet_check_stmt = $conn->prepare("SELECT balance FROM wallet WHERE userId = ?");
                                                $referrer_wallet_check_stmt->bind_param("i", $referrer_id);
                                                $referrer_wallet_check_stmt->execute();
                                                $referrer_wallet_check_result = $referrer_wallet_check_stmt->get_result();

                                                if ($referrer_wallet_check_result->num_rows > 0) {
                                                    // Update the existing referrer's wallet balance
                                                    $referrer_wallet_row = $referrer_wallet_check_result->fetch_assoc();
                                                    $new_referrer_balance = $referrer_wallet_row['balance'] + $referrer_coins; // Update balance
                                                    $update_referrer_wallet_stmt = $conn->prepare("UPDATE wallet SET balance = ? WHERE userId = ?");
                                                    $update_referrer_wallet_stmt->bind_param("di", $new_referrer_balance, $referrer_id);
                                                    $update_referrer_wallet_stmt->execute(); // Execute the referrer wallet update
                                                } else {
                                                    // Insert into wallet for the referrer
                                                    $created_at = date('Y-m-d H:i:s');
                                                    $referrer_wallet_stmt = $conn->prepare("INSERT INTO wallet (userId, balance, created_at) VALUES (?, ?, ?)");
                                                    $referrer_wallet_stmt->bind_param("ids", $referrer_id, $referrer_coins, $created_at);
                                                    $referrer_wallet_stmt->execute(); // Execute the referrer wallet insertion
                                                }
                                            }
                                        } else {
                                            // If no referral code, just give the new user 50 coins
                                            $created_at = date('Y-m-d H:i:s');
                                            $wallet_stmt = $conn->prepare("INSERT INTO wallet (userId, balance, created_at) VALUES (?, ?, ?)");
                                            $balance = 50; // Set balance to 50
                                            $wallet_stmt->bind_param("ids", $new_user_id, $balance, $created_at);
                                            $wallet_stmt->execute(); // Execute the wallet insertion
                                        }

                                        // Insert into transactions for the new user
                                        $transaction_stmt = $conn->prepare("INSERT INTO transactions (userId, type, amount, date) VALUES (?, ?, ?, ?)");
                                        $type = 1; // Transaction type
                                        $amount = $new_user_coins; // Transaction amount for the new user
                                        $date = date('Y-m-d H:i:s'); // Current date
                                        $transaction_stmt->bind_param("iids", $new_user_id, $type, $amount, $date);
                                        $transaction_stmt->execute(); // Execute the transaction insertion
                                    } else {
                                        echo "<p class='text-red-500'>Registration failed. Please try again!</p>";
                                    }
                                } else {
                                    echo "<p class='text-red-500'>$error</p>"; // Display validation error
                                }
                            }
                            ?>    
                            <h1 class="text-2xl font-semibold">Register</h1>
                                <input type="text" name="fname" placeholder="Full Name" required class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white">
                                <input type="email" name="email" placeholder="Email" required class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white">
                                <input type="text" name="mobile" placeholder="Mobile" required class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white">
                                <input type="password" name="password" placeholder="Password" required class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white">
                                <input type="text" name="refer_by" placeholder="Reference Code (optional)" class="w-full p-2 bg-transparent border-[1px] rounded-lg border-zinc-800 outline-none text-white">
                                <button type="submit" name="register" class="w-full bg-green-600 rounded-lg p-2 text-white font-semibold hover:bg-green-800">Sign Up</button>
                                <span class="text-center text-white">Already have an account? <a href="#" class="font-semibold text-green-600">Login</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'resource/components/about.php'; ?>
    <?php include_once 'resource/components/games.php'; ?>
    <?php include_once 'resource/components/footer.php'; ?>

    <!-- Updated Particles.js for minimal effect -->
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 20 },
                color: { value: ['#ffffff'] },
                shape: {
                    type: ['circle', 'edge'],
                    stroke: { width: 1, color: '#ffffff' }
                },
                opacity: {
                    value: 0.1,
                    random: true
                },
                size: {
                    value: 8,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 4,
                        sync: false
                    }
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: true,
                    straight: false,
                    outMode: 'out',
                    bounce: true
                }
            }
        });
    </script>
</body>

</html>