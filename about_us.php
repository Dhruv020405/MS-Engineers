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
    
    <!-- External CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->

    <!-- Custom Cinematic CSS for About Us -->
    <style>
        /* CRITICAL MOBILE WIDTH FIXES */
        html, body {
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
            position: relative;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #e2e8f0;
            /* Rich fixed background image - AS REQUESTED: NOT TOUCHED */
            background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=2000');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        /* Dark overlay to ensure text is readable over the background */
        .body-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(26, 35, 126, 0.85) 100%);
            z-index: -1;
        }

        /* Page Container */
        .page-wrapper {
            position: relative;
            z-index: 1;
            padding-bottom: 80px;
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden; /* Prevents internal horizontal scroll */
        }

        /* Cinematic Hero Section */
        .cinematic-hero {
            padding: 160px 15px 80px;
            text-align: center;
            max-width: 100%;
        }

        .cinematic-hero h1 {
            font-weight: 800;
            font-size: 4rem;
            letter-spacing: 2px;
            color: #ffffff;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            /* Prevents overflow from long words */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .cinematic-hero p {
            font-size: 1.25rem;
            color: #ffeb3b; /* Corporate Gold */
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Glassmorphism Panels */
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
            max-width: 100%;
        }

        /* Intro Section */
        .intro-text {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #f1f5f9;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .intro-text strong {
            color: #ffeb3b;
        }

        /* Alternating Feature Sections */
        .feature-section {
            padding: 60px 0;
            max-width: 100%;
        }

        .feature-block {
            margin-bottom: 80px;
            display: flex;
            align-items: center;
        }

        .feature-text-content {
            padding: 20px 40px;
        }

        .feature-text-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
        }

        .feature-text-content h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: #ffeb3b;
            border-radius: 2px;
        }

        .feature-text-content p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #cbd5e1;
            white-space: pre-line;
            word-wrap: break-word;
        }

        /* Image Styling with Glow */
        .feature-image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            max-width: 100%;
        }

        .feature-image-wrapper::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 20px;
            pointer-events: none;
        }

        .feature-image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.7s ease;
        }

        .feature-image-wrapper:hover img {
            transform: scale(1.05);
        }

        /* Why Choose Us List */
        .choose-list {
            list-style: none;
            padding: 0;
        }

        .choose-list li {
            font-size: 1.1rem;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #ffeb3b;
        }

        .choose-list li i {
            color: #ffeb3b;
            font-size: 1.5rem;
            margin-right: 20px;
            margin-top: 3px;
        }

        .choose-list strong {
            color: #ffffff;
            display: block;
            margin-bottom: 5px;
        }

        /* --- MOBILE VIEW FIXES --- */
        @media (max-width: 991px) {
            .cinematic-hero {
                padding: 120px 15px 40px;
            }
            .cinematic-hero h1 {
                font-size: 2.25rem;
            }
            .cinematic-hero p {
                font-size: 0.95rem;
            }
            .glass-panel {
                padding: 25px 15px;
                border-radius: 15px;
            }
            .feature-block {
                flex-direction: column !important;
                text-align: center;
                margin-bottom: 50px;
            }
            .feature-text-content {
                padding: 30px 10px 10px;
            }
            .feature-text-content h2 {
                font-size: 1.8rem;
            }
            .feature-text-content h2::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .choose-list li {
                text-align: left;
                padding: 15px;
            }
            .choose-list li i {
                margin-right: 15px;
                font-size: 1.2rem;
            }
            /* Prevent image scaling issues on mobile */
            .feature-image-wrapper {
                margin: 0 auto;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- The Dark Overlay for the background image -->
<div class="body-overlay"></div>

<!-- Navigation Bar -->
<?php include('header.php'); ?>
    
<div class="page-wrapper">
    <!-- Cinematic Hero -->
    <div class="cinematic-hero container">
        <h1>Who We Are</h1>
        <p>Precision Engineering & Innovative Solutions</p>
    </div>

    <!-- Intro Panel -->
    <div class="container">
        <div class="glass-panel">
            <p class="intro-text">
                <strong>MS Engineers</strong>, with over 8 years of experience in the distribution of industrial aluminium profiles and conveyor systems, offers superior-quality products at highly competitive rates. Founded in 2017, the company is dedicated to serving the needs of factory automation and industrial applications through precision engineering and innovative solutions.
            </p>
        </div>
    </div>

    <!-- Flowing Feature Sections -->
    <div class="feature-section container">
        
        <!-- Section 1: Legacy (Image Left, Text Right) -->
        <div class="row feature-block">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="feature-image-wrapper">
                    <!-- Cinematic Engineering Detail Image - UNTOUCHED AS PER REQUEST -->
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
        <div class="row feature-block flex-lg-row-reverse">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="feature-image-wrapper">
                    <!-- AI workshop image - UNTOUCHED AS PER REQUEST -->
                    <img src="Gemini_Generated_Image_w85dkcw85dkcw85d.png" alt="Our Facilities">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-text-content">
                    <h2>Our Facilities</h2>
                    <p>At MS Engineers, we operate from a well-equipped facility located at 11-C, Ramdev Estate, Near Siddhapura Estate, Phase-IV, GIDC Vatva, Ahmedabad. Our infrastructure is designed to support end-to-end engineering operations.

                    <strong>Our facilities include:</strong>
                    • Quality inspection and testing section to ensure every product meets industry standards.
                    • Efficient material handling and storage systems for smooth workflow and timely dispatch.
                    • Skilled workforce and technical experts committed to excellence in every process.</p>
                </div>
            </div>
        </div>

        <!-- Section 3: Mission & Vision (Split Panel) -->
        <div class="row mb-5">
            <div class="col-12 mb-4">
                 <div class="feature-image-wrapper" style="max-height: 400px;">
                    <!-- Conceptual innovation image - UNTOUCHED AS PER REQUEST -->
                    <img src="http://googleusercontent.com/image_generation_content/2" alt="Our Vision and Innovation" style="object-fit: cover; width: 100%;">
                </div>
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="glass-panel h-100 mb-0">
                    <h2 style="color: #ffeb3b; font-weight: 700; margin-bottom: 20px;"><i class="fas fa-bullseye mr-2"></i> Our Mission</h2>
                    <p style="color: #cbd5e1; line-height: 1.8;">Our mission is to deliver high-quality, durable, and customized engineering solutions that meet the diverse needs of modern industries. We strive to achieve this through a commitment to quality, continuous improvement in technology, and a strong customer focus built on trust, transparency, and timely delivery.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="glass-panel h-100 mb-0">
                    <h2 style="color: #ffeb3b; font-weight: 700; margin-bottom: 20px;"><i class="fas fa-eye mr-2"></i> Our Vision</h2>
                    <p style="color: #cbd5e1; line-height: 1.8;">To be a leading engineering solutions provider, recognized for innovation, precision, and reliability in delivering industrial aluminium profiles, structural connections, and conveyor systems. We aim to continuously enhance industrial efficiency and productivity through technological excellence.</p>
                </div>
            </div>
        </div>

        <!-- Section 4: Why Choose Us -->
        <div class="row">
            <div class="col-12">
                <div class="glass-panel">
                    <div class="text-center mb-5">
                        <h2 style="color: #ffffff; font-weight: 700; font-size: 2.5rem;">Why Choose Us</h2>
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

    </div>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>

<!-- JS Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="message_counter.js"></script>

</body>
</html>