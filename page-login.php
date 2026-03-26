<?php
/*
 * Template Name: Login Page
 * Description: Custom login page for Mell Luxe theme
 */
get_header(); ?>

<div class="login-page-container"
    style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);">
    <div class="login-card"
        style="background:white;padding:48px 32px 32px 32px;border-radius:24px;box-shadow:0 8px 40px rgba(37,23,70,0.18);max-width:400px;width:100%;text-align:center;">
        <img src="<?php echo get_template_directory_uri(); ?>/images/System Images/new-logo.png" alt="Mell Luxe Logo"
            style="width:64px;height:64px;object-fit:contain;margin-bottom:16px;">
        <h2 style="color:var(--primary-color);font-weight:300;font-size:2.2rem;margin-bottom:8px;letter-spacing:2px;">
            Welcome Back</h2>
        <p style="color:#443764;font-size:1rem;margin-bottom:24px;">Sign in to your Mell Luxe account</p>
        <?php
        if ( is_user_logged_in() ) {
            echo '<p style="color:#443764;margin-bottom:16px;">' . esc_html__( 'You are already signed in.', 'mellluxeV4' ) . '</p>';
            echo '<a href="' . esc_url( home_url( '/my-account/' ) ) . '" class="mellluxe-login-logout" style="display:inline-block;margin-top:8px;">' . esc_html__( 'Go to My Account', 'mellluxeV4' ) . '</a>';
            echo '<span style="display:inline-block;margin:0 8px;color:#9b93ad;">|</span>';
            echo '<a href="' . esc_url( wp_logout_url( home_url( '/login/' ) ) ) . '" class="mellluxe-login-logout" style="display:inline-block;margin-top:8px;">' . esc_html__( 'Log out', 'mellluxeV4' ) . '</a>';
        } else {
            $login_markup = '';

            if ( function_exists( 'UM' ) && is_object( UM() ) ) {
                // Uses Ultimate Member default login form; some UM setups return links only.
                $login_markup = do_shortcode( '[ultimatemember_login]' );
            }

            $has_form_markup = ! empty( $login_markup ) && false !== stripos( $login_markup, '<form' );

            if ( $has_form_markup ) {
                echo $login_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            } else {
                echo '<div class="mellluxe-wp-login-wrap">';
                wp_login_form(
                    array(
                        'redirect'       => home_url( '/' ),
                        'form_id'        => 'mellluxe-wp-login',
                        'label_username' => __( 'Username or Email Address', 'mellluxeV4' ),
                        'label_password' => __( 'Password', 'mellluxeV4' ),
                        'label_remember' => __( 'Remember Me', 'mellluxeV4' ),
                        'label_log_in'   => __( 'Log In', 'mellluxeV4' ),
                    )
                );
                echo '</div>';
            }
        }
        ?>
        <div style="margin-top:24px;font-size:0.95rem;color:#443764;">
            <span>Don't have an account?</span>
            <a href="/register"
                style="color:var(--secondary-color);font-weight:600;text-decoration:none;margin-left:6px;">Register</a>
        </div>
    </div>
</div>

<style>
    .login-page-container {
        background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: #fff;
        padding: 48px 32px 32px 32px;
        border-radius: 24px;
        box-shadow: 0 8px 40px rgba(37, 23, 70, 0.18);
        max-width: 400px;
        width: 100%;
        text-align: center;
        position: relative;
    }

    .login-card img {
        width: 64px;
        height: 64px;
        object-fit: contain;
        margin-bottom: 16px;
    }

    .login-card h2 {
        color: var(--primary-color);
        font-weight: 300;
        font-size: 2.2rem;
        margin-bottom: 8px;
        letter-spacing: 2px;
    }

    .login-card p {
        color: #443764;
        font-size: 1rem;
        margin-bottom: 24px;
    }

    .login-card a {
        color: var(--secondary-color);
        font-weight: 600;
        text-decoration: none;
        margin-left: 6px;
    }

    .login-card a:hover {
        text-decoration: underline;
    }

    .login-card {
        margin: 93px 0px;
    }

    .login-card ul.um-misc-ul {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 32px;
        margin-bottom: 0;
        padding-left: 0;
    }
    .login-card ul.um-misc-ul li {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .login-card ul.um-misc-ul a {
        display: inline-block;
        background: linear-gradient(135deg, var(--secondary-color) 60%, #ffe9a7 100%);
        color: var(--primary-color) !important;
        font-weight: 600;
        border-radius: 50px;
        padding: 10px 28px;
        text-decoration: none;
        font-size: 0.8rem;
        box-shadow: 0 2px 12px rgba(253, 226, 141, 0.10);
        transition: all 0.2s;
        border: 2px solid var(--secondary-color);
    }
    .login-card ul.um-misc-ul a:hover {
        background: var(--primary-color);
        color: var(--secondary-color) !important;
        border: 2px solid var(--secondary-color);
        text-decoration: none;
        transform: translateY(-2px) scale(1.04);
        box-shadow: 0 6px 24px rgba(253, 226, 141, 0.18);
    }

    .login-card .mellluxe-wp-login-wrap {
        text-align: left;
    }

    .login-card .mellluxe-wp-login-wrap label {
        display: block;
        color: #443764;
        font-size: 0.9rem;
        margin-bottom: 6px;
        font-weight: 600;
    }

    .login-card .mellluxe-wp-login-wrap input[type="text"],
    .login-card .mellluxe-wp-login-wrap input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
        margin-bottom: 14px;
        box-sizing: border-box;
    }

    .login-card .mellluxe-wp-login-wrap .login-remember {
        margin-bottom: 16px;
    }

    .login-card .mellluxe-wp-login-wrap .login-remember label {
        display: inline;
        font-weight: 500;
        margin-left: 6px;
    }

    .login-card .mellluxe-wp-login-wrap input[type="submit"] {
        width: 100%;
        padding: 12px 20px;
        background: linear-gradient(135deg, var(--secondary-color) 60%, #ffe9a7 100%);
        color: var(--primary-color);
        font-weight: 600;
        border: 2px solid var(--secondary-color);
        border-radius: 50px;
        cursor: pointer;
        font-size: 1rem;
    }

    .login-card .mellluxe-wp-login-wrap input[type="submit"]:hover {
        filter: brightness(1.02);
    }

    .login-card .mellluxe-login-logout {
        color: var(--secondary-color);
        font-weight: 600;
        text-decoration: none;
    }

    .login-card .mellluxe-login-logout:hover {
        text-decoration: underline;
    }

    @media(max-width: 1200px) {
        .login-card {
            margin: 20px 0px;
        }
    }

    @media (max-width: 500px) {
        .login-card {
            padding: 32px 8px 24px 8px;
            border-radius: 16px;
        }

        .login-card h2 {
            font-size: 1.4rem;
        }
    }
</style>

<?php get_footer(); ?>