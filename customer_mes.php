<?php
include('connect.php');
include('product_name.php');

include('mark_as_read.php');
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}
$connectDB = new PDO($dns, $username, $password);
$connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$countQuery = "SELECT COUNT(*) AS unread_count FROM contact WHERE status = 'unread'";
$countStatement = $connectDB->query($countQuery);
$unreadCount = $countStatement->fetch(PDO::FETCH_ASSOC)['unread_count'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteQuery = "DELETE FROM contact WHERE `Sr.no` = :SrNo";
    $deleteStatement = $connectDB->prepare($deleteQuery);
    $deleteStatement->execute([':SrNo' => $deleteId]);
}

$query = "SELECT * FROM contact";
$statement = $connectDB->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Message</title>
    <link rel="icon" type="image/x-icon" href="title.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Navbar styles with card effect */
        .navbar {
            background: linear-gradient(45deg, #1a237e, #3f51b5);
            padding: 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .navbar:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .navbar .navbar-brand img {
            height: 48px;
            width: auto;
        }

        .navbar .navbar-nav {
            justify-content: center;
            width: 100%;
        }

        .navbar .nav-link {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #ffeb3b;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown .dropdown-menu {
            background: #3f51b5;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .navbar .dropdown-item {
            color: white;
            padding: 8px;
            font-size: 12px;
            text-align: left;
        }

        .navbar .dropdown-item:hover {
            background-color: #1a237e;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card a {
            text-decoration: none;
            color: black;
            transition: color 0.3s;
        }

        .card a:hover {
            color: #ffeb3b;
        }

        .footer {
            background: linear-gradient(45deg, #1a237e, #3f51b5);
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
            line-height: 1.5;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .footer h5 {
            color: #ffeb3b;
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            padding: 5px 0;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #ffeb3b;
        }

        .footer .social-icons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .footer .social-icons a {
            font-size: 20px;
        }

        .navbar .nav-link.btn-light {
            color: #1a237e;
            background-color: #ffffff;
        }

        /* Custom styles for mobile */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.php">
        <img src="logo.jpg" alt="Sica">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index_admin.php" class="nav-link">Home</a>
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
                <a href="customer_mes.php" class="nav-link">Customer Messages <span id="unreadCountBadge" class="badge badge-danger"><?php echo $unreadCount; ?></span></a>
            </li>
        </ul>
        <div class="navbar-nav ml-auto">
            <a href="logout.php" class="nav-link btn btn-light text-primary login-button">LOG-OUT</a>
        </div>
    </div>
</nav>

<br><br><br><br>

<?php
if ($statement->rowCount() > 0) {
    echo "<div class='container mt-5'>
            <h2>Customer Messages</h2>
            <br>
            <div class='table-responsive'>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $message = isset($row['Message']) ? $row['Message'] : '';
        $status = isset($row['status']) ? $row['status'] : '';
        $name = isset($row['Name']) ? $row['Name'] : '';
        $email = isset($row['Email']) ? $row['Email'] : '';
        $subject = isset($row['Subject']) ? $row['Subject'] : '';

        $truncated_message = strlen($message) > 50 ? substr($message, 0, 50) . '...' : $message;
        $statusClass = strtoupper($status) == 'UNREAD' ? 'font-weight-bold' : '';
        echo "<tr class='$statusClass' data-toggle='modal' data-target='#messageModal' data-id='{$row['Sr.no']}' data-name='{$name}' data-email='{$email}' data-subject='{$subject}' data-message='{$message}' data-status='{$status}'>
                <td>{$name}</td>
                <td>{$email}</td>
                <td>{$subject}</td>
                <td>{$truncated_message}</td>
                <td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='delete_id' value='{$row['Sr.no']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</tbody>
        </table>
    </div>
</div>";
}
else {
    echo "<div class='container mt-5'>
            <h2>Contact Messages</h2>
            <p>No data found.</p>
          </div>";
}
?>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalName"></span></p>
                <p><strong>Email:</strong> <a id="modalEmail" href=""></a></p>
                <p><strong>Subject:</strong> <span id="modalSubject"></span></p>
                <p><strong>Message:</strong> <span id="modalMessage"></span></p>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Products Section -->
            <div class="col-md-4 col-sm-6">
                <h5>Products</h5>
                <ul>
                <?php foreach ($products as $product): ?>
                        <li><a href="admin_product_click.php?product_name=<?= urlencode($product['product_name']) ?>"><?= htmlspecialchars($product['product_name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact Us Section -->
            <div class="col-md-4 col-sm-6">
                <h5>Contact Us</h5>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 47, Devashray Arcade & Industrial Estate, B/h Radhey Residency, Nr. Hathijan Circle S.P.Ring Road, Ramol, Ahmedabad, Gujarat.</li>
                    <li><i class="fas fa-phone"></i> +91 9978 144 272</li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:maulik@sica.in">maulik@sica.in </a> |  <a href="mailto:sales@msengg.in">Sales@msengg.in</a></li>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#messageModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var email = button.data('email');
    var subject = button.data('subject');
    var message = button.data('message');

    var modal = $(this);
    modal.find('#modalName').text(name);
    modal.find('#modalEmail').text(email).attr('href', 'mailto:' + email); // Added 'mailto:' prefix
    modal.find('#modalSubject').text(subject);
    modal.find('#modalMessage').text(message);

    if (button.data('status') === 'unread') {
        $.post('mark_as_read.php', { id: id }, function() {
            button.removeClass('font-weight-bold');
            // Update the badge count
            updateUnreadCount();
        });
    }
});

    $('.navbar .dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
            $(this).addClass('show');
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'true');
        },
        function() {
            $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
            $(this).removeClass('show');
            $(this).find('.dropdown-toggle').attr('aria-expanded', 'false');
        }
    );

    $('.navbar .dropdown-toggle').click(function() {
        if ($(window).width() < 992) {
            $('.navbar .dropdown-menu').slideToggle();
        }
    });

    // Update the badge count dynamically
    function updateUnreadCount() {
        // Fetch count of unread messages using AJAX
        $.ajax({
            url: 'get_unread_count.php',
            type: 'GET',
            success: function(response) {
                // Update the badge count
                $('#unreadCountBadge').text(response);
            }
        });
    }

    // Call the updateUnreadCount function when the page loads
    $(document).ready(function() {
        updateUnreadCount();
    });

    // Call the updateUnreadCount function at regular intervals (e.g., every 30 seconds)
    setInterval(updateUnreadCount, 30000); // Update every 30 seconds
    $('#messageModal').on('hidden.bs.modal', function () {
            location.reload();
        });
</script>
</body>
</html>
