<?php get_header(); ?>

<section class="hero-blog-page">
    <h1>Blog</h1>
</section>

<section class="blog">
    <h2>Recent Blog Posts</h2>
    <div class="blog-container" id="blog-post-grid">
        <?php 
        // 1. Check if there are any published blog posts in your database
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                
                <?php get_template_part('template-parts/blog-card'); ?>
            <?php
            endwhile;

        else : ?>
            <!-- Fallback message if no posts have been published yet -->
            <p>No blog posts found on the server yet.</p>
        <?php endif; ?>
    </div>
    <?php global $wp_query; ?>
    <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="load-more-controls">
            <button
                class="load-more-button"
                type="button"
                data-action="offshelfbooks_load_blog"
                data-page="1"
                aria-controls="blog-post-grid"
            >Load More</button>
            <p class="load-more-status" role="status" aria-live="polite"></p>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>