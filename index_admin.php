<?php
include('connect.php');
include('message_counter.php');
include('product_name.php');
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: index.php');
}

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
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="title.png">
    <!-- External CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->

    <!-- Custom CSS -->
    <style>
        /* Navbar styles with card effect */
        .navbar {
            background: linear-gradient(45deg, #1a237e, #3f51b5); /* Gradient background */
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow for card effect */
            transition: all 0.3s; /* Smooth transitions for hover effects */
        }

        .navbar:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Increase shadow on hover */
        }

        .navbar .navbar-brand img {
            height: 48px;
            width: auto; /* Ensure correct scaling */
        }

        .navbar .navbar-nav {
            justify-content: center; /* Center the nav items */
            width: 100%; /* Ensure it spans the whole width */
        }

        .navbar .nav-link {
            color: white; /* White text color */
            padding: 10px 15px; /* Padding for nav items */
            text-decoration: none;
            transition: color 0.3s, background-color 0.3s; /* Smooth hover transition */
        }

        .navbar .nav-link:hover {
            color: #ffeb3b; /* Gold on hover */
            background-color: rgba(255, 255, 255, 0.1); /* Light background on hover */
        }

        /* Dropdown styles */
        .dropdown .dropdown-menu {
            background: #3f51b5; /* Consistent background color for dropdown */
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .navbar .dropdown-item {
            color: white;
            padding: 8px; /* Smaller padding for better mobile fit */
            font-size: 12px;
            text-align: left;
        }

        .navbar .dropdown-item:hover {
            background-color: #1a237e; /* Darker on hover */
        }
        /* Card styles */
        .card {
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth transitions for card hover effects */
        }

        .card:hover {
            transform: scale(1.05); /* Scale up on hover */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Larger shadow on hover */
        }
        .card a {
            text-decoration: none; /* No underline */
            color: black; /* Black color for links */
            transition: color 0.3s; /* Smooth transition for hover effects */
        }

        .card a:hover {
            color: #ffeb3b; /* Yellow on hover */
        }

        /* Footer styles with card effect */
        .footer {
            background: linear-gradient(45deg, #1a237e, #3f51b5); /* Same as navbar */
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
            line-height: 1.5;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow for card effect */
            transition: all 0.3s; /* Smooth transitions */
        }

        .footer h5 {
            color: #ffeb3b; /* Gold color for headings */
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            padding: 5px 0; /* Padding between list items */
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s; /* Smooth hover transition */
        }

        .footer a:hover {
            color: #ffeb3b; /* Gold on hover */
        }

        .footer .social-icons {
            display: flex; /* Use flex to arrange social icons */
            justify-content: flex-start;
            gap: 10px; /* Space between icons */
        }

        .footer .social-icons a {
            font-size: 20px;
        }

        .navbar .nav-link.btn-light {
            color: #1a237e; /* Primary navbar color */
            background-color: #ffffff; /* White background */
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<?php
include('admin_nav.php');
?>

<!-- Content to ensure navbar doesn't overlap -->
<div style="height: 70px;"></div>

<!-- Main Content -->
<div class="container mt-4">
    <br>
    <h1>Our Products</h1>
    <p>Explore our product line-up.</p>
    <div class="row">
        
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="admin_product_click.php?product_name=<?= urlencode($product['product_name']) ?>" class="card-link">
                        <img src="<?= htmlspecialchars($product['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['product_name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Add Product Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <a href="add_product.php" class="card-link d-flex align-items-center justify-content-center" style="height: 100%;">
                    <div class="card-body text-center">
                        <h1 class="card-title display-1">+</h1>
                        <p class="card-text">Add New Product</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- Footer -->
<?php 
include('footer.php');
?>

<!-- JS Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->

<!-- Custom JS for Dropdown Hover -->
<script>
    // Dropdown hover functionality
    $('.navbar .dropdown').hover(
        function() { // Mouse enter event
            $(this).find('.dropdown-menu').stop(true, true).slideDown(200); // Slide down on hover
            $(this).addClass('show'); // Add the 'show' class
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'true'); // Set aria-expanded to true
        },
        function() { // Mouse leave event
            $(this).find('.dropdown-menu').stop(true, true).slideUp(200); // Slide up when the mouse leaves
            $(this).removeClass('show'); // Remove the 'show' class
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'false'); // Set aria-expanded to false
        }
    );

    // Ensure dropdown closes on mobile when clicked
    $('.navbar .dropdown-toggle').click(function() {
        if ($(window).width() < 992) { // Mobile view
            $('.navbar .dropdown-menu').slideToggle(); // Toggle dropdown visibility
        }
    });
</script>
<script src="message_counter.js"></script>
</body>
</html>
