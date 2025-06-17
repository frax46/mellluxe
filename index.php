<?php
/**
 * The main template file for Mell Luxe theme
 */

get_header(); ?>

<div class="snap-container">
    <!-- Hero Section -->
    <section class="snap-section hero-section" id="hero">
        <!-- Special Offer Banner -->
        <div class="offer-banner">
            <div class="offer-content">
                <div class="offer-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L12 3L4 7M20 7L12 11M20 7V17L12 21M12 11L4 7M12 11V21M4 7V17L12 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="offer-text">
                    <h3>Special Spring Offer - Buy 4 Get 15% OFF</h3>
                    <p>Free Delivery for Standard UK Orders</p>
                </div>
            </div>
        </div>

        <!-- Main Hero Content -->
        <div class="hero-container">
            <!-- First Product Showcase -->
            <div class="hero-showcase-section">
                <div class="showcase-content">
                    <div class="showcase-images">
                        <div class="product-display">
                            <img src="<?php echo get_template_directory_uri(); ?>\images\Whole Sale\Daily Facial Oil 5.20£\PXL_20240720_174133088_edited.jpg" alt="Bath Products" class="hero-product-img">
                        </div>
                    </div>
                    <div class="showcase-text">
                        <div class="text-content">
                            <p>From invigorating bath bombs and rejuvenating facial polishes to nourishing body oils and serums, we offer a wide range of products designed to enhance your self-care routine...</p>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="hero-cta-button">
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
                    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="hero-cta-button secondary">
                        SHOP <span>→</span>
                    </a>
                </div>
                
                <div class="brand-showcase">
                    <div class="brand-content">
                        <div class="brand-images">
                            <div class="brand-product-left">
                                <img src="<?php echo get_template_directory_uri(); ?>\images\Whole Sale\Calming Luxury Bath Salts 3.60£\PXL_20240720_175212393_edited_edited_edited_edited.png" alt="Luxury Body Oil" class="brand-product-img">
                            </div>
                            <div class="brand-text-center">
                                <div class="brand-description">
                                    <p>... nature meets luxury in every handcrafted product. Our collection is meticulously crafted in the UK, using the finest vegan ingredients to ensure a premium experience.</p>
                                    <p>From invigorating bath bombs and rejuvenating</p>
                                </div>
                            </div>
                            <div class="brand-product-right">
                                <img src="<?php echo get_template_directory_uri(); ?>\images\Whole Sale\Oils - Firming Body Oil\IMG_1061_edited.jpg" alt="Facial Cleansing Dough" class="brand-product-img">
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
                <div class="showcase-center-layout">
                    
                    <!-- Top Products -->
                    <div class="products-top">
                        <div class="showcase-product-item product-top-left" data-gsap="slide-left">
                            <div class="product-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg" alt="Daily Facial Oil" class="showcase-product-image">
                            </div>
                        </div>
                        
                        <div class="showcase-product-item product-top-right" data-gsap="slide-right">
                            <div class="product-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Anti-Ageing Facial Serum 6£/PXL_20240720_172749777_edited.jpg" alt="Anti-Ageing Facial Serum" class="showcase-product-image">
                            </div>
                        </div>
                    </div>

                    <!-- Central Text -->
                    <div class="showcase-text-center">
                        <div class="showcase-description">
                            <p>... Each item is thoughtfully packaged in recyclable, eco-friendly materials, reflecting Mell's commitment to sustainability and the environment. Our formulations harness the power of nature's best, like hyaluronic acid, vegan squalane, blue spirulina, and essential oils, to deliver visible results and unparalleled care.</p>
                        </div>
                    </div>

                    <!-- Side Products -->
                    <div class="products-sides">
                        <div class="showcase-product-item product-left" data-gsap="slide-left-delay">
                            <div class="product-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Calming Luxury Bath Salts 3.60£/PXL_20240720_175212393_edited_edited_edited_edited.png" alt="Calming Luxury Bath Salts" class="showcase-product-image">
                            </div>
                        </div>
                        
                        <div class="showcase-product-item product-right" data-gsap="slide-right-delay">
                            <div class="product-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Oils - Firming Body Oil/IMG_1061_edited.jpg" alt="Firming Body Oil" class="showcase-product-image">
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Product -->
                    <div class="products-bottom">
                        <div class="showcase-product-item product-bottom" data-gsap="slide-up">
                            <div class="product-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/Singles/Polish/IMG_1501 2_edited_edited.jpg" alt="Facial Polish" class="showcase-product-image">
                            </div>
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
                    <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/strips.png" alt="Mell Luxe Product Collection" class="strips-image">
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
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    
                    <!-- Main Product Image -->
                    <div class="main-product-container">
                        <div class="main-product-image">
                            <img id="mainProductImg" src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg" alt="Beauty Serum" class="main-img">
                        </div>
                    </div>
                    
                    <button class="slider-nav next-btn" id="nextBtn">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                
                <!-- Thumbnail Slider -->
                <div class="thumbnail-slider">
                    <div class="thumbnail-container" id="thumbnailContainer">
                        <div class="thumbnail-item active" data-img="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg" alt="Beauty Serum">
                        </div>
                        <div class="thumbnail-item" data-img="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Royal 24k Gold Facial Elixir/bf86a4c9-6fda-42b7-9244-9dbcbe4a0c40_edited.jpg">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Royal 24k Gold Facial Elixir/bf86a4c9-6fda-42b7-9244-9dbcbe4a0c40_edited.jpg" alt="24k Gold Elixir">
                        </div>
                        <div class="thumbnail-item" data-img="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Calming Luxury Bath Salts 3.60£/PXL_20240720_175212393_edited_edited_edited_edited.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Calming Luxury Bath Salts 3.60£/PXL_20240720_175212393_edited_edited_edited_edited.png" alt="Bath Salts">
                        </div>
                        <div class="thumbnail-item" data-img="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Oils - Firming Body Oil/IMG_1061_edited.jpg">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Oils - Firming Body Oil/IMG_1061_edited.jpg" alt="Body Oil">
                        </div>
                        <div class="thumbnail-item" data-img="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg" alt="Facial Oil">
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
                    <p>Whether you're looking for a gift set to pamper a loved one or a personal treat to elevate your skincare regimen, Mell Luxe provides the ultimate in natural, luxurious, and eco-conscious beauty solutions.</p>
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
                            "I've tried countless vegan creams over the years, but nothing comes close to this one! It's incredibly smooth, absorbs quickly, and leaves my skin feeling hydrated all day. Plus, knowing it's cruelty-free and made with natural ingredients makes it even better."
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
                            "The 24k Gold Facial Elixir is pure luxury! My skin has never looked better. The packaging is beautiful and the results are immediate. Worth every penny for this premium skincare experience."
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
                            "Absolutely love the bath salts! They transform my evening routine into a spa-like experience. The scent is divine and my skin feels so soft afterwards. Highly recommend for anyone looking to treat themselves."
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
                        <h3>5.0</h3>
                        <div class="stars">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <p>Average Rating</p>
                    </div>
                    <div class="stat-item">
                        <h3>2,500+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-item">
                        <h3>98%</h3>
                        <p>Would Recommend</p>
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
            <path d="M7 14L12 9L17 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="btn-text">TOP</span>
    </div>
    <div class="btn-bg"></div>
</button>

<?php get_footer(); ?> 