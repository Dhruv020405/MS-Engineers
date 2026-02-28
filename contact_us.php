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
    <title>Contact Us | MS Engineers</title>
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
            padding-bottom: 80px;
        }

        /* Cinematic Hero Section */
        .cinematic-hero {
            padding: 140px 15px 40px;
            text-align: center;
        }

        .cinematic-hero h1 {
            font-weight: 800;
            font-size: 3.5rem;
            letter-spacing: 1.5px;
            color: #ffffff;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            word-wrap: break-word; 
        }

        .cinematic-hero p {
            font-size: 1.15rem;
            color: #ffeb3b; /* Corporate Gold */
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Glassmorphism Form Container */
        .glass-form-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            max-width: 650px;
            margin: 0 auto;
        }

        .contact-intro {
            text-align: center;
            font-size: 1.05rem;
            color: #cbd5e1;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        /* Form Elements Styling */
        .glass-form-container label {
            font-weight: 600;
            color: #ffffff;
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .glass-form-container input[type="text"],
        .glass-form-container input[type="email"],
        .glass-form-container textarea {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 24px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .glass-form-container input:focus,
        .glass-form-container textarea:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #ffeb3b;
            outline: none;
            box-shadow: 0 0 12px rgba(255, 235, 59, 0.2);
        }

        /* Placeholder text color */
        .glass-form-container input::placeholder,
        .glass-form-container textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Submit Button */
        .glass-form-container input[type="submit"] {
            background-color: #ffeb3b;
            color: #1a237e;
            padding: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 235, 59, 0.3);
        }

        .glass-form-container input[type="submit"]:hover {
            background-color: #fbc02d;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 235, 59, 0.5);
        }

        /* Responsive Fixes */
        @media (max-width: 768px) {
            .cinematic-hero {
                padding: 120px 15px 30px;
            }
            .cinematic-hero h1 {
                font-size: 2.5rem;
            }
            .glass-form-container {
                padding: 30px 20px;
                margin: 0 15px;
                border-radius: 16px;
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
            <h1>Contact Us</h1>
            <p>We're here to help you</p>
        </div>

        <div class="container">
            <!-- Glassmorphism Form Wrapper -->
            <div class="glass-form-container">
                <p class="contact-intro">
                    We'd love to hear from you! Whether you have a question about our products, pricing, or anything else, our team is ready to answer all your questions.<br> Feel free to reach out to us using the form below, and we'll get back to you as soon as possible.
                </p>

                <form method="POST">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>

                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="What is this regarding?" required>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>

                    <input type="submit" value="Send Message" name="submit">
                </form>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- JS Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <!-- PHP Backend Logic for Form Submission -->
    <?php
        // Note: DB Connection is already established at the top of the file via $connectDB.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data and sanitize it
            $fullname = htmlspecialchars($_POST['fullname']);
            $email = htmlspecialchars($_POST['email']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);
        
            // Prepare and execute the SQL statement to insert data into the contact table
            $stmt = $connectDB->prepare("INSERT INTO contact (Name, Email, Subject, Message) VALUES (:fullname, :email, :subject, :message)");
            $stmt->execute(['fullname' => $fullname, 'email' => $email, 'subject' => $subject, 'message' => $message]);
            
            // Success Alert
            echo "<script>alert('Your message was received successfully. We will reply to you soon.');</script>";
        }
    ?>
</body>
</html>