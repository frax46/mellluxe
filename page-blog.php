<?php
/**
 * Template Name: Blog Page
 * The template for displaying the Blog page
 */

get_header(); ?>

<div class="blog-page-container">

    <!-- Blog Hero Section -->
    <section class="blog-hero-section">
        <div class="container">
            <div class="blog-hero-content">
                <h1 class="blog-hero-title">Beauty, Wellness & Sustainability</h1>
                <p class="blog-hero-subtitle">Explore our world of natural beauty secrets, sustainable living tips, and
                    wellness wisdom. From skincare routines to eco-friendly practices, discover insights that nurture
                    both you and the planet.</p>

                <!-- Blog Search -->
                <div class="blog-search-container">
                    <form class="blog-search-form" role="search" method="get"
                        action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-input-group">
                            <input type="search" class="blog-search-input"
                                placeholder="Search beauty tips, recipes, sustainability..."
                                value="<?php echo get_search_query(); ?>" name="s" />
                            <button type="submit" class="blog-search-button">Discover</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content Section -->
    <section class="blog-content-section">
        <div class="container">
            <div class="blog-layout">

                <!-- Main Blog Posts -->
                <div class="blog-main">

                    <!-- Featured Section Title -->
                    <div class="blog-section-header">
                        <h2 class="blog-section-title">Natural Beauty & Wellness Stories</h2>
                    </div>

                    <!-- Blog Posts Grid -->
                    <div class="blog-posts-grid">
                        <?php
                        // Query for blog posts
                        $blog_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                            'post_status' => 'publish'
                        ));

                        if ($blog_query->have_posts()):
                            $post_count = 0;
                            while ($blog_query->have_posts()):
                                $blog_query->the_post();
                                $post_count++;
                                $post_class = '';

                                // Assign different sizes based on position
                                if ($post_count == 1) {
                                    $post_class = 'blog-post-large';
                                } elseif ($post_count == 2 || $post_count == 3) {
                                    $post_class = 'blog-post-medium';
                                } else {
                                    $post_class = 'blog-post-small';
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>" class="blog-post-link-wrapper">
                                    <article class="blog-post-item <?php echo $post_class; ?>">
                                        <div class="blog-post-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } else {
                                                echo 'Beauty & Wellness';
                                            }
                                            ?>
                                        </div>
                                        <div class="blog-post-content">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="blog-post-image">
                                                    <?php the_post_thumbnail('large', array('class' => 'post-thumbnail')); ?>
                                                    <div class="blog-post-overlay">
                                                        <h3 class="blog-post-title">
                                                            <?php echo esc_html(wp_trim_words(get_the_title(), 10, '...')); ?>
                                                        </h3>
                                                        <p class="blog-post-excerpt">
                                                            <?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="blog-post-no-image">
                                                    <div class="blog-post-overlay">
                                                        <div class="blog-post-category">Beauty & Wellness</div>
                                                        <h3 class="blog-post-title">
                                                            <?php the_title(); ?>
                                                        </h3>
                                                        <p class="blog-post-excerpt">
                                                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </a>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            ?>
                            <!-- Demo Content if no posts exist -->
                            <article class="blog-post-item blog-post-large">
                                <div class="blog-post-content">
                                    <div class="blog-post-image demo-post">
                                        <div class="blog-post-overlay">
                                            <div class="blog-post-category">Beauty & Wellness</div>
                                            <h3 class="blog-post-title">
                                                <a href="#">The Ultimate Guide to Natural Skincare: 10 Essential
                                                    Ingredients</a>
                                            </h3>
                                            <p class="blog-post-excerpt">
                                                Unlock the secrets of radiant skin with nature's most powerful ingredients.
                                                From hyaluronic acid to botanical extracts, discover what your skin truly
                                                needs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="blog-post-item blog-post-medium">
                                <div class="blog-post-content">
                                    <div class="blog-post-image demo-post-2">
                                        <div class="blog-post-overlay">
                                            <div class="blog-post-category">Sustainability</div>
                                            <h3 class="blog-post-title">
                                                <a href="#">Zero Waste Beauty: 15 Eco-Friendly Swaps for Your Routine</a>
                                            </h3>
                                            <p class="blog-post-excerpt">
                                                Transform your beauty routine with sustainable alternatives that protect
                                                both your skin and the environment. Small changes, big impact.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="blog-post-item blog-post-medium">
                                <div class="blog-post-content">
                                    <div class="blog-post-image demo-post-3">
                                        <div class="blog-post-overlay">
                                            <div class="blog-post-category">Wellness</div>
                                            <h3 class="blog-post-title">
                                                <a href="#">Self-Care Rituals: Creating Your Perfect Evening Routine</a>
                                            </h3>
                                            <p class="blog-post-excerpt">
                                                Discover how to unwind and pamper yourself with mindful evening rituals that
                                                nourish your body, mind, and soul.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Sidebar -->
                <aside class="blog-sidebar">

                    <!-- Featured Posts -->
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Featured</h3>
                        <div class="featured-posts">
                            <?php
                            $featured_query = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'category_name' => 'featured',
                                'post_status' => 'publish'
                            ));
                            if ($featured_query->have_posts()):
                                while ($featured_query->have_posts()): $featured_query->the_post(); ?>
                                    <article class="featured-post-item">
                                        <div class="featured-post-image">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('thumbnail', array('style' => 'width:100%;height:100%;object-fit:cover;border-radius:10px;')); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="featured-post-content">
                                            <div class="featured-post-date"><?php echo get_the_date(); ?></div>
                                            <h4 class="featured-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </article>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>

                    <!-- Latest Posts -->
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Latest</h3>
                        <div class="latest-posts">
                            <?php
                            $latest_query = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 1,
                                'post_status' => 'publish'
                            ));
                            if ($latest_query->have_posts()):
                                while ($latest_query->have_posts()): $latest_query->the_post(); ?>
                                    <article class="latest-post-item">
                                        <div class="latest-post-image">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('thumbnail', array('style' => 'width:100%;height:100%;object-fit:cover;border-radius:10px;')); ?>
                                            <?php else: ?>
                                                <div class="demo-latest-img"></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="latest-post-content">
                                            <div class="latest-post-date"><?php echo get_the_date(); ?></div>
                                            <h4 class="latest-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </article>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

</div>

<style>
    .blog-page-container {
        margin-top: 80px;
        background: white;
    }

    /* Blog Hero Section */
    .blog-hero-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
        padding: 80px 0;
        text-align: center;
    }

    .blog-hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .blog-breadcrumb {
        font-size: 0.9rem;
        color: var(--secondary-color);
        margin-bottom: 20px;
        opacity: 0.8;
    }

    .blog-hero-title {
        font-size: 3.5rem;
        color: white;
        margin-bottom: 20px;
        font-weight: 300;
        letter-spacing: 1px;
    }

    .blog-hero-subtitle {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Blog Search */
    .blog-search-container {
        max-width: 500px;
        margin: 0 auto;
    }

    .search-input-group {
        position: relative;
        display: flex;
        background: white;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .blog-search-input {
        flex: 1;
        padding: 15px 25px;
        border: none;
        font-size: 1rem;
        background: transparent;
        color: #333;
    }

    .blog-search-input::placeholder {
        color: #999;
    }

    .blog-search-input:focus {
        outline: none;
    }

    .blog-search-button {
        background: var(--secondary-color);
        color: var(--primary-color);
        border: none;
        padding: 15px 30px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        border-radius: 0;
        box-shadow: none;
    }

    .blog-search-button:hover {
        background: var(--primary-color);
        color: var(--secondary-color);
        box-shadow: none;
    }

    /* Blog Content Section */
    .blog-content-section {
        padding: 80px 0;
    }

    .blog-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 60px;
        align-items: start;
    }

    /* Blog Main */
    .blog-section-header {
        margin-bottom: 40px;
    }

    .blog-section-title {
        font-size: 2.5rem;
        color: #333;
        font-weight: 300;
        margin: 0;
    }

    /* Blog Posts Grid */
    .blog-posts-grid {
        display: flex;  
        flex-direction: column;
        gap: 30px;
        margin-bottom: 50px;
    }

    .blog-post-item {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        height: auto;
    }

    .blog-post-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .blog-post-large,
    .blog-post-medium,
    .blog-post-small {
        /* Remove grid-row for column layout */
    }

    .blog-post-image,
    .blog-post-no-image {
        position: relative;
        width: 100%;
        height: 200px;
        background-size: cover;
        background-position: center;
        display: flex;

    }

    .blog-post-large .blog-post-image,
    .blog-post-large .blog-post-no-image {
        height: 300px;
    }

    .blog-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-post-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        padding: 50px 30px 30px 30px; /* Add top padding for category */
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-height: 100%;
    }

    .blog-post-category {
        background: var(--secondary-color);
        color: var(--primary-color);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        position: absolute;
        top: 15px; /* Pin to top */
        left: 15px;
        z-index: 2; /* Ensure above overlay */
        margin-bottom: 0; /* Remove margin-bottom */
    }

    .blog-post-title {
        /* margin-top: 50px;  Remove this to avoid pushing title out of view */
    }

    .blog-post-title a {
        color: white;
        text-decoration: none;
        font-size: 1.4rem;
        font-weight: 600;
        line-height: 1.3;
        display: block;
        margin-bottom: 10px;
    }

    .blog-post-large .blog-post-title a {
        font-size: 1.8rem;
    }

    .blog-post-title a:hover {
        color: var(--secondary-color);
    }

    .blog-post-excerpt {
        font-size: 0.9rem;
        line-height: 1.5;
        opacity: 0.9;
        margin: 0;
    }

    /* Demo Post Backgrounds */
    .demo-post {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)),
            url('<?php echo get_template_directory_uri(); ?>/images/System Images/IMG_7926.jpeg');
        background-size: cover;
        background-position: center;
    }

    .demo-post-2 {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)),
            url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Calming Luxury Bath Salts 3.60£/PXL_20240720_175212393_edited_edited_edited_edited.png');
        background-size: cover;
        background-position: center;
    }

    .demo-post-3 {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)),
            url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg');
        background-size: cover;
        background-position: center;
    }

    /* Sidebar */
    .blog-sidebar {
        position: sticky;
        top: 100px;
    }

    .sidebar-section {
        margin-bottom: 50px;
    }

    .sidebar-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 30px;
        font-weight: 300;
    }

    /* Featured Posts */
    .featured-post-item,
    .latest-post-item {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #eee;
    }

    .featured-post-item:last-child,
    .latest-post-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .featured-post-image,
    .latest-post-image {
        flex-shrink: 0;
        width: 80px;
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
    }

    .featured-post-image img,
    .latest-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-post-content,
    .latest-post-content {
        flex: 1;
    }

    .featured-post-date,
    .latest-post-date {
        font-size: 0.8rem;
        color: #999;
        margin-bottom: 5px;
    }

    .featured-post-title a,
    .latest-post-title a {
        color: #333;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .featured-post-title a:hover,
    .latest-post-title a:hover {
        color: var(--primary-color);
    }

    /* Demo Featured Images */
    .demo-featured-img-1,
    .demo-featured-img-2,
    .demo-featured-img-3,
    .demo-latest-img {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .demo-featured-img-1 {
        background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg');
    }

    .demo-featured-img-2 {
        background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Royal 24k Gold Facial Elixir/bf86a4c9-6fda-42b7-9244-9dbcbe4a0c40_edited.jpg');
    }

    .demo-featured-img-3 {
        background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Oils - Firming Body Oil/IMG_1061_edited.jpg');
    }

    .demo-latest-img {
        background-image: url('<?php echo get_template_directory_uri(); ?>/images/System Images/strips.png');
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .blog-layout {
            grid-template-columns: 1fr;
            gap: 60px;
        }
        .blog-posts-grid {
            flex-direction: column;
        }
    }

    @media (max-width: 768px) {
        .blog-page-container {
            margin-top: 65px;
        }

        .blog-hero-section {
            padding: 50px 0;
        }

        .blog-hero-title {
            font-size: 2.5rem;
        }

        .blog-content-section {
            padding: 50px 0;
        }

        .blog-posts-grid {
            flex-direction: column;
            gap: 15px;
        }
        .blog-post-large,
        .blog-post-medium {
            /* Remove grid-column and grid-row for column layout */
        }
        .blog-post-image,
        .blog-post-no-image {
            height: 150px;
        }
    }

    /* Add CSS to make the anchor fill the article and remove default link styles */
    .blog-post-link-wrapper {
        display: block;
        text-decoration: none;
        color: inherit;
    }

    .blog-post-link-wrapper:focus .blog-post-item,
    .blog-post-link-wrapper:hover .blog-post-item {
        outline: 2px solid var(--secondary-color);
        box-shadow: 0 0 0 4px rgba(0,0,0,0.05);
    }
</style>

<?php get_footer(); ?>