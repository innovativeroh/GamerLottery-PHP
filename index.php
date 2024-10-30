<?php include_once 'resource/components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WinZoneClub &copy; - Earn Coins Online</title>
</head>

<body>
    <div class="bg-hero-pattern bg-cover bg-center bg-no-repeat min-h-screen pt-16 sm:pt-20">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-[calc(100vh-4rem)] sm:min-h-[calc(100vh-5rem)] w-full flex flex-col md:flex-row items-center justify-center py-12 md:py-0">
                <div class="flex-1 text-center md:text-left mb-8 md:mb-0">
                    <div class="flex flex-col gap-4 md:gap-8">
                        <div class="inline-block">
                            <span class="text-white text-xl sm:text-2xl font-bold p-3 sm:p-4 bg-green-600 px-6 sm:px-8 rounded-full bg-opacity-30">
                                <i class="fa-solid fa-circle-dot"></i> Online Club
                            </span>
                        </div>
                        <h1 class="text-white text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold">Win Zone</h1>
                        <p class="text-white text-2xl sm:text-3xl tracking-wider Barlow font-bold">Earn Coins Online</p>
                        <div class="inline-block">
                            <button class="bg-green-600 text-white text-lg sm:text-xl font-bold p-3 sm:p-4 px-6 sm:px-8 rounded-full hover:bg-green-700 transition-all duration-300">
                                Play Now
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="image-hover-float max-w-[80%] mx-auto">
                        <img src="./public/images/slider_img01.png" alt="slider" class="image-hover-float w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'resource/components/about.php'; ?>
    <?php include_once 'resource/components/games.php'; ?>
    <?php include_once 'resource/components/footer.php'; ?>
</body>

</html>
