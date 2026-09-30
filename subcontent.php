<?php
/*
Template Name: Sub-Content Grid Layout
*/
?>
<?php get_header(); ?>

<section class="hero-subcontent-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <h1><?php the_title(); ?></h1> 
</section>

<section class="subcontent-container">
    <!-- The WordPress loop will automatically load as much or as little content as you add to this specific page in the dashboard -->

    <!-- Card -->
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">
        <div class="card-thumbnail">
            <!-- Replace this placeholder URL with your local asset with this path later under img src "": https://placeholder.com -->
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Mere Christianity Book Cover">
            <h3>Mere Christianity</h3>
        </div>

    </a>
    <!-- End of Card -->

        <!-- Card -->
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">
        <div class="card-thumbnail">
            <!-- Replace this placeholder URL with your local asset with this path later under img src "": https://placeholder.com -->
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Mere Christianity Book Cover">
            <h3>Mere Christianity</h3>
        </div>
    </a>
    <!-- End of Card -->

    <!-- Card -->
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">
        <div class="card-thumbnail">
            <!-- Replace this placeholder URL with your local asset with this path later under img src "": https://placeholder.com -->
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Mere Christianity Book Cover">
            <h3>Mere Christianity</h3>
        </div>
    </a>
    <!-- End of Card -->

    <!-- Card -->
    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">
        <div class="card-thumbnail">
            <!-- Replace this placeholder URL with your local asset with this path later under img src "": https://placeholder.com -->
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Mere Christianity Book Cover">
            <h3>Mere Christianity</h3>
        </div>
    </a>
    <!-- End of Card -->

    <?php 
    if (have_posts()) : 
        while (have_posts()) : the_post();
            the_content();
        endwhile; 
    endif; 
    ?>
</section>

<?php get_footer(); ?>