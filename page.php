<?php
/**
 * The template for displaying all standard pages
 *
 * @package Mell Luxe
 */
get_header(); ?>

<div class="page-hero-section" style="background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%); padding: 80px 0 40px 0; text-align: center;">
    <h1 class="page-title" style="color: var(--secondary-color); font-size: 3rem; font-weight: 300; letter-spacing: 2px; margin-bottom: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
        <?php the_title(); ?>
    </h1>
</div>

<div class="page-content-container" style="max-width: 900px; margin: -40px auto 60px auto; background: #fff; border-radius: 24px; box-shadow: 0 8px 40px rgba(37,23,70,0.10); padding: 48px 32px; position: relative; z-index: 2;">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</div>

<style>
.page-hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    padding: 80px 0 40px 0;
    text-align: center;
}
.page-title {
    color: var(--secondary-color);
    font-size: 3rem;
    font-weight: 300;
    letter-spacing: 2px;
    margin-bottom: 0;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}
.page-content-container {
    max-width: 900px;
    margin: -40px auto 60px auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 8px 40px rgba(37,23,70,0.10);
    padding: 48px 32px;
    position: relative;
    z-index: 2;
}
.page-content-container h2, .page-content-container h3, .page-content-container h4 {
    color: var(--primary-color);
    font-weight: 600;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
}
.page-content-container p, .page-content-container ul, .page-content-container ol {
    color: #443764;
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 1.5rem;
}
.page-content-container ul, .page-content-container ol {
    padding-left: 1.5rem;
}
@media (max-width: 700px) {
    .page-content-container {
        padding: 24px 8px;
        border-radius: 14px;
    }
    .page-title {
        font-size: 2rem;
    }
}
</style>

<?php get_footer(); ?> 