<?php
/**
 * Template Name: About Page
 * The template for displaying the About page
 */

get_header(); ?>

<div class="about-page-container">

    <?php
    $promo_title = function_exists('get_field') ? esc_html(get_field('promo_title')) : '';
    $promo_text = function_exists('get_field') ? esc_html(get_field('promo_text')) : '';
    

        if (!empty($promo_title)): ?>
            <!-- Special Offer Banner -->
            <div class="offer-banner" aria-label="Special offer">
                <div class="offer-marquee">
                    <div class="offer-track">
                        <div class="offer-group">
                            <?php for ($i = 0; $i < 6; $i++): ?>
                                <span class="offer-item"><?php echo $promo_title; ?> — <?php echo $promo_text; ?></span>
                            <?php endfor; ?>
                        </div>
                        <div class="offer-group" aria-hidden="true">
                            <?php for ($i = 0; $i < 6; $i++): ?>
                                <span class="offer-item"><?php echo $promo_title; ?> — <?php echo $promo_text; ?></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <!-- Get to Know Mell's Cause Section -->
    <section class="about-cause-section">
        <div class="container">
            <div class="cause-content">
                <div class="cause-images">
                    <div class="cause-image-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_2826.jpeg"
                            alt="Mell with nature" class="cause-img">
                    </div>
                    <div class="cause-image-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_5103.jpeg"
                            alt="Mell by the water" class="cause-img">
                    </div>
                </div>
                <div class="cause-text-content">
                    <div class="cause-text-box">
                        <h2>Get to Know Mell's Cause</h2>
                        <p>Get ready to indulge in a luxurious lifestyle while making a difference! We are thrilled to
                            show you that achieving 100% natural products with a 0% environmental footprint is POSSIBLE.
                            Pamper yourself and your loved ones with our high-quality products, all while protecting our
                            extraordinary Mother Nature. Our meticulously handcrafted products are 100% vegan, organic,
                            natural, cruelty-free, palm oil-free, and filled with love and dedication. Join us in making
                            a positive impact today!</p>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/new-logo.png"
                            alt="Mell Luxe Logo" class="about-brand-logo">
                        <h2>Mell Luxe</h2>
                    </div>
                </div>
                <div class="brand-values-text">
                    <p>Have you ever wondered what all those promises really mean? We are surrounded by brands claiming
                        to be eco-friendly, yet many still exploit their staff, sneak in chemicals to extend shelf life,
                        and add artificial scents to boost recognition. They use manipulative marketing to blur the
                        lines, making it hard to see how harmful the beauty industry has become. Discover the truth
                        about our values below...</p>
                </div>
                <div class="brand-values-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/IMG_5105.jpeg" alt="Mell in nature"
                        class="values-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Slider Section -->
    <section class="values-slider-section">
        <div class="slider-container">
            <div class="slider-wrapper">
                <button class="slider-nav slider-nav-prev" aria-label="Previous slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                
                <div class="slider-track">
                    <!-- Slide 1: Environmental Impact -->
                    <div class="slide slide-environment">
                        <div class="slide-overlay">
                            <div class="container">
                                <div class="slide-content">
                                    <h2>We Can Make a Difference</h2>
                                    <div class="slide-text">
                                        <p>The beauty industry has a significant negative impact on nature, with millions of tons
                                            of plastic waste and harmful chemicals polluting our environment every year.
                                            Achieving fully plastic-free products is challenging due to higher production costs and
                                            complex manufacturing processes. Despite these challenges, our brand is dedicated to
                                            sustainability, offering recyclable, plastic-free products that leave no harmful footprint.
                                            By choosing us, you support eco-friendly practices that reduce pollution and protect
                                            the planet. Join us in making a positive impact and preserving our extraordinary
                                            Mother Nature.</p>
                                    </div>
                                    <div class="contact-us-btn">
                                        <span>Contact Us</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Vegan Products -->
                    <div class="slide slide-vegan">
                        <div class="slide-overlay">
                            <div class="container">
                                <div class="slide-content">
                                    <h2>We Only Have One Home</h2>
                                    <div class="slide-text">
                                        <p>In the beauty industry, 'vegan' signifies products free from animal-derived ingredients and
                                            not tested on animals. Achieving high-quality vegan products is challenging due to limited
                                            ingredient options, formulation difficulties, and strict certification standards. Brands
                                            must invest in research and development to find effective plant-based alternatives and
                                            ensure sustainable, ethical sourcing. Transparent practices and rigorous testing are crucial
                                            to maintaining quality and consumer trust. Despite these challenges, creating luxurious and
                                            effective vegan skincare products is achievable with dedication to innovation and ethical
                                            standards.</p>
                                    </div>
                                    <div class="contact-us-btn">
                                        <span>Contact Us</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Ethical Practices -->
                    <div class="slide slide-ethical">
                        <div class="slide-overlay">
                            <div class="container">
                                <div class="slide-content">
                                    <h2>By Finding Ways to Work Together</h2>
                                    <div class="slide-text">
                                        <p>In the beauty industry, ensuring products are free from modern slavery and child labor
                                            involves strict ethical sourcing and transparent supply chains. This commitment requires
                                            rigorous vetting of suppliers, frequent audits, and adherence to fair trade practices. By
                                            prioritizing human rights and ethical labor standards, Mell Luxe's brand differentiates,
                                            ensuring that every product is made in the UK with integrity and respect for workers'
                                            dignity. Choose our products to support a beauty industry that champions ethical practices
                                            and stands firmly against exploitation and abuse.</p>
                                    </div>
                                    <div class="contact-us-btn">
                                        <span>Contact Us</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="slider-nav slider-nav-next" aria-label="Next slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            
            <!-- Slider Indicators -->
            <div class="slider-indicators">
                <button class="indicator active" data-slide="0" aria-label="Go to slide 1"></button>
                <button class="indicator" data-slide="1" aria-label="Go to slide 2"></button>
                <button class="indicator" data-slide="2" aria-label="Go to slide 3"></button>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="about-cta-section">
        <div class="container">
            <div class="about-cta-content">
                <h2>Ready to Make a Difference?</h2>
                <p>Join thousands of customers who have chosen luxury with a conscience. Discover our range of 100%
                    natural, vegan, and ethically-made beauty products.</p>
                <div class="about-cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                        class="btn-primary-about">Shop Now</a>
                    <a href="#contact" class="btn-secondary-about">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

</div>

<style>

    .about-page-container {
        margin-top: 100px;
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
        color: #333333;
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
        color: #333333;
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

    /* Values Slider Section */
    .values-slider-section {
        position: relative;
        min-height: 70vh;
        overflow: hidden;
    }

    .slider-container {
        position: relative;
        width: 100%;
        height: 70vh;
        min-height: 500px;
    }

    .slider-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .slider-track {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
    }


    .slide-overlay {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        padding: 80px 0;
    }

    .slide-content {
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .slide-content h2 {
        font-size: 4rem;
        color: white;
        margin-bottom: 40px;
        font-weight: 300;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .slide-text {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        margin-bottom: 30px;
    }

    .slide-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: white;
        text-align: justify;
        margin: 0;
    }

    .contact-us-btn {
        background: rgba(253, 226, 141, 0.2);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(253, 226, 141, 0.5);
        border-radius: 50px;
        padding: 15px 40px;
        color: #FDE28D;
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-block;
    }

    .contact-us-btn:hover {
        background: rgba(253, 226, 141, 0.3);
        border-color: #FDE28D;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(253, 226, 141, 0.3);
    }

    /* Navigation Arrows */
    .slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .slider-nav:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
    }

    .slider-nav-prev {
        left: 20px;
    }

    .slider-nav-next {
        right: 20px;
    }

    .slider-nav svg {
        width: 20px;
        height: 20px;
    }

    /* Indicators */
    .slider-indicators {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 10;
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .indicator.active {
        background: #FDE28D;
        border-color: #FDE28D;
        box-shadow: 0 0 10px rgba(253, 226, 141, 0.5);
    }

    .indicator:hover {
        border-color: rgba(255, 255, 255, 0.8);
        transform: scale(1.2);
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
        .brand-values-content {
            gap: 40px;
        }

        .slide-content h2 {
            font-size: 3rem;
        }
    }

    @media (max-width: 992px) {

        .cause-content,
        .brand-values-content {
            grid-template-columns: 1fr;
            gap: 40px;
            text-align: center;
        }

        .cause-text-box h2 {
            font-size: 2rem;
        }

        .slide-content h2 {
            font-size: 2.5rem;
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
        .about-cta-section {
            padding: 50px 0;
        }

        .slider-container {
            height: 50vh;
            min-height: 400px;
        }

        .slide-overlay {
            padding: 50px 0;
        }

        .slide-content h2 {
            font-size: 2rem;
        }

        .slide-text {
            padding: 30px 20px;
        }

        .cause-text-box {
            padding: 30px 20px;
        }

        .values-items {
            gap: 15px;
        }

        .value-item {
            font-size: 1rem;
        }

        .slider-nav {
            width: 40px;
            height: 40px;
        }

        .slider-nav-prev {
            left: 10px;
        }

        .slider-nav-next {
            right: 10px;
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

        .slide {
            background-attachment: scroll;
        }

        .slide-content h2 {
            font-size: 1.8rem;
        }

        .slide-text {
            padding: 20px 15px;
        }

        .slide-text p {
            font-size: 1rem;
        }

        .contact-us-btn {
            padding: 12px 30px;
            font-size: 1rem;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.querySelector('.slider-nav-prev');
    const nextBtn = document.querySelector('.slider-nav-next');
    
    let currentSlide = 0;
    const totalSlides = slides.length;
    
    // Initialize slider
    function initSlider() {
        slides[currentSlide].classList.add('active');
        updateIndicators();
    }
    
    // Update indicators
    function updateIndicators() {
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentSlide);
        });
    }
    
    // Go to specific slide
    function goToSlide(slideIndex) {
        slides[currentSlide].classList.remove('active');
        currentSlide = slideIndex;
        slides[currentSlide].classList.add('active');
        updateIndicators();
    }
    
    // Next slide
    function nextSlide() {
        const next = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
        goToSlide(next);
    }
    
    // Previous slide
    function prevSlide() {
        const prev = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
        goToSlide(prev);
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Indicator click events
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });
    
    // Auto-slide functionality (optional)
    let autoSlideInterval;
    
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }
    
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }
    
    // Start auto-slide
    startAutoSlide();
    
    // Pause auto-slide on hover
    sliderTrack.addEventListener('mouseenter', stopAutoSlide);
    sliderTrack.addEventListener('mouseleave', startAutoSlide);
    
    // Pause auto-slide when buttons are hovered
    prevBtn.addEventListener('mouseenter', stopAutoSlide);
    nextBtn.addEventListener('mouseenter', stopAutoSlide);
    prevBtn.addEventListener('mouseleave', startAutoSlide);
    nextBtn.addEventListener('mouseleave', startAutoSlide);
    
    // Set background images dynamically
    function setBackgroundImages() {
        const environmentSlide = document.querySelector('.slide-environment');
        const veganSlide = document.querySelector('.slide-vegan');
        const ethicalSlide = document.querySelector('.slide-ethical');
        
        if (environmentSlide) {
            environmentSlide.style.background = `linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(37, 23, 70, 0.8) 100%), url('${window.location.origin}/wp-content/themes/mellluxeV2/images/System Images/IMG_0972_edited_edited.jpg') center/cover no-repeat fixed`;
        }
        
        if (veganSlide) {
            veganSlide.style.background = `linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(37, 23, 70, 0.8) 100%), url('${window.location.origin}/wp-content/themes/mellluxeV2/images/assets/pattern.png') center/cover no-repeat fixed`;
        }
        
        if (ethicalSlide) {
            ethicalSlide.style.background = `linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(37, 23, 70, 0.8) 100%), url('${window.location.origin}/wp-content/themes/mellluxeV2/images/System Images/PXL_20240329_121220294.MP.jpg') center/cover no-repeat fixed`;
        }
    }
    
    // Set background images on page load
    setBackgroundImages();

    // Initialize the slider
    initSlider();
});
</script>

<?php get_footer(); ?>