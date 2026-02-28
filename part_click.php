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

$pro_part = isset($_GET['part']) ? $_GET['part'] : '';
$product_name = isset($_GET['name']) ? $_GET['name'] : '';

// Fetch all rows where the product_name matches the parameter
$stmt = $connectDB->prepare('SELECT * FROM pro_master WHERE pro_part = :pro_part');
$stmt->execute(['pro_part' => $pro_part]);
$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If no products are found, handle the error
if (count($parts) === 0) {
    echo "<div style='color: white; text-align: center; margin-top: 130px;'><h2>No products found for: " . htmlspecialchars($pro_part) . "</h2></div>";
    exit();
}
// If no product is found, handle the error
if (!$parts) {
    echo "<div style='color: white; text-align: center; margin-top: 130px;'><h2>Product not found.</h2></div>";
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
            overflow-x: hidden; 
            /* Rich fixed background image */
            background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=2000');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        /* Dark overlay to ensure text is readable */
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
            padding-top: 130px; /* Accounts for fixed header */
            padding-bottom: 80px;
        }

        /* Product Header & Title */
        .product-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .product-header h2 {
            font-weight: 800;
            font-size: 3rem;
            letter-spacing: 1px;
            color: #ffffff;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            word-wrap: break-word;
        }

        /* Glassmorphism Breadcrumb (Path Display) */
        .path-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 10px 25px;
            border-radius: 50px; /* Sleek pill shape */
            display: inline-block;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .path-container a {
            color: #ffeb3b; /* Corporate Gold */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .path-container a:hover {
            color: #ffffff;
        }

        .path-container .separator {
            color: #94a3b8;
            margin: 0 12px;
            font-size: 0.9rem;
        }

        /* Glassmorphism Part Cards */
        .part-card-glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 280px; /* Taller, elegant cards */
            display: block;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .part-card-glass:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .part-card-glass img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .part-card-glass:hover img {
            transform: scale(1.1);
        }

        /* Image Gradient Overlay & Text */
        .part-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, transparent 100%);
            padding: 50px 20px 20px;
            text-align: left;
        }

        .part-overlay p {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 600;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            transition: color 0.3s ease;
        }

        .part-card-glass:hover .part-overlay p {
            color: #ffeb3b; /* Title turns gold on hover */
        }

        /* Modern Hover Icon (+) */
        .hover-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            background: rgba(255, 235, 59, 0.95); /* Bright gold */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a237e; /* Corporate blue icon */
            font-size: 1.2rem;
            opacity: 0;
            transform: translateY(-20px) scale(0.8);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .part-card-glass:hover .hover-icon {
            opacity: 1;
            transform: translateY(0) scale(1);
            box-shadow: 0 5px 15px rgba(255, 235, 59, 0.4);
        }

        /* Responsive Fixes */
        @media (max-width: 768px) {
            .product-header h2 { font-size: 2.25rem; }
            .part-card-glass { height: 250px; }
            .path-container { font-size: 0.9rem; padding: 8px 20px; }
        }
    </style>
</head>
<body>

    <!-- The Dark Overlay for the background image -->
    <div class="body-overlay"></div>

    <!-- Navigation Bar -->
    <?php include('header.php'); ?>

    <!-- Main Content Wrapper -->
    <div class="page-wrapper container">
        
        <!-- Header & Breadcrumb -->
        <div class="product-header">
            <h2><?php echo htmlspecialchars($pro_part); ?></h2>
            
            <div class="path-container">
                <a href="https://msengg.in/"><i class="fas fa-home"></i> Home</a>
                
                <?php if (!empty($product_name)): ?>
                    <span class="separator"><i class="fas fa-chevron-right" style="font-size: 0.75rem;"></i></span>
                    <a href="https://msengg.in/product_click.php?product_name=<?php echo urlencode($product_name); ?>">
                        <?php echo htmlspecialchars($product_name); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($pro_part)): ?>
                    <span class="separator"><i class="fas fa-chevron-right" style="font-size: 0.75rem;"></i></span>
                    <a href="https://msengg.in/part_click.php?part=<?php echo urlencode($pro_part); ?>&name=<?php echo urlencode($product_name); ?>">
                        <?php echo htmlspecialchars($pro_part); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Parts Grid (Using modern Bootstrap wrapping) -->
        <div class="row">
            <?php foreach ($parts as $index => $part): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    
                    <!-- Dynamic Link Logic Preserved -->
                    <?php if($part['col_count'] == 0): ?>
                        <a href="<?php echo htmlspecialchars($part['pro_pdf_file']);?>" class="part-card-glass">
                    <?php else: ?>
                        <a href="part_click2.php?part2=<?php echo urlencode($part['pro_pdf_file']); ?>&part=<?php echo urlencode($pro_part); ?>&name=<?php echo urlencode($product_name); ?>" class="part-card-glass">
                    <?php endif; ?>
                    
                        <!-- Product Image -->
                        <img src="<?php echo htmlspecialchars($part['pro_pdf_img']); ?>" alt="<?php echo htmlspecialchars($part['pro_part']); ?>">
                        
                        <!-- Bottom Gradient Overlay -->
                        <div class="part-overlay">
                            <p><?php echo htmlspecialchars($part['pro_pdf_name']); ?></p>
                        </div>

                        <!-- Hover Icon -->
                        <div class="hover-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap -->

    <!-- Navbar Dropdown Hover JS -->
    <script>
        $(document).ready(function() {
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