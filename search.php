<?php get_header(); ?>

<section class="search-header-banner" aria-labelledby="search-title">
    <div class="search-container">
        
        <!-- 1. Dynamic Title -->
        <h1 class="search-title" id="search-title">
            Results for: <span>“<?php echo esc_html( get_search_query() ); ?>”</span>
        </h1>
        
        <!-- 2. Result Count -->
        <p class="search-count">
            <?php
            global $wp_query;
            printf(
                esc_html( _n( 'We found %s article matching your request.', 'We found %s articles matching your request.', (int) $wp_query->found_posts, 'offshelfbooks' ) ),
                number_format_i18n( (int) $wp_query->found_posts )
            );
            ?>
        </p>
        
        <!-- 3. Backup Search Bar -->
        <div class="search-again-box">
            <?php get_search_form(); ?>
        </div>

    </div>
</section>

<main class="search-results-list">
    <?php if ( have_posts() ) : ?>
        <div class="search-results-grid">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/search-result' );
            endwhile;
            ?>
        </div>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <p class="search-no-results">No articles matched your search. Try another search.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>