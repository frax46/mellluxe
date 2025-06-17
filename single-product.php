<?php
/**
 * Single Product Template for Mell Luxe theme
 */

get_header(); ?>

<div class="single-product-container">
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="section-container">
            <div class="product-layout">
                
                <div class="product-images slide-left">
                    <?php woocommerce_show_product_images(); ?>
                </div>
                
                <div class="product-summary slide-right">
                    <div class="product-details">
                        
                        <nav class="breadcrumb fade-in">
                            <?php woocommerce_breadcrumb(); ?>
                        </nav>
                        
                        <h1 class="product-title"><?php the_title(); ?></h1>
                        
                        <div class="product-rating">
                            <?php woocommerce_template_single_rating(); ?>
                        </div>
                        
                        <div class="product-price">
                            <?php woocommerce_template_single_price(); ?>
                        </div>
                        
                        <div class="product-excerpt">
                            <?php woocommerce_template_single_excerpt(); ?>
                        </div>
                        
                        <div class="product-add-to-cart">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                        
                        <div class="product-meta">
                            <?php woocommerce_template_single_meta(); ?>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            
            <div class="product-tabs-section fade-in">
                <?php woocommerce_output_product_data_tabs(); ?>
            </div>
            
            <div class="related-products fade-in">
                <?php woocommerce_output_related_products(); ?>
            </div>
            
        </div>
        
    <?php endwhile; ?>
</div>

<style>
.single-product-container {
    padding: 6rem 0 3rem;
    background: white;
    min-height: 100vh;
}

.product-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-bottom: 4rem;
    align-items: start;
}

.product-images {
    position: sticky;
    top: 6rem;
}

.product-images img {
    width: 100%;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

.product-summary {
    padding: 1rem 0;
}

.breadcrumb {
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.breadcrumb a {
    color: var(--text-dark);
    text-decoration: none;
    opacity: 0.7;
    transition: var(--transition);
}

.breadcrumb a:hover {
    opacity: 1;
    color: var(--primary-color);
}

.product-title {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    color: var(--primary-color);
    margin-bottom: 1rem;
    line-height: 1.3;
}

.product-rating {
    margin-bottom: 1rem;
}

.product-price {
    margin-bottom: 1.5rem;
}

.product-price .price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--accent-color);
}

.product-excerpt {
    margin-bottom: 2rem;
    line-height: 1.7;
    color: var(--text-dark);
    opacity: 0.9;
}

.product-add-to-cart {
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--secondary-color);
    border-radius: var(--border-radius);
}

.product-add-to-cart .quantity {
    margin-bottom: 1rem;
}

.product-add-to-cart .quantity input {
    width: 80px;
    padding: 0.8rem;
    border: 2px solid #e0e0e0;
    border-radius: var(--border-radius);
    text-align: center;
    font-size: 1rem;
}

.product-add-to-cart .single_add_to_cart_button {
    width: 100%;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 1rem;
}

.product-meta {
    border-top: 1px solid #e0e0e0;
    padding-top: 1.5rem;
    font-size: 0.9rem;
}

.product-meta span {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
    opacity: 0.8;
}

.product-meta a {
    color: var(--primary-color);
    text-decoration: none;
    transition: var(--transition);
}

.product-meta a:hover {
    text-decoration: underline;
}

/* Product Tabs */
.product-tabs-section {
    margin-bottom: 4rem;
}

.woocommerce-tabs {
    background: var(--secondary-color);
    border-radius: var(--border-radius);
    overflow: hidden;
}

.woocommerce-tabs .tabs {
    display: flex;
    background: var(--primary-color);
    margin: 0;
    padding: 0;
    list-style: none;
}

.woocommerce-tabs .tabs li {
    flex: 1;
    margin: 0;
}

.woocommerce-tabs .tabs li a {
    display: block;
    padding: 1rem;
    text-align: center;
    color: var(--text-light);
    text-decoration: none;
    transition: var(--transition);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
}

.woocommerce-tabs .tabs li:last-child a {
    border-right: none;
}

.woocommerce-tabs .tabs li.active a,
.woocommerce-tabs .tabs li a:hover {
    background: rgba(255, 255, 255, 0.1);
}

.woocommerce-tabs .panel {
    padding: 2rem;
    background: white;
}

/* Related Products */
.related-products h2 {
    text-align: center;
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    color: var(--primary-color);
    margin-bottom: 2rem;
}

.related-products .products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Gallery Styles */
.woocommerce-product-gallery {
    position: relative;
}

.woocommerce-product-gallery__wrapper {
    margin: 0;
}

.woocommerce-product-gallery__image {
    margin-bottom: 1rem;
}

.woocommerce-product-gallery__image:last-child {
    margin-bottom: 0;
}

.woocommerce-product-gallery__image img {
    transition: var(--transition);
}

.woocommerce-product-gallery__image:hover img {
    transform: scale(1.02);
}

/* Responsive Design */
@media (max-width: 768px) {
    .single-product-container {
        padding: 4rem 0 2rem;
    }
    
    .product-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .product-images {
        position: static;
    }
    
    .woocommerce-tabs .tabs {
        flex-direction: column;
    }
    
    .woocommerce-tabs .tabs li a {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .woocommerce-tabs .tabs li:last-child a {
        border-bottom: none;
    }
    
    .related-products .products {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 480px) {
    .product-layout {
        gap: 1.5rem;
    }
    
    .product-add-to-cart {
        padding: 1rem;
    }
    
    .woocommerce-tabs .panel {
        padding: 1rem;
    }
    
    .related-products .products {
        grid-template-columns: 1fr;
    }
}

/* Enhanced Animation Classes */
.product-images.slide-left,
.product-summary.slide-right {
    opacity: 0;
    animation: slideInFade 1s ease-out 0.3s forwards;
}

.product-summary.slide-right {
    animation-delay: 0.6s;
}

@keyframes slideInFade {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Stock Status */
.stock {
    padding: 0.5rem 1rem;
    border-radius: var(--border-radius);
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1rem;
}

.stock.in-stock {
    background: #d4e6d4;
    color: #2d5a3d;
}

.stock.out-of-stock {
    background: #f8d7da;
    color: #721c24;
}
</style>

<?php get_footer(); ?> 