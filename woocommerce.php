<?php
/**
 * WooCommerce template for Mell Luxe theme
 */

get_header(); ?>

<div class="woocommerce-container">
    <div class="section-container">
        
        <?php if (is_shop() || is_product_category() || is_product_tag()) : ?>
            <div class="shop-header fade-in">
                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
                <?php if (is_product_category()) : ?>
                    <?php $category = get_queried_object(); ?>
                    <?php if ($category->description) : ?>
                        <div class="category-description">
                            <p><?php echo $category->description; ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="woocommerce-content">
            <?php woocommerce_content(); ?>
        </div>
        
    </div>
</div>

<style>
.woocommerce-container {
    padding: 6rem 0 3rem;
    min-height: 100vh;
    background: white;
}

.shop-header {
    text-align: center;
    margin-bottom: 3rem;
}

.shop-header .page-title {
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.category-description {
    max-width: 600px;
    margin: 0 auto;
    color: var(--text-dark);
    opacity: 0.8;
}

.woocommerce-content {
    position: relative;
}

/* Custom WooCommerce Product Grid */
.woocommerce .products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin: 0;
    padding: 0;
    list-style: none;
}

.woocommerce .product {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    margin: 0;
}

.woocommerce .product:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.woocommerce .product img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: var(--transition);
}

.woocommerce .product:hover img {
    transform: scale(1.05);
}

.woocommerce .product .woocommerce-loop-product__title {
    font-size: 1.2rem;
    color: var(--primary-color);
    margin: 1rem;
    line-height: 1.4;
}

.woocommerce .product .price {
    margin: 0 1rem 1rem;
    font-size: 1.1rem;
    font-weight: 600;
}

.woocommerce .product .button {
    margin: 0 1rem 1rem;
    width: calc(100% - 2rem);
    text-align: center;
}

/* Pagination */
.woocommerce nav.woocommerce-pagination {
    margin-top: 3rem;
    text-align: center;
}

.woocommerce nav.woocommerce-pagination ul {
    display: inline-flex;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.woocommerce nav.woocommerce-pagination ul li {
    margin: 0;
}

.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span {
    display: block;
    padding: 0.8rem 1.2rem;
    background: var(--secondary-color);
    color: var(--text-dark);
    text-decoration: none;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
    background: var(--primary-color);
    color: var(--text-light);
}

/* Shop Sidebar */
.woocommerce-sidebar {
    background: var(--secondary-color);
    padding: 2rem;
    border-radius: var(--border-radius);
    margin-bottom: 2rem;
}

.woocommerce-sidebar .widget {
    margin-bottom: 2rem;
}

.woocommerce-sidebar .widget:last-child {
    margin-bottom: 0;
}

.woocommerce-sidebar .widget-title {
    color: var(--primary-color);
    font-size: 1.3rem;
    margin-bottom: 1rem;
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 0.5rem;
}

/* Product Filters */
.woocommerce .widget_product_categories ul,
.woocommerce .widget_layered_nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.woocommerce .widget_product_categories ul li,
.woocommerce .widget_layered_nav ul li {
    margin-bottom: 0.5rem;
    padding: 0;
}

.woocommerce .widget_product_categories ul li a,
.woocommerce .widget_layered_nav ul li a {
    color: var(--text-dark);
    text-decoration: none;
    padding: 0.5rem 0;
    display: block;
    transition: var(--transition);
}

.woocommerce .widget_product_categories ul li a:hover,
.woocommerce .widget_layered_nav ul li a:hover {
    color: var(--primary-color);
    padding-left: 0.5rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .woocommerce-container {
        padding: 4rem 0 2rem;
    }
    
    .woocommerce .products {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .shop-header {
        margin-bottom: 2rem;
    }
}

@media (max-width: 480px) {
    .woocommerce .products {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?> 