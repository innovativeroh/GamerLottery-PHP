<?php
include_once('resource/components/header.php');
if (!isLoggedIn()) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}

// Get bank verification status
$sql = "SELECT isVerify FROM `bank_verification` WHERE `userID`='$user_id' ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$bankVerified = false;
$bankRejected = false;
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $bankVerified = $row['isVerify'] == 1;
    $bankRejected = $row['isVerify'] == 2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-zinc-900 to-zinc-950 text-white font-sans min-h-screen">
    <div class="max-w-[1200px] mt-20 lg:mt-32 m-auto p-5">
        <!-- Improved Header Section -->
        <header class="mb-12">
            <div class="flex items-center gap-4 mb-2">
                <div class="w-12 h-12 bg-gradient-to-br from-lime-400 to-lime-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold">Welcome, <?=$final_name; ?>!</h1>
                    <p class="text-zinc-400">Here's your account overview</p>
                </div>
            </div>
        </header>

        <!-- Enhanced Wallet Balance Section -->
        <section class="mb-12">
            <div class="p-8 bg-gradient-to-br from-lime-500 via-lime-600 to-green-700 rounded-2xl shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-xl font-semibold Barlow">Your WinZone Wallet</h2>
                        <?php if ($bankVerified) { ?>
                            <span class="bg-white/20 px-3 py-1 rounded-full text-sm flex items-center gap-2">
                                <i class="fas fa-check-circle"></i> Bank Verified
                            </span>
                        <?php } ?>
                    </div>
                    <p class="text-5xl font-bold text-white mb-4">₹0.00</p>
                    <div class="flex gap-4">
                        <a href="<?php echo $bankVerified ? 'add_money.php' : 'bank_verification.php'; ?>" 
                           class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all flex items-center gap-2">
                            <?php if (!$bankVerified) { ?>
                                <i class="fas fa-bank"></i> Verify Bank
                            <?php } else { ?>
                                <i class="fas fa-plus"></i> Add Money
                            <?php } ?>
                        </a>
                        <button class="bg-green-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all">
                            Withdraw
                        </button>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-lime-400 rounded-full opacity-20 transform translate-x-20 -translate-y-20"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-green-700 rounded-full opacity-20 transform -translate-x-16 translate-y-16"></div>
            </div>
        </section>

        <!-- Improved Stats Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Unplayed Balance Card -->
            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-4 bg-lime-100 rounded-xl">
                        <i class="fa-solid fa-wallet text-lime-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm font-medium">Unplayed Balance</p>
                        <p class="text-3xl font-bold text-black">₹0.00</p>
                    </div>
                </div>
                <a href="<?php echo $bankVerified ? 'add_money.php' : 'bank_verification.php'; ?>" 
                   class="block w-full">
                    <button class="w-full bg-gradient-to-r from-lime-500 to-green-600 text-white font-bold py-3 px-6 rounded-xl hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <?php if (!$bankVerified) { ?>
                            <i class="fas fa-bank"></i> VERIFY BANK
                        <?php } else { ?>
                            <i class="fas fa-plus"></i> ADD CASH
                        <?php } ?>
                    </button>
                </a>
            </div>

            <!-- Bonus Card -->
            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-4 bg-orange-100 rounded-xl">
                        <i class="fa-solid fa-gift text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm font-medium">Bonus Balance</p>
                        <p class="text-3xl font-bold text-black">₹0.00</p>
                    </div>
                </div>
                <button class="w-full border-2 border-black text-black font-bold py-3 px-6 rounded-xl hover:bg-black hover:text-white transition-all">
                    EARN BONUS
                </button>
            </div>

            <!-- Winnings Card -->
            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-4 bg-purple-100 rounded-xl">
                        <i class="fa-solid fa-trophy text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm font-medium">Total Winnings</p>
                        <p class="text-3xl font-bold text-black">₹0.00</p>
                    </div>
                </div>
                <button class="w-full border-2 border-black text-black font-bold py-3 px-6 rounded-xl hover:bg-black hover:text-white transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-lock"></i>
                    WITHDRAW
                </button>
            </div>
        </div>

        <!-- Transactions Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Recent Transactions</h2>
            <div class="space-y-4">
                <?php if (!$bankVerified) { ?>
                    <!-- Bank Verification Notice -->
                    <div class="bg-zinc-800/50 p-6 rounded-xl border <?php echo $bankRejected ? 'border-red-500/20' : 'border-yellow-500/20'; ?>">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 <?php echo $bankRejected ? 'bg-red-500/20' : 'bg-yellow-500/20'; ?> rounded-xl flex items-center justify-center">
                                <i class="fa-solid <?php echo $bankRejected ? 'fa-times-circle text-red-500' : 'fa-exclamation-circle text-yellow-500'; ?>"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold <?php echo $bankRejected ? 'text-red-500' : 'text-yellow-500'; ?>">
                                    <?php echo $bankRejected ? 'Bank Verification Rejected' : 'Bank Verification Required'; ?>
                                </h3>
                                <p class="text-zinc-400 text-sm">
                                    <?php echo $bankRejected ? 'Your bank verification was rejected. Please try again with correct details.' : 'Please verify your bank account to start making transactions.'; ?>
                                </p>
                            </div>
                            <a href="bank_verification.php" 
                               class="<?php echo $bankRejected ? 'bg-red-500/20 text-red-500 hover:bg-red-500/30' : 'bg-yellow-500/20 text-yellow-500 hover:bg-yellow-500/30'; ?> px-4 py-2 rounded-lg font-semibold transition-all flex items-center gap-2">
                                <i class="fas fa-bank"></i> <?php echo $bankRejected ? 'Try Again' : 'Verify Now'; ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <!-- Withdrawal Transaction -->
                <div class="bg-zinc-800/50 p-4 rounded-xl flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-arrow-up text-red-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Withdrawal</h3>
                            <p class="text-zinc-400 text-sm">Mar 15, 2024</p>
                        </div>
                    </div>
                    <p class="text-red-500 font-bold">-₹500.00</p>
                </div>

                <!-- Deposit Transaction -->
                <div class="bg-zinc-800/50 p-4 rounded-xl flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-arrow-down text-green-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Deposit</h3>
                            <p class="text-zinc-400 text-sm">Mar 14, 2024</p>
                        </div>
                    </div>
                    <p class="text-green-500 font-bold">+₹1000.00</p>
                </div>

                <!-- Game Winning Transaction -->
                <div class="bg-zinc-800/50 p-4 rounded-xl flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-trophy text-purple-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Game Won</h3>
                            <p class="text-zinc-400 text-sm">Mar 13, 2024</p>
                        </div>
                    </div>
                    <p class="text-purple-500 font-bold">+₹750.00</p>
                </div>
            </div>
        </section>
    </div>
</body>

</html>