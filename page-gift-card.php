<?php
/**
 * Template Name: Gift Card Page
 * Description: Displays only products in the "gift-card" category.
 */

get_header();

$promo_title = function_exists('get_field') ? esc_html(get_field('promo_title')) : '';
$promo_text = function_exists('get_field') ? esc_html(get_field('promo_text')) : '';

?>

<div class="mellluxe-shop-page">
<?php
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
    <section class="shop-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Thoughtful Gift Sets</h1>
                    <p class="hero-subtitle">Curated bundles for every occasion — natural, vegan, and cruelty-free</p>

                    
                </div>

                <div class="hero-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/table.jpg"
                        alt="Luxury Beauty Products">
                </div>
            </div>
        </div>
    </section>
    <section class="shop-content">
        <div class="container gift-sets">
            <div class="shop-header">
                <div class="page-info">
                    <h2 class="page-title"><?php echo esc_html(get_the_title() ?: 'Gift Cards'); ?></h2>
                    
                </div>
            </div>

            <div class="products-section">
                <div class="woocommerce">
                    <?php
                    // Render WooCommerce products for the specific category using shortcode for consistency with theme styles
                    if (function_exists('woocommerce_shortcode_products')) {
                        // The [products] shortcode supports pagination when paginate="true"
                        $shortcode = '[products category="gift-card" limit="12" columns="4" paginate="true" orderby="meta_value" meta_key="_stock_status" order="ASC"]';
                        echo do_shortcode($shortcode);
                    } else {
                        // Fallback query in case WooCommerce shortcode function is unavailable
                        $paged = max(1, get_query_var('paged'));
                        $args = array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'paged' => $paged,
                            'meta_key' => '_stock_status',
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => array('gift-card'),
                                ),
                            ),
                        );

                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            woocommerce_product_loop_start();
                            while ($query->have_posts()) {
                                $query->the_post();
                                wc_get_template_part('content', 'product');
                            }
                            woocommerce_product_loop_end();

                            // Basic pagination
                            $big = 999999999; // need an unlikely integer
                            $links = paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, $paged),
                                'total' => $query->max_num_pages,
                                'prev_text' => '&laquo;',
                                'next_text' => '&raquo;',
                            ));
                            if ($links) {
                                echo '<nav class="woocommerce-pagination"><ul class="page-numbers"><li>' . str_replace(array('<span class="page-numbers current">', '</span>'), array('<span class="page-numbers current">', '</span>'), $links) . '</li></ul></nav>';
                            }
                            wp_reset_postdata();
                        } else {
                            wc_no_products_found();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    /* Shop Page Clean Styles */
    .mellluxe-shop-page {
        margin-top: 80px;
    }

    /* Container */
    .container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 20px;
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
        
        img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
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