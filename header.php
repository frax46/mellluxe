<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <header class="site-header" id="masthead">
            <div class="header-container">
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <nav class="main-navigation" id="site-navigation">
                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <div class="site-logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/new-logo.png"
                                        alt="<?php bloginfo('name'); ?>">
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="#">Gift Card</a></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="#">Blog</a></li>

                        </ul>
                    </div>
                    <div class="header-tools">
                        <!-- Product Search -->
                        <div class="header-search">
                            <?php if (class_exists('WooCommerce')): ?>
                                <form role="search" method="get" class="woocommerce-product-search"
                                    action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" id="woocommerce-product-search-field" class="search-field"
                                        placeholder="<?php echo esc_attr__('Search products...', 'mellluxe'); ?>"
                                        value="<?php echo get_search_query(); ?>" name="s" />
                                    <input type="hidden" name="post_type" value="product" />
                                    <button type="submit" class="search-submit">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>

                        <!-- Shopping Cart -->
                        <div class="header-cart">
                            <?php if (class_exists('WooCommerce')): ?>
                                <a href="#" class="cart-link" id="cart-toggle">
                                    <div class="cart-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <?php
                                        $cart_count = WC()->cart->get_cart_contents_count();
                                        if ($cart_count > 0):
                                            ?>
                                            <span class="cart-count" id="cart-count"><?php echo esc_html($cart_count); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>

                <!-- Mobile Overlay -->
                <div class="mobile-menu-overlay"></div>
            </div>
        </header>

        <!-- Cart Sidebar -->
        <?php if (class_exists('WooCommerce')): ?>
            <div class="cart-sidebar" id="cart-sidebar">
                <div class="cart-sidebar-overlay" id="cart-sidebar-overlay"></div>
                <div class="cart-sidebar-content">
                    <div class="cart-sidebar-header">
                        <h3>Shopping Cart</h3>
                        <button class="cart-sidebar-close" id="cart-sidebar-close">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="cart-sidebar-body" id="cart-sidebar-body">
                        <!-- Cart content will be loaded here -->
                        <div class="cart-loading">
                            <p>Loading cart...</p>
                        </div>
                    </div>
                    <div class="cart-sidebar-footer">
                        <div class="cart-sidebar-total">
                            <span class="cart-total-label">Subtotal:</span>
                            <span class="cart-total-amount" id="cart-total-amount"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                        </div>
                        <div class="cart-sidebar-actions">
                            <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-outline">View Cart</a>
                            <a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- <div id="content" class="site-content"> -->

        <?php
        /**
         * Fallback menu if no menu is assigned
         */
        function mellluxe_fallback_menu()
        {
            echo '<ul class="nav-menu">';
            echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'mellluxe') . '</a></li>';

            if (class_exists('WooCommerce')) {
                echo '<li class="menu-item-has-children">';
                echo '<a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">' . __('Shop', 'mellluxe') . '</a>';

                // Mega Menu Structure
                echo '<div class="mega-menu">';
                echo '<div class="mega-menu-content">';

                // Bath & Body Section
                echo '<div class="mega-menu-section">';
                echo '<div class="mega-menu-title">Bath & Body</div>';
                echo '<div class="mega-menu-links">';
                echo '<a href="#">Bath Bombs</a>';
                echo '<a href="#">Body Oils</a>';
                echo '<a href="#">Body Scrubs</a>';
                echo '<a href="#">Bath Salts</a>';
                echo '<a href="#">Shower Gels</a>';
                echo '<a href="#">Body Butters</a>';
                echo '</div>';
                echo '</div>';

                // Face Care Section
                echo '<div class="mega-menu-section">';
                echo '<div class="mega-menu-title">Face Care</div>';
                echo '<div class="mega-menu-links">';
                echo '<a href="#">Facial Polish</a>';
                echo '<a href="#">Face Serums</a>';
                echo '<a href="#">Face Oils</a>';
                echo '<a href="#">Cleansers</a>';
                echo '<a href="#">Moisturizers</a>';
                echo '<a href="#">Face Masks</a>';
                echo '</div>';
                echo '</div>';

                // Lip Care Section
                echo '<div class="mega-menu-section">';
                echo '<div class="mega-menu-title">Lip Care</div>';
                echo '<div class="mega-menu-links">';
                echo '<a href="#">Lip Butters</a>';
                echo '<a href="#">Lip Balms</a>';
                echo '<a href="#">Lip Scrubs</a>';
                echo '<a href="#">Lip Oils</a>';
                echo '</div>';
                echo '</div>';

                // Collections Section
                echo '<div class="mega-menu-section">';
                echo '<div class="mega-menu-title">Collections</div>';
                echo '<div class="mega-menu-links">';
                echo '<a href="#">Gift Sets</a>';
                echo '<a href="#">Travel Size</a>';
                echo '<a href="#">Seasonal</a>';
                echo '<a href="#">Limited Edition</a>';
                echo '<a href="#">Best Sellers</a>';
                echo '</div>';
                echo '</div>';

                // Featured Section
                echo '<div class="mega-menu-featured">';
                echo '<div class="mega-menu-featured-title">Featured Products</div>';
                echo '<div class="mega-menu-featured-grid">';

                echo '<div class="mega-menu-featured-item">';
                echo '<img src="' . get_template_directory_uri() . '/images/Singles/Bath Bombs/bath-bomb-1.jpg" alt="Bath Bombs">';
                echo '<h4>NEW Bath Bombs</h4>';
                echo '<p>Luxurious aromatherapy</p>';
                echo '</div>';

                echo '<div class="mega-menu-featured-item">';
                echo '<img src="' . get_template_directory_uri() . '/images/Singles/Polish/polish-1.jpg" alt="Facial Polish">';
                echo '<h4>Facial Polish</h4>';
                echo '<p>Gentle exfoliation</p>';
                echo '</div>';

                echo '<div class="mega-menu-featured-item">';
                echo '<img src="' . get_template_directory_uri() . '/images/Singles/Lip Butters/lip-butter-1.jpg" alt="Lip Butters">';
                echo '<h4>Lip Butters</h4>';
                echo '<p>Nourishing care</p>';
                echo '</div>';

                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</li>';

                // Gift Card page
                $gift_card_page = get_page_by_title('Gift Card');
                if ($gift_card_page) {
                    echo '<li><a href="' . esc_url(get_permalink($gift_card_page->ID)) . '">' . __('Gift Card', 'mellluxe') . '</a></li>';
                }
            }

            // About Us page
            $about_page = get_page_by_title('About Us');
            if ($about_page) {
                echo '<li><a href="' . esc_url(get_permalink($about_page->ID)) . '">' . __('About Us', 'mellluxe') . '</a></li>';
            }

            // Blog page
            if (get_option('page_for_posts')) {
                echo '<li><a href="' . esc_url(get_permalink(get_option('page_for_posts'))) . '">' . __('Blog', 'mellluxe') . '</a></li>';
            } else {
                echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . __('Blog', 'mellluxe') . '</a></li>';
            }

            echo '</ul>';
        }
        ?>