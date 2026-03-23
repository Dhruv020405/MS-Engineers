<?php
include('connect.php');
include('product_name.php');
session_start();

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
    <title>About Us | MS Engineers</title>
    <link rel="icon" type="image/x-icon" href="title.png">
    
    <!-- Modern Fonts: Orbitron for futuristic headers, Inter for clean readability -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->

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
            --glass-border: rgba(255, 255, 255, 0.05);
            --transition-smooth: 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
            position: relative;
            scroll-behavior: smooth;
        }

        * {
            cursor: auto; /* Fallback for native cursor */
        }

        /* Hide default cursor on desktop when custom cursor is active */
        @media (min-width: 769px) {
            * { cursor: none !important; }
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-color);
            /* Rich fixed background image */
            background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=2000');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        /* Hide scrollbar for seamless look */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #000; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary-accent); }

        /* Dark overlay to ensure text is readable over the background */
        .body-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(15, 23, 42, 0.9) 0%, rgba(5, 5, 5, 0.98) 100%);
            z-index: -1;
        }

        /* =========================================
           2. CUSTOM CURSOR & PRELOADER
           ========================================= */
        .custom-cursor {
            position: fixed; top: 0; left: 0; width: 20px; height: 20px;
            border-radius: 50%; pointer-events: none; z-index: 9999;
            transform: translate(-50%, -50%); transition: width 0.3s, height 0.3s, background-color 0.3s;
            mix-blend-mode: difference; background-color: #fff;
        }
        .custom-cursor-follower {
            position: fixed; top: 0; left: 0; width: 40px; height: 40px;
            border: 1px solid rgba(255,255,255,0.5); border-radius: 50%;
            pointer-events: none; z-index: 9998; transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, transform 0.1s ease-out;
        }
        .cursor-hover .custom-cursor { width: 50px; height: 50px; background-color: var(--primary-accent); mix-blend-mode: screen; }
        .cursor-hover .custom-cursor-follower { width: 80px; height: 80px; border-color: var(--primary-accent); }

        .preloader {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: #000; z-index: 10000; display: flex; justify-content: center;
            align-items: center; transition: opacity 0.8s ease, visibility 0.8s;
        }
        .preloader.hidden { opacity: 0; visibility: hidden; }
        .loader-core {
            width: 80px; height: 80px; border: 3px solid transparent;
            border-top-color: var(--primary-accent); border-bottom-color: var(--secondary-accent);
            border-radius: 50%; animation: spin 1.5s linear infinite; position: relative;
        }
        .loader-core::before {
            content: ''; position: absolute; top: 15px; left: 15px; right: 15px; bottom: 15px;
            border: 3px solid transparent; border-left-color: var(--text-main); border-radius: 50%;
            animation: spin-reverse 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes spin-reverse { 0% { transform: rotate(360deg); } 100% { transform: rotate(0deg); } }

        /* =========================================
           3. PAGE STRUCTURE & ANIMATIONS
           ========================================= */
        .page-wrapper {
            position: relative;
            z-index: 1;
            padding-bottom: 80px;
            width: 100%;
            max-width: 100vw;
        }

        .reveal-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Cinematic Hero Section */
        .cinematic-hero {
            padding: 160px 15px 80px;
            text-align: center;
            max-width: 100%;
        }
        .cinematic-hero h1 {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 4.5rem;
            letter-spacing: 2px;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            word-wrap: break-word;
            opacity: 0; transform: translateY(30px); animation: fadeUp 1s forwards 0.3s;
        }
        .cinematic-hero p {
            font-size: 1.25rem;
            color: var(--primary-accent);
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0; transform: translateY(20px); animation: fadeUp 1s forwards 0.5s;
        }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        /* Glassmorphism Panels */
        .glass-panel {
            background: linear-gradient(145deg, rgba(20, 20, 20, 0.8), rgba(5, 5, 5, 0.9));
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), inset 0 0 20px rgba(255, 255, 255, 0.02);
            margin-bottom: 40px;
            max-width: 100%;
            transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
        }
        .glass-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.7), inset 0 0 30px rgba(245, 158, 11, 0.05);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .intro-text {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #f1f5f9;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }
        .intro-text strong { color: var(--primary-accent); }

        /* Alternating Feature Sections */
        .feature-section { padding: 40px 0; max-width: 100%; }
        .feature-block { margin-bottom: 80px; display: flex; align-items: center; }
        .feature-text-content { padding: 20px 40px; }
        .feature-text-content h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        .feature-text-content h2::after {
            content: ''; position: absolute; left: 0; bottom: -10px;
            width: 60px; height: 3px; background: var(--primary-accent);
            border-radius: 2px; box-shadow: 0 0 10px var(--primary-glow);
        }
        .feature-text-content p { font-size: 1.05rem; line-height: 1.8; color: #cbd5e1; white-space: pre-line; }

        /* Image Styling with Glow */
        .feature-image-wrapper {
            position: relative; border-radius: 20px; overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5); max-width: 100%;
        }
        .feature-image-wrapper::after {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; pointer-events: none;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.3);
        }
        .feature-image-wrapper img { width: 100%; height: auto; display: block; transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1); }
        .feature-block:hover .feature-image-wrapper img, .glass-panel:hover .feature-image-wrapper img { transform: scale(1.08) rotate(1deg); }

        /* Why Choose Us List */
        .choose-list { list-style: none; padding: 0; }
        .choose-list li {
            font-size: 1.05rem; margin-bottom: 20px; display: flex; align-items: flex-start;
            background: rgba(255, 255, 255, 0.03); padding: 20px; border-radius: 12px;
            border-left: 4px solid var(--primary-accent); transition: all 0.3s ease;
        }
        .choose-list li:hover { background: rgba(245, 158, 11, 0.08); transform: translateX(10px); }
        .choose-list li i { color: var(--primary-accent); font-size: 1.5rem; margin-right: 20px; margin-top: 3px; }
        .choose-list strong { color: #ffffff; display: block; margin-bottom: 5px; font-family: 'Orbitron', sans-serif; letter-spacing: 1px;}

        /* Reusable Action Button */
        .action-btn {
            display: inline-flex; align-items: center; padding: 12px 30px; background: transparent;
            border: 2px solid var(--primary-accent); color: var(--primary-accent);
            border-radius: 30px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;
            transition: all 0.3s ease; text-decoration: none; position: relative; z-index: 1;
        }
        .action-btn:hover { background: var(--primary-accent); color: #000; text-decoration: none; box-shadow: 0 0 20px var(--primary-glow); }

        /* Map Iframe styling */
        .map-iframe { border-radius: 0 20px 20px 0; filter: grayscale(20%) contrast(120%); transition: all 0.5s ease; }
        .glass-panel:hover .map-iframe { filter: grayscale(0%) contrast(100%); }

        /* --- MOBILE VIEW FIXES --- */
        @media (max-width: 991px) {
            .cinematic-hero { padding: 120px 15px 40px; }
            .cinematic-hero h1 { font-size: 2.5rem; }
            .cinematic-hero p { font-size: 1rem; }
            .glass-panel { padding: 25px 15px; border-radius: 15px; }
            .feature-block { flex-direction: column !important; text-align: center; margin-bottom: 50px; }
            .feature-text-content { padding: 30px 10px 10px; }
            .feature-text-content h2 { font-size: 1.8rem; }
            .feature-text-content h2::after { left: 50%; transform: translateX(-50%); }
            .choose-list li { text-align: left; padding: 15px; }
            .choose-list li i { margin-right: 15px; font-size: 1.2rem; }
            .feature-image-wrapper { margin: 0 auto; width: 100%; }
            .map-iframe { border-radius: 0 0 20px 20px; min-height: 300px; }
            
            /* Disable custom cursor on mobile */
            * { cursor: auto !important; }
            .custom-cursor, .custom-cursor-follower { display: none !important; }
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

<!-- The Dark Overlay for the background image -->
<div class="body-overlay"></div>

<!-- Navigation Bar -->
<div class="interactive-element">
    <?php include('header.php'); ?>
</div>
    
<div class="page-wrapper">
    <!-- Cinematic Hero -->
    <div class="cinematic-hero container">
        <h1>Who We Are</h1>
        <p>Precision Engineering & Innovative Solutions</p>
    </div>

    <!-- Intro Panel -->
    <div class="container reveal-up">
        <div class="glass-panel interactive-element">
            <p class="intro-text">
                <strong>MS Engineers</strong>, with over 8 years of experience in the distribution of industrial aluminium profiles and conveyor systems, offers superior-quality products at highly competitive rates. Founded in 2017, the company is dedicated to serving the needs of factory automation and industrial applications through precision engineering and innovative solutions.
            </p>
        </div>
    </div>

    <!-- Flowing Feature Sections -->
    <div class="feature-section container">
        
        <!-- Section 1: Legacy (Image Left, Text Right) -->
        <div class="row feature-block reveal-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="feature-image-wrapper interactive-element">
                    <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&q=80&w=1000" alt="Our Legacy">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-text-content">
                    <h2>Our Legacy</h2>
                    <p>Established in 2017, MS Engineers has built a legacy rooted in precision, innovation, and trust. From our early beginnings, we have grown into a reliable name in the engineering sector, recognized for delivering high-quality industrial aluminium profiles, structural connections, and conveyor systems.

                    Over the years, our dedication to engineering excellence, continuous improvement, and customer satisfaction has shaped who we are today. By consistently meeting the evolving needs of industries, we have earned long-standing relationships based on performance, reliability, and integrity.</p>
                </div>
            </div>
        </div>

        <!-- Section 2: Facilities (Text Left, Image Right) -->
        <div class="row feature-block flex-lg-row-reverse reveal-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="feature-image-wrapper interactive-element">
                    <img src="Gemini_Generated_Image_w85dkcw85dkcw85d.png" alt="Our Facilities">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-text-content">
                    <h2>Our Facilities</h2>
                    <p>At MS Engineers, we operate from a well-equipped facility located at 11-C, Ramdev Estate, Near Siddhapura Estate, Phase-IV, GIDC Vatva, Ahmedabad. Our infrastructure is designed to support end-to-end engineering operations.

                    <strong style="color: var(--text-main); display:block; margin-top:15px; margin-bottom:10px;">Our facilities include:</strong>
                    <span style="color: var(--primary-accent); margin-right: 8px;">•</span> Quality inspection and testing section to ensure every product meets industry standards.<br>
                    <span style="color: var(--primary-accent); margin-right: 8px;">•</span> Efficient material handling and storage systems for smooth workflow and timely dispatch.<br>
                    <span style="color: var(--primary-accent); margin-right: 8px;">•</span> Skilled workforce and technical experts committed to excellence in every process.</p>
                </div>
            </div>
        </div>

        <!-- Section 3: Mission & Vision (Split Panel) -->
        <div class="row mb-5 reveal-up">
            <div class="col-12 mb-4">
                 <div class="feature-image-wrapper interactive-element" style="max-height: 400px;">
                    <img src="http://googleusercontent.com/image_generation_content/2" alt="Our Vision and Innovation" style="object-fit: cover; width: 100%;">
                </div>
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="glass-panel h-100 mb-0 interactive-element">
                    <h2 style="color: var(--primary-accent); font-family: 'Orbitron', sans-serif; font-weight: 700; margin-bottom: 20px; text-transform:uppercase;"><i class="fas fa-bullseye mr-2"></i> Our Mission</h2>
                    <p style="color: #cbd5e1; line-height: 1.8;">Our mission is to deliver high-quality, durable, and customized engineering solutions that meet the diverse needs of modern industries. We strive to achieve this through a commitment to quality, continuous improvement in technology, and a strong customer focus built on trust, transparency, and timely delivery.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="glass-panel h-100 mb-0 interactive-element">
                    <h2 style="color: var(--primary-accent); font-family: 'Orbitron', sans-serif; font-weight: 700; margin-bottom: 20px; text-transform:uppercase;"><i class="fas fa-eye mr-2"></i> Our Vision</h2>
                    <p style="color: #cbd5e1; line-height: 1.8;">To be a leading engineering solutions provider, recognized for innovation, precision, and reliability in delivering industrial aluminium profiles, structural connections, and conveyor systems. We aim to continuously enhance industrial efficiency and productivity through technological excellence.</p>
                </div>
            </div>
        </div>

        <!-- Section 4: Why Choose Us -->
        <div class="row reveal-up">
            <div class="col-12">
                <div class="glass-panel interactive-element">
                    <div class="text-center mb-5">
                        <h2 style="font-family: 'Orbitron', sans-serif; color: #ffffff; font-weight: 800; font-size: 2.5rem; text-transform: uppercase;">Why Choose Us</h2>
                        <div style="width: 60px; height: 3px; background: var(--primary-accent); margin: 15px auto 20px; box-shadow: 0 0 10px var(--primary-glow);"></div>
                        <p style="color: #cbd5e1; font-size: 1.1rem; max-width: 700px; margin: 0 auto;">Choosing MS Engineers means partnering with a team that values quality, performance, and trust above all. We go beyond manufacturing — we engineer solutions that make a difference.</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="choose-list">
                                <li>
                                    <i class="fas fa-certificate"></i>
                                    <div>
                                        <strong>Proven Expertise</strong>
                                        Over years of experience in aluminium profiles, structural connections, and conveyor systems.
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-cogs"></i>
                                    <div>
                                        <strong>Customized Solutions</strong>
                                        Products uniquely designed to meet specific and complex industrial requirements.
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-double"></i>
                                    <div>
                                        <strong>Quality Assurance</strong>
                                        Strict adherence to precision engineering and high international standards.
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="choose-list">
                                <li>
                                    <i class="fas fa-shipping-fast"></i>
                                    <div>
                                        <strong>Timely Delivery</strong>
                                        Streamlined processes to ensure your projects are always completed on schedule.
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-handshake"></i>
                                    <div>
                                        <strong>Customer-Centric Approach</strong>
                                        Long-term partnerships built on trust, support, and transparent communication.
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-lightbulb"></i>
                                    <div>
                                        <strong>Continuous Innovation</strong>
                                        Ongoing improvement in design, efficiency, and technological performance.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5: Visit Our Facility (Embedded Map) -->
        <div class="row mt-4 reveal-up">
            <div class="col-12">
                <div class="glass-panel p-0 overflow-hidden interactive-element border-0">
                    <div class="row no-gutters">
                        <div class="col-lg-5 p-4 p-md-5 d-flex flex-column justify-content-center" style="background: rgba(10, 15, 25, 0.6);">
                            <h2 style="font-family: 'Orbitron', sans-serif; color: #fff; font-weight: 800; text-transform: uppercase; margin-bottom: 20px;">Visit Our Facility</h2>
                            <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 30px; line-height: 1.6;">
                                We invite you to visit our state-of-the-art facility to see our engineering excellence in action. Our doors are always open to clients and partners.
                            </p>
                            
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-map-marker-alt mt-1 mr-3" style="color: var(--primary-accent); font-size: 1.2rem;"></i>
                                <span style="color: #e2e8f0; font-weight: 500;">
                                    11-C, Ramdev Estate, Nr. Siddhapura Estate, Phase-IV, GIDC, Vatva,<br>
                                    Ramol Vinzol Road, Ahmedabad-382445
                                </span>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4 mt-2">
                                <i class="fas fa-clock mr-3" style="color: var(--primary-accent); font-size: 1.1rem;"></i>
                                <span style="color: #cbd5e1;">Mon - Sat: 9:00 AM - 6:30 PM</span>
                            </div>

                            <a href="https://maps.app.goo.gl/zqvm85eoyZn6nxq69" target="_blank" class="action-btn mt-3 align-self-start">
                                Get Directions <i class="fas fa-external-link-alt ml-2"></i>
                            </a>
                        </div>
                        <div class="col-lg-7">
                            <!-- Google Maps iFrame -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d229.6050038909521!2d72.65041935144149!3d22.96200701175433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e896ef73f2151%3A0x8972e3d0fbc1d568!2sMS%20Engineers!5e0!3m2!1sen!2sin!4v1774288222705!5m2!1sen!2sin" width="100%" height="100%" class="map-iframe" style="border:0; min-height: 400px; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<div class="interactive-element">
    <?php include('footer.php'); ?>
</div>

<!-- JS Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Assuming this exists in your directory -->
<script src="message_counter.js"></script>

<!-- ULTRA MODERN JAVASCRIPT LOGIC -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        
        // 1. PRELOADER LOGIC
        const preloader = document.getElementById('preloader');
        window.addEventListener('load', () => {
            setTimeout(() => {
                preloader.classList.add('hidden');
            }, 500); 
        });

        // Fallback preloader removal
        setTimeout(() => {
            if(!preloader.classList.contains('hidden')) {
                preloader.classList.add('hidden');
            }
        }, 3000); 

        // 2. CUSTOM CURSOR LOGIC (Desktop Only)
        const cursor = document.getElementById('cursor');
        const follower = document.getElementById('cursor-follower');
        let mouseX = 0, mouseY = 0;
        let cursorX = 0, cursorY = 0;
        
        if(window.matchMedia("(min-width: 769px) and (pointer: fine)").matches) {
            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                cursor.style.left = mouseX + 'px';
                cursor.style.top = mouseY + 'px';
            });

            const animateFollower = () => {
                let dx = mouseX - cursorX;
                let dy = mouseY - cursorY;
                cursorX += dx * 0.15; 
                cursorY += dy * 0.15;
                follower.style.left = cursorX + 'px';
                follower.style.top = cursorY + 'px';
                requestAnimationFrame(animateFollower);
            };
            animateFollower();

            const interactiveEls = document.querySelectorAll('a, button, .interactive-element');
            interactiveEls.forEach(el => {
                el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
                el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
            });
        }

        // 3. SCROLL INTERSECTION OBSERVER (Fade Up Animation)
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15 
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        const elementsToReveal = document.querySelectorAll('.reveal-up');
        elementsToReveal.forEach(el => observer.observe(el));
    });
</script>

</body>
</html>