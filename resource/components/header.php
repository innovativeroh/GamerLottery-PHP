<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="tailwind.config.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <link rel="icon" href="./public/images/icon.png" type="image/png">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        .hover-underline {
            position: relative;
        }

        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #10B981;
            transition: width 0.3s ease;
        }

        .hover-underline:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    
    <header x-data="{ isOpen: false }"
        x-init="$watch('isOpen', value => value && setTimeout(() => $refs.mobileMenu.classList.add('animate-fadeIn'), 50))"
        class="bg-black bg-opacity-40 text-white p-4 md:p-8 fixed top-0 w-full z-50">
        <div class="m-auto max-w-[1200px] flex justify-between items-center">
            <a href="index.php" class="text-xl font-bold transition-transform duration-300 hover:scale-105">
                <img src="./public/images/logo.gif" alt="logo" class="w-32 md:w-40">
            </a>

            <!-- Mobile menu button -->
            <button @click="isOpen = !isOpen" class="md:hidden transition-transform duration-300 hover:scale-110">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>

            <!-- Desktop menu -->
            <div class="hidden md:flex gap-8">
                <a href="index.php"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Home</a>
                <a href="index.php#about"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">About</a>
                <a href="contact.php"
                    class="hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Contact</a>
            </div>

            <div class="hidden md:block">
                <a href="login.php"><button
                        class="bg-green-500 font-bold text-white text-black px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 flex gap-2 items-center hover:shadow-lg transform hover:-translate-y-1">
                        Account <i class="fa-solid fa-user"></i>
                    </button></a>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="isOpen" x-ref="mobileMenu" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2" class="md:hidden mt-4">
            <a href="index.php"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Home</a>
            <a href="index.php#about"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">About</a>
            <a href="contact.php"
                class="block py-2 hover:text-green-500 transition-all duration-300 font-semibold uppercase Barlow hover-underline">Contact</a>
            <button
                class="mt-4 w-full bg-green-500 font-bold text-white text-black px-4 py-2 rounded-full hover:bg-green-600 transition-all duration-300 flex gap-2 items-center justify-center hover:shadow-lg transform hover:-translate-y-1">
                Account <i class="fa-solid fa-user"></i>
            </button>
        </div>
    </header>
</body>

</html>