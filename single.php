<?php get_header(); ?>

<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>

        <article class="single-post-layout">
            
            <!-- 1. The Unique Hero Banner (Uses the same banner image from your card!) -->
            <header class="hero-single-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>');">
                <div class="post-hero-content">
                    <h1><?php the_title(); ?></h1>
                    <span class="post-date">Published on <?php echo get_the_date(); ?></span>
                </div>
            </header>

            <!-- 2. The Main Article Body Content -->
            <div class="post-body-container">
                <div class="post-entry-content">
                    <?php the_content(); ?> <!-- This grabs ALL paragraphs, images, and text typed in the dashboard editor -->
                </div>
            </div>

        </article>

    <?php 
    endwhile; 
endif; 
?>

<?php get_footer(); ?>