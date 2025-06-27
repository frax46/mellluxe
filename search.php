<?php
/**
 * Search Results Template for Mell Luxe
 * The template for displaying search results
 */

get_header(); ?>

<div class="search-results-container">
    
    <!-- Search Hero Section -->
    <section class="search-hero-section">
        <div class="container">
            <div class="search-hero-content">
                <h1 class="search-hero-title">
                    <?php if (have_posts()) : ?>
                        Search Results for "<?php echo get_search_query(); ?>"
                    <?php else : ?>
                        No Results Found
                    <?php endif; ?>
                </h1>
                <p class="search-hero-subtitle">
                    <?php if (have_posts()) : ?>
                        We found <?php echo $wp_query->found_posts; ?> article<?php echo $wp_query->found_posts == 1 ? '' : 's'; ?> matching your search
                    <?php else : ?>
                        Sorry, we couldn't find any articles matching your search. Try different keywords or browse our categories below.
                    <?php endif; ?>
                </p>
                
                <!-- Search Form -->
                <div class="search-form-container">
                    <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-input-group">
                            <input type="search" 
                                   class="search-input" 
                                   placeholder="Search beauty tips, wellness advice..." 
                                   value="<?php echo get_search_query(); ?>" 
                                   name="s" />
                            <button type="submit" class="search-button">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Results Content -->
    <section class="search-results-content">
        <div class="container">
            <div class="search-layout">
                
                <!-- Main Results -->
                <div class="search-main">
                    
                    <?php if (have_posts()) : ?>
                        
                        <!-- Results Grid -->
                        <div class="search-results-grid">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="search-result-item">
                                    <div class="search-result-content">
                                        
                                        <!-- Featured Image -->
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="search-result-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('class' => 'result-thumbnail')); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <!-- Content -->
                                        <div class="search-result-text">
                                            <div class="search-result-meta">
                                                <div class="result-category">
                                                    <?php 
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) {
                                                        echo esc_html($categories[0]->name);
                                                    } else {
                                                        echo 'Beauty & Wellness';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="result-date"><?php echo get_the_date('F j, Y'); ?></div>
                                            </div>
                                            
                                            <h2 class="search-result-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            
                                            <p class="search-result-excerpt">
                                                <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                            </p>
                                            
                                            <div class="search-result-author">
                                                <div class="author-avatar-small">
                                                    <?php echo get_avatar(get_the_author_meta('ID'), 30); ?>
                                                </div>
                                                <span class="author-name-small">By <?php the_author(); ?></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="search-pagination">
                            <?php
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => '← Previous',
                                'next_text' => 'Next →',
                                'class' => 'pagination-links'
                            ));
                            ?>
                        </div>
                        
                    <?php else : ?>
                        
                        <!-- No Results -->
                        <div class="no-results-section">
                            <div class="no-results-content">
                                <div class="no-results-icon">
                                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 21L16.514 16.506M19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h3 class="no-results-title">No articles found</h3>
                                <p class="no-results-description">
                                    We couldn't find any articles matching "<strong><?php echo get_search_query(); ?></strong>". 
                                    Try adjusting your search terms or explore our popular topics below.
                                </p>
                                
                                <!-- Suggested Actions -->
                                <div class="suggested-actions">
                                    <h4>You might want to:</h4>
                                    <ul>
                                        <li>Check your spelling</li>
                                        <li>Try more general keywords</li>
                                        <li>Browse our <a href="<?php echo get_permalink(get_page_by_path('blog')); ?>">latest articles</a></li>
                                        <li>Explore our <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">product collection</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    <?php endif; ?>
                    
                </div>
                
                <!-- Sidebar -->
                <aside class="search-sidebar">
                    
                    <!-- Popular Topics -->
                    <div class="sidebar-widget popular-topics-widget">
                        <h3 class="widget-title">Popular Topics</h3>
                        <div class="popular-topics">
                            <a href="?s=skincare" class="topic-tag">Natural Skincare</a>
                            <a href="?s=vegan+beauty" class="topic-tag">Vegan Beauty</a>
                            <a href="?s=sustainability" class="topic-tag">Sustainability</a>
                            <a href="?s=wellness" class="topic-tag">Wellness</a>
                            <a href="?s=diy+recipes" class="topic-tag">DIY Recipes</a>
                            <a href="?s=essential+oils" class="topic-tag">Essential Oils</a>
                            <a href="?s=organic" class="topic-tag">Organic Products</a>
                            <a href="?s=self+care" class="topic-tag">Self Care</a>
                        </div>
                    </div>
                    
                    <!-- Recent Posts -->
                    <div class="sidebar-widget recent-posts-widget">
                        <h3 class="widget-title">Recent Articles</h3>
                        <div class="recent-posts">
                            <?php
                            $recent_posts = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));
                            
                            if ($recent_posts->have_posts()) :
                                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                            ?>
                                <article class="recent-post-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="recent-post-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="recent-post-content">
                                        <div class="recent-post-date"><?php echo get_the_date('F j, Y'); ?></div>
                                        <h4 class="recent-post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                    </div>
                                </article>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <!-- Demo Recent Posts -->
                                <article class="recent-post-item">
                                    <div class="recent-post-image demo-recent-1"></div>
                                    <div class="recent-post-content">
                                        <div class="recent-post-date">November 20, 2024</div>
                                        <h4 class="recent-post-title">
                                            <a href="#">Winter Skincare: Essential Tips for Dry Weather</a>
                                        </h4>
                                    </div>
                                </article>
                                
                                <article class="recent-post-item">
                                    <div class="recent-post-image demo-recent-2"></div>
                                    <div class="recent-post-content">
                                        <div class="recent-post-date">November 18, 2024</div>
                                        <h4 class="recent-post-title">
                                            <a href="#">5 DIY Face Masks Using Kitchen Ingredients</a>
                                        </h4>
                                    </div>
                                </article>
                                
                                <article class="recent-post-item">
                                    <div class="recent-post-image demo-recent-3"></div>
                                    <div class="recent-post-content">
                                        <div class="recent-post-date">November 15, 2024</div>
                                        <h4 class="recent-post-title">
                                            <a href="#">The Benefits of Vegan Beauty Products</a>
                                        </h4>
                                    </div>
                                </article>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="sidebar-widget categories-widget">
                        <h3 class="widget-title">Browse Categories</h3>
                        <div class="categories-list">
                            <?php
                            $categories = get_categories(array(
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'number' => 6
                            ));
                            
                            if ($categories) :
                                foreach ($categories as $category) :
                            ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" class="category-item">
                                    <span class="category-name"><?php echo $category->name; ?></span>
                                    <span class="category-count"><?php echo $category->count; ?></span>
                                </a>
                            <?php
                                endforeach;
                            else :
                            ?>
                                <!-- Demo Categories -->
                                <a href="#" class="category-item">
                                    <span class="category-name">Beauty & Wellness</span>
                                    <span class="category-count">12</span>
                                </a>
                                <a href="#" class="category-item">
                                    <span class="category-name">Sustainability</span>
                                    <span class="category-count">8</span>
                                </a>
                                <a href="#" class="category-item">
                                    <span class="category-name">DIY Recipes</span>
                                    <span class="category-count">6</span>
                                </a>
                                <a href="#" class="category-item">
                                    <span class="category-name">Self Care</span>
                                    <span class="category-count">5</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </aside>
                
            </div>
        </div>
    </section>
    
</div>

<style>
.search-results-container {
    margin-top: 80px;
}

/* Search Hero Section */
.search-hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2a1a4f 100%);
    padding: 80px 0;
    text-align: center;
    color: white;
}

.search-hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.search-hero-title {
    font-size: 3rem;
    font-weight: 300;
    margin-bottom: 20px;
    letter-spacing: 1px;
}

.search-hero-subtitle {
    font-size: 1.1rem;
    margin-bottom: 40px;
    opacity: 0.9;
    line-height: 1.6;
}

/* Search Form */
.search-form-container {
    max-width: 500px;
    margin: 0 auto;
}

.search-input-group {
    display: flex;
    background: white;
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.search-input {
    flex: 1;
    padding: 15px 25px;
    border: none;
    font-size: 1rem;
    background: transparent;
    color: #333;
}

.search-input::placeholder {
    color: #999;
}

.search-input:focus {
    outline: none;
}

.search-button {
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

.search-button:hover {
    background: var(--primary-color);
    color: var(--secondary-color);
    box-shadow: none;
}

/* Search Results Content */
.search-results-content {
    padding: 80px 0;
    background: white;
}

.search-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    align-items: start;
}

/* Results Grid */
.search-results-grid {
    display: grid;
    gap: 40px;
}

.search-result-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.search-result-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.search-result-content {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 25px;
    padding: 30px;
    align-items: start;
}

.search-result-image {
    width: 200px;
    height: 150px;
    border-radius: 10px;
    overflow: hidden;
}

.search-result-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.search-result-item:hover .search-result-image img {
    transform: scale(1.05);
}

.search-result-text {
    flex: 1;
}

.search-result-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    align-items: center;
}

.result-category {
    background: var(--secondary-color);
    color: var(--primary-color);
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.result-date {
    font-size: 0.9rem;
    color: #666;
}

.search-result-title {
    margin-bottom: 15px;
}

.search-result-title a {
    color: var(--primary-color);
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: 600;
    line-height: 1.3;
}

.search-result-title a:hover {
    color: var(--secondary-color);
}

.search-result-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 1rem;
}

.search-result-author {
    display: flex;
    align-items: center;
    gap: 10px;
}

.author-avatar-small {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    overflow: hidden;
}

.author-avatar-small img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-name-small {
    font-size: 0.9rem;
    color: #666;
    font-weight: 500;
}

/* No Results */
.no-results-section {
    text-align: center;
    padding: 80px 20px;
}

.no-results-content {
    max-width: 500px;
    margin: 0 auto;
}

.no-results-icon {
    color: var(--primary-color);
    margin-bottom: 30px;
    opacity: 0.7;
}

.no-results-title {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 20px;
    font-weight: 300;
}

.no-results-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 40px;
    font-size: 1.1rem;
}

.suggested-actions h4 {
    color: var(--primary-color);
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.suggested-actions ul {
    list-style: none;
    padding: 0;
}

.suggested-actions li {
    margin-bottom: 8px;
    color: #666;
}

.suggested-actions a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
}

.suggested-actions a:hover {
    color: var(--secondary-color);
}

/* Pagination */
.search-pagination {
    margin-top: 60px;
    text-align: center;
}

.pagination-links {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.pagination-links a,
.pagination-links .current {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-links a {
    background: white;
    color: var(--primary-color);
    border: 2px solid #eee;
}

.pagination-links a:hover,
.pagination-links .current {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

/* Sidebar */
.search-sidebar {
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

/* Popular Topics */
.popular-topics {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.topic-tag {
    display: inline-block;
    background: rgba(37, 23, 70, 0.1);
    color: var(--primary-color);
    padding: 8px 15px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.topic-tag:hover {
    background: var(--primary-color);
    color: white;
}

/* Recent Posts */
.recent-post-item {
    display: flex;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 25px;
    border-bottom: 1px solid #eee;
}

.recent-post-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.recent-post-image {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
}

.recent-post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recent-post-content {
    flex: 1;
}

.recent-post-date {
    font-size: 0.8rem;
    color: #999;
    margin-bottom: 5px;
}

.recent-post-title a {
    color: #333;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.4;
}

.recent-post-title a:hover {
    color: var(--primary-color);
}

/* Demo Images */
.demo-recent-1,
.demo-recent-2,
.demo-recent-3 {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.demo-recent-1 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Daily Facial Oil 5.20£/PXL_20240720_174133088_edited.jpg');
}

.demo-recent-2 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Brow, Lash & Nail Beauty Serum 4£/PXL_20240720_174441659_edited.jpg');
}

.demo-recent-3 {
    background-image: url('<?php echo get_template_directory_uri(); ?>/images/Whole Sale/Royal 24k Gold Facial Elixir/bf86a4c9-6fda-42b7-9244-9dbcbe4a0c40_edited.jpg');
}

/* Categories */
.categories-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background: linear-gradient(135deg, rgba(253, 226, 141, 0.1) 0%, rgba(253, 226, 141, 0.05) 100%);
    border-radius: 10px;
    text-decoration: none;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.category-item:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.category-name {
    font-weight: 600;
}

.category-count {
    background: rgba(255, 255, 255, 0.3);
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

.category-item:hover .category-count {
    background: rgba(255, 255, 255, 0.2);
}

/* Responsive Design */
@media (max-width: 992px) {
    .search-layout {
        grid-template-columns: 1fr;
        gap: 60px;
    }
    
    .search-hero-title {
        font-size: 2.5rem;
    }
    
    .search-result-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .search-result-image {
        width: 100%;
        height: 200px;
    }
}

@media (max-width: 768px) {
    .search-results-container {
        margin-top: 65px;
    }
    
    .search-hero-section {
        padding: 50px 0;
    }
    
    .search-hero-title {
        font-size: 2rem;
    }
    
    .search-results-content {
        padding: 50px 0;
    }
    
    .search-result-item {
        margin-bottom: 20px;
    }
    
    .search-result-content {
        padding: 20px;
    }
    
    .popular-topics {
        gap: 8px;
    }
    
    .topic-tag {
        font-size: 0.8rem;
        padding: 6px 12px;
    }
}

@media (max-width: 576px) {
    .search-hero-title {
        font-size: 1.8rem;
    }
    
    .search-input-group {
        flex-direction: column;
        border-radius: 15px;
    }
    
    .search-button {
        border-radius: 0;
    }
    
    .search-result-meta {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
    }
    
    .pagination-links {
        gap: 5px;
    }
    
    .pagination-links a,
    .pagination-links .current {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
    }
}
</style>

<?php get_footer(); ?> 