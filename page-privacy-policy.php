<?php
/**
 * Template Name: Privacy Policy
 * 
 * This is a custom template for the Privacy Policy page
 * that users can access from the cookie consent banner.
 */

get_header(); ?>

<div class="privacy-policy-page">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle">Last updated: <?php echo date('F j, Y'); ?></p>
        </header>

        <div class="page-content">
            <section class="policy-section">
                <h2>Information We Collect</h2>
                <p>We collect information you provide directly to us, such as when you create an account, make a purchase, or contact us for support. This may include:</p>
                <ul>
                    <li>Name and contact information</li>
                    <li>Payment and billing information</li>
                    <li>Order history and preferences</li>
                    <li>Communications with us</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Process and fulfill your orders</li>
                    <li>Provide customer support</li>
                    <li>Send you updates and marketing communications (with your consent)</li>
                    <li>Improve our products and services</li>
                    <li>Comply with legal obligations</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>Cookies and Tracking Technologies</h2>
                <p>We use cookies and similar technologies to:</p>
                <ul>
                    <li>Remember your preferences and settings</li>
                    <li>Analyze how you use our website</li>
                    <li>Provide personalized content and advertisements</li>
                    <li>Improve our website performance</li>
                </ul>
                <p>You can control cookie settings through your browser preferences or our cookie consent banner.</p>
            </section>

            <section class="policy-section">
                <h2>Information Sharing</h2>
                <p>We do not sell, trade, or otherwise transfer your personal information to third parties, except:</p>
                <ul>
                    <li>With your explicit consent</li>
                    <li>To service providers who assist in our operations</li>
                    <li>To comply with legal requirements</li>
                    <li>To protect our rights and safety</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>Data Security</h2>
                <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            </section>

            <section class="policy-section">
                <h2>Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Correct inaccurate information</li>
                    <li>Request deletion of your information</li>
                    <li>Withdraw consent for marketing communications</li>
                    <li>Object to certain processing activities</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>Contact Us</h2>
                <p>If you have questions about this Privacy Policy or our data practices, please contact us:</p>
                <div class="contact-info">
                    <p><strong>Email:</strong> privacy@mellluxe.com</p>
                    <p><strong>Phone:</strong> +44 (0) 123 456 7890</p>
                    <p><strong>Address:</strong> [Your Business Address]</p>
                </div>
            </section>

            <section class="policy-section">
                <h2>Updates to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. We will notify you of any material changes by posting the new policy on this page and updating the "Last updated" date.</p>
            </section>
        </div>
    </div>
</div>

<style>
.privacy-policy-page {
    padding: 120px 0 80px;
    background: var(--primary-color);
    min-height: 100vh;
}

.container {
    max-width: var(--max-width);
    margin: 0 auto;
    padding: 0 2rem;
}

.page-header {
    text-align: center;
    margin-bottom: 4rem;
}

.page-title {
    color: var(--secondary-color);
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    font-family: var(--font-serif);
}

.page-subtitle {
    color: var(--text-muted);
    font-size: 1.1rem;
}

.policy-section {
    margin-bottom: 3rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-light);
}

.policy-section h2 {
    color: var(--secondary-color);
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    font-family: var(--font-serif);
}

.policy-section p {
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 1rem;
}

.policy-section ul {
    color: var(--text-light);
    margin-left: 2rem;
    margin-bottom: 1rem;
}

.policy-section li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.contact-info {
    background: rgba(253, 226, 141, 0.1);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border: 1px solid var(--secondary-color);
}

.contact-info p {
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .privacy-policy-page {
        padding: 100px 0 60px;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .policy-section {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .container {
        padding: 0 1rem;
    }
}
</style>

<?php get_footer(); ?>
