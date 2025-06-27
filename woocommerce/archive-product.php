<?php
/**
 * WooCommerce template for Mell Luxe theme - Clean Design
 */

get_header(); ?>

<div class="mellluxe-shop-page">
    
    <!-- Offer Banner -->
    <section class="shop-offer-banner">
        <div class="container">
            <div class="offer-content">
                <div class="offer-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L12 3L4 7M20 7L12 11M20 7V17L12 21M12 11L4 7M12 11V21M4 7V17L12 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="offer-text">
                    <span class="offer-title">Special Spring Offer - Buy 4 Get 15% OFF</span>
                    <span class="offer-subtitle">Free Delivery for Standard UK Orders</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Hero -->
    <section class="shop-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Luxury Vegan Beauty</h1>
                    <p class="hero-subtitle">Handcrafted in the UK with 100% natural, vegan, and cruelty-free ingredients</p>
                    
                    <div class="hero-categories">
                        <div class="category-pill" data-category="bath-body">
                            <span class="category-emoji">🛁</span>
                            <span>Bath & Body</span>
                        </div>
                        <div class="category-pill" data-category="face-care">
                            <span class="category-emoji">✨</span>
                            <span>Face Care</span>
                        </div>
                        <div class="category-pill" data-category="lip-care">
                            <span class="category-emoji">💋</span>
                            <span>Lip Care</span>
                        </div>
                        <div class="category-pill" data-category="all">
                            <span class="category-emoji">🌟</span>
                            <span>View All</span>
                        </div>
                    </div>
                </div>
                
                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg" alt="Luxury Beauty Products">
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Content -->
    <section class="shop-content">
        <div class="container">
            
            <!-- Shop Header -->
            <div class="shop-header">
                <?php if (is_shop() || is_product_category() || is_product_tag()) : ?>
                    <div class="page-info">
                        <h2 class="page-title"><?php woocommerce_page_title(); ?></h2>
                        <?php if (is_product_category()) : ?>
                            <?php $category = get_queried_object(); ?>
                            <?php if ($category->description) : ?>
                                <p class="page-description"><?php echo $category->description; ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Enhanced Filters Bar -->
                <div class="filters-bar">
                    <div class="filters-left">
                        <div class="results-info">
                            <?php
                            global $wp_query;
                            $total = $wp_query->found_posts;
                            ?>
                            <span class="results-count"><?php echo sprintf(_n('%d Product', '%d Products', $total, 'mellluxe'), $total); ?></span>
                        </div>
                        
                        <!-- Category Filter -->
                        <div class="category-filter">
                            <label for="category-select" class="filter-label">Category:</label>
                            <select id="category-select" class="category-select">
                                <option value="">All Categories</option>
                                <?php
                                $product_categories = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                    'parent' => 0
                                ));
                                
                                if (!empty($product_categories)) {
                                    foreach ($product_categories as $category) {
                                        $selected = (is_product_category() && $category->term_id == get_queried_object_id()) ? 'selected' : '';
                                        echo '<option value="' . esc_attr($category->slug) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="filters-right">
                        <!-- Price Filter -->
                        <div class="price-filter">
                            <label for="price-select" class="filter-label">Price:</label>
                            <select id="price-select" class="price-select">
                                <option value="">All Prices</option>
                                <option value="0-10">£0 - £10</option>
                                <option value="10-25">£10 - £25</option>
                                <option value="25-50">£25 - £50</option>
                                <option value="50-100">£50+</option>
                            </select>
                        </div>
                        
                        <!-- Sort Control -->
                        <div class="sort-control">
                            <label for="shop-orderby" class="filter-label">Sort by:</label>
                            <select name="orderby" class="orderby" id="shop-orderby">
                                <?php
                                $orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : wc_get_loop_prop('orderby');
                                ?>
                                <option value="menu_order"<?php selected( $orderby, 'menu_order' ); ?>>Default sorting</option>
                                <option value="popularity"<?php selected( $orderby, 'popularity' ); ?>>Sort by popularity</option>
                                <option value="rating"<?php selected( $orderby, 'rating' ); ?>>Sort by average rating</option>
                                <option value="date"<?php selected( $orderby, 'date' ); ?>>Sort by latest</option>
                                <option value="price"<?php selected( $orderby, 'price' ); ?>>Sort by price: low to high</option>
                                <option value="price-desc"<?php selected( $orderby, 'price-desc' ); ?>>Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="products-section">
                <?php
                // Remove default WooCommerce ordering
                remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
                ?>
                <?php woocommerce_content(); ?>
            </div>

        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2"/>
                            <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>100% Natural</h3>
                    <p>Vegan & Cruelty-Free</p>
                </div>
                
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 9v11a2 2 0 01-2 2H6a2 2 0 01-2-2V9" stroke="currentColor" stroke-width="2"/>
                            <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Handmade in UK</h3>
                    <p>Crafted with Love</p>
                </div>
                
                <div class="trust-item">
                    <div class="trust-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7l10 5 10-5-10-5z" stroke="currentColor" stroke-width="2"/>
                            <path d="M2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Free Delivery</h3>
                    <p>On UK Orders</p>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filter functionality
    const categorySelect = document.getElementById('category-select');
    const categoryPills = document.querySelectorAll('.category-pill');
    
    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            if (this.value) {
                window.location.href = '<?php echo home_url('/product-category/'); ?>' + this.value + '/';
            } else {
                window.location.href = '<?php echo wc_get_page_permalink('shop'); ?>';
            }
        });
    }
    
    // Category pill functionality
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function() {
            const category = this.dataset.category;
            if (category === 'all') {
                window.location.href = '<?php echo wc_get_page_permalink('shop'); ?>';
            } else {
                window.location.href = '<?php echo home_url('/product-category/'); ?>' + category + '/';
            }
        });
    });
    
    // Sort functionality
    const sortSelect = document.getElementById('shop-orderby');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const url = new URL(window.location);
            url.searchParams.set('orderby', this.value);
            window.location.href = url.toString();
        });
    }
    
    // Price filter functionality
    const priceSelect = document.getElementById('price-select');
    if (priceSelect) {
        priceSelect.addEventListener('change', function() {
            const url = new URL(window.location);
            if (this.value) {
                const [min, max] = this.value.split('-');
                url.searchParams.set('min_price', min);
                if (max) url.searchParams.set('max_price', max);
            } else {
                url.searchParams.delete('min_price');
                url.searchParams.delete('max_price');
            }
            window.location.href = url.toString();
        });
    }
    
    // Format product cards
    formatProductCards();
    
    function formatProductCards() {
        const products = document.querySelectorAll('.woocommerce .product');
        
        products.forEach(product => {
            // Clean up product titles - remove underscores and improve formatting
            const title = product.querySelector('.woocommerce-loop-product__title');
            if (title) {
                let titleText = title.textContent.trim();
                // Remove underscores and replace with spaces
                titleText = titleText.replace(/_/g, ' ');
                // Capitalize first letter of each word
                titleText = titleText.replace(/\b\w/g, l => l.toUpperCase());
                title.textContent = titleText;
            }
            
            // Wrap product image in container
            const image = product.querySelector('.attachment-woocommerce_thumbnail');
            const link = product.querySelector('.woocommerce-loop-product__link');
            
            if (image && link && !product.querySelector('.product-image-container')) {
                const imageContainer = document.createElement('div');
                imageContainer.className = 'product-image-container';
                
                // Move image to container
                imageContainer.appendChild(image);
                link.insertBefore(imageContainer, link.firstChild);
            }
            
            // Create product content wrapper
            const titleElement = product.querySelector('.woocommerce-loop-product__title');
            const priceElement = product.querySelector('.price');
            const buttonElement = product.querySelector('.button');
            
            if (titleElement && priceElement && buttonElement && !product.querySelector('.product-content')) {
                const contentWrapper = document.createElement('div');
                contentWrapper.className = 'product-content';
                
                // Move content elements to wrapper
                contentWrapper.appendChild(titleElement);
                contentWrapper.appendChild(priceElement);
                contentWrapper.appendChild(buttonElement);
                
                link.appendChild(contentWrapper);
            }
            
            // Add loading animation
            product.style.opacity = '0';
            product.style.transform = 'translateY(20px)';
            
            // Animate in with delay
            setTimeout(() => {
                product.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                product.style.opacity = '1';
                product.style.transform = 'translateY(0)';
            }, Math.random() * 300);
        });
    }
});
</script>

<style>
/* Shop Page Clean Styles */
.mellluxe-shop-page {
    margin-top: 80px;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Offer Banner */
.shop-offer-banner {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #f5d86b 100%);
    color: var(--primary-color);
    padding: 12px 0;
}

.offer-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.offer-icon svg {
    width: 20px;
    height: 20px;
}

.offer-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.offer-title {
    font-size: 14px;
    font-weight: 600;
    line-height: 1.2;
}

.offer-subtitle {
    font-size: 12px;
    opacity: 0.8;
    line-height: 1.2;
}

/* Shop Hero */
.shop-hero {
    padding: 60px 0;
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.08) 0%, rgba(253, 226, 141, 0.03) 100%);
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 60px;
    align-items: center;
}

.hero-title {
    font-size: clamp(2.5rem, 4vw, 3.5rem);
    font-weight: 700;
    color: var(--primary-color);
    margin: 0 0 16px 0;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 18px;
    color: var(--text-muted);
    margin: 0 0 32px 0;
    line-height: 1.5;
}

.hero-categories {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.category-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    background: white;
    border-radius: 50px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
}

.category-pill:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    border-color: var(--secondary-color);
}

.category-pill.active {
    background: var(--primary-color);
    color: white;
}

.category-pill.active .category-emoji {
    filter: brightness(0) invert(1);
}

.category-emoji {
    font-size: 16px;
}

.category-pill span:last-child {
    font-size: 13px;
    font-weight: 600;
    color: var(--primary-color);
}

.category-pill.active span:last-child {
    color: white;
}

.hero-image {
    position: relative;
}

.hero-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
}

/* Shop Content */
.shop-content {
    padding: 60px 0;
    background: white;
}

.shop-header {
    margin-bottom: 40px;
}

.page-info {
    text-align: center;
    margin-bottom: 32px;
}

.page-title {
    font-size: 32px;
    font-weight: 700;
    color: var(--primary-color);
    margin: 0 0 8px 0;
}

.page-description {
    font-size: 16px;
    color: var(--text-muted);
    margin: 0;
    max-width: 600px;
    margin: 0 auto;
}

/* Enhanced Filters Bar */
.filters-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    border: 1px solid #e9ecef;
    gap: 20px;
}

.filters-left {
    display: flex;
    align-items: center;
    gap: 24px;
}

.filters-right {
    display: flex;
    align-items: center;
    gap: 24px;
}

.results-count {
    font-size: 14px;
    font-weight: 600;
    color: var(--primary-color);
    white-space: nowrap;
}

.filter-label {
    font-size: 14px;
    font-weight: 600;
    color: var(--primary-color);
    margin-right: 8px;
}

.category-filter,
.price-filter,
.sort-control {
    display: flex;
    align-items: center;
    gap: 8px;
}

.category-select,
.price-select,
.orderby {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background: white;
    font-size: 14px;
    color: var(--primary-color);
    min-width: 140px;
    cursor: pointer;
}

.category-select:focus,
.price-select:focus,
.orderby:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(37, 23, 70, 0.1);
}

/* Products Section */
.products-section {
    margin-top: 40px;
}

/* Enhanced WooCommerce Styles */
.woocommerce .products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 32px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.woocommerce .product {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    margin: 0;
    border: 1px solid #f5f5f5;
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.woocommerce .product:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    border-color: var(--secondary-color);
}

.woocommerce .product .woocommerce-loop-product__link {
    display: flex;
    flex-direction: column;
    height: 100%;
    text-decoration: none;
}

.woocommerce .product .product-image-container {
    position: relative;
    overflow: hidden;
    background: #f8f9fa;
    height: 280px;
}

.woocommerce .product .attachment-woocommerce_thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.woocommerce .product:hover .attachment-woocommerce_thumbnail {
    transform: scale(1.08);
}

.woocommerce .product .onsale {
    position: absolute;
    top: 16px;
    left: 16px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
    box-shadow: 0 2px 8px rgba(238, 90, 36, 0.3);
}

.woocommerce .product .product-content {
    padding: 24px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Product Title Styles */
.woocommerce .product .woocommerce-loop-product__title {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
    margin: 0 0 12px 0;
    line-height: 1.3;
    text-decoration: none !important;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 48px;
}

.woocommerce .product .woocommerce-loop-product__link {
    text-decoration: none !important;
}

.woocommerce .product .woocommerce-loop-product__link:hover {
    text-decoration: none !important;
}

.woocommerce .product .woocommerce-loop-product__link .woocommerce-loop-product__title {
    text-decoration: none !important;
}

.woocommerce .product .woocommerce-loop-product__title:hover {
    color: var(--secondary-color);
    transition: color 0.3s ease;
}

/* Clean up product titles - remove underscores and improve formatting */
.woocommerce .product .woocommerce-loop-product__title::before {
    content: "";
}

/* Product Price Styles */
.woocommerce .product .price {
    font-size: 20px;
    font-weight: 800;
    margin: 0 0 20px 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.woocommerce .product .price .amount {
    color: var(--primary-color);
}

.woocommerce .product .price del {
    color: #999;
    font-weight: 500;
    font-size: 16px;
}

.woocommerce .product .price ins {
    text-decoration: none;
    color: #e74c3c;
    font-weight: 800;
}

/* Add to Cart Button */
.woocommerce .product .button {
    margin: 0;
    width: 100%;
    padding: 14px 20px;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 700;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    text-align: center;
    text-decoration: none !important;
    display: block;
    position: relative;
    overflow: hidden;
    margin-top: auto;
}

.woocommerce .product .button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.woocommerce .product .button:hover::before {
    left: 100%;
}

.woocommerce .product .button:hover {
    background: var(--secondary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(253, 226, 141, 0.4);
    text-decoration: none !important;
}

.woocommerce .product .button:active {
    transform: translateY(0);
    transition: transform 0.1s;
}

/* Product Badge Styles */
.woocommerce .product .product-badges {
    position: absolute;
    top: 16px;
    right: 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    z-index: 3;
}

.woocommerce .product .badge {
    background: rgba(37, 23, 70, 0.9);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.woocommerce .product .badge.new {
    background: linear-gradient(135deg, #00b894, #00a085);
}

.woocommerce .product .badge.featured {
    background: linear-gradient(135deg, #fdcb6e, #f39c12);
}

/* Remove all underlines from product links */
.woocommerce .products .product a {
    text-decoration: none !important;
}

.woocommerce .products .product a:hover {
    text-decoration: none !important;
}

/* Trust Section */
.trust-section {
    padding: 60px 0;
    background: var(--primary-color);
    color: white;
}

.trust-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    text-align: center;
}

.trust-item {
    padding: 20px;
}

.trust-icon {
    margin-bottom: 16px;
}

.trust-icon svg {
    color: var(--secondary-color);
}

.trust-item h3 {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 8px 0;
    color: white;
}

.trust-item p {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}

/* Pagination */
.woocommerce nav.woocommerce-pagination {
    margin-top: 40px;
    text-align: center;
}

.woocommerce nav.woocommerce-pagination ul {
    display: inline-flex;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span {
    display: block;
    padding: 12px 16px;
    background: #f8f9fa;
    color: var(--primary-color);
    text-decoration: none;
    border-radius: 8px;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
    background: var(--primary-color);
    color: white;
}

/* Hide WooCommerce default ordering */
.woocommerce-ordering {
    display: none !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .hero-image {
        order: -1;
    }
    
    .hero-image img {
        height: 300px;
    }
    
    .hero-categories {
        justify-content: center;
    }
    
    .filters-bar {
        flex-direction: column;
        gap: 20px;
        align-items: stretch;
    }
    
    .filters-left,
    .filters-right {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }
    
    .category-filter,
    .price-filter,
    .sort-control {
        justify-content: space-between;
    }
    
    .category-select,
    .price-select,
    .orderby {
        min-width: auto;
        width: 100%;
    }
    
    .woocommerce .products {
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }
    
    .trust-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
}

@media (max-width: 576px) {
    .offer-content {
        flex-direction: column;
        gap: 8px;
    }
    
    .hero-categories {
        flex-direction: column;
        align-items: stretch;
    }
    
    .category-pill {
        justify-content: center;
    }
    
    .woocommerce .products {
        grid-template-columns: 1fr;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .filters-bar {
        padding: 16px;
    }
}

/* Remove default WooCommerce notices positioning */
.woocommerce-notices-wrapper {
    margin-bottom: 20px;
}
</style>

<?php get_footer(); ?> 