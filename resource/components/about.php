<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Win Zone - Play & Win</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        :root {
            --primary: #22c55e;
            --primary-dark: #16a34a;
            --primary-light: #4ade80;
            --bg-dark: #0f172a;
            --card-bg: rgba(15, 23, 42, 0.9);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: #fff;
            margin: 0;
            line-height: 1.6;
            min-height: 100vh;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .hero-section {
            text-align: center;
            padding: 4rem 0;
        }

        .neon-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 4rem;
            background: linear-gradient(to right, var(--primary-dark), var(--primary), var(--primary-light));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
            margin-bottom: 1.5rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 3rem 0;
        }

        .card-3d {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .card-3d:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 3rem 0;
        }

        .stat-card {
            background: var(--card-bg);
            border-left: 4px solid var(--primary);
            padding: 1.5rem;
            border-radius: 1rem;
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .image-container {
            width: 100%;
            max-width: 800px;
            margin: 4rem auto;
            position: relative;
        }

        .image-container img {
            width: 100%;
            border-radius: 1rem;
            box-shadow: 0 0 30px rgba(34, 197, 94, 0.3);
        }

        .cyber-button {
            background: var(--primary);
            color: var(--bg-dark);
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 2rem;
        }

        .cyber-button:hover {
            background: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.4);
        }

        @media (max-width: 768px) {
            .neon-text {
                font-size: 2.5rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="content-wrapper">
        <section class="hero-section">
            <h1 class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-800 text-4xl Barlow sm:text-5xl md:text-6xl lg:text-7xl font-bold text-center mb-16 animate-fade-in">Win Zone</h1>
            <p class="subtitle">Experience the thrill of real-time betting games</p>
        </section>

        <div class="features-grid">
            <div class="card-3d p-6 rounded-lg game-feature">
                <i class="fas fa-dice icon"></i>
                <h3 class="text-green-500 text-xl font-bold mb-3">Ludo Masters</h3>
                <p class="text-gray-300">Challenge players worldwide in real-time Ludo matches.</p>
            </div>
            <div class="card-3d p-6 rounded-lg game-feature">
                <i class="fas fa-plane icon"></i>
                <h3 class="text-green-500 text-xl font-bold mb-3">Aviator</h3>
                <p class="text-gray-300">Test your timing and multiply your winnings.</p>
            </div>
            <div class="card-3d p-6 rounded-lg game-feature">
                <i class="fas fa-bolt icon"></i>
                <h3 class="text-green-500 text-xl font-bold mb-3">Instant Games</h3>
                <p class="text-gray-300">Quick games with immediate results and payouts.</p>
            </div>
        </div>

        <div class="image-container">
            <img src="./public/images/about0.jpg" alt="Gaming Future">
        </div>

        <div class="stats-grid">
            <div class="card-3d p-4 rounded-lg text-center stat-card">
                <div class="text-green-500 text-3xl font-bold">100K+</div>
                <div class="text-sm text-gray-400">Active Players</div>
            </div>
            <div class="card-3d p-4 rounded-lg text-center stat-card">
                <div class="text-green-500 text-3xl font-bold">₹1M+</div>
                <div class="text-sm text-gray-400">Daily Payouts</div>
            </div>
            <div class="card-3d p-4 rounded-lg text-center stat-card">
                <div class="text-green-500 text-3xl font-bold">10+</div>
                <div class="text-sm text-gray-400">Game Modes</div>
            </div>
            <div class="card-3d p-4 rounded-lg text-center stat-card">
                <div class="text-green-500 text-3xl font-bold">24/7</div>
                <div class="text-sm text-gray-400">Support</div>
            </div>
        </div>

        <div style="text-align: center">
            <button class="cyber-button">Start Playing Now</button>
        </div>
    </div>

    <script>
        particlesJS('particles-js', {
            particles: {
                number: { value: 50 },
                color: { value: '#22c55e' },
                shape: { type: 'circle' },
                opacity: {
                    value: 0.5,
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                }
            }
        });
    </script>
</body>
</html>