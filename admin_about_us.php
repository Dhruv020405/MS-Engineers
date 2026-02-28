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
    <title>Product Detail - <?php echo htmlspecialchars($product_name); ?></title>
    <link rel="icon" type="image/x-icon" href="title.png">
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->

    <!-- Custom CSS -->
    <style>
        body{
            color: white;
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
        .navbar .nav-link.btn-light 
    {
        color: #1a237e; /* Primary navbar color */
        background-color: #ffffff; /* White background */
    }
        /* Footer styles */
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
        /* About Us Section */
        .about-section {
            padding: 40px 20px; /* Adjusted padding */
            text-align: center;
            background-color: #333; 
            position: relative;
            overflow: hidden;
        }

        .about-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('about-bg.jpg') no-repeat center center/cover;
            opacity: 0.3;
            z-index: -1;
        }

        .about-section h1 {
            font-size: 42px; 
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .about-section h2 {
            font-size: 28px;
            margin-top: 40px;
            margin-bottom: 20px;
            color: #3f51b5;
            position: relative;
            z-index: 1;
        }
        .about-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .about-section i {
        font-size: 20px; /* Adjust the font size as needed */
    }
        .about-section p:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .about-section img {
            width: 100%;
            max-width: 800px;
            height: auto;
            margin: 20px 0 10px; /* Adjusted margin */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            z-index: 1;
        }

        .about-section img:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .about-grid div {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .about-grid div:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .about-grid div:nth-child(5) {
            grid-column: span 2;
            margin: 0 auto;
        }
        @media (max-width: 768px) {
    .about-grid {
        display: block; /* Change to block layout for mobile */
    }

    .about-grid div {
        width: 100%; /* Set width to full for each card */
        margin-bottom: 20px; /* Add space between cards */
    }
}

    </style>
</head>
<body>

<!-- Navigation Bar -->
<?php
include('admin_nav.php');
?>

    
<!-- About Us Section -->
<div class="about-section">
    <br><br><br>
    <h1>Who We Are</h1>
    <img src="about_us.jpg" alt="About Us Image"><br>
    <i>MS Engineers, with over 8 years of experience in the distribution of industrial aluminium profiles and conveyor, offers superior-quality products at highly competitive rates. Founded in 2017, the company is dedicated to serving the needs of factory automation and industrial applications through precision engineering and innovative solutions.</i>

    <div class="about-grid">
        <div>
            <h2>Our Legacy</h2>
            <p>Established in 2017, MS Engineers has built a legacy rooted in precision, innovation, and trust. From our early beginnings, we have grown into a reliable name in the engineering sector, recognized for delivering high-quality industrial aluminium profiles, structural connections, and conveyor systems.

                Over the years, our dedication to engineering excellence, continuous improvement, and customer satisfaction has shaped who we are today. By consistently meeting the evolving needs of industries, we have earned long-standing relationships based on performance, reliability, and integrity.

                At MS Engineers, our legacy reflects our unwavering commitment to quality craftsmanship, timely delivery, and technological advancement. We continue to move forward with the same vision that defined our foundation — to deliver engineering solutions that inspire confidence and drive industrial progress.</p>
        </div>
        <div>
            <h2>Our Facilities</h2>
            <p>At MS Engineers, we operate from a well-equipped facility located at 11-C, Ramdev Estate, Near Siddhapura Estate, Phase-IV, GIDC Vatva, Ramol Vinzol Road, Ahmedabad – 382445. Our infrastructure is designed to support end-to-end engineering operations — from design and fabrication to quality testing and final assembly.

Our facilities include:

Quality inspection and testing section to ensure every product meets industry standards.

Efficient material handling and storage systems for smooth workflow and timely dispatch.

Skilled workforce and technical experts committed to excellence in every process.

With a strong infrastructure and organized production system, we ensure consistency, accuracy, and reliability in every product we deliver.</p>
        </div>
        <div>
            <h2>Our Mission</h2>
            <p>Our mission is to deliver high-quality, durable, and customized engineering solutions that meet the diverse needs of modern industries.
We strive to achieve this through:

Commitment to quality and precision in every project.

Continuous improvement in technology, design, and performance.

Strong customer focus built on trust, transparency, and timely delivery.

Empowering our team to innovate and uphold the highest standards of professionalism.

At MS Engineers, our mission drives us to be a dependable partner in building a more efficient and progressive industrial future.</p>
        </div>
        <div>
            <h2>Our Vision</h2>
            <p>To be a leading engineering solutions provider, recognized for innovation, precision, and reliability in delivering industrial aluminium profiles, structural connections, and conveyor systems.
We aim to continuously enhance industrial efficiency and productivity through technological excellence and sustainable engineering practices that create long-term value for our clients and partners.</p>
        </div>
        <div>
            <h2>Why Choose Us</h2>
            <p>Choosing MS Engineers means partnering with a team that values quality, performance, and trust above all. We go beyond manufacturing — we engineer solutions that make a difference.

Here’s why our clients choose us:

Proven Expertise: Over years of experience in aluminium profiles, structural connections, and conveyor systems.

Customized Solutions: Products designed to meet specific industrial requirements.

Quality Assurance: Strict adherence to precision and international standards.

Timely Delivery: Streamlined processes to ensure projects are completed on schedule.

Customer-Centric Approach: Long-term partnerships built on trust and transparent communication.

Continuous Innovation: Ongoing improvement in design, efficiency, and performance.

At MS Engineers, we believe in building relationships as strong as our products — combining engineering excellence with reliable service to deliver true industrial value.</p>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php 
include('footer.php');
?>



    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->

    <!-- Custom JS for Dropdown Hover -->
    <script>
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
    </script>
    <script src="message_counter.js"></script>
</body>
</html>