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
    <div class="max-w-[1200px] mt-40 m-auto">
        <div class="container mx-auto p-6">
            <!-- Header Section -->
            <header class="mb-8">
                <h1 class="text-3xl font-bold">Welcome, +91 <?=$mobile?>!</h1>
                <p class="text-zinc-400">Here's your account overview</p>
            </header>

            <!-- Wallet Balance Section -->
            <section class="mb-8">
                <div class="p-6 bg-zinc-800 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold">Wallet Balance</h2>
                        <p class="text-4xl font-bold text-yellow-400">0.00 Coins</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-zinc-400">Last updated: Today, 10:30 AM</p>
                    </div>
                </div>
            </section>

            <!-- Transactions Section -->
            <section>
                <h2 class="text-2xl font-semibold mb-4">Recent Transactions</h2>
                <div class="bg-zinc-800 rounded-lg shadow-md">
                    <table class="min-w-full divide-y divide-zinc-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-zinc-400 uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-zinc-400 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-medium text-zinc-400 uppercase tracking-wider">
                                    Amount</th>
                            </tr>
                        </thead>
                        <tbody class="bg-zinc-900 divide-y divide-zinc-700">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Oct 30, 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Purchase at Store XYZ</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-400">-50 Coins</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Oct 28, 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Referral Bonus</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-400">+100 Coins</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Oct 25, 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-300">Monthly Reward</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-400">+200 Coins</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>

</html>