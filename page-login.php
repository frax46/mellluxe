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
        <?php echo do_shortcode('[ultimatemember form_id="154"]'); ?>
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