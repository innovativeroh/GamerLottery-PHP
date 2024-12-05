<?php
include_once('resource/components/header.php');
if (!isLoggedIn()) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
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
                    <h1 class="text-3xl font-bold">Welcome, +91 <?= $mobile ?>!</h1>
                    <p class="text-zinc-400">Here's your account overview</p>
                </div>
            </div>
        </header>

        <!-- Enhanced Wallet Balance Section -->
        <section class="mb-12">
            <div class="p-8 bg-gradient-to-br from-lime-500 via-lime-600 to-green-700 rounded-2xl shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-xl font-semibold Barlow mb-2">Your WinZone Wallet</h2>
                    <p class="text-5xl font-bold text-white mb-4">₹0.00</p>
                    <div class="flex gap-4">
                        <button class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-all">
                            Add Money
                        </button>
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
                        <p class="text-3xl font-bold text-black">₹20.00</p>
                    </div>
                </div>
                <button class="w-full bg-gradient-to-r from-lime-500 to-green-600 text-white font-bold py-3 px-6 rounded-xl hover:opacity-90 transition-all">
                    ADD CASH
                </button>
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
    </div>
</body>

</html>