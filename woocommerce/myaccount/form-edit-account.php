<?php
/**
 * The template for displaying the account details form.
 *
 * @package Mell Luxe
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_account_edit_account_start' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

    <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

    <div class="account-details-section">
        <h3><?php esc_html_e( 'Personal Information', 'mellluxe' ); ?></h3>
        
        <div class="form-row-group">
            <div class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="account_first_name"><?php esc_html_e( 'First name', 'mellluxe' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
            </div>
            <div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                <label for="account_last_name"><?php esc_html_e( 'Last name', 'mellluxe' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
            </div>
        </div>

        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_display_name"><?php esc_html_e( 'Display name', 'mellluxe' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
            <span class="description"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'mellluxe' ); ?></span>
        </div>

        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_email"><?php esc_html_e( 'Email address', 'mellluxe' ); ?>&nbsp;<span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
        </div>
    </div>

    <div class="password-change-section">
        <h3><?php esc_html_e( 'Password change', 'mellluxe' ); ?></h3>
        
        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'mellluxe' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
        </div>
        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'mellluxe' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
        </div>
        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password_2"><?php esc_html_e( 'Confirm new password', 'mellluxe' ); ?></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
        </div>
    </div>

    <?php do_action( 'woocommerce_edit_account_form' ); ?>

    <div class="form-actions">
        <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
        <button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'mellluxe' ); ?>"><?php esc_html_e( 'Save changes', 'mellluxe' ); ?></button>
        <input type="hidden" name="action" value="save_account_details" />
    </div>

    <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_account_edit_account_end' ); ?>

<style>
/* Account Details Form Styles */
.account-details-section,
.password-change-section {
    background: #f9fafb;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    border: 1px solid #e5e7eb;
}

.account-details-section h3,
.password-change-section h3 {
    color: var(--primary-color);
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--secondary-color);
    display: inline-block;
}

.form-row-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

.woocommerce-form-row {
    margin-bottom: 1rem;
}

.woocommerce-form-row:last-child {
    margin-bottom: 0;
}

.woocommerce-form-row label {
    display: block;
    color: var(--primary-color);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.woocommerce-form-row .required {
    color: #ef4444;
}

.woocommerce-form-row input.input-text {
    width: 100%;
    background: #ffffff;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    color: var(--primary-color);
    transition: all 0.3s ease;
    font-family: var(--font-primary);
}

.woocommerce-form-row input.input-text:focus {
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 3px rgba(253, 226, 141, 0.2);
    outline: none;
    background: rgba(253, 226, 141, 0.05);
}

.woocommerce-form-row .description {
    display: block;
    color: var(--text-secondary, #6B7280);
    font-size: 0.85rem;
    font-style: italic;
    margin-top: 0.25rem;
}

.form-actions {
    text-align: center;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.form-actions .woocommerce-Button {
    background: linear-gradient(135deg, var(--secondary-color) 0%, #f5e67a 100%);
    color: var(--primary-color);
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
    min-width: 160px;
}

.form-actions .woocommerce-Button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(253, 226, 141, 0.4);
    background: linear-gradient(135deg, #f5e67a 0%, var(--secondary-color) 100%);
}

.form-actions .woocommerce-Button:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-row-group {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .account-details-section,
    .password-change-section {
        padding: 1rem;
    }
    
    .woocommerce-form-row input.input-text {
        padding: 0.75rem;
    }
}

@media (max-width: 480px) {
    .form-actions .woocommerce-Button {
        width: 100%;
        padding: 1rem 2rem;
    }
}
</style>
