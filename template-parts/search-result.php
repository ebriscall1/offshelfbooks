<article class="search-result">
    <?php
    $search_result_category_label = 'Blog';

    if ( 'post' !== get_post_type() ) {
        $search_result_categories = get_the_terms( get_the_ID(), 'category' );

        if ( ! empty( $search_result_categories ) && ! is_wp_error( $search_result_categories ) ) {
            $search_result_category_label = $search_result_categories[0]->name;
        } else {
            $search_result_category_label = 'Content';
        }
    }
    ?>
    <a class="search-result-thumbnail" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( 'Read %s', get_the_title() ) ); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'thumbnail', array( 'alt' => '' ) ); ?>
        <?php elseif ( 'post' === get_post_type() ) : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="" />
        <?php else : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="" />
        <?php endif; ?>
    </a>
    <div class="search-result-content">
        <p class="search-result-category"><?php echo esc_html( $search_result_category_label ); ?></p>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
    </div>
</article>
