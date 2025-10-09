<?php
/**
 * The template for displaying the account dashboard.
 *
 * @package Mell Luxe
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="woocommerce-dashboard">
    <div class="dashboard-welcome">
        <h2><?php esc_html_e( 'Welcome back!', 'mellluxe' ); ?></h2>
        <p><?php esc_html_e( 'Here\'s what\'s happening with your account.', 'mellluxe' ); ?></p>
    </div>

    <div class="dashboard-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3><?php esc_html_e( 'Total Orders', 'mellluxe' ); ?></h3>
                <p class="stat-number"><?php echo esc_html( wc_get_customer_order_count( get_current_user_id() ) ); ?></p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7,10 12,15 17,10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3><?php esc_html_e( 'Downloads', 'mellluxe' ); ?></h3>
                <p class="stat-number"><?php 
                    $downloads = wc_get_customer_available_downloads( get_current_user_id() );
                    echo esc_html( count( $downloads ) ); 
                ?></p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3><?php esc_html_e( 'Account Status', 'mellluxe' ); ?></h3>
                <p class="stat-text"><?php esc_html_e( 'Active', 'mellluxe' ); ?></p>
            </div>
        </div>
    </div>

    <div class="dashboard-recent">
        <h3><?php esc_html_e( 'Recent Orders', 'mellluxe' ); ?></h3>
        <?php
        $customer_orders = wc_get_orders( array(
            'customer' => get_current_user_id(),
            'status'   => array( 'wc-completed', 'wc-processing', 'wc-on-hold' ),
            'limit'    => 3,
        ) );

        if ( $customer_orders ) :
        ?>
            <div class="recent-orders">
                <?php foreach ( $customer_orders as $order ) : ?>
                    <div class="order-item">
                        <div class="order-info">
                            <h4><?php echo esc_html( sprintf( __( 'Order #%s', 'mellluxe' ), $order->get_order_number() ) ); ?></h4>
                            <p class="order-date"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></p>
                        </div>
                        <div class="order-status">
                            <span class="status-badge status-<?php echo esc_attr( $order->get_status() ); ?>">
                                <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                            </span>
                        </div>
                        <div class="order-total">
                            <strong><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
                        </div>
                        <div class="order-actions">
                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="view-order-btn">
                                <?php esc_html_e( 'View', 'mellluxe' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="no-orders"><?php esc_html_e( 'You haven\'t placed any orders yet.', 'mellluxe' ); ?></p>
        <?php endif; ?>
    </div>
</div>

<style>
/* Dashboard Styles */
.woocommerce-dashboard {
    padding: 0;
}

.dashboard-welcome {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid var(--secondary-color);
}

.dashboard-welcome h2 {
    color: var(--primary-color);
    font-size: 1.75rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.dashboard-welcome p {
    color: var(--text-secondary, #6B7280);
    font-size: 1rem;
    margin: 0;
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--secondary-color);
}

.stat-icon {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #f5e67a 100%);
    border-radius: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.stat-icon svg {
    stroke: var(--primary-color);
    width: 24px;
    height: 24px;
}

.stat-content h3 {
    color: var(--primary-color);
    font-size: 0.9rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-number {
    color: var(--primary-color);
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
}

.stat-text {
    color: var(--secondary-color);
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}

.dashboard-recent h3 {
    color: var(--primary-color);
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.recent-orders {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.order-item {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 1.25rem;
    display: grid;
    grid-template-columns: 1fr auto auto auto;
    gap: 1rem;
    align-items: center;
    transition: all 0.3s ease;
}

.order-item:hover {
    border-color: var(--secondary-color);
    box-shadow: 0 4px 15px rgba(253, 226, 141, 0.2);
}

.order-info h4 {
    color: var(--primary-color);
    font-size: 1rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
}

.order-date {
    color: var(--text-secondary, #6B7280);
    font-size: 0.85rem;
    margin: 0;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-completed {
    background: #10b981;
    color: #ffffff;
}

.status-processing {
    background: var(--secondary-color);
    color: var(--primary-color);
}

.status-on-hold {
    background: #f59e0b;
    color: #ffffff;
}

.order-total {
    color: var(--primary-color);
    font-size: 1rem;
}

.view-order-btn {
    background: var(--secondary-color);
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.view-order-btn:hover {
    background: var(--primary-color);
    color: var(--secondary-color);
    transform: translateY(-1px);
}

.no-orders {
    text-align: center;
    color: var(--text-secondary, #6B7280);
    font-style: italic;
    padding: 2rem;
    background: #f9fafb;
    border-radius: 8px;
    border: 2px dashed #e5e7eb;
}

@media (max-width: 768px) {
    .dashboard-stats {
        grid-template-columns: 1fr;
    }
    
    .order-item {
        grid-template-columns: 1fr;
        gap: 0.75rem;
        text-align: center;
    }
    
    .order-info,
    .order-status,
    .order-total,
    .order-actions {
        justify-self: center;
    }
}
</style>
