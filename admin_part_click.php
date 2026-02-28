<?php
include('connect.php');
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

$pro_part = isset($_GET['part']) ? $_GET['part'] : '';

// Fetch all rows where the product_name matches the parameter
$stmt = $connectDB->prepare('SELECT * FROM pro_master WHERE pro_part = :pro_part');
$stmt->execute(['pro_part' => $pro_part]);
$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If no products are found, handle the error
if (count($parts) === 0) {
    echo "No products found for: " . htmlspecialchars($pro_part);
    exit();
}
// If no product is found, handle the error
if (!$parts) {
    echo "Product not found.";
    exit();
}

// Counter for tracking the index
$counter = 0;
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

        /* Card styles */
        .card {
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 250px; /* Fixed height for all cards */
        }

        .card img {
            width: 100%;
            height: 100%; /* Ensures the image fits the card height */
            object-fit: cover; /* Ensures the image doesn't distort */
            transition: transform 0.3s;
        }

        .card .overlay {
            position: absolute;
            bottom: 0; /* Align the text to the bottom */
            left: 0; /* Align the text to the left */
            background: rgba(0, 0, 0, 0.6); /* Semi-transparent black background for visibility */
            padding: 10px; /* Padding for content placement */
            width: 100%; /* Cover the full width of the card */
        }

        .card .overlay p {
            margin: 0;
            font-size: 18px;
            color: white; /* White text on black background */
        }

        .card .hover-content {
            position: absolute;
            top: -40px; /* Start hidden above the card */
            right: 20px; /* Align to the right */
            transition: all 0.3s; /* Smooth transition for animation */
            display: flex;
            align-items: center;
            opacity: 0; /* Invisible by default */
        }

        .card:hover {
            transform: scale(1.05); /* Scale on hover */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Shadow on hover */
        }

        .card:hover img {
            transform: scale(1.1); /* Scale the image slightly on hover */
        }

        .card:hover .hover-content {
            top: 20px; /* Moves down into view on hover */
            opacity: 1; /* Become visible on hover */
        }

        .card .hover-content i {
            font-size: 32px; /* Larger icon size for emphasis */
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


    </style>
</head>
<body>
<!-- Navigation Bar -->
<?php
include('admin_nav.php');
?>

    <!-- Content to ensure navbar doesn't overlap -->
    <div style="height: 70px;"></div>

    <div class="container mt-4">
        <br>
    <h2><?php echo htmlspecialchars($pro_part); ?></h2>
    <br>
    <div class="row">
        <?php foreach ($parts as $index => $part) { 
            $counter++;

            // Open a new row if this is the start of a new set of three cards
            if ($counter % 3 == 1 && $counter > 1) {
                echo '</div><div class="row" style="margin-top: 20px;">';
            }?>
            <div class="col-md-4">
                <?php if($part['col_count'] == 0){ ?>
            <a href="<?php echo htmlspecialchars($part['pro_pdf_file']);?>" class="card-link">
            <?php
                }
                else{
                    ?>
                    <a href="admin_part_click2.php?part2=<?php echo urlencode($part['pro_pdf_file']); ?>" class="card-link">
                    <?php
                }
            ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($part['pro_pdf_img']); ?>" alt="<?php echo htmlspecialchars($part['pro_part']); ?>">
                        <div class="overlay">
                            <p><?php echo htmlspecialchars($part['pro_pdf_name']); ?></p>
                        </div>
                        <div class="hover-content">
                            <i class="fas fa-plus"></i>
                        </div> 
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

    <br><br>
    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Products Section -->
                <div class="col-md-4 col-sm-6">
                    <h5>Products</h5>
                    <?php foreach ($products as $product): ?>
                        <li><a href="admin_product_click.php?product_name=<?= urlencode($product['product_name']) ?>"><?= htmlspecialchars($product['product_name']) ?></a></li>
                    <?php endforeach; ?>
                </div>
                
                <!-- Contact Us Section -->
                <div class="col-md-4 col-sm-6">
                    <h5>Contact Us</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 47, Devashray Arcade & Industrial Estate, B/h Radhey Residency, Nr. Hathijan Circle S.P.Ring Road, Ramol, Ahmedabad, Gujarat.</li>
                        <li><i class="fas fa-phone"></i> +91 9978 144 272</li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:maulik@sica.in">maulik@sica.in </a> |  <a href="Sales@msengg.in">Sales@msengg.in</a></li>
                    </ul>
                </div>

                <!-- Follow Us Section -->
                <div class="col-md-4 col-sm-6">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/profile.php?id=100064131395346&mibextid=ZbWKwL" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/msen.gg?utm_source=qr&igsh=M2xybTZiazkzNG1q" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/maulik-shastri-503b431a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->

    <!-- Custom JS for Dropdown Hover -->
    <script>
        // Make dropdown open on hover
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

</body>
</html>