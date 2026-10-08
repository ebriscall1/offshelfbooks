<article class="blog-card">
    <!-- Use a featured image when available and a theme fallback otherwise. -->
    <div class="image-wrapper">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/about-page.webp" alt="Fallback Cover" />
        <?php endif; ?>
    </div>

    <div class="blog-content">
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="primary-btn btn">Read More</a>
    </div>
</article>
