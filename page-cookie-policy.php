<?php
/**
 * Template Name: Cookie Policy
 * 
 * This is a custom template for the Cookie Policy page
 * that users can access from the cookie consent banner.
 */

get_header(); ?>

<div class="cookie-policy-page">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle">Last updated: <?php echo date('F j, Y'); ?></p>
        </header>

        <div class="page-content">
            <section class="policy-section">
                <h2>What Are Cookies?</h2>
                <p>Cookies are small text files that are stored on your device when you visit our website. They help us provide you with a better experience by remembering your preferences and analyzing how you use our site.</p>
            </section>

            <section class="policy-section">
                <h2>Types of Cookies We Use</h2>
                
                <div class="cookie-type">
                    <h3>Essential Cookies</h3>
                    <p>These cookies are necessary for the website to function properly. They enable basic functions like page navigation, access to secure areas, and shopping cart functionality. The website cannot function properly without these cookies.</p>
                    <ul>
                        <li>Session cookies for shopping cart</li>
                        <li>Authentication cookies for user accounts</li>
                        <li>Security cookies for form protection</li>
                    </ul>
                </div>

                <div class="cookie-type">
                    <h3>Analytics Cookies</h3>
                    <p>These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. They help us improve our website and user experience.</p>
                    <ul>
                        <li>Google Analytics cookies</li>
                        <li>Page view tracking</li>
                        <li>User behavior analysis</li>
                    </ul>
                </div>

                <div class="cookie-type">
                    <h3>Marketing Cookies</h3>
                    <p>These cookies are used to track visitors across websites to display relevant and engaging advertisements. They may also be used to limit the number of times you see an advertisement.</p>
                    <ul>
                        <li>Facebook Pixel cookies</li>
                        <li>Google Ads cookies</li>
                        <li>Retargeting cookies</li>
                    </ul>
                </div>

                <div class="cookie-type">
                    <h3>Preference Cookies</h3>
                    <p>These cookies allow the website to remember choices you make and provide enhanced, more personal features.</p>
                    <ul>
                        <li>Language preferences</li>
                        <li>Currency preferences</li>
                        <li>Theme preferences</li>
                    </ul>
                </div>
            </section>

            <section class="policy-section">
                <h2>Third-Party Cookies</h2>
                <p>Some cookies on our website are set by third-party services that we use to enhance your experience:</p>
                <ul>
                    <li><strong>Google Analytics:</strong> Helps us understand website traffic and user behavior</li>
                    <li><strong>Facebook Pixel:</strong> Enables social media advertising and retargeting</li>
                    <li><strong>Payment Processors:</strong> Secure payment processing and fraud prevention</li>
                    <li><strong>Social Media:</strong> Social sharing and integration features</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>How Long Do Cookies Last?</h2>
                <div class="cookie-duration">
                    <div class="duration-type">
                        <h3>Session Cookies</h3>
                        <p>These cookies are temporary and are deleted when you close your browser. They are used for essential website functionality.</p>
                    </div>
                    <div class="duration-type">
                        <h3>Persistent Cookies</h3>
                        <p>These cookies remain on your device for a set period (usually 1 year) or until you delete them manually. They remember your preferences and settings.</p>
                    </div>
                </div>
            </section>

            <section class="policy-section">
                <h2>Managing Your Cookie Preferences</h2>
                <p>You have several options for managing cookies on our website:</p>
                
                <div class="management-options">
                    <div class="option">
                        <h3>Cookie Consent Banner</h3>
                        <p>When you first visit our website, you'll see a cookie consent banner where you can choose to accept or reject non-essential cookies.</p>
                    </div>
                    
                    <div class="option">
                        <h3>Browser Settings</h3>
                        <p>You can control cookies through your browser settings. Most browsers allow you to block cookies, delete existing cookies, or be notified when cookies are set.</p>
                    </div>
                    
                    <div class="option">
                        <h3>Third-Party Opt-Outs</h3>
                        <p>You can opt out of specific third-party cookies through their respective opt-out mechanisms:</p>
                        <ul>
                            <li><a href="https://tools.google.com/dlpage/gaoptout" target="_blank">Google Analytics Opt-out</a></li>
                            <li><a href="https://www.facebook.com/settings?tab=ads" target="_blank">Facebook Ad Preferences</a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="policy-section">
                <h2>Impact of Disabling Cookies</h2>
                <p>Please note that disabling certain cookies may affect the functionality of our website:</p>
                <ul>
                    <li>Essential cookies cannot be disabled as they are necessary for basic website functionality</li>
                    <li>Disabling analytics cookies may limit our ability to improve the website</li>
                    <li>Disabling marketing cookies may affect the relevance of advertisements you see</li>
                    <li>Some features may not work as expected if cookies are disabled</li>
                </ul>
            </section>

            <section class="policy-section">
                <h2>Updates to This Policy</h2>
                <p>We may update this Cookie Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will notify you of any material changes by posting the updated policy on this page.</p>
            </section>

            <section class="policy-section">
                <h2>Contact Us</h2>
                <p>If you have any questions about our use of cookies or this Cookie Policy, please contact us:</p>
                <div class="contact-info">
                    <p><strong>Email:</strong> privacy@mellluxe.com</p>
                    <p><strong>Phone:</strong> +44 (0) 123 456 7890</p>
                    <p><strong>Address:</strong> [Your Business Address]</p>
                </div>
            </section>
        </div>
    </div>
</div>

<style>
.cookie-policy-page {
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
    margin-bottom: 1.5rem;
    font-family: var(--font-serif);
}

.policy-section h3 {
    color: var(--secondary-color);
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
    margin-top: 1.5rem;
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

.cookie-type, .duration-type, .option {
    background: rgba(253, 226, 141, 0.05);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border: 1px solid rgba(253, 226, 141, 0.2);
    margin-bottom: 1.5rem;
}

.cookie-type h3, .duration-type h3, .option h3 {
    margin-top: 0;
    color: var(--secondary-color);
}

.cookie-duration, .management-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    margin-top: 1.5rem;
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

.policy-section a {
    color: var(--secondary-color);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: var(--transition);
}

.policy-section a:hover {
    border-bottom-color: var(--secondary-color);
}

@media (max-width: 768px) {
    .cookie-policy-page {
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
    
    .cookie-duration, .management-options {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}
</style>

<?php get_footer(); ?>
