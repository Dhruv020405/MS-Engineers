<style>
    /* Corporate Modern Footer Styles - Dark Blue Edition */
    .modern-footer {
        background: linear-gradient(45deg, #1a237e, #3f51b5);
        color: #ffffff;
        padding: 60px 0 30px;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
        font-family: 'Inter', sans-serif; /* Fallback to standard font */
    }

    .modern-footer h5 {
        color: #ffeb3b; /* Gold accent for headings */
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 10px;
    }

    /* Small decorative underline for headings */
    .modern-footer h5::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 2px;
        background: #ffeb3b;
        border-radius: 2px;
    }

    .modern-footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .modern-footer ul li {
        margin-bottom: 15px;
        color: #e2e8f0; /* Off-white for better reading */
        font-size: 0.95rem;
        line-height: 1.6;
        display: flex;
        align-items: flex-start;
    }

    .modern-footer a {
        color: #e2e8f0;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    /* Link hover animation */
    .modern-footer ul li a:hover {
        color: #ffeb3b;
        transform: translateX(6px); /* Smooth slide right */
    }

    /* Contact icons alignment */
    .modern-footer .contact-icon {
        color: #ffeb3b;
        font-size: 1rem;
        margin-right: 12px;
        margin-top: 4px; /* Align with multi-line text */
        min-width: 16px;
        text-align: center;
    }

    /* Styled Download Button */
    .modern-footer .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        padding: 8px 20px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 4px;
        color: #ffeb3b;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .modern-footer .download-btn:hover {
        background: #ffeb3b;
        color: #1a237e;
        border-color: #ffeb3b;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 235, 59, 0.2);
    }

    /* Social Icons Styling */
    .modern-footer .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .modern-footer .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%; /* Circle shape */
        color: #ffffff;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .modern-footer .social-icons a:hover {
        background: #ffeb3b;
        color: #1a237e;
        transform: translateY(-5px); /* Lift effect */
        box-shadow: 0 6px 15px rgba(255, 235, 59, 0.3);
    }

    /* Bottom Copyright/Divider */
    .modern-footer .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 20px;
        margin-top: 40px;
        text-align: center;
        font-size: 0.85rem;
        color: #94a3b8;
    }
</style>

<footer class="modern-footer">
    <div class="container">
        <div class="row">
            <!-- Products Section -->
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                <h5>Products</h5>
                <ul>
                    <?php foreach ($products as $product): ?>
                        <li>
                            <a href="product_click.php?product_name=<?= urlencode($product['product_name']) ?>">
                                <?= htmlspecialchars($product['product_name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Contact Us Section -->
            <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
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
                            <a href="mailto:maulik@sica.in">maulik@msengg.in</a> | 
                            <a href="mailto:sales@msengg.in">Sales@msengg.in</a>
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Follow Us Section -->
            <div class="col-md-4 col-sm-6">
                <h5>Follow Us</h5>
                <p class="text-light mb-3" style="opacity: 0.8; font-size: 0.95rem;">Stay connected with us on social media.</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/profile.php?id=100064131395346&mibextid=ZbWKwL" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/msen.gg?utm_source=qr&igsh=M2xybTZiazkzNG1q" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/maulik-shastri-503b431a5?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <!-- Optional Copyright Row -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="footer-bottom">
                    &copy; <?= date("Y"); ?> Sica. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>