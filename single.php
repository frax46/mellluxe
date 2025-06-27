<?php
/**
 * Single Post Template for Mell Luxe
 * The template for displaying single blog posts
 */

get_header(); ?>

<div class="single-post-container">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section with Featured Image -->
        <section class="single-post-hero">
            <?php if (has_post_thumbnail()) : ?>
                <div class="single-post-featured-image">
                    <?php the_post_thumbnail('full', array('class' => 'hero-image')); ?>
                    <div class="hero-overlay"></div>
                </div>
            <?php else : ?>
                <div class="single-post-no-image">
                    <div class="hero-overlay"></div>
                </div>
            <?php endif; ?>
            
            <div class="hero-content">
                <div class="container">
                    <div class="post-meta-info">
                        <div class="post-category">
                            <?php 
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            } else {
                                echo 'Beauty & Wellness';
                            }
                            ?>
                        </div>
                        <div class="post-date"><?php echo get_the_date('F j, Y'); ?></div>
                    </div>
                    <h1 class="single-post-title"><?php the_title(); ?></h1>
                    <div class="post-author-info">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                        </div>
                        <div class="author-details">
                            <span class="author-name">By <?php the_author(); ?></span>
                            <span class="reading-time"><?php echo do_shortcode('[reading_time]'); ?> min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Post Content -->
        <section class="single-post-content">
            <div class="container">
                <div class="content-layout">
                    
                    <!-- Main Content -->
                    <article class="post-main-content">
                        <div class="post-content-wrapper">
                            <?php the_content(); ?>
                        </div>
                        
                        <!-- Post Tags -->
                        <?php if (has_tag()) : ?>
                            <div class="post-tags">
                                <h4>Related Topics</h4>
                                <div class="tags-list">
                                    <?php the_tags('', '', ''); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Author Bio -->
                        <div class="author-bio-section">
                            <div class="author-bio-card">
                                <div class="author-bio-avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                </div>
                                <div class="author-bio-content">
                                    <h4 class="author-bio-name"><?php the_author(); ?></h4>
                                    <p class="author-bio-description">
                                        <?php 
                                        $author_bio = get_the_author_meta('description');
                                        if ($author_bio) {
                                            echo esc_html($author_bio);
                                        } else {
                                            echo 'Beauty and wellness enthusiast passionate about natural skincare and sustainable living.';
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Share -->
                        <div class="social-share-section">
                            <h4>Share this article</h4>
                            <div class="social-share-buttons">
                                <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-button twitter">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                    Twitter
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-button facebook">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    Facebook
                                </a>
                                <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&description=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-button pinterest">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.747 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.548.535 6.624 0 11.99-5.367 11.99-11.99C24.007 5.367 18.641.001 12.017.001z"/>
                                    </svg>
                                    Pinterest
                                </a>
                            </div>
                        </div>
                        
                    </article>
                    
                    <!-- Sidebar -->
                    <aside class="single-post-sidebar">
                        
                        <!-- Related Posts -->
                        <div class="sidebar-widget related-posts-widget">
                            <h3 class="widget-title">You Might Also Like</h3>
                            <div class="related-posts">
                                <?php
                                $related_posts = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'orderby' => 'rand'
                                ));
                                
                                if ($related_posts->have_posts()) :
                                    while ($related_posts->have_posts()) : $related_posts->the_post();
                                ?>
                                    <article class="related-post-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="related-post-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="related-post-content">
                                            <div class="related-post-date"><?php echo get_the_date('F j, Y'); ?></div>
                                            <h4 class="related-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </div>
                                    </article>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                ?>
                                    <!-- Demo Related Posts -->
                                    <article class="related-post-item">
                                        <div class="related-post-image demo-related-1"></div>
                                        <div class="related-post-content">
                                            <div class="related-post-date">November 15, 2024</div>
                                            <h4 class="related-post-title">
                                                <a href="#">Morning Skincare Routine for Glowing Skin</a>
                                            </h4>
                                        </div>
                                    </article>
                                    
                                    <article class="related-post-item">
                                        <div class="related-post-image demo-related-2"></div>
                                        <div class="related-post-content">
                                            <div class="related-post-date">November 10, 2024</div>
                                            <h4 class="related-post-title">
                                                <a href="#">Sustainable Beauty: What It Really Means</a>
                                            </h4>
                                        </div>
                                    </article>
                                    
                                    <article class="related-post-item">
                                        <div class="related-post-image demo-related-3"></div>
                                        <div class="related-post-content">
                                            <div class="related-post-date">November 5, 2024</div>
                                            <h4 class="related-post-title">
                                                <a href="#">Essential Oils for Stress Relief</a>
                                            </h4>
                                        </div>
                                    </article>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Newsletter Signup -->
                        <div class="sidebar-widget newsletter-widget">
                            <div class="newsletter-card">
                                <h3 class="newsletter-title">Beauty Tips Weekly</h3>
                                <p class="newsletter-description">Get our latest beauty secrets, wellness tips, and exclusive offers delivered to your inbox.</p>
                                <form class="newsletter-form">
                                    <input type="email" class="newsletter-input" placeholder="Your email address" required>
                                    <button type="submit" class="newsletter-button">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        
                    </aside>
                    
                </div>
            </div>
        </section>
        
        <!-- Navigation -->
        <section class="post-navigation">
            <div class="container">
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ($prev_post) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link">
                                <div class="nav-content">
                                    <span class="nav-direction">← Previous Article</span>
                                    <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($next_post) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link">
                                <div class="nav-content">
                                    <span class="nav-direction">Next Article →</span>
                                    <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="back-to-blog">
                    <a href="<?php echo get_permalink(get_page_by_path('blog')); ?>" class="back-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Back to All Articles
                    </a>
                </div>
            </div>
        </section>
        
    <?php endwhile; ?>
    
</div>

<style>
.single-post-container {
    margin-top: 80px;
}

/* Hero Section */
.single-post-hero {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: flex-end;
    color: white;
}

.single-post-featured-image,
.single-post-no-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.single-post-featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.single-post-no-image {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(transparent 0%, rgba(0, 0, 0, 0.8) 100%);
    z-index: 2;
}

.hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
    padding: 60px 0;
}

.post-meta-info {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    align-items: center;
}

.post-category {
    background: var(--secondary-color);
    color: var(--primary-color);
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.post-date {
    font-size: 0.95rem;
    opacity: 0.9;
}

.single-post-title {
    font-size: 3.5rem;
    font-weight: 300;
    line-height: 1.2;
    margin-bottom: 30px;
    max-width: 800px;
}

.post-author-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid var(--secondary-color);
}

.author-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-details {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.author-name {
    font-weight: 600;
    font-size: 1rem;
}

.reading-time {
    font-size: 0.9rem;
    opacity: 0.8;
}

/* Content Section */
.single-post-content {
    padding: 80px 0;
    background: white;
}

.content-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 80px;
    align-items: start;
}

.post-main-content {
    max-width: none;
}

.post-content-wrapper {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.post-content-wrapper h1,
.post-content-wrapper h2,
.post-content-wrapper h3,
.post-content-wrapper h4 {
    color: var(--primary-color);
    margin: 40px 0 20px 0;
    font-weight: 600;
}

.post-content-wrapper h2 {
    font-size: 2.2rem;
}

.post-content-wrapper h3 {
    font-size: 1.8rem;
}

.post-content-wrapper p {
    margin-bottom: 25px;
}

.post-content-wrapper blockquote {
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.1) 0%, rgba(253, 226, 141, 0.05) 100%);
    border-left: 4px solid var(--secondary-color);
    padding: 30px;
    margin: 40px 0;
    font-style: italic;
    font-size: 1.2rem;
    border-radius: 0 15px 15px 0;
}

.post-content-wrapper ul,
.post-content-wrapper ol {
    padding-left: 30px;
    margin-bottom: 25px;
}

.post-content-wrapper li {
    margin-bottom: 8px;
}

/* Post Tags */
.post-tags {
    margin: 60px 0;
    padding: 30px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.post-tags h4 {
    color: var(--primary-color);
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.tags-list a {
    display: inline-block;
    background: rgba(37, 23, 70, 0.1);
    color: var(--primary-color);
    padding: 8px 15px;
    margin: 5px 10px 5px 0;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.tags-list a:hover {
    background: var(--primary-color);
    color: white;
}

/* Author Bio */
.author-bio-section {
    margin: 60px 0;
}

.author-bio-card {
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.1) 0%, rgba(253, 226, 141, 0.05) 100%);
    padding: 40px;
    border-radius: 20px;
    display: flex;
    gap: 25px;
    align-items: center;
}

.author-bio-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
    border: 3px solid var(--secondary-color);
}

.author-bio-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-bio-name {
    color: var(--primary-color);
    margin-bottom: 10px;
    font-size: 1.3rem;
}

.author-bio-description {
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* Social Share */
.social-share-section {
    margin: 60px 0;
}

.social-share-section h4 {
    color: var(--primary-color);
    margin-bottom: 20px;
    font-size: 1.2rem;
}

.social-share-buttons {
    display: flex;
    gap: 15px;
}

.share-button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.share-button.twitter {
    background: #1da1f2;
    color: white;
}

.share-button.facebook {
    background: #4267b2;
    color: white;
}

.share-button.pinterest {
    background: #bd081c;
    color: white;
}

.share-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Sidebar */
.single-post-sidebar {
    position: sticky;
    top: 100px;
}

.sidebar-widget {
    margin-bottom: 50px;
}

.widget-title {
    font-size: 1.5rem;
    color: var(--primary-color);
    margin-bottom: 25px;
    font-weight: 300;
}

/* Related Posts */
.related-post-item {
    display: flex;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 25px;
    border-bottom: 1px solid #eee;
}

.related-post-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.related-post-image {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
}

.related-post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-post-content {
    flex: 1;
}

.related-post-date {
    font-size: 0.8rem;
    color: #999;
    margin-bottom: 5px;
}

.related-post-title a {
    color: #333;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.4;
}

.related-post-title a:hover {
    color: var(--primary-color);
}

/* Demo Related Images */
.demo-related-1,
.demo-related-2,
.demo-related-3 {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.demo-related-1 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg');
}

.demo-related-2 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Royal 24k Gold Facial Elixir/bf86a4c9-6fda-42b7-9244-9dbcbe4a0c40_edited.jpg');
}

.demo-related-3 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg');
}

/* Newsletter Widget */
.newsletter-card {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    color: white;
}

.newsletter-title {
    color: var(--secondary-color);
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.newsletter-description {
    margin-bottom: 25px;
    opacity: 0.9;
    line-height: 1.6;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.newsletter-input {
    padding: 15px;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    color: #333;
}

.newsletter-input::placeholder {
    color: #999;
}

.newsletter-button {
    background: var(--secondary-color);
    color: var(--primary-color);
    border: none;
    padding: 15px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.newsletter-button:hover {
    background: white;
    transform: translateY(-2px);
}

/* Post Navigation */
.post-navigation {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    padding: 80px 0;
}

.nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 50px;
}

.nav-link {
    display: block;
    padding: 0;
    background: transparent;
    border: none;
    text-decoration: none;
    color: white;
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.1) 0%, rgba(253, 226, 141, 0.05) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.nav-link:hover::before {
    opacity: 1;
}

.nav-content {
    position: relative;
    z-index: 2;
    padding: 25px;
    border: 2px solid rgba(253, 226, 141, 0.3);
    border-radius: 15px;
    transition: all 0.3s ease;
}

.nav-link:hover .nav-content {
    border-color: var(--secondary-color);
    transform: translateY(-3px);
}

.nav-direction {
    display: block;
    color: var(--secondary-color);
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.nav-title {
    display: block;
    font-size: 1.1rem;
    line-height: 1.4;
    color: white;
    font-weight: 500;
}

.nav-next .nav-content {
    text-align: right;
}

.back-to-blog {
    text-align: center;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: white;
    text-decoration: none;
    font-weight: 600;
    padding: 18px 35px;
    background: transparent;
    border: 2px solid var(--secondary-color);
    border-radius: 50px;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.back-link:hover {
    background: var(--secondary-color);
    color: var(--primary-color);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(253, 226, 141, 0.3);
}

.back-link svg {
    transition: transform 0.3s ease;
}

.back-link:hover svg {
    transform: translateX(-3px);
}

/* Responsive Design */
@media (max-width: 992px) {
    .content-layout {
        grid-template-columns: 1fr;
        gap: 60px;
    }
    
    .single-post-title {
        font-size: 2.8rem;
    }
    
    .nav-links {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .nav-content {
        padding: 20px;
    }
    
    .nav-next .nav-content {
        text-align: left;
    }
}

@media (max-width: 768px) {
    .single-post-container {
        margin-top: 65px;
    }
    
    .single-post-hero {
        min-height: 50vh;
    }
    
    .single-post-title {
        font-size: 2.2rem;
    }
    
    .single-post-content {
        padding: 50px 0;
    }
    
    .hero-content {
        padding: 40px 0;
    }
    
    .author-bio-card {
        flex-direction: column;
        text-align: center;
    }
    
    .social-share-buttons {
        flex-wrap: wrap;
    }
    
    .post-navigation {
        padding: 50px 0;
    }
    
    .nav-content {
        padding: 18px;
    }
    
    .nav-direction {
        font-size: 0.8rem;
    }
    
    .nav-title {
        font-size: 1rem;
    }
    
    .back-link {
        padding: 15px 25px;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .single-post-title {
        font-size: 1.8rem;
    }
    
    .post-meta-info {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    
    .related-post-item {
        flex-direction: column;
        gap: 10px;
    }
    
    .related-post-image {
        width: 100%;
        height: 150px;
    }
}
</style>

<?php get_footer(); ?> 