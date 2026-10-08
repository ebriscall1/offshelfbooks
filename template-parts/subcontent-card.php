<article class="subcontent-card-item">
    <!-- The whole card links to its content item; use a fallback cover if needed. -->
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
