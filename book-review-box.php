<?php
/**
 * Template Part: Book Review Box Component
 * File Location: wp-content/themes/offshelfbooks/book-review-box.php
 * Displays your exact book outlets using clean, native PHP.
 */

$cover_id         = get_field('book_cover'); // Grabs the Image ID from ACF
$amazon_score      = get_field('amazon_score');
$amazon_count      = get_field('amazon_count');
$goodreads_score   = get_field('goodreads_score');
$goodreads_count   = get_field('goodreads_count');
$barnes_noble      = get_field('barnes_and_noble_score');
$barnes_count      = get_field('barnes_and_noble_count');
$off_shelf_books   = get_field('off_shelf_books_score'); // Optional 4th row
$off_shelf_count   = get_field('off_shelf_books_count'); // Optional 4th row

/**
 * PASTE YOUR REAL MEDIA LIBRARY LOGO URLS HERE
 */
$outlets = [
    [
        'score' => $amazon_score, 
        'count' => $amazon_count,
        'logo'  => wp_get_attachment_image_url(119, 'thumbnail'), 
        'name'  => 'Amazon',
        'show_without_rating' => true
    ],
    [
        'score' => $goodreads_score, 
        'count' => $goodreads_count,
        'logo'  => wp_get_attachment_image_url(118, 'thumbnail'), 
        'name'  => 'Goodreads',
        'show_without_rating' => true
    ],
    [
        'score' => $barnes_noble, 
        'count' => $barnes_count,
        'logo'  => wp_get_attachment_image_url(120, 'thumbnail'), 
        'name'  => 'Barnes & Noble',
        'show_without_rating' => true
    ],
    [
        'score' => $off_shelf_books, 
        'count' => $off_shelf_count,
        'logo'  => wp_get_attachment_image_url(122, 'thumbnail'), 
        'name'  => 'Off the Shelf Books',
        'show_without_rating' => false
    ],
];

function calculate_star_width($rating) {
    if (!$rating) return 0;
    return (floatval($rating) / 5) * 100;
}
?>

<div class="book-review-grid-container">
    <div class="book-review-main-box">
        
        <!-- Left Column: Book Cover -->
        <div class="review-cover-col">
            <?php 
            if ( $cover_id ) {
                // This dynamically prints the optimized <img> tag using your image ID
                echo wp_get_attachment_image( $cover_id, 'medium', false, array( 'class' => 'review-book-cover' ) );
            } else {
                echo '<img src="https://placeholder.com" alt="No Cover Available" class="review-book-cover">';
            }
            ?>
        </div>
        
        <!-- Right Column: Star Rows -->
        <div class="review-details-col">
            <?php foreach ($outlets as $outlet) : ?>
                <?php
                $has_rating = $outlet['score'] !== null && $outlet['score'] !== '';
                $has_count = $outlet['count'] !== null && $outlet['count'] !== '';
                $show_without_rating = !empty($outlet['show_without_rating']);
                if ($has_rating || $show_without_rating) :
                ?>
                    <div class="rating-row">
                        <?php if ($outlet['logo']) : ?>
                            <img src="<?php echo esc_url($outlet['logo']); ?>" alt="<?php echo esc_attr($outlet['name']); ?>" class="outlet-logo" title="<?php echo esc_attr($outlet['name']); ?>">
                        <?php endif; ?>

                        <div class="outlet-rating-details">
                            <div class="outlet-rating-summary">
                                <?php if ($has_rating) : ?>
                                    <div class="star-rating-wrapper" title="<?php echo esc_attr($outlet['score']); ?> out of 5 stars">
                                        <div class="stars-outer" aria-hidden="true">★★★★★</div>
                                        <div class="stars-inner" aria-hidden="true" style="width: <?php echo calculate_star_width($outlet['score']); ?>%;">★★★★★</div>
                                    </div>
                                    <span class="score-numerical"><strong><?php echo number_format($outlet['score'], 2); ?></strong> / 5</span>
                                <?php else : ?>
                                    <span class="score-numerical no-reviews-available"><strong>N/A</strong></span>
                                <?php endif; ?>
                            </div>

                            <?php if ($has_count) : ?>
                                <span class="review-count">Based on <?php echo esc_html(number_format_i18n((int) $outlet['count'])); ?> Reviews</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
    </div>
    
    <!-- Bottom Footer Line -->
    <div class="review-box-footer">
        Reviews are based on <?php echo get_the_date('F d, Y'); ?>
    </div>
</div>
