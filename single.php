<?php get_header(); ?>

<?php 
// Render the queried post and all of its single-page components.
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
                // Resolve the optional ACF video field to an embeddable provider response.
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
                    $share_url = get_permalink();
                    $share_title = get_the_title();
                    ?>
                    <?php 
                    /**
                     * Check if this post is a book review.
                     * Swap 'reviews' below with your exact category slug or category ID if it is different.
                     */
                    if ( has_category( 'reviews' ) ) {
                        get_template_part( 'book-review-box' ); 
                    }
                    ?>

                    <!-- Build share URLs from the current post and its title. -->
                    <div class="article-share" aria-label="Share this article">
                        <span class="article-share-label">Share this article:</span>
                        <a
                            href="<?php echo esc_url( add_query_arg( 'u', $share_url, 'https://www.facebook.com/sharer/sharer.php' ) ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on Facebook"
                        >
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/facebook.svg" alt="">
                        </a>
                        <a
                            href="<?php echo esc_url( add_query_arg( array( 'url' => $share_url, 'text' => $share_title ), 'https://twitter.com/intent/tweet' ) ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on X"
                        >
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/x.svg" alt="">
                        </a>
                    </div>

                    <?php
                    // Choose the return destination by post type, falling back safely for blogs.
                    $return_url = '';
                    $return_label = '';

                    if ( 'post' === get_post_type() ) {
                        $blog_page_id = (int) get_option( 'page_for_posts' );
                        $return_url = $blog_page_id ? get_permalink( $blog_page_id ) : home_url( '/' );
                        $return_label = 'Back to Blog';
                    } else {
                        $post_categories = get_the_terms( get_the_ID(), 'category' );
                        if ( $post_categories && ! is_wp_error( $post_categories ) ) {
                            $post_category = reset( $post_categories );
                            $category_page = get_page_by_path( $post_category->slug, OBJECT, 'page' );

                            if ( $category_page ) {
                                $return_url = get_permalink( $category_page );
                                $return_label = sprintf( 'Back to %s', $post_category->name );
                            }
                        }
                    }

                    if ( $return_url ) :
                    ?>
                        <div class="post-return-link">
                            <a class="primary-btn" href="<?php echo esc_url( $return_url ); ?>">
                                <?php echo esc_html( $return_label ); ?>
                            </a>
                        </div>
                    <?php endif; ?>



                    <?php
                    // Find up to three recent posts sharing any tag with this post.
                    $post_tags = get_the_terms( get_the_ID(), 'post_tag' );
                    if ( $post_tags && ! is_wp_error( $post_tags ) ) :
                        $tag_ids = wp_list_pluck( $post_tags, 'term_id' );
                        $related_query = new WP_Query( array(
                            'post_type'           => array( 'post', 'offshelf_cards' ),
                            'post_status'         => 'publish',
                            'posts_per_page'      => 3,
                            'post__not_in'        => array( get_the_ID() ),
                            'ignore_sticky_posts' => true,
                            'orderby'             => 'date',
                            'order'               => 'DESC',
                            'tax_query'           => array(
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'term_id',
                                    'terms'    => $tag_ids,
                                ),
                            ),
                        ) );

                        if ( $related_query->have_posts() ) :
                    ?>
                            <section class="related-content" aria-labelledby="related-content-title">
                                <h2 id="related-content-title">You May Also Like</h2>
                                <div class="related-content-grid">
                                    <?php
                                    // Reuse a shared compact card template for mixed post types.
                                    while ( $related_query->have_posts() ) :
                                        $related_query->the_post();
                                        get_template_part( 'template-parts/related-content-card' );
                                    endwhile;
                                    ?>
                                </div>
                            </section>
                            <p class="affiliate-disclaimer"><small><strong>DISCLAIMER:</strong> This article may contain affiliate links that help you find products related to this topic. This means that if you <strong>make a purchase</strong> through one of these links, this site receives a small commission <strong>at no extra cost to you.</strong> While this helps us create more content, <strong>you are in NO WAY obligated to use these links.</strong> Thank you for your support!</small></p>
                    <?php
                        endif;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

        </article>

    <?php 
    endwhile; 
endif; 
?>

<?php get_footer(); ?>