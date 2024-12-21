<?php include_once ("./includes/connection.php"); ?>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./core/css/main.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<div id="sidebar"
    class="bg-gray-950 text-white w-[300px] flex-shrink-0 sm:static fixed inset-y-0 left-0 z-50 overflow-y-auto hidden sm:block">
    <!-- Sidebar content -->
    <div class="p-4">
        <!-- Logo Section -->
        <div class="flex justify-between items-center p-2">
            <img src="./core/img/logoMain.gif" class="w-[160px] m-auto" />
            <div class="sm:hidden">
                <button id="hideSidebarBtn" class="text-white text-2xl"><i class="bi bi-list"></i></button>
            </div>
        </div>
        
        <!-- Profile Section -->
        <div class="mt-8 flex items-center gap-4">
            <img src="./core/img/profilePic.jpg" class="w-[50px] h-[50px] rounded-full" />
            <div>
                <p class="text-sm text-gray-400 font-bold"><?= $admin_name ?? "Admin" ?></p>
                <span class="text-sm text-gray-400">Online <i class="bi bi-circle-fill text-green-400"></i></span>
            </div>
        </div>

  <?php
        if ($global_permissions == "1") {
            ?>
        <div class="mt-10">
            <span class="block mt-4 mb-2 text-sm text-gray-500 font-bold">General</span>
            <a href="dashboard.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-speedometer pr-2"></i> Dashboard
            </a>
            <a href="users.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-people-fill pr-2"></i> Users
            </a>
            <a href="wallets.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-wallet2 pr-2"></i> Wallet Management
            </a>
            <a href="transactions.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-wallet2 pr-2"></i> Transactions
            </a>
            <a href="logout.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-box-arrow-left pr-2"></i> Logout
            </a>
            
            <span class="block mt-6 mb-2 text-sm text-gray-500 font-bold">Games</span>
            <a href="ludo/manage_rooms.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-controller pr-2"></i> Ludo Management
            </a>
            <a href="color_trading/manage_rooms.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-palette pr-2"></i> Color Trading
            </a>
            <a href="dragon_tiger/manage_rooms.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-dragon pr-2"></i> Dragon Tiger
            </a>
            <a href="aviator/manage_rooms.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-airplane pr-2"></i> Aviator
            </a>
            <a href="custom_game/manage_rooms.php"
                class="transition block w-full text-left rounded-xl py-2 px-4 hover:bg-gray-900 mb-4">
                <i class="bi bi-dice-6 pr-2"></i> Custom Game
            </a>
         <?php
        }
            ?>
    </div>
    </div>
</div>
<!-- Main Content Area -->
<div class="flex flex-col flex-1">
    <!-- Header -->
    <div class="bg-white shadow-lg text-white p-4">
        <!-- Header content -->
        <button id="toggleSidebarBtn" class="text-gray-950 text-2xl"><i class="bi bi-list"></i></button>

    </div>
<script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
        const hideSidebarBtn = document.getElementById('hideSidebarBtn');

        toggleSidebarBtn.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
        });

        hideSidebarBtn.addEventListener('click', function () {
            sidebar.classList.add('hidden');
        });
    </script>