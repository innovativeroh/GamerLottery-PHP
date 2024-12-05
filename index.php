<?php include_once 'resource/components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub - Your Premier Gaming Destination</title>
</head>

<body class="bg-black">
    <!-- Hero Section -->
    <div class="relative bg-hero-pattern bg-cover bg-center bg-no-repeat min-h-screen pt-16 sm:pt-20 overflow-hidden">
        <!-- Animated background overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black via-transparent to-black opacity-80"></div>
        
        <!-- Floating particles effect -->
        <div class="particles-container absolute inset-0" id="particles-js"></div>

        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-[calc(100vh-4rem)] sm:min-h-[calc(100vh-5rem)] w-full flex flex-col md:flex-row items-center justify-center py-12 md:py-0">
                <!-- Left Content -->
                <div class="flex-1 text-center md:text-left mb-8 md:mb-0">
                    <div class="flex flex-col gap-4 md:gap-8 animate-fadeIn">
                        <div class="inline-block">
                            <span class="text-white text-xl sm:text-2xl font-bold p-3 sm:p-4 bg-gradient-to-r from-green-600 to-green-400 px-6 sm:px-8 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
                                <i class="fa-solid fa-circle-dot animate-pulse"></i> Live Games
                            </span>
                        </div>
                        <h1 class="text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold">
                            Win <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-green-600">Zone</span>
                        </h1>
                        <p class="text-white text-2xl sm:text-3xl tracking-wider Barlow font-bold">
                            Play. Win. Earn <span class="text-green-500">Coins</span>
                        </p>
                        <div class="flex gap-4 justify-center md:justify-start">
                            <button class="bg-gradient-to-r from-green-600 to-green-400 text-white text-lg sm:text-xl font-bold p-3 sm:p-4 px-6 sm:px-8 rounded-full hover:shadow-green-500/50 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                Start Playing
                            </button>
                            <button class="bg-transparent border-2 border-green-500 text-white text-lg sm:text-xl font-bold p-3 sm:p-4 px-6 sm:px-8 rounded-full hover:bg-green-500/10 transform hover:-translate-y-1 transition-all duration-300">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="flex-1 relative">
                    <div class="image-hover-float max-w-[80%] mx-auto relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-green-500/20 to-transparent rounded-full filter blur-3xl"></div>
                        <img src="./public/images/slider_img01.png" alt="slider" class="relative z-10 w-full h-auto animate-float">
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fa-solid fa-chevron-down text-white text-2xl"></i>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-black/80 py-12">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-500 mb-2">50K+</div>
                    <div class="text-white">Active Players</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-500 mb-2">₹1M+</div>
                    <div class="text-white">Paid Out</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-500 mb-2">10+</div>
                    <div class="text-white">Game Types</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-500 mb-2">24/7</div>
                    <div class="text-white">Support</div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'resource/components/about.php'; ?>
    <?php include_once 'resource/components/games.php'; ?>
    <?php include_once 'resource/components/footer.php'; ?>

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 80 },
                color: { value: '#10B981' },
                shape: { type: 'circle' },
                opacity: { value: 0.5 },
                size: { value: 3 },
                move: { enable: true, speed: 2 }
            }
        });
    </script>
</body>
</html>