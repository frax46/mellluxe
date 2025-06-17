<?php
/**
 * Mell Luxe Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function mellluxe_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    
    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mellluxe'),
        'footer' => __('Footer Menu', 'mellluxe'),
    ));
    
    // Set content width
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'mellluxe_setup');

/**
 * Enqueue scripts and styles
 */
function mellluxe_scripts() {
    // Theme stylesheet
    wp_enqueue_style('mellluxe-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('mellluxe-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap', array(), null);
    
    // GSAP CDN
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true);
    
    // Theme JavaScript
    wp_enqueue_script('mellluxe-script', get_template_directory_uri() . '/js/theme.js', array('gsap', 'gsap-scrolltrigger'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('mellluxe-script', 'mellluxe_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mellluxe_nonce')
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mellluxe_scripts');

/**
 * Register widget area
 */
function mellluxe_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'mellluxe'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'mellluxe'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'mellluxe'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in the footer.', 'mellluxe'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'mellluxe_widgets_init');

/**
 * Custom logo setup
 */
function mellluxe_custom_logo_setup() {
    $defaults = array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'mellluxe_custom_logo_setup');

/**
 * Customize excerpt length
 */
function mellluxe_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'mellluxe_excerpt_length');

/**
 * Customize excerpt more
 */
function mellluxe_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'mellluxe_excerpt_more');

/**
 * WooCommerce customizations
 */
if (class_exists('WooCommerce')) {
    
    // Remove WooCommerce default styles
    add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    
    // Modify WooCommerce product loop
    function mellluxe_woocommerce_output_product_data_tabs() {
        wc_get_template('single-product/tabs/tabs.php');
    }
    
    // Custom WooCommerce cart link
    function mellluxe_cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'mellluxe'); ?>">
            <span class="cart-icon">🛒</span>
            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </a>
        <?php
    }
    
    // Update cart count via AJAX
    function mellluxe_add_to_cart_fragment($fragments) {
        ob_start();
        mellluxe_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter('woocommerce_add_to_cart_fragments', 'mellluxe_add_to_cart_fragment');
    
    // Customize WooCommerce columns
    function mellluxe_loop_columns() {
        return 3;
    }
    add_filter('loop_shop_columns', 'mellluxe_loop_columns');
    
    // Customize products per page
    function mellluxe_products_per_page() {
        return 12;
    }
    add_filter('loop_shop_per_page', 'mellluxe_products_per_page');
}

/**
 * AJAX handlers
 */
function mellluxe_load_more_products() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    $page = intval($_POST['page']);
    $posts_per_page = intval($_POST['posts_per_page']);
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'post_status' => 'publish'
    );
    
    $products = new WP_Query($args);
    
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
    }
    
    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_more_products', 'mellluxe_load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'mellluxe_load_more_products');

/**
 * Contact form handler
 */
function mellluxe_contact_form_handler() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill all fields.');
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }
    
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission - ' . get_bloginfo('name');
    $body = "Name: {$name}\nEmail: {$email}\nMessage: {$message}";
    $headers = array('Content-Type: text/plain; charset=UTF-8', "From: {$email}");
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Thank you for your message! We will get back to you soon.');
    } else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again.');
    }
}
add_action('wp_ajax_contact_form', 'mellluxe_contact_form_handler');
add_action('wp_ajax_nopriv_contact_form', 'mellluxe_contact_form_handler');

/**
 * Add custom body classes
 */
function mellluxe_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'front-page-template';
    }
    
    if (class_exists('WooCommerce') && is_woocommerce()) {
        $classes[] = 'woocommerce-page';
    }
    
    return $classes;
}
add_filter('body_class', 'mellluxe_body_classes');

/**
 * Customizer settings
 */
function mellluxe_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('mellluxe_hero', array(
        'title' => __('Hero Section', 'mellluxe'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'At Mell Luxe...',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'mellluxe'),
        'section' => 'mellluxe_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_description', array(
        'default' => '... nature meets luxury in every handcrafted product.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'mellluxe'),
        'section' => 'mellluxe_hero',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Hero Image', 'mellluxe'),
        'section' => 'mellluxe_hero',
    )));
    
    // Contact section
    $wp_customize->add_section('mellluxe_contact', array(
        'title' => __('Contact Information', 'mellluxe'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'mellluxe.info@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'mellluxe'),
        'section' => 'mellluxe_contact',
        'type' => 'email',
    ));
}
add_action('customize_register', 'mellluxe_customize_register');

/**
 * Add theme options page
 */
function mellluxe_add_admin_page() {
    add_theme_page(
        'Mell Luxe Theme Options',
        'Theme Options',
        'manage_options',
        'mellluxe-options',
        'mellluxe_admin_page'
    );
}
add_action('admin_menu', 'mellluxe_add_admin_page');

function mellluxe_admin_page() {
    ?>
    <div class="wrap">
        <h1>Mell Luxe Theme Options</h1>
        <p>Welcome to the Mell Luxe theme! This theme includes GSAP animations, scroll snapping, and full WooCommerce integration.</p>
        <h2>Features:</h2>
        <ul>
            <li>✅ GSAP ScrollTrigger animations</li>
            <li>✅ Snap-to-section scrolling</li>
            <li>✅ Responsive design</li>
            <li>✅ WooCommerce ready</li>
            <li>✅ Contact form with AJAX</li>
            <li>✅ Customizer integration</li>
        </ul>
        <p>Customize your site using the <a href="<?php echo admin_url('customize.php'); ?>">WordPress Customizer</a>.</p>
    </div>
    <?php
}

/**
 * Security enhancements
 */
function mellluxe_remove_version() {
    return '';
}
add_filter('the_generator', 'mellluxe_remove_version');

// Remove WordPress version from scripts and styles
function mellluxe_remove_wp_version_strings($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'mellluxe_remove_wp_version_strings', 15, 1);
add_filter('style_loader_src', 'mellluxe_remove_wp_version_strings', 15, 1);

/**
 * Cart AJAX handlers
 */
// Get cart contents for sidebar
function mellluxe_get_cart_contents() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error('WooCommerce not active');
        return;
    }
    
    $cart = WC()->cart;
    $cart_items = $cart->get_cart();
    
    if (empty($cart_items)) {
        wp_send_json_success([
            'html' => '<div class="cart-empty">
                        <div class="cart-empty-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4>Your cart is empty</h4>
                        <p>Add some products to get started!</p>
                       </div>',
            'total' => wc_price(0),
            'cart_count' => 0
        ]);
        return;
    }
    
    $html = '';
    foreach ($cart_items as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];
        
        $product_name = $product->get_name();
        $product_price = WC()->cart->get_product_price($product);
        $product_permalink = $product->get_permalink($cart_item);
        $thumbnail = $product->get_image('thumbnail');
        
        $html .= '<div class="cart-item">';
        $html .= '<div class="cart-item-image">';
        $html .= '<a href="' . esc_url($product_permalink) . '">' . $thumbnail . '</a>';
        $html .= '</div>';
        $html .= '<div class="cart-item-details">';
        $html .= '<h4 class="cart-item-name"><a href="' . esc_url($product_permalink) . '">' . esc_html($product_name) . '</a></h4>';
        $html .= '<div class="cart-item-price">' . $product_price . '</div>';
        $html .= '<div class="cart-item-quantity">Qty: ' . $quantity . '</div>';
        $html .= '<div class="quantity-controls">';
        $html .= '<button class="quantity-btn" data-cart-key="' . $cart_item_key . '" data-action="decrease">-</button>';
        $html .= '<input type="number" class="quantity-input" value="' . $quantity . '" min="1" readonly>';
        $html .= '<button class="quantity-btn" data-cart-key="' . $cart_item_key . '" data-action="increase">+</button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<button class="cart-item-remove" data-cart-key="' . $cart_item_key . '">';
        $html .= '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
        $html .= '<path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
        $html .= '</svg>';
        $html .= '</button>';
        $html .= '</div>';
    }
    
    wp_send_json_success([
        'html' => $html,
        'total' => $cart->get_cart_subtotal(),
        'cart_count' => $cart->get_cart_contents_count()
    ]);
}
add_action('wp_ajax_get_cart_contents', 'mellluxe_get_cart_contents');
add_action('wp_ajax_nopriv_get_cart_contents', 'mellluxe_get_cart_contents');

// Remove cart item
function mellluxe_remove_cart_item() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error('WooCommerce not active');
        return;
    }
    
    $cart_key = sanitize_text_field($_POST['cart_key']);
    
    if (WC()->cart->remove_cart_item($cart_key)) {
        wp_send_json_success([
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'total' => WC()->cart->get_cart_subtotal()
        ]);
    } else {
        wp_send_json_error('Failed to remove item');
    }
}
add_action('wp_ajax_remove_cart_item', 'mellluxe_remove_cart_item');
add_action('wp_ajax_nopriv_remove_cart_item', 'mellluxe_remove_cart_item');

// Update cart item quantity
function mellluxe_update_cart_item_quantity() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error('WooCommerce not active');
        return;
    }
    
    $cart_key = sanitize_text_field($_POST['cart_key']);
    $quantity = intval($_POST['quantity']);
    
    if ($quantity <= 0) {
        wp_send_json_error('Invalid quantity');
        return;
    }
    
    if (WC()->cart->set_quantity($cart_key, $quantity)) {
        wp_send_json_success([
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'total' => WC()->cart->get_cart_subtotal()
        ]);
    } else {
        wp_send_json_error('Failed to update quantity');
    }
}
add_action('wp_ajax_update_cart_item_quantity', 'mellluxe_update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'mellluxe_update_cart_item_quantity');

// Get cart count
function mellluxe_get_cart_count() {
    check_ajax_referer('mellluxe_nonce', 'nonce');
    
    if (!class_exists('WooCommerce')) {
        wp_send_json_error('WooCommerce not active');
        return;
    }
    
    wp_send_json_success([
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);
}
add_action('wp_ajax_get_cart_count', 'mellluxe_get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'mellluxe_get_cart_count'); 