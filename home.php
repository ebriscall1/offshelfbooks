<?php get_header(); ?>

<section class="hero-blog-page">
    <h1>Blog</h1>
</section>

<section class="blog">
    <h2>Recent Blog Posts</h2>
    <div class="blog-container">
        <?php 
        // 1. Check if there are any published blog posts in your database
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                
                <!-- 2. THIS IS THE SINGLE CARD TEMPLATE (Repeats automatically) -->
                <div class="blog-card">
                    <div class="image-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <!-- Pulls the unique featured image you uploaded for this specific post -->
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php else : ?>
                            <!-- Fallback image if you forget to upload a thumbnail in the dashboard -->
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="Fallback Cover" />
                        <?php endif; ?>
                    </div>
                    
                    <div class="blog-content">
                        <!-- Pulls the dynamic post title from the dashboard -->
                        <h3><?php the_title(); ?></h3>
                        
                        <!-- Pulls the dynamic summary text snippet automatically -->
                        <div class="excerpt-box">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <!-- Clean, valid HTML link pointing dynamically to the full single.php article -->
                        <button class="primary-btn">
                            <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                        </button>
                    </div>  
                </div>
                <!-- END OF SINGLE CARD -->

            <?php 
            endwhile; 
            
            // Standard previous/next page navigation links if you have more than 10 posts
            the_posts_navigation();

        else : ?>
            <!-- Fallback message if no posts have been published yet -->
            <p>No blog posts found on the server yet.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>