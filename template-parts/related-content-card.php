<article class="related-content-card">
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium' ); ?>
        <?php elseif ( 'post' === get_post_type() ) : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="" />
        <?php else : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="" />
        <?php endif; ?>
        <h3><?php the_title(); ?></h3>
    </a>
</article>
