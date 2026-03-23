<style>
    /* Corporate Modern Navbar Styles - Deep Slate Blue Edition */
    .modern-navbar {
        background: rgba(15, 23, 42, 0.9) !important; /* Deep Slate Blue */
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 15px 0 !important;
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }
    
    .modern-navbar .navbar-brand img {
        height: 45px;
        transition: transform 0.3s ease;
    }

    .modern-navbar .navbar-brand:hover img {
        transform: scale(1.05);
    }

    /* Navigation Links */
    .modern-navbar .nav-link {
        color: #f8fafc !important;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 8px 16px !important;
        margin: 0 5px;
        transition: color 0.3s ease;
        position: relative;
        letter-spacing: 0.5px;
    }

    /* PC HOVER EFFECTS */
    @media (min-width: 992px) {
        .modern-navbar .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #f59e0b; /* Amber Accent */
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.5);
        }

        .modern-navbar .nav-link:hover {
            color: #f59e0b !important;
        }

        .modern-navbar .nav-link:hover::after {
            width: 70%;
        }

        .modern-navbar .dropdown-menu {
            background: rgba(15, 23, 42, 0.95); /* Matches Navbar */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            padding: 10px 0;
            margin-top: 15px; 
            min-width: 220px;
            display: none;
            backdrop-filter: blur(10px);
        }

        .modern-navbar .dropdown-menu::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            height: 15px;
            background: transparent;
        }

        .modern-navbar .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeInDown 0.3s ease forwards;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modern-navbar .dropdown-item {
            color: #cbd5e1 !important;
            padding: 10px 20px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .modern-navbar .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #f59e0b !important;
            padding-left: 25px;
        }
    }

    /* --- MOBILE VIEW (max-width: 991px) --- */
    @media (max-width: 991px) {
        .modern-navbar .navbar-toggler {
            border: none;
            padding: 10px;
            outline: none !important;
        }

        /* Animated Hamburger */
        .navbar-toggler i {
            color: #f59e0b; /* Amber Accent */
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .navbar-toggler[aria-expanded="true"] i {
            transform: rotate(90deg);
        }

        .modern-navbar .navbar-collapse {
            background: rgba(15, 23, 42, 0.98); /* Matches Navbar */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 15px 20px 25px;
            border-radius: 0 0 20px 20px;
            margin-top: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-top: none;
        }

        .modern-navbar .nav-link {
            padding: 15px 10px !important;
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #e2e8f0 !important;
        }

        /* Chevron for mobile dropdown */
        .modern-navbar .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
            transition: transform 0.3s ease;
        }

        .modern-navbar .dropdown-toggle.active-drop::after {
            transform: rotate(180deg);
            color: #f59e0b;
        }

        .modern-navbar .dropdown-menu {
            background: rgba(0, 0, 0, 0.15);
            border: none;
            margin-top: 0;
            padding: 0;
            display: none; /* Controlled by slideDown */
            overflow: hidden;
            border-radius: 8px;
        }

        .modern-navbar .dropdown-item {
            color: #cbd5e1 !important;
            padding: 14px 20px;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            transition: all 0.2s ease;
        }

        .modern-navbar .dropdown-item:active,
        .modern-navbar .dropdown-item:hover {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b !important;
            padding-left: 25px;
        }
    }

    /* Global Body Spacing */
    body {
        padding-top: 80px; 
    }
</style>

<nav class="navbar navbar-expand-lg modern-navbar fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="logo.jpg" alt="MS Engineers">
        </a>

        <!-- Hamburger menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Aligned items to the right using ml-auto -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Products
                    </a>
                    <div class="dropdown-menu">
                        <?php 
                        // Safely check for the variable so it doesn't crash if renamed or missing on other pages
                        $nav_items = isset($all_products) ? $all_products : (isset($products) ? $products : []);
                        foreach ($nav_items as $nav_item): 
                        ?>
                            <a href="product_click.php?product_name=<?= urlencode($nav_item['product_name']) ?>" class="dropdown-item">
                                <?= htmlspecialchars($nav_item['product_name']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="about_us.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="contact_us.php" class="nav-link">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Enhanced Mobile JavaScript -->
<script>
$(document).ready(function() {
    // Dropdown logic for mobile only
    $('.navbar .dropdown-toggle').click(function(e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            e.stopPropagation();
            
            const $el = $(this);
            const $menu = $el.next('.dropdown-menu');
            
            // Toggle active arrow icon
            $el.toggleClass('active-drop');
            
            // Smooth slide animation
            $menu.stop(true, true).slideToggle(300);
        }
    });

    // Close mobile menu when clicking outside
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.hasClass("navbar-toggler") && clickover.parents('.navbar-collapse').length === 0) {
            $(".navbar-toggler").click();
        }
    });
});
</script>