<?php
/*
Template Name: Sub-Content Grid Layout
*/
?>
<?php get_header(); ?>

<section class="hero-subcontent-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <h1><?php the_title(); ?></h1> 
</section>

<!-- 2. The Cards Container -->
<section class="subcontent-container">
    <div class="subcontent-grid" id="subcontent-grid">
        <?php
        // Grabs the slug of the current page (e.g. 'topics', 'reviews', 'tour')
        $current_page_slug = get_post_field('post_name', get_the_ID());

        $subcontent_args = array(
            'post_type'      => 'offshelf_cards',
            'post_status'    => 'publish',
            'category_name'  => $current_page_slug,
            'posts_per_page' => 16,
            'paged'          => 1,
        );

        $subcontent_query = new WP_Query($subcontent_args);

        // Render the first batch using the same card template as AJAX-loaded results.
        if ($subcontent_query->have_posts()) :
            while ($subcontent_query->have_posts()) : $subcontent_query->the_post(); ?>
                <?php get_template_part('template-parts/subcontent-card'); ?>
            <?php
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p class="no-posts-msg">No cards found in the <?php the_title(); ?> section yet.</p>
        <?php endif; ?>
    </div>
    <!-- Offer more results only when this category has another page of cards. -->
    <?php if ($subcontent_query->max_num_pages > 1) : ?>
        <button
            class="load-more-button subcontent-load-more"
            type="button"
            data-category="<?php echo esc_attr($current_page_slug); ?>"
            data-page="1"
            aria-controls="subcontent-grid"
        >Load More</button>
        <p class="load-more-status subcontent-load-status" role="status" aria-live="polite"></p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>