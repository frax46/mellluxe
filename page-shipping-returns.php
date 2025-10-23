<?php
/**
 * Template Name: Shipping and returns
 * 
 * This is a custom template for the Privacy Policy page
 * that users can access from the cookie consent banner.
 */

                            
                            
                            
get_header(); ?>

<div class="privacy-policy-page">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle">Last updated: <?php echo date('F j, Y'); ?></p>
        </header>

        <div class="page-content">
            <section class="policy-section">
            <?php
            // Display the WordPress page content
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
            </section>
        </div>
    </div>
</div>

<style>
.privacy-policy-page {
    padding: 120px 0 80px;
    background: var(--primary-color);
    min-height: 100vh;
}

.container {
    max-width: var(--max-width);
    margin: 0 auto;
    padding: 0 2rem;
}

.page-header {
    text-align: center;
    margin-bottom: 4rem;
}

.page-title {
    color: var(--secondary-color);
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    font-family: var(--font-serif);
}

.page-subtitle {
    color: var(--text-muted);
    font-size: 1.1rem;
}

.policy-section {
    margin-bottom: 3rem;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--border-radius);
    border: 1px solid var(--border-light);
}

.policy-section h2 {
    color: var(--secondary-color);
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    font-family: var(--font-serif);
}

.policy-section p {
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 1rem;
}

.policy-section ul {
    color: var(--text-light);
    margin-left: 2rem;
    margin-bottom: 1rem;
}

.policy-section li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}


.contact-info p {
    margin-bottom: 0.5rem;
}
.policy-section{
    a{
        color: var(--secondary-color);
    }
}

@media (max-width: 768px) {
    .privacy-policy-page {
        padding: 100px 0 60px;
    }
    
    .page-title {
        font-size: 2.5rem;
    }
    
    .policy-section {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .container {
        padding: 0 1rem;
    }
}
</style>

<?php get_footer(); ?>