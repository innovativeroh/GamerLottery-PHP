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
            <div class="absolute animate-float opacity-10 top-20 left-20 w-24 h-24 border-2 border-white/20 rounded-lg rotate-12"></div>
            <div class="absolute animate-float-delayed opacity-10 bottom-40 right-20 w-16 h-16 border-2 border-white/20 rounded-lg -rotate-12"></div>
            
            <!-- Animated Ludo Tokens -->
            <div class="absolute animate-spin-slow top-40 right-40 w-8 h-8 rounded-full bg-red-500/20"></div>
            <div class="absolute animate-spin-slow-delayed bottom-60 left-40 w-8 h-8 rounded-full bg-yellow-500/20"></div>
            <div class="absolute animate-spin-slow top-1/2 left-1/3 w-8 h-8 rounded-full bg-green-500/20"></div>
            <div class="absolute animate-spin-slow-delayed bottom-40 right-1/3 w-8 h-8 rounded-full bg-blue-500/20"></div>
            
            <!-- Ludo Path Lines -->
            <div class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-white/5 to-transparent"></div>
            <div class="absolute top-0 right-1/4 w-px h-full bg-gradient-to-b from-transparent via-white/5 to-transparent"></div>
            <div class="absolute top-1/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
            <div class="absolute bottom-1/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
        </div>

        <!-- Subtle animated gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-transparent to-red-900/20"></div>
        
        <!-- Minimal particles effect -->
        <div class="particles-container absolute inset-0" id="particles-js"></div>

        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-[calc(100vh-4rem)] sm:min-h-[calc(100vh-5rem)] w-full flex flex-col md:flex-row items-center justify-center py-12 md:py-0">
                <!-- Left Content -->
                <div class="flex-1 text-center md:text-left mb-8 md:mb-0">
                    <div class="flex flex-col gap-6 md:gap-8 animate-fadeIn">
                        <div class="space-y-4">
                            <h1 class="text-white text-5xl sm:text-6xl md:text-7xl font-bold leading-tight">
                                Master the Game <br>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-500">Win Big</span>
                            </h1>
                            <p class="text-gray-300 text-lg sm:text-xl max-w-xl">
                                Experience the thrill of classic Ludo with a modern twist. 
                                Compete, strategize, and earn rewards.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                            <button class="group relative px-8 py-4 bg-gradient-to-r from-red-500 to-yellow-500 rounded-lg text-white font-semibold hover:shadow-lg hover:shadow-red-500/25 transition-all duration-300">
                                Play Now
                                <span class="absolute -right-2 -top-2 bg-green-500 text-xs px-2 py-1 rounded-full animate-pulse">
                                    LIVE
                                </span>
                            </button>
                            <button class="px-8 py-4 border border-gray-600 rounded-lg text-gray-300 font-semibold hover:bg-white/5 transition-all duration-300">
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
                        <div class="absolute inset-0 bg-gradient-to-b from-red-500/10 to-transparent rounded-full filter blur-3xl"></div>
                        <img 
                            src="./public/images/game.png" 
                            alt="Game" 
                            class="relative z-10 w-full h-auto transform hover:scale-105 transition-transform duration-500"
                        >
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