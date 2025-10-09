<?php
/**
 * The template for displaying the My Account page.
 *
 * This template uses a modern flat design with the site's color scheme,
 * featuring a clean sidebar navigation and main content area.
 *
 * @package Mell Luxe
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<style>
/* My Account Page Styles */
.my-account-page-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
    margin-top: 80px;
}

.my-account-hero {
    background: linear-gradient(135deg, #251746 0%, #2a1a4f 100%);
    padding: 3rem 0 2rem 0;
    text-align: center;
    margin-bottom: 2rem;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.my-account-title {
    color: #FDE28D;
    font-size: 2.5rem;
    font-weight: 300;
    letter-spacing: 2px;
    margin-bottom: 0.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}

.my-account-subtitle {
    color: #dcd1f3;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
    opacity: 0.9;
}

.my-account-layout {
    display: grid !important;
    grid-template-columns: 280px 1fr !important;
    gap: 2rem !important;
    align-items: start !important;
    margin-top: 2rem !important;
}

.my-account-sidebar {
    background: #ffffff !important;
    border-radius: 12px !important;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1) !important;
    padding: 0 !important;
    position: sticky !important;
    top: 100px !important;
    width: 280px !important;
    flex-shrink: 0 !important;
}

.account-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.account-menu-item {
    margin: 0;
    border-bottom: 1px solid #f5f5f5;
}

.account-menu-item:last-child {
    border-bottom: none;
}

.account-menu-item.is-active {
    background: linear-gradient(135deg, #FDE28D 0%, #f5e67a 100%);
}

.account-menu-link {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    text-decoration: none;
    color: #251746;
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    position: relative;
}

.account-menu-link:hover {
    background: rgba(253, 226, 141, 0.1);
    color: #251746;
    transform: translateX(4px);
}

.menu-icon {
    margin-right: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.menu-icon svg {
    stroke: #6B7280;
    transition: all 0.3s ease;
}

.menu-label {
    flex: 1;
}

.my-account-content {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.account-content-wrapper {
    padding: 2rem;
}

/* Form Styling */
.woocommerce-account .woocommerce-form-row {
    margin-bottom: 1.5rem;
}

.woocommerce-account .woocommerce-form-row label {
    display: block;
    color: #251746;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.woocommerce-account .woocommerce-form-row input.input-text,
.woocommerce-account .woocommerce-form-row textarea,
.woocommerce-account .woocommerce-form-row select {
    width: 100%;
    background: #ffffff;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    color: #251746;
    transition: all 0.3s ease;
    font-family: 'Montserrat', sans-serif;
}

.woocommerce-account .woocommerce-form-row input.input-text:focus,
.woocommerce-account .woocommerce-form-row textarea:focus,
.woocommerce-account .woocommerce-form-row select:focus {
    border-color: #FDE28D;
    box-shadow: 0 0 0 3px rgba(253, 226, 141, 0.2);
    outline: none;
    background: rgba(253, 226, 141, 0.05);
}

.woocommerce-account .woocommerce-form-row .woocommerce-Button,
.woocommerce-account .woocommerce-form-row .button {
    background: linear-gradient(135deg, #FDE28D 0%, #f5e67a 100%);
    color: #251746;
    border: none;
    border-radius: 8px;
    padding: 0.875rem 2rem;
    font-weight: 600;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-block;
    text-decoration: none;
    text-align: center;
    min-width: 140px;
}

.woocommerce-account .woocommerce-form-row .woocommerce-Button:hover,
.woocommerce-account .woocommerce-form-row .button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(253, 226, 141, 0.4);
    background: linear-gradient(135deg, #f5e67a 0%, #FDE28D 100%);
}

.woocommerce-account h3 {
    color: #251746;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #FDE28D;
    display: inline-block;
}
</style>

<div id="primary" class="content-area my-account-page-container">
    <main id="main" class="site-main" role="main">
        
        <div class="my-account-hero">
            <div class="my-account-hero-content">
                <h1 class="my-account-title"><?php esc_html_e( 'My Account', 'mellluxe' ); ?></h1>
                <p class="my-account-subtitle"><?php esc_html_e( 'Manage your account settings and preferences', 'mellluxe' ); ?></p>
            </div>
        </div>

        <div class="my-account-layout">
            <div class="my-account-sidebar">
                <nav class="my-account-navigation">
                    <ul class="account-menu">
                        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                            <li class="account-menu-item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="account-menu-link">
                                    <span class="menu-icon">
                                        <?php
                                        // Add icons for each menu item
                                        switch ( $endpoint ) {
                                            case 'dashboard':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>';
                                                break;
                                            case 'orders':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg>';
                                                break;
                                            case 'downloads':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7,10 12,15 17,10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>';
                                                break;
                                            case 'edit-address':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
                                                break;
                                            case 'edit-account':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';
                                                break;
                                            case 'customer-logout':
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16,17 21,12 16,7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>';
                                                break;
                                            default:
                                                echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/></svg>';
                                        }
                                        ?>
                                    </span>
                                    <span class="menu-label"><?php echo esc_html( $label ); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>

            <div class="my-account-content">
                <div class="account-content-wrapper">
                    <?php
                    do_action( 'woocommerce_account_content' );
                    ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
