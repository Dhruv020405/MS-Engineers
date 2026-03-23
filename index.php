<?php
// Initialize database and fetch products
include('connect.php');
include('product_name.php');

try {
    $connectDB = new PDO($dns, $username, $password);
    $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Catalog | MS Engineers</title>
    <link rel="icon" type="image/x-icon" href="title.png">
    
    <!-- Modern Fonts: Orbitron for futuristic headers, Inter for clean readability -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ULTRA MODERN STYLESHEET -->
    <style>
        /* =========================================
           1. CSS VARIABLES & BASE RESET
           ========================================= */
        :root {
            --bg-color: #050505;
            --surface-color: rgba(20, 20, 20, 0.6);
            --primary-accent: #f59e0b; /* Amber/Orange */
            --primary-glow: rgba(245, 158, 11, 0.4);
            --secondary-accent: #3b82f6; /* Tech Blue */
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --glass-border: rgba(255, 255, 255, 0.08);
            --transition-smooth: 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            cursor: none; /* Hide default cursor for custom cursor */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Hide scrollbar for seamless look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #000;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-accent);
        }

        /* =========================================
           2. CUSTOM CURSOR
           ========================================= */
        .custom-cursor {
            position: fixed;
            top: 0; left: 0;
            width: 20px; height: 20px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background-color 0.3s;
            mix-blend-mode: difference;
            background-color: #fff;
        }
        .custom-cursor-follower {
            position: fixed;
            top: 0; left: 0;
            width: 40px; height: 40px;
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, transform 0.1s ease-out;
        }
        .cursor-hover .custom-cursor {
            width: 50px; height: 50px;
            background-color: var(--primary-accent);
            mix-blend-mode: screen;
        }
        .cursor-hover .custom-cursor-follower {
            width: 80px; height: 80px;
            border-color: var(--primary-accent);
        }

        /* =========================================
           3. PRELOADER
           ========================================= */
        .preloader {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: #000;
            z-index: 10000;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.8s ease, visibility 0.8s;
        }
        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        .loader-core {
            width: 80px; height: 80px;
            border: 3px solid transparent;
            border-top-color: var(--primary-accent);
            border-bottom-color: var(--secondary-accent);
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
        }
        .loader-core::before {
            content: '';
            position: absolute;
            top: 15px; left: 15px; right: 15px; bottom: 15px;
            border: 3px solid transparent;
            border-left-color: var(--text-main);
            border-radius: 50%;
            animation: spin-reverse 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes spin-reverse { 0% { transform: rotate(360deg); } 100% { transform: rotate(0deg); } }

        /* =========================================
           4. AMBIENT BACKGROUND ANIMATION
           ========================================= */
        .ambient-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -2;
            background: radial-gradient(circle at 50% 50%, #111 0%, #000 100%);
            overflow: hidden;
        }
        /* Moving Perspective Grid */
        .perspective-grid {
            position: absolute;
            bottom: -50%; left: -50%; width: 200%; height: 200%;
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            transform: perspective(500px) rotateX(60deg);
            animation: moveGrid 20s linear infinite;
            z-index: -1;
        }
        @keyframes moveGrid {
            0% { transform: perspective(500px) rotateX(60deg) translateY(0); }
            100% { transform: perspective(500px) rotateX(60deg) translateY(50px); }
        }

        /* =========================================
           5. HERO SECTION
           ========================================= */
        .hero-section {
            padding: 150px 20px 60px;
            text-align: center;
            position: relative;
        }
        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 4.5rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 4px;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s forwards 0.5s;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--primary-accent);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s forwards 0.7s;
        }
        .hero-instruction {
            font-size: 0.9rem;
            color: var(--text-muted);
            opacity: 0;
            animation: fadeUp 1s forwards 0.9s;
        }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* =========================================
           6. CONVEYOR BELT (REALISTIC)
           ========================================= */
        .conveyor-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 40px 0;
            opacity: 0;
            animation: fadeIn 2s forwards 1.2s;
        }
        @keyframes fadeIn { to { opacity: 1; } }

        .conveyor-wrapper::before,
        .conveyor-wrapper::after {
            content: '';
            position: absolute;
            top: 0; width: 150px; height: 100%;
            z-index: 10; pointer-events: none;
        }
        .conveyor-wrapper::before {
            left: 0;
            background: linear-gradient(to right, var(--bg-color) 0%, transparent 100%);
        }
        .conveyor-wrapper::after {
            right: 0;
            background: linear-gradient(to left, var(--bg-color) 0%, transparent 100%);
        }

        .conveyor-track {
            display: flex;
            width: max-content;
            animation: scrollConveyor 30s linear infinite;
        }
        .conveyor-track:hover,
        .conveyor-track:hover ~ .belt-visual-container .belt-rollers-layer {
            animation-play-state: paused;
        }
        @keyframes scrollConveyor {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); } 
        }

        /* 3D Realistic Boxes */
        .conveyor-item {
            width: 320px; flex-shrink: 0; margin: 0 20px;
            position: relative; z-index: 5;
        }
        .conveyor-item::after { /* Ground shadow */
            content: ''; position: absolute; bottom: 5px; left: 10%; width: 80%; height: 15px;
            background: rgba(0, 0, 0, 0.9); border-radius: 50%; filter: blur(8px); z-index: -1;
        }
        .real-box-link { text-decoration: none; display: block; outline: none; }
        .real-box {
            position: relative; width: 280px; height: 350px; 
            display: flex; align-items: flex-end; justify-content: center;
            margin: 0 auto; padding-bottom: 10px;
        }

        /* Box Construction */
        .box-back {
            position: absolute; bottom: 10px; left: 0; width: 100%; height: 140px; 
            background-color: #8c6a4a; border: 1px solid #5c432d; border-radius: 4px; z-index: 1;
            box-shadow: inset 0 30px 30px rgba(0,0,0,0.5);
        }
        .box-back::before {
            content: ''; position: absolute; top: -40px; left: -1px; width: 100%; height: 40px;
            background-color: #a8815b; border: 1px solid #5c432d;
            transform-origin: bottom; transform: perspective(300px) rotateX(45deg);
        }
        
        .box-front {
            position: absolute; bottom: 10px; left: 0; width: 100%; height: 90px;
            background-color: #a8815b; border: 1px solid #5c432d; border-radius: 4px; z-index: 3;
            background-image: repeating-linear-gradient(90deg, transparent, transparent 4px, rgba(0,0,0,0.05) 4px, rgba(0,0,0,0.05) 8px);
            box-shadow: 0 -5px 20px rgba(0,0,0,0.5);
        }
        .box-front::before {
            content: ''; position: absolute; top: 0; left: -1px; width: 100%; height: 35px;
            background-color: #94714e; border: 1px solid #5c432d;
            transform-origin: top; transform: perspective(300px) rotateX(-50deg);
        }

        /* Details */
        .box-tape {
            position: absolute; top: 30%; left: 0; width: 100%; height: 24px;
            background: rgba(220, 215, 200, 0.8); border-top: 1px dashed rgba(0,0,0,0.2); border-bottom: 1px dashed rgba(0,0,0,0.2);
        }
        .box-shipping-label {
            position: absolute; top: 20%; right: 15px; width: 45px; height: 30px;
            background: #fff; transform: rotate(-6deg);
            background-image: repeating-linear-gradient(90deg, #000 0, #000 2px, transparent 2px, transparent 4px);
            background-size: 80% 40%; background-position: center bottom 4px; background-repeat: no-repeat;
        }

        /* Product in Box */
        .box-product {
            position: relative; z-index: 2; width: 86%; height: 290px; 
            background: #111; border: 1px solid var(--glass-border); border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.8); margin-bottom: 25px;
            display: flex; flex-direction: column; overflow: hidden;
            transition: var(--transition-smooth);
        }
        .real-box-link:hover .box-product {
            transform: translateY(-40px); box-shadow: 0 30px 50px rgba(245, 158, 11, 0.2);
            border-color: var(--primary-accent);
        }
        .box-img-wrapper {
            width: 100%; height: 160px; background: #000; display: flex; align-items: center; justify-content: center; padding: 15px;
        }
        .box-card-img { max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.5s; }
        .real-box-link:hover .box-card-img { transform: scale(1.15); }
        .box-card-body { padding: 15px; display: flex; flex-direction: column; flex-grow: 1; text-align: center; background: #111; }
        .box-card-title { font-weight: 700; font-size: 1rem; color: #fff; margin-bottom: 8px; }
        .box-card-action { margin-top: auto; font-size: 0.8rem; color: var(--primary-accent); display: flex; justify-content: center; gap: 5px; transition: 0.3s; }
        .real-box-link:hover .box-card-action { gap: 10px; }

        /* Scissor Belt Structure */
        .belt-visual-container { width: 100%; height: 130px; position: relative; z-index: 0; }
        .belt-rollers-layer {
            width: 100%; height: 32px; position: absolute; top: 0; left: 0;
            background-image: 
                repeating-linear-gradient(90deg, transparent 0px, transparent 24px, #000 24px, #000 32px),
                linear-gradient(to bottom, #9ca3af 0%, #fff 20%, #6b7280 65%, #111 100%);
            animation: rollBelt 1.5s linear infinite;
            border-bottom: 4px solid #000; box-shadow: 0 20px 30px rgba(0,0,0,0.8); z-index: 3;
        }
        .belt-side-rail {
            width: 100%; height: 16px; background: #171717; position: absolute; top: 32px; left: 0; z-index: 4; border-bottom: 3px solid #000;
        }
        .belt-scissor-frame {
            width: 100%; height: 45px; position: absolute; top: 48px; left: 0;
            background-image: 
                repeating-linear-gradient(45deg, transparent 0, transparent 30px, #222 30px, #222 36px),
                repeating-linear-gradient(-45deg, transparent 0, transparent 30px, #222 30px, #222 36px);
            z-index: 2; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.8));
        }
        .belt-legs {
            width: 100%; height: 40px; position: absolute; top: 93px; left: 0;
            background-image: repeating-linear-gradient(90deg, transparent 0, transparent 300px, #111 300px, #111 316px, transparent 316px, transparent 600px); z-index: 1;
        }
        .belt-legs::after {
            content: ''; position: absolute; bottom: -12px; left: 0; width: 100%; height: 12px;
            background-image: repeating-linear-gradient(90deg, transparent 0, transparent 296px, #ea580c 296px, #ea580c 320px, transparent 320px, transparent 600px);
            border-radius: 6px; box-shadow: 0 5px 10px rgba(0,0,0,0.8);
        }
        @keyframes rollBelt { 0% { background-position: 0 0, 0 0; } 100% { background-position: -32px 0, 0 0; } }


        /* =========================================
           7. ALL PRODUCTS GRID (3D MAGNETIC CARDS)
           ========================================= */
        .catalog-section {
            padding: 100px 0;
            position: relative;
            z-index: 2;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .section-header h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 3rem;
            color: #fff;
            position: relative;
            display: inline-block;
        }
        .section-header h2::after {
            content: ''; position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%);
            width: 80px; height: 4px; background: var(--primary-accent); border-radius: 2px;
            box-shadow: 0 0 15px var(--primary-glow);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 40px;
            padding: 20px;
        }

        /* The 3D Card Container */
        .magnetic-card-wrap {
            perspective: 1500px;
            transform-style: preserve-3d;
            /* Animation for scroll reveal */
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .magnetic-card-wrap.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* The Card Element */
        .magnetic-card {
            position: relative;
            height: 450px;
            background: var(--surface-color);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }

        /* The dynamic Glare effect injected via JS */
        .magnetic-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at var(--mouseX, 50%) var(--mouseY, 50%), rgba(255, 255, 255, 0.15) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 10;
        }
        .magnetic-card-wrap:hover .magnetic-card::before {
            opacity: 1;
        }

        .magnetic-card a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            z-index: 2;
        }

        .card-img-container {
            width: 100%;
            height: 250px;
            padding: 30px;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            /* Creates a slight parallax internally */
            transform: translateZ(30px); 
        }
        .card-img-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 20px 20px rgba(0,0,0,0.8));
            transition: transform 0.5s ease;
        }
        .magnetic-card-wrap:hover .card-img-container img {
            transform: scale(1.1) rotate(-3deg);
        }

        .card-content {
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            transform: translateZ(40px); /* 3D pop out */
        }
        
        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .card-action-btn {
            margin-top: auto;
            align-self: flex-start;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid var(--primary-accent);
            color: var(--primary-accent);
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        .card-action-btn::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 0%; height: 100%;
            background: var(--primary-accent);
            z-index: -1;
            transition: 0.4s ease;
        }
        .magnetic-card-wrap:hover .card-action-btn {
            color: #000;
            box-shadow: 0 0 20px var(--primary-glow);
        }
        .magnetic-card-wrap:hover .card-action-btn::before {
            width: 100%;
        }

        /* =========================================
           8. RESPONSIVE MEDIA QUERIES
           ========================================= */
        @media (max-width: 991px) {
            .hero-title { font-size: 3rem; }
            .conveyor-item { width: 280px; }
            .grid-container { grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); }
        }
        @media (max-width: 768px) {
            .hero-title { font-size: 2.2rem; }
            .hero-subtitle { font-size: 1rem; }
            /* Disable custom cursor on mobile for UX */
            * { cursor: auto !important; }
            .custom-cursor, .custom-cursor-follower { display: none !important; }
            
            /* Simplify 3D on mobile for performance */
            .magnetic-card { transform: none !important; }
            .magnetic-card::before { display: none; }
            .card-img-container, .card-content { transform: none !important; }
        }
    </style>
</head>
<body>

    <!-- 1. PRELOADER -->
    <div class="preloader" id="preloader">
        <div class="loader-core"></div>
    </div>

    <!-- 2. CUSTOM CURSOR -->
    <div class="custom-cursor" id="cursor"></div>
    <div class="custom-cursor-follower" id="cursor-follower"></div>

    <!-- 3. AMBIENT BACKGROUND -->
    <div class="ambient-bg">
        <div class="perspective-grid"></div>
    </div>

    <!-- Navigation Bar (Included from your file) -->
    <div class="nav-wrapper interactive-element">
        <?php include('header.php'); ?>
    </div>

    <!-- Main Content Wrapper -->
    <div class="page-wrapper">
        
        <!-- 4. HERO SECTION (Cinematic Entrance) -->
        <section class="hero-section">
            <h2 class="hero-subtitle">Engineering Excellence</h2>
            <h1 class="hero-title">Premium Machinery</h1>
            <p class="hero-instruction interactive-element"><i class="fas fa-compress-arrows-alt"></i> Interactive Elements: Hover to Inspect</p>
        </section>

        <!-- 5. 3D CONVEYOR BELT (Refined & Integrated) -->
        <div class="conveyor-wrapper">
            <div class="conveyor-track">
                
                <!-- Loop 1 -->
                <?php foreach ($products as $product): ?>
                    <div class="conveyor-item interactive-element">
                        <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>" class="real-box-link">
                            <div class="real-box">
                                <div class="box-back"></div>
                                <div class="box-product">
                                    <div class="box-img-wrapper">
                                        <img src="<?= htmlspecialchars($product['img']) ?>" class="box-card-img" alt="<?= htmlspecialchars($product['product_name']) ?>">
                                    </div>
                                    <div class="box-card-body">
                                        <h5 class="box-card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                                        <div class="box-card-action">Inspect <i class="fas fa-search"></i></div>
                                    </div>
                                </div>
                                <div class="box-front">
                                    <div class="box-tape"></div>
                                    <div class="box-shipping-label"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                <!-- Loop 2 (For Infinite Scroll) -->
                <?php foreach ($products as $product): ?>
                    <div class="conveyor-item interactive-element" aria-hidden="true">
                        <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>" class="real-box-link" tabindex="-1">
                            <div class="real-box">
                                <div class="box-back"></div>
                                <div class="box-product">
                                    <div class="box-img-wrapper">
                                        <img src="<?= htmlspecialchars($product['img']) ?>" class="box-card-img" alt="<?= htmlspecialchars($product['product_name']) ?>">
                                    </div>
                                    <div class="box-card-body">
                                        <h5 class="box-card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                                        <div class="box-card-action">Inspect <i class="fas fa-search"></i></div>
                                    </div>
                                </div>
                                <div class="box-front">
                                    <div class="box-tape"></div>
                                    <div class="box-shipping-label"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
            
            <!-- Highly Detailed Conveyor Base -->
            <div class="belt-visual-container">
                <div class="belt-rollers-layer"></div>
                <div class="belt-side-rail"></div>
                <div class="belt-scissor-frame"></div>
                <div class="belt-legs"></div>
            </div>
        </div>

        <!-- 6. THE NEW 3D MAGNETIC GRID CATALOG -->
        <section class="catalog-section container">
            <div class="section-header">
                <h2>Complete Catalog</h2>
            </div>
            
            <div class="grid-container">
                <?php 
                // Adding a stagger delay variable for scroll animations
                $delay = 0; 
                foreach ($products as $product): 
                ?>
                    <!-- Wrapping card in perspective container -->
                    <div class="magnetic-card-wrap" style="transition-delay: <?= $delay ?>s;">
                        <div class="magnetic-card interactive-element">
                            <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>">
                                <div class="card-img-container">
                                    <img src="<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h3>
                                    <div class="card-action-btn">
                                        View Specs <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php 
                // Increment delay for staggered entrance, reset after row
                $delay += 0.15; 
                if($delay > 0.6) $delay = 0;
                endforeach; 
                ?>
            </div>
        </section>
        
    </div>

    <!-- Footer -->
    <div class="interactive-element">
        <?php include('footer.php'); ?>
    </div>

    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- ULTRA MODERN JAVASCRIPT LOGIC -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // 1. PRELOADER LOGIC
            const preloader = document.getElementById('preloader');
            window.addEventListener('load', () => {
                setTimeout(() => {
                    preloader.classList.add('hidden');
                    document.body.style.overflow = 'auto'; // restore scroll
                }, 500); // Small delay to ensure smooth transition
            });

            // If page loads too fast/cached, hide immediately after brief timeout
            setTimeout(() => {
                if(!preloader.classList.contains('hidden')) {
                    preloader.classList.add('hidden');
                }
            }, 3000); // Safety fallback

            // 2. CUSTOM CURSOR LOGIC
            const cursor = document.getElementById('cursor');
            const follower = document.getElementById('cursor-follower');
            let mouseX = 0, mouseY = 0;
            let cursorX = 0, cursorY = 0;
            
            // Only run cursor logic on non-touch devices
            if(window.matchMedia("(pointer: fine)").matches) {
                document.addEventListener('mousemove', (e) => {
                    mouseX = e.clientX;
                    mouseY = e.clientY;
                    
                    // Instant cursor
                    cursor.style.left = mouseX + 'px';
                    cursor.style.top = mouseY + 'px';
                });

                // Smooth follower animation loop
                const animateFollower = () => {
                    let dx = mouseX - cursorX;
                    let dy = mouseY - cursorY;
                    cursorX += dx * 0.15; // interpolation factor
                    cursorY += dy * 0.15;
                    follower.style.left = cursorX + 'px';
                    follower.style.top = cursorY + 'px';
                    requestAnimationFrame(animateFollower);
                };
                animateFollower();

                // Hover states for interactive elements
                const interactiveEls = document.querySelectorAll('a, button, .interactive-element');
                interactiveEls.forEach(el => {
                    el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
                    el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
                });
            }

            // 3. 3D MAGNETIC CARD EFFECT (APPLE-STYLE TILT)
            const magneticCards = document.querySelectorAll('.magnetic-card');
            
            magneticCards.forEach(card => {
                if(window.matchMedia("(pointer: fine)").matches) { // Desktop only
                    card.addEventListener('mousemove', (e) => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left; // x position within the element
                        const y = e.clientY - rect.top;  // y position within the element
                        
                        // Set CSS variables for the Glare position
                        card.style.setProperty('--mouseX', `${x}px`);
                        card.style.setProperty('--mouseY', `${y}px`);

                        // Calculate rotation angles (Max rotation: 15deg)
                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;
                        const rotateX = ((y - centerY) / centerY) * -15; 
                        const rotateY = ((x - centerX) / centerX) * 15;

                        // Apply 3D transform
                        card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
                    });

                    // Reset on mouse leave
                    card.addEventListener('mouseleave', () => {
                        card.style.transform = `rotateX(0) rotateY(0) scale3d(1, 1, 1)`;
                        // Reset transition smoothly
                        card.style.transition = 'transform 0.5s ease, box-shadow 0.5s ease';
                        setTimeout(() => { card.style.transition = 'transform 0.1s ease, box-shadow 0.1s ease'; }, 500);
                    });
                }
            });

            // 4. SCROLL INTERSECTION OBSERVER (Fade up on scroll)
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // Trigger when 10% visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Stop observing once revealed
                    }
                });
            }, observerOptions);

            const cardsToReveal = document.querySelectorAll('.magnetic-card-wrap');
            cardsToReveal.forEach(card => observer.observe(card));

            // 5. NAVBAR DROPDOWN FIXES (From original code)
            var $dropdowns = $('.navbar .dropdown');
            var $dropdownMenus = $('.navbar .dropdown-menu');

            $dropdowns.hover(
                function() {
                    if ($(window).width() >= 992) { 
                        $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
                        $(this).addClass('show');
                        $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
                    }
                },
                function() {
                    if ($(window).width() >= 992) { 
                        $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
                        $(this).removeClass('show');
                        $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
                    }
                }
            );

            $('.navbar .dropdown-toggle').click(function(e) {
                if ($(window).width() < 992) { 
                    e.preventDefault();
                    var $parentDropdown = $(this).parent('.dropdown');
                    var isActive = $parentDropdown.hasClass('show');

                    $dropdowns.removeClass('show');
                    $dropdownMenus.slideUp(200);

                    if (!isActive) {
                        $parentDropdown.addClass('show');
                        $parentDropdown.find('.dropdown-menu').stop(true, true).slideDown(200);
                    }
                }
            });
        });
    </script>

</body>
</html>