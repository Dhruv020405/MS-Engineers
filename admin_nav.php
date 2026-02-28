<?php
include('message_counter.php');
?>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index_admin.php">
        <img src="logo.jpg" alt="Sica">
    </a>
    
    <!-- Hamburger menu for smaller screens -->
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
                <a href="admin_about_us.php" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
                <a href="customer_mes.php" class="nav-link">Customer Messages <span id="unreadCountBadge" class="badge badge-danger"><?php echo $unreadCount; ?></span></a>
            </li>
        </ul>
        <!-- Login Button -->
        <div class="navbar-nav ml-auto">
            <a href="logout.php" class="nav-link btn btn-light text-primary login-button">LOG-OUT</a>
        </div>
    </div>
</nav>