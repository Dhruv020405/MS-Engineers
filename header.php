<style>
    /* Corporate Modern Navbar Styles - Dark Blue Edition */
    .modern-navbar {
        background: linear-gradient(45deg, #1a237e, #3f51b5) !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        padding: 12px 0 !important;
        transition: all 0.3s ease;
    }
    
    .modern-navbar .navbar-brand img {
        height: 45px;
        transition: transform 0.3s ease;
    }

    .modern-navbar .navbar-brand:hover img {
        transform: scale(1.02);
    }

    /* Navigation Links */
    .modern-navbar .nav-link {
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 8px 16px !important;
        margin: 0 8px;
        transition: color 0.3s ease;
        position: relative;
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
            background: #ffeb3b;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .modern-navbar .nav-link:hover {
            color: #ffeb3b !important;
        }

        .modern-navbar .nav-link:hover::after {
            width: 80%;
        }

        .modern-navbar .dropdown-menu {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 4px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 8px 0;
            margin-top: 15px; 
            min-width: 220px;
            display: none;
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
        }

        .modern-navbar .dropdown-item {
            color: #475569 !important;
            padding: 10px 20px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .modern-navbar .dropdown-item:hover {
            background: #f8fafc;
            color: #1a237e !important;
            padding-left: 24px;
        }
    }

    /* Shared Button Style */
    .modern-navbar .login-button {
        background: #ffffff !important;
        color: #1a237e !important;
        border-radius: 4px;
        padding: 10px 24px !important;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        margin-left: 15px;
        border: 1px solid #ffffff;
        text-align: center;
    }

    .modern-navbar .login-button:hover {
        background: #ffeb3b !important;
        color: #1a237e !important;
        border-color: #ffeb3b;
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
            color: #ffffff;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .navbar-toggler[aria-expanded="true"] i {
            transform: rotate(90deg);
        }

        .modern-navbar .navbar-collapse {
            background: rgba(26, 35, 126, 0.98);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 10px 20px 30px;
            border-radius: 0 0 20px 20px;
            margin-top: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modern-navbar .nav-link {
            padding: 15px 10px !important;
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }

        .modern-navbar .dropdown-menu {
            background: rgba(255, 255, 255, 0.05);
            border: none;
            margin-top: 0;
            padding: 0;
            display: none; /* Controlled by slideDown */
            overflow: hidden;
            border-radius: 8px;
        }

        .modern-navbar .dropdown-item {
            color: #e2e8f0 !important;
            padding: 14px 20px;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            transition: all 0.2s ease;
        }

        .modern-navbar .dropdown-item:active {
            background: rgba(255, 255, 255, 0.1);
            color: #ffeb3b !important;
        }

        .modern-navbar .login-button {
            margin: 20px 0 0 0;
            width: 100%;
            display: block;
            border-radius: 50px; /* Modern rounded button for mobile */
            padding: 14px !important;
        }
    }

    /* Global Body Spacing */
    body {
        padding-top: 75px; 
    }
</style>

<nav class="navbar navbar-expand-lg modern-navbar fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="logo.jpg" alt="Sica">
        </a>

        <!-- Hamburger menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Products
                    </a>
                    <div class="dropdown-menu">
                        <?php foreach ($products as $product): ?>
                            <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>" class="dropdown-item">
                                <?= htmlspecialchars($product['product_name']) ?>
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
            <!-- Login Button -->
            <div class="navbar-nav ml-auto">
                <a href="login.php" class="nav-link btn login-button">LOG-IN / REGISTRATION</a>
            </div>
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
            
            // Close other items if necessary (optional accordion style)
            // $('.dropdown-menu').not($menu).slideUp().prev().removeClass('active-drop');
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