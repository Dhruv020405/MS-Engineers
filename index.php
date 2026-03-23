<?php
// Initialize database and fetch products
include('connect.php');

try {
    $connectDB = new PDO($dns, $username, $password);
    $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // FETCH FROM 'pro' TABLE AND SORT BY display_order
    $stmt = $connectDB->query("SELECT * FROM pro ORDER BY display_order ASC");
    $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Filter out the Best Sellers (Where best_seller column = 1)
    $best_sellers = array_values(array_filter($all_products, function($p) {
        return isset($p['best_seller']) && $p['best_seller'] == 1;
    }));

    // Grab only the top 6 items for the conveyor belt (Featured)
    $top_selling = array_slice($all_products, 0, 6);

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
           2. PRELOADER
           ========================================= */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
            width: 80px;
            height: 80px;
            border: 3px solid transparent;
            border-top-color: var(--primary-accent);
            border-bottom-color: var(--secondary-accent);
            border-radius: 50%;
            animation: spin 1.5s linear infinite;
            position: relative;
        }
        .loader-core::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 3px solid transparent;
            border-left-color: var(--text-main);
            border-radius: 50%;
            animation: spin-reverse 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes spin-reverse {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }

        /* =========================================
           3. AMBIENT BACKGROUND ANIMATION
           ========================================= */
        .ambient-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -2;
            background: radial-gradient(circle at 50% 50%, #111 0%, #000 100%);
            overflow: hidden;
        }
        /* Moving Perspective Grid */
        .perspective-grid {
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
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
           4. HERO SECTION (Now at the top)
           ========================================= */
        .hero-section {
            padding: 140px 20px 40px;
            text-align: center;
            position: relative;
            z-index: 5;
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
            animation: fadeUp 1s forwards 0.3s;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--primary-accent);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s forwards 0.5s;
        }
        .hero-instruction {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            opacity: 0;
            animation: fadeUp 1s forwards 0.7s;
        }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* =========================================
           5. BEST SELLER HIGHLIGHT SECTION (Side-by-Side)
           ========================================= */
        .best-seller-section {
            padding: 20px 20px 40px;
            position: relative;
            z-index: 5;
            max-width: 1400px; /* Wider container for side-by-side */
            margin: 0 auto;
        }
        .best-seller-card {
            background: linear-gradient(145deg, rgba(20, 20, 20, 0.95), rgba(5, 5, 5, 0.95));
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6), inset 0 0 30px rgba(245, 158, 11, 0.05);
            overflow: hidden;
            position: relative;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .best-seller-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8), inset 0 0 40px rgba(245, 158, 11, 0.1);
            border-color: var(--primary-accent);
        }
        .best-seller-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.08) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }
        .bs-img {
            max-height: 180px; /* Scaled down perfectly for 50% split width */
            filter: drop-shadow(0 15px 15px rgba(0,0,0,0.6));
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            z-index: 1;
        }
        .best-seller-card:hover .bs-img {
            transform: scale(1.08) rotate(2deg);
        }
        .bs-badge {
            display: inline-block;
            background: var(--primary-accent);
            color: #000;
            padding: 4px 12px;
            border-radius: 15px;
            font-weight: 800;
            font-size: 0.75rem; 
            margin-bottom: 15px;
            text-transform: uppercase;
            position: relative;
            z-index: 1;
            box-shadow: 0 0 10px var(--primary-glow);
        }
        .bs-title {
            font-size: 1.5rem; /* Scaled down for 50% split width */
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            color: #fff;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }
        .bs-desc {
            font-size: 0.85rem; /* Scaled down */
            color: var(--text-muted);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            line-height: 1.5;
        }
        .bs-btn {
            display: inline-flex;
            align-items: center;
            padding: 8px 20px; /* Scaled down */
            background: transparent;
            border: 2px solid var(--primary-accent);
            color: var(--primary-accent);
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            z-index: 1;
        }
        .bs-btn:hover {
            background: var(--primary-accent);
            color: #000;
            text-decoration: none;
            box-shadow: 0 0 15px var(--primary-glow);
        }

        /* =========================================
           6. CONVEYOR BELT (REALISTIC)
           ========================================= */
        .conveyor-header {
            text-align: center;
            margin-bottom: 15px;
            opacity: 0;
            animation: fadeIn 1s forwards 1s;
        }
        .conveyor-header h3 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 5px;
        }
        .conveyor-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 20px 0 40px;
            opacity: 0;
            animation: fadeIn 2s forwards 1.2s;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .conveyor-wrapper::before,
        .conveyor-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            width: 150px;
            height: 100%;
            z-index: 10;
            pointer-events: none;
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

        .conveyor-item {
            width: 320px;
            flex-shrink: 0;
            margin: 0 20px;
            position: relative;
            z-index: 5;
        }
        .conveyor-item::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 10%;
            width: 80%;
            height: 15px;
            background: rgba(0, 0, 0, 0.9);
            border-radius: 50%;
            filter: blur(8px);
            z-index: -1;
        }
        .real-box-link {
            text-decoration: none;
            display: block;
            outline: none;
        }
        .real-box {
            position: relative;
            width: 280px;
            height: 350px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            margin: 0 auto;
            padding-bottom: 10px;
        }

        .box-back {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 140px;
            background-color: #8c6a4a;
            border: 1px solid #5c432d;
            border-radius: 4px;
            z-index: 1;
            box-shadow: inset 0 30px 30px rgba(0,0,0,0.5);
        }
        .box-back::before {
            content: '';
            position: absolute;
            top: -40px;
            left: -1px;
            width: 100%;
            height: 40px;
            background-color: #a8815b;
            border: 1px solid #5c432d;
            transform-origin: bottom;
            transform: perspective(300px) rotateX(45deg);
        }
        .box-front {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 90px;
            background-color: #a8815b;
            border: 1px solid #5c432d;
            border-radius: 4px;
            z-index: 3;
            background-image: repeating-linear-gradient(90deg, transparent, transparent 4px, rgba(0,0,0,0.05) 4px, rgba(0,0,0,0.05) 8px);
            box-shadow: 0 -5px 20px rgba(0,0,0,0.5);
        }
        .box-front::before {
            content: '';
            position: absolute;
            top: 0;
            left: -1px;
            width: 100%;
            height: 35px;
            background-color: #94714e;
            border: 1px solid #5c432d;
            transform-origin: top;
            transform: perspective(300px) rotateX(-50deg);
        }
        .box-tape {
            position: absolute;
            top: 30%;
            left: 0;
            width: 100%;
            height: 24px;
            background: rgba(220, 215, 200, 0.8);
            border-top: 1px dashed rgba(0,0,0,0.2);
            border-bottom: 1px dashed rgba(0,0,0,0.2);
        }
        .box-shipping-label {
            position: absolute;
            top: 20%;
            right: 15px;
            width: 45px;
            height: 30px;
            background: #fff;
            transform: rotate(-6deg);
            background-image: repeating-linear-gradient(90deg, #000 0, #000 2px, transparent 2px, transparent 4px);
            background-size: 80% 40%;
            background-position: center bottom 4px;
            background-repeat: no-repeat;
        }

        .box-product {
            position: relative;
            z-index: 2;
            width: 86%;
            height: 290px;
            background: #111;
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.8);
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transition: var(--transition-smooth);
        }
        .real-box-link:hover .box-product {
            transform: translateY(-40px);
            box-shadow: 0 30px 50px rgba(245, 158, 11, 0.2);
            border-color: var(--primary-accent);
        }
        .box-img-wrapper {
            width: 100%;
            height: 160px;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }
        .box-card-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.5s;
        }
        .real-box-link:hover .box-card-img {
            transform: scale(1.15);
        }
        .box-card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            text-align: center;
            background: #111;
        }
        .box-card-title {
            font-weight: 700;
            font-size: 1rem;
            color: #fff;
            margin-bottom: 8px;
        }
        .box-card-action {
            margin-top: auto;
            font-size: 0.8rem;
            color: var(--primary-accent);
            display: flex;
            justify-content: center;
            gap: 5px;
            transition: 0.3s;
        }
        .real-box-link:hover .box-card-action {
            gap: 10px;
        }

        .belt-visual-container {
            width: 100%;
            height: 130px;
            position: relative;
            z-index: 0;
        }
        .belt-rollers-layer {
            width: 100%;
            height: 32px;
            position: absolute;
            top: 0;
            left: 0;
            background-image: 
                repeating-linear-gradient(90deg, transparent 0px, transparent 24px, #000 24px, #000 32px),
                linear-gradient(to bottom, #9ca3af 0%, #fff 20%, #6b7280 65%, #111 100%);
            animation: rollBelt 1.5s linear infinite;
            border-bottom: 4px solid #000;
            box-shadow: 0 20px 30px rgba(0,0,0,0.8);
            z-index: 3;
        }
        .belt-side-rail {
            width: 100%;
            height: 16px;
            background: #171717;
            position: absolute;
            top: 32px;
            left: 0;
            z-index: 4;
            border-bottom: 3px solid #000;
        }
        .belt-scissor-frame {
            width: 100%;
            height: 45px;
            position: absolute;
            top: 48px;
            left: 0;
            background-image: 
                repeating-linear-gradient(45deg, transparent 0, transparent 30px, #222 30px, #222 36px),
                repeating-linear-gradient(-45deg, transparent 0, transparent 30px, #222 30px, #222 36px);
            z-index: 2;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.8));
        }
        .belt-legs {
            width: 100%;
            height: 40px;
            position: absolute;
            top: 93px;
            left: 0;
            background-image: 
                repeating-linear-gradient(90deg, transparent 0, transparent 300px, #111 300px, #111 316px, transparent 316px, transparent 600px);
            z-index: 1;
        }
        .belt-legs::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 100%;
            height: 12px;
            background-image: 
                repeating-linear-gradient(90deg, transparent 0, transparent 296px, #ea580c 296px, #ea580c 320px, transparent 320px, transparent 600px);
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.8);
        }
        @keyframes rollBelt {
            0% { background-position: 0 0, 0 0; }
            100% { background-position: -32px 0, 0 0; }
        }

        /* =========================================
           7. ALL PRODUCTS GRID (3D MAGNETIC CARDS)
           ========================================= */
        .catalog-section {
            padding: 80px 0 100px;
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
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-accent);
            border-radius: 2px;
            box-shadow: 0 0 15px var(--primary-glow);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 40px;
            padding: 20px;
        }
        .magnetic-card-wrap {
            perspective: 1500px;
            transform-style: preserve-3d;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .magnetic-card-wrap.visible {
            opacity: 1;
            transform: translateY(0);
        }
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
        .magnetic-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
            transform: translateZ(40px);
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
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
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
           8. RESPONSIVE MEDIA QUERIES (MOBILE FIXES)
           ========================================= */
        @media (max-width: 991px) {
            .hero-title {
                font-size: 3.5rem;
            }
            .bs-title {
                font-size: 1.6rem;
            }
            .conveyor-item {
                width: 280px;
            }
            .grid-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            /* --- REDESIGNED MOBILE HERO SECTION --- */
            .hero-section {
                padding: 100px 20px 30px;
            }
            .hero-title {
                font-size: 2.5rem;
                letter-spacing: 2px;
                text-shadow: 0 5px 15px rgba(0,0,0,0.8);
                margin-bottom: 15px;
            }
            .hero-subtitle {
                font-size: 0.9rem;
                letter-spacing: 2px;
                background: rgba(245, 158, 11, 0.15);
                border: 1px solid rgba(245, 158, 11, 0.4);
                display: inline-block;
                padding: 6px 16px;
                border-radius: 20px;
                margin-bottom: 15px;
            }

            /* --- BEST SELLER MOBILE FIXES --- */
            .best-seller-section {
                padding: 10px 15px 40px;
            }
            .best-seller-card {
                text-align: center;
            }
            .bs-img {
                max-height: 180px;
            }
            
            /* Simplify 3D on mobile for performance */
            .magnetic-card {
                transform: none !important;
            }
            .magnetic-card::before {
                display: none;
            }
            .card-img-container,
            .card-content {
                transform: none !important;
            }
            
            /* Mobile Conveyor Belt Native Scroll Fix */
            .conveyor-header {
                margin-bottom: 5px;
            }
            .conveyor-wrapper {
                overflow-x: auto;
                overflow-y: hidden;
                scroll-snap-type: x mandatory;
                padding-bottom: 20px;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            .conveyor-wrapper::-webkit-scrollbar {
                display: none;
            }
            .conveyor-wrapper::before,
            .conveyor-wrapper::after {
                width: 25px;
                pointer-events: none;
            }
            .conveyor-track {
                animation: none !important;
                padding: 0 20px;
            }
            .conveyor-item {
                scroll-snap-align: center;
                width: 280px;
                margin: 0 10px;
            }
            .duplicate-item {
                display: none !important;
            }
            .belt-visual-container {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- PRELOADER -->
    <div class="preloader" id="preloader">
        <div class="loader-core"></div>
    </div>

    <!-- AMBIENT BACKGROUND -->
    <div class="ambient-bg">
        <div class="perspective-grid"></div>
    </div>

    <!-- Navigation Bar -->
    <div class="nav-wrapper">
        <?php include('header.php'); ?>
    </div>

    <!-- Main Content Wrapper -->
    <div class="page-wrapper">
        
        <!-- =========================================
             1. HERO SECTION (MAIN PAGE TITLE)
             ========================================= -->
        <section class="hero-section">
            <h2 class="hero-subtitle">Engineering Excellence</h2>
            <h1 class="hero-title">Our Products</h1>
            <p class="hero-instruction">Explore our comprehensive lineup of industry-leading machinery, engineered for superior performance, durability, and unwavering reliability.</p>
        </section>

        <!-- =========================================
             2. BEST SELLER HIGHLIGHT SECTION (Side-by-Side)
             ========================================= -->
        <?php if(!empty($best_sellers)): ?>
        <section class="best-seller-section">
            <div class="row justify-content-center">
                <!-- Using col-lg-6 forces 2 cards side-by-side on desktop, d-flex/align-items-stretch keeps heights equal -->
                <?php foreach($best_sellers as $bs): ?>
                <div class="col-lg-6 mb-4 d-flex align-items-stretch">
                    <div class="best-seller-card w-100">
                        <div class="row no-gutters align-items-center h-100">
                            <div class="col-md-5 p-3 text-center">
                                <img src="<?= htmlspecialchars($bs['img']) ?>" alt="<?= htmlspecialchars($bs['product_name']) ?>" class="img-fluid bs-img">
                            </div>
                            <div class="col-md-7 p-4">
                                <div class="bs-badge"><i class="fas fa-crown mr-1"></i> #1 Best Seller</div>
                                <h3 class="bs-title"><?= htmlspecialchars($bs['product_name']) ?></h3>
                                <p class="bs-desc">Experience unparalleled performance with our most demanded engineering solution. Precision crafted for excellence in the field.</p>
                                <a href="product_click.php?product_name=<?= urlencode($bs['product_name']) ?>" class="bs-btn">
                                    View Specs <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- =========================================
             3. TOP SELLERS CONVEYOR SECTION
             ========================================= -->
        <div class="conveyor-header">
            <h3>Top Sellers</h3>
            <p class="text-muted small"><i class="fas fa-hand-pointer text-warning mr-1"></i> Swipe or hover to explore</p>
        </div>
        
        <!-- 3D CONVEYOR BELT -->
        <div class="conveyor-wrapper">
            <div class="conveyor-track">
                
                <!-- Loop 1: Show top selling items from DB -->
                <?php foreach ($top_selling as $product): ?>
                    <div class="conveyor-item">
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

                <!-- Loop 2: Required for infinite scroll on desktop, hidden on mobile -->
                <?php foreach ($top_selling as $product): ?>
                    <div class="conveyor-item duplicate-item" aria-hidden="true">
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
            
            <!-- Highly Detailed Conveyor Base (Hidden on Mobile) -->
            <div class="belt-visual-container">
                <div class="belt-rollers-layer"></div>
                <div class="belt-side-rail"></div>
                <div class="belt-scissor-frame"></div>
                <div class="belt-legs"></div>
            </div>
        </div>

        <!-- =========================================
             4. FULL 3D MAGNETIC GRID CATALOG
             ========================================= -->
        <section class="catalog-section container">
            <div class="section-header">
                <h2>Complete Catalog</h2>
            </div>
            
            <div class="grid-container">
                <?php 
                $delay = 0; 
                foreach ($all_products as $product): 
                ?>
                    <div class="magnetic-card-wrap" style="transition-delay: <?= $delay ?>s;">
                        <div class="magnetic-card">
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
                $delay += 0.15; 
                if($delay > 0.6) $delay = 0;
                endforeach; 
                ?>
            </div>
        </section>
        
    </div>

    <!-- Footer -->
    <div>
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
                    document.body.style.overflow = 'auto'; 
                }, 500); 
            });

            setTimeout(() => {
                if(!preloader.classList.contains('hidden')) {
                    preloader.classList.add('hidden');
                }
            }, 3000); 

            // 2. 3D MAGNETIC CARD EFFECT
            const magneticCards = document.querySelectorAll('.magnetic-card');
            
            magneticCards.forEach(card => {
                if(window.matchMedia("(pointer: fine)").matches) { 
                    card.addEventListener('mousemove', (e) => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left; 
                        const y = e.clientY - rect.top;  
                        
                        card.style.setProperty('--mouseX', `${x}px`);
                        card.style.setProperty('--mouseY', `${y}px`);

                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;
                        const rotateX = ((y - centerY) / centerY) * -15; 
                        const rotateY = ((x - centerX) / centerX) * 15;

                        card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
                    });

                    card.addEventListener('mouseleave', () => {
                        card.style.transform = `rotateX(0) rotateY(0) scale3d(1, 1, 1)`;
                        card.style.transition = 'transform 0.5s ease, box-shadow 0.5s ease';
                        setTimeout(() => { card.style.transition = 'transform 0.1s ease, box-shadow 0.1s ease'; }, 500);
                    });
                }
            });

            // 3. SCROLL INTERSECTION OBSERVER
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); 
                    }
                });
            }, observerOptions);

            const cardsToReveal = document.querySelectorAll('.magnetic-card-wrap');
            cardsToReveal.forEach(card => observer.observe(card));

            // 4. NAVBAR DROPDOWN FIXES
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