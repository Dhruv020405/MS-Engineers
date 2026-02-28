<?php
include('connect.php');
include('logic_reg.php');
include('product_name.php');

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
        body{
            background-color: #333; 
            
        }
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
        /* Styling for introductory paragraph */
    .intro-paragraph {
        font-size: 18px;
        color: #333;
    }

    /* Styling for registration form */
    #registrationForm {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #registrationForm .form-group label {
        font-weight: bold;
    }

    /* Styling for eye icon */
    .input-group-text {
        cursor: pointer;
    }
    p{
        color: white;
    }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.php">
        <img src="logo.jpg" alt="Sica">
    </a>

    <!-- Hamburger menu for smaller screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu">
                    <?php foreach ($products as $product): ?>
                        <a href="admin_product_click.php?product_name=<?= urlencode($product['product_name']) ?>" class="dropdown-item"><?= htmlspecialchars($product['product_name']) ?></a>
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
</nav>

    <!-- Content to ensure navbar doesn't overlap -->
    <div style="height: 70px;"></div>

    <!-- Main Content -->

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <p class="text-center">Feel free to share your details with us! We'll ensure a smooth registration process for you.</p>
        </div>
    </div>
    
    <!-- Registration Form -->
    
    <div class="row">
        
        <div class="col-md-8 offset-md-2">
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != ''): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success']) && $_SESSION['success'] != ''): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    

        <form id="registrationForm"  method="POST">
        <h2 class="text-center">Regististraion</h2> <br>
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-eye" id="togglePassword"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

        </div>
    </div>
</div>
   
<br><br>    <!-- Footer -->
    <?php 
include('footer.php');
?>

    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->
    <!-- Custom JS for Dropdown Hover -->
    <script>
        // Dropdown hover functionality
        $('.navbar .dropdown'). hover(
            function() { // Mouse enter event
                $(this).find('.dropdown-menu'). stop(true, true). slideDown(200); // Slide down on hover
                $(this). addClass('show'); // Add the 'show' class
                $(this). find('.dropdown-toggle'). attr('aria-expanded', 'true'); // Set aria-expanded to true
            },
            function() { // Mouse leave event
                $(this). find('.dropdown-menu'). stop(true, true). slideUp(200); // Slide up when the mouse leaves
                $(this). removeClass('show'); // Remove the 'show' class
                $(this). find('.dropdown-toggle'). attr('aria-expanded', 'false'); // Set aria-expanded to false
            }
        );

        // Ensure dropdown closes on mobile when clicked
        $('.navbar .dropdown-toggle').click(function() {
            if ($(window).width() < 992) { // Mobile view
                $('.navbar .dropdown-menu').slideToggle(); // Toggle dropdown visibility
            }
        });
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        if (password !== confirm_password) {
            e.preventDefault();
            alert("Passwords do not match!");
        }
    });

    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        if (password !== confirm_password) {
            e.preventDefault();
            alert("Passwords do not match!");
        }
    });
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>

</body>
</html>
