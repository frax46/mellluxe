<?php
/**
 * Template Name: About Page
 * The template for displaying the About page
 */

get_header(); ?>

<div class="about-page-container">
    
    <!-- Special Offer Banner -->
    <div class="offer-banner-about">
        <div class="offer-content-about">
            <div class="offer-icon-about">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 7L12 3L4 7M20 7L12 11M20 7V17L12 21M12 11L4 7M12 11V21M4 7V17L12 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="offer-text-about">
                <h3>Special Spring Offer - Buy 4 Get 15% OFF</h3>
                <p>Free Delivery for Standard UK Orders</p>
            </div>
        </div>
    </div>

    <!-- Get to Know Mell's Cause Section -->
    <section class="about-cause-section">
        <div class="container">
            <div class="cause-content">
                <div class="cause-images">
                    <div class="cause-image-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_2826.jpeg" alt="Mell with nature" class="cause-img">
                    </div>
                    <div class="cause-image-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_5103.jpeg" alt="Mell by the water" class="cause-img">
                    </div>
                </div>
                <div class="cause-text-content">
                    <div class="cause-text-box">
                        <h2>Get to Know Mell's Cause</h2>
                        <p>Get ready to indulge in a luxurious lifestyle while making a difference! We are thrilled to show you that achieving 100% natural products with a 0% environmental footprint is POSSIBLE. Pamper yourself and your loved ones with our high-quality products, all while protecting our extraordinary Mother Nature. Our meticulously handcrafted products are 100% vegan, organic, natural, cruelty-free, palm oil-free, and filled with love and dedication. Join us in making a positive impact today!</p>
                        <p><strong>Need more reasons why to choose us? Check below...</strong></p>
                    </div>
                </div>
            </div>
            
            <!-- Values Banner -->
            <div class="values-banner">
                <div class="values-items">
                    <span class="value-item">HANDMADE</span>
                    <span class="value-separator">•</span>
                    <span class="value-item">VEGAN</span>
                    <span class="value-separator">•</span>
                    <span class="value-item">PALM FREE</span>
                    <span class="value-separator">•</span>
                    <span class="value-item">NATURAL</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Values Section -->
    <section class="brand-values-section">
        <div class="container">
            <div class="brand-values-content">
                <div class="brand-logo-section">
                    <div class="brand-logo-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/new-logo.png" alt="Mell Luxe Logo" class="about-brand-logo">
                        <h2>Mell Luxe</h2>
                    </div>
                </div>
                <div class="brand-values-text">
                    <p>Have you ever wondered what all those promises really mean? We are surrounded by brands claiming to be eco-friendly, yet many still exploit their staff, sneak in chemicals to extend shelf life, and add artificial scents to boost recognition. They use manipulative marketing to blur the lines, making it hard to see how harmful the beauty industry has become. Discover the truth about our values below...</p>
                </div>
                <div class="brand-values-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_5105.jpeg" alt="Mell in nature" class="values-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Environmental Section -->
    <section class="environmental-section">
        <div class="environmental-overlay">
            <div class="container">
                <div class="environmental-content">
                    <h2>We Only Have One Home</h2>
                    <div class="environmental-text">
                        <p>In the beauty industry, 'vegan' signifies products free from animal-derived ingredients and not tested on animals. Achieving high-quality vegan products is challenging due to limited ingredient options, formulation difficulties, and strict certification standards. Brands must invest in research and development to find effective plant-based alternatives and ensure sustainable, ethical sourcing. Transparent practices and rigorous testing are crucial to maintaining quality and consumer trust. Despite these challenges, creating luxurious and effective vegan skincare products is achievable with dedication to innovation and ethical standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section class="community-section">
        <div class="container">
            <div class="community-content">
                <div class="community-text-section">
                    <h2>By Finding Ways to Work Together</h2>
                    <div class="community-text">
                        <p>In the beauty industry, ensuring products are free from modern slavery and child labor involves strict ethical sourcing and transparent supply chains. This commitment requires rigorous vetting of suppliers, frequent audits, and adherence to fair trade practices. By prioritizing human rights and ethical labor standards, Mell Luxe's brand differentiates, ensuring that every product is made in the UK with integrity and respect for workers' dignity. Choose our products to support a beauty industry that champions ethical practices and stands firmly against exploitation and abuse.</p>
                    </div>
                </div>
                <div class="community-image-section">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/IMG_7926.jpeg" alt="Community working together" class="community-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="about-cta-section">
        <div class="container">
            <div class="about-cta-content">
                <h2>Ready to Make a Difference?</h2>
                <p>Join thousands of customers who have chosen luxury with a conscience. Discover our range of 100% natural, vegan, and ethically-made beauty products.</p>
                <div class="about-cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-primary-about">Shop Now</a>
                    <a href="#contact" class="btn-secondary-about">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
.about-page-container {
    margin-top: 80px;
}

/* Offer Banner */
.offer-banner-about {
    background: linear-gradient(135deg, #FDE28D 0%, #f5d86b 100%);
    color: var(--primary-color);
    padding: 15px 0;
    text-align: center;
    position: relative;
}

.offer-content-about {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.offer-icon-about svg {
    width: 30px;
    height: 30px;
    color: var(--primary-color);
}

.offer-text-about h3 {
    font-size: 1.1rem;
    margin: 0;
    color: var(--primary-color);
    font-weight: 600;
}

.offer-text-about p {
    font-size: 0.9rem;
    margin: 5px 0 0 0;
    color: var(--primary-color);
    opacity: 0.9;
}

/* Get to Know Mell's Cause Section */
.about-cause-section {
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.1) 0%, rgba(253, 226, 141, 0.05) 100%);
}

.cause-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 60px;
}

.cause-images {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.cause-image-left,
.cause-image-right {
    position: relative;
}

.cause-img {
    width: 100%;
    max-width: 400px;
    height: 300px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.cause-image-left .cause-img {
    transform: rotate(-3deg);
}

.cause-image-right .cause-img {
    transform: rotate(3deg);
    margin-left: auto;
    display: block;
}

.cause-img:hover {
    transform: rotate(0deg) scale(1.05);
}

.cause-text-content {
    display: flex;
    align-items: center;
    justify-content: center;
}

.cause-text-box {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(253, 226, 141, 0.3);
}

.cause-text-box h2 {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 20px;
    font-weight: 300;
    text-align: center;
}

.cause-text-box p {
    font-size: 1rem;
    line-height: 1.7;
    color: var(--text-dark);
    margin-bottom: 15px;
    text-align: justify;
}

.cause-text-box p:last-child {
    margin-bottom: 0;
    text-align: center;
    color: var(--primary-color);
}

/* Values Banner */
.values-banner {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    padding: 25px 0;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(37, 23, 70, 0.3);
}

.values-items {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
    flex-wrap: wrap;
}

.value-item {
    color: var(--secondary-color);
    font-weight: 700;
    font-size: 1.2rem;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.value-separator {
    color: var(--secondary-color);
    font-size: 1.5rem;
    opacity: 0.7;
}

/* Brand Values Section */
.brand-values-section {
    padding: 80px 0;
    background: white;
}

.brand-values-content {
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 50px;
    align-items: center;
}

.brand-logo-container {
    background: var(--primary-color);
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 20px 50px rgba(37, 23, 70, 0.2);
}

.about-brand-logo {
    width: 80px;
    height: 80px;
    object-fit: contain;
    margin-bottom: 15px;
}

.brand-logo-container h2 {
    color: var(--secondary-color);
    font-size: 1.5rem;
    margin: 0;
    font-weight: 300;
    letter-spacing: 2px;
}

.brand-values-text {
    padding: 30px;
}

.brand-values-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-dark);
    text-align: justify;
}

.values-img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    transform: rotate(-2deg);
    transition: transform 0.3s ease;
}

.values-img:hover {
    transform: rotate(0deg) scale(1.02);
}

/* Environmental Section */
.environmental-section {
    min-height: 60vh;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(37, 23, 70, 0.8) 100%),
                url('images/System Images/strips.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    display: flex;
    align-items: center;
}

.environmental-overlay {
    width: 100%;
    padding: 80px 0;
}

.environmental-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.environmental-content h2 {
    font-size: 4rem;
    color: white;
    margin-bottom: 40px;
    font-weight: 300;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.environmental-text {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
}

.environmental-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: white;
    text-align: justify;
    margin: 0;
}

/* Community Section */
.community-section {
    padding: 80px 0;
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.05) 0%, white 100%);
}

.community-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    align-items: center;
}

.community-text-section h2 {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 30px;
    font-weight: 300;
    line-height: 1.2;
}

.community-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-dark);
    text-align: justify;
}

.community-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    transform: rotate(2deg);
    transition: transform 0.3s ease;
}

.community-img:hover {
    transform: rotate(0deg) scale(1.02);
}

/* Call to Action Section */
.about-cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    text-align: center;
}

.about-cta-content h2 {
    font-size: 3rem;
    color: var(--secondary-color);
    margin-bottom: 20px;
    font-weight: 300;
}

.about-cta-content p {
    font-size: 1.2rem;
    color: var(--text-light);
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0.9;
}

.about-cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.btn-primary-about,
.btn-secondary-about {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 15px 40px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    text-transform: uppercase;
}

.btn-primary-about {
    background: var(--secondary-color);
    color: var(--primary-color);
    border: 2px solid var(--secondary-color);
}

.btn-primary-about:hover {
    background: transparent;
    color: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(253, 226, 141, 0.3);
}

.btn-secondary-about {
    background: transparent;
    color: var(--secondary-color);
    border: 2px solid var(--secondary-color);
}

.btn-secondary-about:hover {
    background: var(--secondary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(253, 226, 141, 0.3);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .cause-content,
    .brand-values-content,
    .community-content {
        gap: 40px;
    }
    
    .environmental-content h2 {
        font-size: 3rem;
    }
    
    .community-text-section h2 {
        font-size: 2.5rem;
    }
}

@media (max-width: 992px) {
    .cause-content,
    .brand-values-content,
    .community-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .cause-text-box h2 {
        font-size: 2rem;
    }
    
    .environmental-content h2 {
        font-size: 2.5rem;
    }
    
    .community-text-section h2 {
        font-size: 2rem;
    }
    
    .about-cta-content h2 {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .about-page-container {
        margin-top: 65px;
    }
    
    .about-cause-section,
    .brand-values-section,
    .community-section,
    .about-cta-section {
        padding: 50px 0;
    }
    
    .cause-text-box,
    .environmental-text {
        padding: 30px 20px;
    }
    
    .values-items {
        gap: 15px;
    }
    
    .value-item {
        font-size: 1rem;
    }
    
    .about-cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-primary-about,
    .btn-secondary-about {
        width: 100%;
        max-width: 300px;
    }
}

@media (max-width: 576px) {
    .offer-content-about {
        flex-direction: column;
        gap: 10px;
    }
    
    .cause-images {
        gap: 20px;
    }
    
    .cause-img {
        height: 250px;
    }
    
    .community-img {
        height: 300px;
    }
    
    .environmental-section {
        background-attachment: scroll;
    }
    
    .environmental-content h2 {
        font-size: 2rem;
    }
    
    .values-items {
        flex-direction: column;
        gap: 10px;
    }
    
    .value-separator {
        display: none;
    }
}
</style>

<?php get_footer(); ?> 