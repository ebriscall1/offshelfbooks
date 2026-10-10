<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<main id="primary" class="site-main error-page-main">
    <section class="error-404 not-found">
        
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can’t be found.', 'offshelfbooks' ); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'offshelfbooks' ); ?></p>
            
            <!-- Crucial WordPress Search Form -->
            <?php get_search_form(); ?>

            <a class="primary-btn error-home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php esc_html_e( 'Home', 'offshelfbooks' ); ?>
            </a>
        </div>
        
    </section>
</main>

<?php
get_footer();