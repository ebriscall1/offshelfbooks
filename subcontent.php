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
    <div class="subcontent-grid">
        <?php
        // Grabs the slug of the current page (e.g. 'topics', 'reviews', 'tour')
        $current_page_slug = get_post_field('post_name', get_the_ID());

        // Tells WordPress to fetch posts matching that exact category slug
        $subcontent_args = array(
            'post_type'      => 'offshelf_cards',
            'category_name'  => $current_page_slug, 
            'posts_per_page' => -1, // -1 tells WordPress to load ALL cards for this page
        );

        $subcontent_query = new WP_Query($subcontent_args);

        // Run the dynamic loop
        if ($subcontent_query->have_posts()) :
            while ($subcontent_query->have_posts()) : $subcontent_query->the_post(); ?>
                
                <!-- This loop repeats this SINGLE card code block for every post found -->
                <article class="subcontent-card-item">
                    <a href="<?php the_permalink(); ?>" class="subcontent-card-link">
                        <div class="subcontent-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/mere-christianity.webp" alt="Default Cover">
                            <?php endif; ?>
                            
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </a>
                </article>

            <?php 
            endwhile;
            wp_reset_postdata(); // Cleans up the query memory
        else : ?>
            <!-- Fallback message if you haven't assigned posts to this category yet -->
            <p class="no-posts-msg">No cards found in the <?php the_title(); ?> section yet.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>