<style>
    /* Corporate Modern Footer Styles - Deep Dark Premium Edition */
    .modern-footer {
        background: rgba(10, 15, 25, 0.95); /* Deep dark slate */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        color: #f8fafc;
        padding: 70px 0 30px;
        font-family: 'Inter', sans-serif;
        position: relative;
        z-index: 10;
    }

    .modern-footer h5 {
        color: #ffffff;
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 12px;
    }

    /* Decorative Amber underline for headings */
    .modern-footer h5::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: #f59e0b; /* Amber Accent */
        border-radius: 2px;
        box-shadow: 0 0 10px rgba(245, 158, 11, 0.4);
    }

    .modern-footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .modern-footer ul li {
        margin-bottom: 15px;
        color: #94a3b8; /* Muted slate for reading */
        font-size: 0.95rem;
        line-height: 1.6;
        display: flex;
        align-items: flex-start;
    }

    .modern-footer a {
        color: #cbd5e1;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    /* Link hover animation */
    .modern-footer ul li a:hover {
        color: #f59e0b; /* Amber hover */
        transform: translateX(6px); /* Smooth slide right */
    }

    /* Contact icons alignment */
    .modern-footer .contact-icon {
        color: #f59e0b;
        font-size: 1.1rem;
        margin-right: 12px;
        margin-top: 4px;
        min-width: 18px;
        text-align: center;
    }

    /* Hover effect for contact text links */
    .modern-footer ul li span a:hover {
        color: #f59e0b;
        transform: none; /* Prevent text shifting on pure contact links */
        text-decoration: underline;
    }

    /* Social Icons Styling */
    .modern-footer .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 15px;
    }

    .modern-footer .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 50%; /* Circle shape */
        color: #cbd5e1;
        font-size: 1.2rem;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .modern-footer .social-icons a:hover {
        background: #f59e0b;
        color: #000000;
        border-color: #f59e0b;
        transform: translateY(-5px); /* Lift effect */
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.4);
    }

    /* Bottom Copyright/Divider */
    .modern-footer .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding-top: 25px;
        margin-top: 50px;
        text-align: center;
        font-size: 0.85rem;
        color: #64748b;
        letter-spacing: 0.5px;
    }

    .modern-footer .footer-bottom strong {
        color: #94a3b8;
    }
</style>

<footer class="modern-footer">
    <div class="container">
        <div class="row">
            <!-- Products Section -->
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <h5>Products</h5>
                <ul>
                    <?php 
                    // Safely check for variables to prevent undefined warnings
                    $footer_items = isset($all_products) ? $all_products : (isset($products) ? $products : []);
                    foreach ($footer_items as $product): 
                    ?>
                        <li>
                            <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>">
                                <?= htmlspecialchars($product['product_name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Contact Us Section -->
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <h5>Contact Us</h5>
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt contact-icon"></i> 
                        <span>
                            11-C, Ramdev Estate, Nr. Siddhapura Estate, Phase-IV, GIDC, Vatva,<br>
                            Ramol Vinzol Road, Ahmedabad-382445
                        </span>
                    </li>
                    <li>
                        <i class="fas fa-phone contact-icon"></i> 
                        <span>+91 9978 144 272</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope contact-icon"></i> 
                        <span>
                            <a href="mailto:maulik@sica.in">maulik@msengg.in</a><br>
                            <a href="mailto:sales@msengg.in">Sales@msengg.in</a>
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Follow Us Section -->
            <div class="col-lg-4 col-md-12">
                <h5>Follow Us</h5>
                <p class="mb-4" style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6;">
                    Stay connected with us on social media for the latest engineering updates, product launches, and industry news.
                </p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/profile.php?id=100064131395346&mibextid=ZbWKwL" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/msen.gg?utm_source=qr&igsh=M2xybTZiazkzNG1q" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/maulik-shastri-503b431a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright Row -->
        <div class="row">
            <div class="col-12">
                <div class="footer-bottom">
                    &copy; <?= date("Y"); ?> <strong>MS Engineers</strong>. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>