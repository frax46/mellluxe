<?php
/**
 * Template Name: Home Page
 * The template for displaying the Home page
 */

get_header();


$promo_title = function_exists('get_field') ? esc_html(get_field('promo_title')) : '';
$promo_text = function_exists('get_field') ? esc_html(get_field('promo_text')) : '';
$hero_text = function_exists('get_field') ? esc_html(get_field('hero_text')) : '';
$home_text_1 = function_exists('get_field') ? esc_html(get_field('home_text_1')) : '';
$home_text_2 = function_exists('get_field') ? esc_html(get_field('home_text_2')) : '';
$home_image_1_left = function_exists('get_field') ? esc_html(get_field('home_image_1_left')) : '';
$home_image_1_right = function_exists('get_field') ? esc_html(get_field('home_image_1_right')) : '';
$home_image_2 = function_exists('get_field') ? esc_html(get_field('home_image_2')) : '';
$home_image_21 = function_exists('get_field') ? esc_html(get_field('home_image_21')) : '';
$home_image_22 = function_exists('get_field') ? esc_html(get_field('home_image_22')) : '';
$home_image_23 = function_exists('get_field') ? esc_html(get_field('home_image_23')) : '';
$home_image_24 = function_exists('get_field') ? esc_html(get_field('home_image_24')) : '';
$our_best_text = function_exists('get_field') ? esc_html(get_field('our_best_text')) : '';
$our_best_image_1 = function_exists('get_field') ? esc_html(get_field('our_best_image_1')) : '';
$our_best_image_2 = function_exists('get_field') ? esc_html(get_field('our_best_image_2')) : '';
$our_best_image_3 = function_exists('get_field') ? esc_html(get_field('our_best_image_3')) : '';
$our_best_image_4 = function_exists('get_field') ? esc_html(get_field('our_best_image_4')) : '';
$our_best_image_5 = function_exists('get_field') ? esc_html(get_field('our_best_image_5')) : '';
$our_best_image_1_link = function_exists('get_field') ? esc_html(get_field('our_best_image_1_link')) : '';
$our_best_image_2_link = function_exists('get_field') ? esc_html(get_field('our_best_image_2_link')) : '';
$our_best_image_3_link = function_exists('get_field') ? esc_html(get_field('our_best_image_3_link')) : '';
$our_best_image_4_link = function_exists('get_field') ? esc_html(get_field('our_best_image_4_link')) : '';
$our_best_image_5_link = function_exists('get_field') ? esc_html(get_field('our_best_image_5_link')) : '';





?>

<div class="snap-container">
    <!-- Hero Section -->
    <section class="snap-section hero-section" id="hero">
        <?php

        if (!empty($promo_title)): ?>
            <!-- Special Offer Banner -->
            <div class="offer-banner">
                <div class="offer-content">
                    <div class="offer-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 7L12 3L4 7M20 7L12 11M20 7V17L12 21M12 11L4 7M12 11V21M4 7V17L12 21"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="offer-text">
                        <h3><?php echo $promo_title; ?></h3>
                        <p><?php echo $promo_text; ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Main Hero Content -->

        <div class="hero-container">
            <div class="hero">

                <div class="hero-text-container">
                    <h1>At Mell Luxe...</h1>
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="hero-cta-button">
                        SHOP <span>→</span>
                    </a>
                </div>


            </div>
            <div class="hero-next-section">
                <div class="text">
                    <h1>... nature meets luxury in every handcrafted product.</h1>

                </div>
                <div class="text2">
                    <p><?php echo $hero_text; ?></p>
                </div>

                <div class="img">
                    <img src="<?php echo get_template_directory_uri(); ?>\images\Whole Sale\png\hair.png"
                        alt="Bath Products">
                </div>
            </div>
            <!-- First Product Showcase -->
            <div class="hero-showcase-section">
                <div class="showcase-content">
                    <div class="showcase-images">
                        <div class="product-display">
                            <img src="<?php $hero_image = function_exists('get_field') ? esc_html(get_field('hero_image2')) : '';
                            echo $hero_image; ?>" alt="Bath Products" class="hero-product-img">
                        </div>
                    </div>
                    <div class="showcase-text">
                        <div class="text-content">

                            <p> <?php $hero_text = function_exists('get_field') ? esc_html(get_field('hero_text2')) : '';
                            echo $hero_text; ?>
                            </p>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                                class="hero-cta-button">
                                SHOP <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- At Mell Luxe Section -->
            <div class="hero-brand-section">
                <div class="brand-title">
                    <h1>At Mell Luxe...</h1>
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                        class="hero-cta-button secondary">
                        SHOP <span>→</span>
                    </a>
                </div>

                <div class="brand-showcase">
                    <div class="brand-content">
                        <div class="brand-images">
                            <div class="brand-product-left">
                                <img src="<?php echo $home_image_1_left; ?>" alt="Luxury Body Oil"
                                    class="brand-product-img">
                            </div>
                            <div class="brand-text-center">
                                <div class="brand-description">
                                    <p><?php echo $home_text_1; ?></p>
                                </div>
                            </div>
                            <div class="brand-product-right">
                                <img src="<?php echo $home_image_1_right; ?>" alt="Facial Cleansing Dough"
                                    class="brand-product-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Showcase Section -->
    <section class="snap-section product-showcase" id="products">

        <div class="products-container">
            <!-- Main Product Showcase -->
            <div class="products-showcase">
                <!-- Central Text with Surrounding Images -->


                <!-- Top Products -->

                <div class="showcase-description" style="grid-area: text">
                    <p><?php echo $home_text_2; ?></p>
                </div>
                <div class="showcase-product-item product-top-left" style="grid-area: image1">
                    <div class="product-image-container">
                        <img src="<?php echo $home_image_2; ?>" alt="Daily Facial Oil" class="showcase-product-image">
                    </div>
                </div>

                <div class="showcase-product-item product-top-right" style="grid-area: image2">
                    <div class="product-image-container">
                        <img src="<?php echo $home_image_21; ?>" alt="Anti-Ageing Facial Serum"
                            class="showcase-product-image">
                    </div>
                </div>


                <div class="showcase-product-item product-left" style="grid-area: image3">
                    <div class="product-image-container">
                        <img src="<?php echo $home_image_22; ?>" alt="Calming Luxury Bath Salts"
                            class="showcase-product-image">
                    </div>
                </div>

                <div class="showcase-product-item product-right" style="grid-area: image4">
                    <div class="product-image-container">
                        <img src="<?php echo $home_image_23; ?>" alt="Firming Body Oil" class="showcase-product-image">
                    </div>
                </div>


                <div class="showcase-product-item product-bottom" style="grid-area: image5">
                    <div class="product-image-container">
                        <img src="<?php echo $home_image_24; ?>" alt="Facial Polish" class="showcase-product-image">
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="showcase-cta" data-gsap="fade-in">
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="showcase-shop-button">
                    SHOP <span>→</span>
                </a>
            </div>
        </div>

        <!-- Bottom Strips Image with GSAP Animation -->
        <div class="strips-section" data-gsap="slide-bottom">
            <div class="strips-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/strips.png"
                    alt="Mell Luxe Product Collection" class="strips-image">
            </div>
        </div>
</div>
</section>

<!-- About Section -->
<section class="snap-section about-section" id="best">
    <div class="best-container">
        <!-- Left Side - Product Slider -->
        <div class="product-slider-section">
            <!-- Main Product Display -->
            <div class="main-product-display">
                <!-- Navigation Arrows -->
                <button class="slider-nav prev-btn" id="prevBtn">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <!-- Main Product Image -->
                <div class="main-product-container">
                    <div class="main-product-image">
                        <a href="<?php echo $our_best_image_1_link; ?>">
                            <img id="mainProductImg" src="<?php echo $our_best_image_1; ?>" alt="Beauty Serum"
                                class="main-img">
                        </a>
                    </div>
                </div>

                <button class="slider-nav next-btn" id="nextBtn">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Thumbnail Slider -->
            <div class="thumbnail-slider">
                <div class="thumbnail-container" id="thumbnailContainer">
                    <div class="thumbnail-item active" data-img="<?php echo $our_best_image_1; ?>">
                        <img src="<?php echo $our_best_image_1; ?>" alt="Beauty Serum">
                        <a href="<?php echo $our_best_image_1_link; ?>" class="thumbnail-link"></a>
                    </div>
                    <div class="thumbnail-item" data-img="<?php echo $our_best_image_2; ?>">
                        <img src="<?php echo $our_best_image_2; ?>" alt="24k Gold Elixir">
                        <a href="<?php echo $our_best_image_2_link; ?>" class="thumbnail-link"></a>
                    </div>
                    <div class="thumbnail-item" data-img="<?php echo $our_best_image_3; ?>">
                        <img src="<?php echo $our_best_image_3; ?>" alt="Bath Salts">
                        <a href="<?php echo $our_best_image_3_link; ?>" class="thumbnail-link"></a>
                    </div>
                    <div class="thumbnail-item" data-img="<?php echo $our_best_image_4; ?>">
                        <img src="<?php echo $our_best_image_4; ?>" alt="Body Oil">
                        <a href="<?php echo $our_best_image_4_link; ?>" class="thumbnail-link"></a>
                    </div>
                    <div class="thumbnail-item" data-img="<?php echo $our_best_image_5; ?>">
                        <img src="<?php echo $our_best_image_5; ?>" alt="Facial Oil">
                        <a href="<?php echo $our_best_image_5_link; ?>" class="thumbnail-link"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Content -->
        <div class="best-content-section">
            <!-- "Our" Text -->
            <div class="our-text">
                <h2>Our</h2>
            </div>

            <!-- "Best" Container with Yellow Accent -->
            <div class="best-container-box">
                <div class="best-text">Best</div>
                <div class="yellow-accent"></div>
            </div>

            <!-- Description Container -->
            <div class="best-description">
                <p><?php echo $our_best_text; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="snap-section testimonials-section" id="testimonials">
    <div class="testimonials-container">
        <!-- Section Header -->
        <div class="testimonials-header" data-gsap="fade-in">
            <h2>What Our Customers Say</h2>
            <p>Discover why thousands trust Mell Luxe for their luxury skincare needs</p>
        </div>

        <!-- Testimonials Grid -->
        <div class="testimonials-grid">
            <!-- Testimonial 1 -->
            <div class="testimonial-card" data-gsap="slide-left">
                <div class="testimonial-content">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <blockquote>
                        "I've tried countless vegan creams over the years, but nothing comes close to this one! It's
                        incredibly smooth, absorbs quickly, and leaves my skin feeling hydrated all day. Plus,
                        knowing it's cruelty-free and made with natural ingredients makes it even better."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <span>BG</span>
                        </div>
                        <div class="author-info">
                            <h4>Bethany Gilford</h4>
                            <p>Verified Customer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card" data-gsap="slide-up">
                <div class="testimonial-content">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <blockquote>
                        "The 24k Gold Facial Elixir is pure luxury! My skin has never looked better. The packaging
                        is beautiful and the results are immediate. Worth every penny for this premium skincare
                        experience."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <span>SM</span>
                        </div>
                        <div class="author-info">
                            <h4>Sarah Mitchell</h4>
                            <p>Verified Customer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card" data-gsap="slide-right">
                <div class="testimonial-content">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <blockquote>
                        "Absolutely love the bath salts! They transform my evening routine into a spa-like
                        experience. The scent is divine and my skin feels so soft afterwards. Highly recommend for
                        anyone looking to treat themselves."
                    </blockquote>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <span>EM</span>
                        </div>
                        <div class="author-info">
                            <h4>Emma Robinson</h4>
                            <p>Verified Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="trust-indicators" data-gsap="fade-in">
            <div class="trust-stats">
                <div class="stat-item">
                    <h3>100%</h3>
                    <p>Natural Ingredients</p>
                </div>
                <div class="stat-item">
                    <h3>Vegan</h3>
                    <p>& Cruelty-Free</p>
                </div>
                <div class="stat-item">
                    <h3>Eco</h3>
                    <p>Friendly Packaging</p>
                </div>
            </div>
        </div>

        <!-- Special Offer Banner -->
        <div class="special-offer-banner" data-gsap="fade-in">
            <div class="offer-content">
                <h3>Special Spring Offer - Buy 4 Get 15% OFF</h3>
                <p>Free Delivery for Standard UK Orders</p>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="offer-cta">
                    Shop Now <span>→</span>
                </a>
            </div>
        </div>
    </div>
</section>
</div>

<!-- Back to Top Button -->
<button id="back-to-top" class="back-to-top" aria-label="Back to top">
    <div class="btn-content">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 14L12 9L17 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <span class="btn-text">TOP</span>
    </div>
    <div class="btn-bg"></div>
</button>

<?php get_footer(); ?>