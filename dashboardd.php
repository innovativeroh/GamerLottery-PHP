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

<body class="bg-zinc-950 text-white font-sans">
    <div class="max-w-[1200px] mt-20 lg:mt-40 m-auto p-5">
        <header class="mb-8">
            <h1 class="text-3xl font-bold">Welcome, +91 <?= $mobile ?>!</h1>
            <p class="text-zinc-400">Here's your account overview</p>
        </header>

        <!-- Wallet Balance Section -->
        <section class="mb-8">
            <div
                class="p-6 bg-gradient-to-t from-lime-500 to-lime-900 text-center rounded-lg shadow-md flex items-center justify-center">
                <div>
                    <h2 class="text-xl font-semibold Barlow">Your WinZone Wallet</h2>
                    <p class="text-4xl font-bold text-white">0.00</p>
                </div>
            </div>
        </section>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-4 bg-white rounded-xl">
            <div
                class="flex-[1] flex border-[1px] border-zinc-300 justify-between items-center bg-white rounded-lg shadow-xl text-black p-4">
                <div class="flex-[1]">
                    <i class="fa-solid fa-money-bill-transfer p-4 px-3.5 bg-zinc-100 rounded-full text-zinc-400"></i>
                </div>
                <div class="flex-[2] flex flex-col gap-1">
                    <span class="text-xs font-semibold text-gray-600">Unplayed</span>
                    <p class="font-bold text-black Barlow text-2xl">$20</p>
                </div>
                <button
                    class="1 text-white font-bold border-[2px] border-lime-400 bg-gradient-to-t from-green-700 to-lime-400 italic py-2 px-4 rounded-lg">ADD
                    CASH</button>
            </div>
            <div
                class="flex-[1] flex border-[1px] border-zinc-300 justify-between items-center bg-white rounded-lg shadow-xl text-black p-4">
                <div class="flex-[1]">
                    <i class="fa-solid fa-money-bill-transfer p-4 px-3.5 bg-zinc-100 rounded-full text-zinc-400"></i>
                </div>
                <div class="flex-[2] flex flex-col gap-1">
                    <span class="text-xs font-semibold text-gray-600">Bonus</span>
                    <p class="font-bold text-black Barlow text-2xl">0</p>
                </div>
                <button class="text-black font-bold border-[2px] border-black bg-white italic py-2 px-4 rounded-lg">EARN
                    BONUS</button>
            </div>
            <div
                class="flex-[1] flex border-[1px] border-zinc-300 justify-between items-center bg-white rounded-lg shadow-xl text-black p-4">
                <div class="flex-[1]">
                    <i class="fa-solid fa-money-bill-transfer p-4 px-3.5 bg-zinc-100 rounded-full text-zinc-400"></i>
                </div>
                <div class="flex-[2] flex flex-col gap-1">
                    <span class="text-xs font-semibold text-gray-600">Winnings</span>
                    <p class="font-bold text-black Barlow text-2xl">0</p>
                </div>
                <button
                    class="text-black font-bold border-[2px] border-black bg-white italic py-2 px-4 rounded-lg flex justify-between items-center gap-2">
                    <i class="fa-solid fa-lock"></i>
                    WITHDRAW</button>
            </div>
        </div>
    </div>
    </div>
</body>

</html>