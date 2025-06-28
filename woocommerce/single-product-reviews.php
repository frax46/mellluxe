<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * @package     WooCommerce\Templates
 * @version     4.3.0
 */

defined( 'ABSPATH' ) || exit;



global $product;

if ( ! comments_open() ) {
    return;
}

// Get reviews data
$reviews = get_comments(array(
    'post_id' => $product->get_id(),
    'status' => 'approve',
    'type' => 'review'
));

$rating_counts = array(
    '5' => 0,
    '4' => 0,
    '3' => 0,
    '2' => 0,
    '1' => 0
);
$total_ratings = 0;

if ($reviews) {
    foreach ($reviews as $review) {
        $rating = get_comment_meta($review->comment_ID, 'rating', true);
        if ($rating && isset($rating_counts[$rating])) {
            $rating_counts[$rating]++;
            $total_ratings++;
        }
    }
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <div id="comments">
        <h2 class="woocommerce-Reviews-title">
            <?php
            $count = $product->get_review_count();
            if ( $count && wc_review_ratings_enabled() ) {
                /* translators: 1: reviews count 2: product name */
                printf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
            } else {
                esc_html_e( 'Reviews', 'woocommerce' );
            }
            ?>
        </h2>

        <div class="reviews-summary-container">
            <!-- Overall Rating -->
            <div class="overall-rating-box">
                <h4>Overall Rating</h4>
                <div class="overall-rating-value"><?php echo number_format($product->get_average_rating(), 1); ?>/5</div>
                <div class="star-rating" aria-label="Rated <?php echo $product->get_average_rating(); ?> out of 5">
                    <span style="width: <?php echo ( $product->get_average_rating() / 5 ) * 100; ?>%;"></span>
                </div>
                <div class="total-reviews-count">(Based on <?php echo $total_ratings; ?> reviews)</div>
                <!-- Debug info: Average Rating = <?php echo $product->get_average_rating(); ?>, Width = <?php echo ( $product->get_average_rating() / 5 ) * 100; ?>% -->
            </div>

            <!-- Rating Breakdown -->
            <div class="rating-breakdown-box">
                <h4>Rating Breakdown</h4>
                <ul class="rating-bars">
                    <?php foreach ($rating_counts as $star => $count) : 
                        $percentage = ($total_ratings > 0) ? ($count / $total_ratings) * 100 : 0;
                    ?>
                        <li>
                            <span class="star-label"><?php echo $star; ?> stars</span>
                            <div class="bar-container">
                                <div class="bar" style="width: <?php echo $percentage; ?>%;"></div>
                            </div>
                            <span class="count"><?php echo $count; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <?php if ( have_comments() ) : ?>
            <ol class="commentlist">
                <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
            </ol>

            <?php
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                echo '<nav class="woocommerce-pagination">';
                paginate_comments_links(
                    apply_filters(
                        'woocommerce_comment_pagination_args',
                        array(
                            'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                            'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                            'type'      => 'list',
                        )
                    )
                );
                echo '</nav>';
            endif;
            ?>
        <?php else : ?>
            <p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
        <?php endif; ?>
    </div>

    <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
        <div id="review_form_wrapper">
            <div id="review_form">
                <?php
                $commenter    = wp_get_current_commenter();
                $comment_form = array(
                    'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
                    'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
                    'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
                    'title_reply_after'    => '</span>',
                    'comment_notes_after'  => '',
                    'label_submit'         => esc_html__( 'Submit Review', 'woocommerce' ),
                    'logged_in_as'         => '',
                    'comment_field'        => '',
                );

                $name_email_req = get_option( 'require_name_email' );
                $fields         = array(
                    'author' => array(
                        'label'    => __( 'Name', 'woocommerce' ),
                        'type'     => 'text',
                        'value'    => $commenter['comment_author'],
                        'required' => $name_email_req,
                    ),
                    'email'  => array(
                        'label'    => __( 'Email', 'woocommerce' ),
                        'type'     => 'email',
                        'value'    => $commenter['comment_author_email'],
                        'required' => $name_email_req,
                    ),
                );

                $comment_form['fields'] = array();

                foreach ( $fields as $key => $field ) {
                    $field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
                    $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

                    if ( $field['required'] ) {
                        $field_html .= '&nbsp;<span class="required">*</span>';
                    }

                    $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

                    $comment_form['fields'][ $key ] = $field_html;
                }

                $account_page_url = wc_get_page_permalink( 'myaccount' );
                if ( $account_page_url ) {
                    /* translators: %s opening and closing link tags respectively */
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                }

                if ( wc_review_ratings_enabled() ) {
                    $comment_form['comment_field'] = '<div class="comment-form-rating">
                        <label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label>
                        <div class="stars">
                            <a class="star-1" href="#" data-rating="1">★</a>
                            <a class="star-2" href="#" data-rating="2">★</a>
                            <a class="star-3" href="#" data-rating="3">★</a>
                            <a class="star-4" href="#" data-rating="4">★</a>
                            <a class="star-5" href="#" data-rating="5">★</a>
                        </div>
                        <select name="rating" id="rating" required style="display: none;">
                            <option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
                            <option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
                            <option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
                            <option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
                            <option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
                            <option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
                        </select>
                    </div>';
                }

                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                ?>
            </div>
        </div>
    <?php else : ?>
        <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
    <?php endif; ?>

    <div class="clear"></div>
</div>

<style>
.comment-form-rating .stars {
    display: flex;
    gap: 5px;
    margin: 10px 0;
}

.comment-form-rating .stars a {
    font-size: 24px;
    color: #ddd;
    text-decoration: none;
    transition: color 0.2s ease;
    cursor: pointer;
}

.comment-form-rating .stars a:hover,
.comment-form-rating .stars a.hover {
    color: #ffc107;
}

.comment-form-rating .stars a.selected {
    color: #ffc107;
}

.comment-form-rating label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
}

/* Hide the default WooCommerce star rating that appears alongside our custom stars */
#review_form p.stars {
    display: none !important;
}

#review_form .comment-form-rating p.stars {
    display: none !important;
}

/* Ensure individual review star ratings display correctly */
#comments .star-rating {
    display: inline-block;
    position: relative;
    font-family: 'star';
    line-height: 1;
    font-size: 1em;
    width: 5.4em;
    height: 1em;
    overflow: hidden;
    vertical-align: top;
}

#comments .star-rating::before {
    content: "★★★★★";
    color: #d1d5db;
    position: absolute;
    top: 0;
    left: 0;
    letter-spacing: 0.1em;
}

#comments .star-rating span {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    height: 100%;
    color: transparent;
    font-size: 0;
}

#comments .star-rating span::before {
    content: "★★★★★";
    color: var(--secondary-color, #ffc107);
    position: absolute;
    top: 0;
    left: 0;
    letter-spacing: 0.1em;
    font-size: 1rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const starContainer = document.querySelector('#review_form .stars');
    if (!starContainer) return;

    const stars = starContainer.querySelectorAll('a');
    const ratingSelect = document.getElementById('rating');

    if (stars.length === 0 || !ratingSelect) return;

    // Function to visually update stars based on a given rating
    const updateStars = (rating) => {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    };

    stars.forEach((star, index) => {
        const ratingValue = parseInt(star.getAttribute('data-rating'));

        star.addEventListener('mouseover', () => {
            // Preview rating on hover
            stars.forEach((s, i) => {
                const starRating = parseInt(s.getAttribute('data-rating'));
                if (starRating <= ratingValue) {
                    s.classList.add('hover');
                } else {
                    s.classList.remove('hover');
                }
            });
        });

        star.addEventListener('click', (e) => {
            e.preventDefault();
            ratingSelect.value = ratingValue; // Update the hidden dropdown
            updateStars(ratingValue); // Persist the visual selection
            
            // Remove hover states after selection
            stars.forEach(s => s.classList.remove('hover'));
        });
    });

    starContainer.addEventListener('mouseleave', () => {
        // On mouse leave, remove all hover previews
        stars.forEach(star => star.classList.remove('hover'));
    });

    // Initialize stars on page load if a value already exists
    const initialRating = parseInt(ratingSelect.value) || 0;
    if (initialRating > 0) {
        updateStars(initialRating);
    }
});
</script> 