<?php
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
    <title>Home | MS Engineers</title>
    <link rel="icon" type="image/x-icon" href="title.png">
    
    <!-- Google Fonts for Clean Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->

    <!-- Custom Cinematic CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #e2e8f0;
            margin: 0;
            padding: 0;
            /* Prevent horizontal scroll on mobile */
            overflow-x: hidden; 
            /* Rich fixed background image (Same as About Us) */
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
            overflow-x: hidden;
        }

        /* Cinematic Hero Section */
        .cinematic-hero {
            padding: 140px 15px 60px;
            text-align: center;
        }

        .cinematic-hero h1 {
            font-weight: 800;
            font-size: 3.5rem;
            letter-spacing: 1.5px;
            color: #ffffff;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            /* Handle long words on small screens */
            word-wrap: break-word; 
        }

        .cinematic-hero p {
            font-size: 1.15rem;
            color: #ffeb3b; /* Corporate Gold */
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Glassmorphism Product Cards */
        .product-card-glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .product-card-glass:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .product-card-glass a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Image Wrapper */
        .glass-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 75%; /* 4:3 Aspect Ratio */
            background-color: rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-card-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .product-card-glass:hover .glass-card-img {
            transform: scale(1.1);
        }

        /* Card Body */
        .glass-card-body {
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            text-align: left;
        }

        .glass-card-title {
            font-weight: 600;
            font-size: 1.15rem;
            color: #ffffff;
            margin: 0 0 12px 0;
            line-height: 1.4;
            transition: color 0.3s ease;
            word-wrap: break-word;
        }

        .product-card-glass:hover .glass-card-title {
            color: #ffeb3b; /* Title turns gold on hover */
        }

        .glass-card-action {
            margin-top: auto;
            font-size: 0.9rem;
            font-weight: 600;
            color: #cbd5e1;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .product-card-glass:hover .glass-card-action {
            gap: 12px; /* Arrow slides right */
            color: #ffeb3b;
        }

        /* Responsive Fixes for Mobile Devices */
        @media (max-width: 768px) {
            .cinematic-hero {
                padding: 120px 15px 40px;
            }
            .cinematic-hero h1 {
                font-size: 2.25rem; /* Scale down heading on mobile */
                letter-spacing: 0.5px;
            }
            .cinematic-hero p {
                font-size: 0.95rem; /* Scale down subtitle */
            }
            .glass-card-body {
                padding: 20px 15px;
            }
        }

    </style>
</head>
<body>

    <!-- The Dark Overlay for the background image -->
    <div class="body-overlay"></div>

    <!-- Navigation Bar -->
    <?php include('header.php'); ?>

    <!-- Main Content Wrapper -->
    <div class="page-wrapper">
        
        <!-- Cinematic Hero Title Area -->
        <div class="cinematic-hero container">
            <h1>Our Products</h1>
            <p>Explore our premium product line-up</p>
        </div>

        <div class="container">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 col-sm-6 mb-5">
                        <div class="product-card-glass">
                            <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>">
                                <div class="glass-img-wrapper">
                                    <img src="<?= htmlspecialchars($product['img']) ?>" class="glass-card-img" alt="<?= htmlspecialchars($product['product_name']) ?>">
                                </div>
                                <div class="glass-card-body">
                                    <h5 class="glass-card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                                    <div class="glass-card-action">
                                        View Details <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->

    <!-- Custom JS for Dropdown Hover (Untouched) -->
    <script>
        // Dropdown hover functionality
        $(document).ready(function() {
        var $dropdowns = $('.navbar .dropdown');
        var $dropdownMenus = $('.navbar .dropdown-menu');

        // Handle dropdowns on hover for desktop and on click for mobile
        $dropdowns.hover(
            function() {
                if ($(window).width() >= 992) { // Desktop view
                    $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
                    $(this).addClass('show');
                    $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
                }
            },
            function() {
                if ($(window).width() >= 992) { // Desktop view
                    $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
                    $(this).removeClass('show');
                    $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
                }
            }
        );

        // Ensure dropdown closes on mobile when clicked
        $('.navbar .dropdown-toggle').click(function(e) {
            if ($(window).width() < 992) { // Mobile view
                e.preventDefault();
                var $parentDropdown = $(this).parent('.dropdown');
                var isActive = $parentDropdown.hasClass('show');

                // Close all dropdowns
                $dropdowns.removeClass('show');
                $dropdownMenus.slideUp(200);

                // Open the clicked dropdown if it was not active
                if (!isActive) {
                    $parentDropdown.addClass('show');
                    $parentDropdown.find('.dropdown-menu').stop(true, true).slideDown(200);
                }
            }
        });

        // Prevent dropdown menu from opening on close action
        $dropdownMenus.on('hide.bs.dropdown', function(e) {
            e.preventDefault();
            var $dropdownMenu = $(this);
            $dropdownMenu.stop(true, true).slideUp(200, function() {
                $dropdownMenu.parent('.dropdown').removeClass('show');
                $dropdownMenu.parent('.dropdown').find('.dropdown-toggle').attr('aria-expanded', 'false');
            });
        });
    });
    </script>

</body>
</html>