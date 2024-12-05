<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Gaming Collection</title>
    <!-- Add custom styles -->
    <style>
        .game-card {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }
        
        .game-image {
            transition: transform 0.3s ease;
        }
        
        .game-card:hover .game-image {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="bg-games-pattern min-h-screen py-16">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Animated heading with gradient -->
            <h1 class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-green-800 text-4xl Barlow sm:text-5xl md:text-6xl lg:text-7xl font-bold text-center mb-16 animate-fade-in">
                Discover Our Gaming Universe
            </h1>
            
            <!-- Games grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8">
                <!-- Color Trading -->
                <div class="game-card bg-gradient-to-br from-zinc-900 via-black to-zinc-900 p-6 rounded-xl border-[1px] border-gray-800 hover:border-green-500 transition-all duration-500 ease-out">
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0 overflow-hidden rounded-lg">
                            <img src="./public/images/game01.jpeg" alt="Color Trading" 
                                 class="game-image h-[140px] w-[140px] object-cover rounded-lg">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-white text-3xl Barlow font-bold mb-3">Color Trading</h2>
                            <p class="text-gray-300 text-base Barlow leading-relaxed">
                                Experience trading like never before with our innovative color-coded system. 
                                Make informed decisions through intuitive visual cues and real-time market analysis.
                            </p>
                            <button class="mt-4 px-6 py-2 bg-green-600 hover:bg-green-500 text-white rounded-full transition-colors duration-300">
                                Play Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dragon Tiger -->
                <div class="game-card bg-gradient-to-br from-zinc-900 via-black to-zinc-900 p-6 rounded-xl border-[1px] border-gray-800 hover:border-green-500 transition-all duration-500 ease-out">
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0 overflow-hidden rounded-lg">
                            <img src="./public/images/game02.jpg" alt="Dragon Tiger" 
                                 class="game-image h-[140px] w-[140px] object-cover rounded-lg">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-white text-3xl Barlow font-bold mb-3">Dragon Tiger</h2>
                            <p class="text-gray-300 text-base Barlow leading-relaxed">
                                Enter the legendary battle between Dragon and Tiger. Place your bets and experience 
                                the thrill of this fast-paced casino classic with stunning visuals.
                            </p>
                            <button class="mt-4 px-6 py-2 bg-green-600 hover:bg-green-500 text-white rounded-full transition-colors duration-300">
                                Play Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Aviator -->
                <div class="game-card bg-gradient-to-br from-zinc-900 via-black to-zinc-900 p-6 rounded-xl border-[1px] border-gray-800 hover:border-green-500 transition-all duration-500 ease-out">
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0 overflow-hidden rounded-lg">
                            <img src="./public/images/game03.jpg" alt="Aviator" 
                                 class="game-image h-[140px] w-[140px] object-cover rounded-lg">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-white text-3xl Barlow font-bold mb-3">Aviator</h2>
                            <p class="text-gray-300 text-base Barlow leading-relaxed">
                                Take flight in this thrilling multiplier game. Watch the plane climb higher 
                                and cash out at the perfect moment for maximum rewards.
                            </p>
                            <button class="mt-4 px-6 py-2 bg-green-600 hover:bg-green-500 text-white rounded-full transition-colors duration-300">
                                Play Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Ludo -->
                <div class="game-card bg-gradient-to-br from-zinc-900 via-black to-zinc-900 p-6 rounded-xl border-[1px] border-gray-800 hover:border-green-500 transition-all duration-500 ease-out">
                    <div class="flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-shrink-0 overflow-hidden rounded-lg">
                            <img src="./public/images/game04.jpg" alt="Ludo" 
                                 class="game-image h-[140px] w-[140px] object-cover rounded-lg">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-white text-3xl Barlow font-bold mb-3">Ludo</h2>
                            <p class="text-gray-300 text-base Barlow leading-relaxed">
                                Challenge friends in this classic board game reimagined for the digital age. 
                                Strategy, luck, and competition combine in this timeless favorite.
                            </p>
                            <button class="mt-4 px-6 py-2 bg-green-600 hover:bg-green-500 text-white rounded-full transition-colors duration-300">
                                Play Now
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>