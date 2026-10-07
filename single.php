<?php get_header(); ?>

<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>

        <article class="single-post-layout">
            
            <!-- 1. The Unique Hero Banner (Uses the same banner image from your card!) -->
            <header class="hero-single-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>');">
                <div class="post-hero-content">
                    <h1><?php the_title(); ?></h1>
                    <span class="post-author">Written by <?php the_author(); ?></span>
                    <span class="post-date">Published: <?php echo get_the_date(); ?></span>
                </div>
            </header>

            <!-- 2. The Main Article Body Content -->
            <div class="post-body-container">
                <?php
                $video_field_value = get_field( 'video_url', get_the_ID() );
                $video_embed = $video_field_value;

                if ( is_string( $video_field_value ) && filter_var( $video_field_value, FILTER_VALIDATE_URL ) ) {
                    $video_embed = wp_oembed_get( esc_url_raw( $video_field_value ) );
                }

                if ( ! $video_embed ) {
                    $video_url = get_field( 'video_url', get_the_ID(), false );
                    $video_embed = $video_url ? wp_oembed_get( esc_url_raw( $video_url ) ) : false;
                }

                if ( $video_embed ) :
                ?>
                    <figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube">
                        <div class="wp-block-embed__wrapper">
                            <?php echo $video_embed; ?>
                        </div>
                    </figure>
                <?php endif; ?>

                <div class="post-entry-content">
                    <?php the_content(); ?> <!-- This grabs ALL paragraphs, images, and text typed in the dashboard editor -->

                    <?php 
                    /**
                     * Check if this post is a book review.
                     * Swap 'reviews' below with your exact category slug or category ID if it is different.
                     */
                    if ( has_category( 'reviews' ) ) {
                        get_template_part( 'book-review-box' ); 
                    }
                    ?>

                    <p class="affiliate-disclaimer"><small><strong>DISCLAIMER:</strong> This article may contain affiliate links that help you find products related to this topic. This means that if you <strong>make a purchase</strong> through one of these links, this site receives a small commission <strong>at no extra cost to you.</strong> While this helps us create more content, <strong>you are in NO WAY obligated to use these links.</strong> Thank you for your support!</small></p>
                </div>
            </div>

        </article>

    <?php 
    endwhile; 
endif; 
?>

<?php get_footer(); ?>