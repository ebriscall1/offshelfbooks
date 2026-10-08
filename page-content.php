
<?php get_header(); ?>

<section class="hero-content-page">
    <h1>Content</h1>
</section>

<section class="content">
    <h2>Our Videos</h2>
    <!-- These manually curated links lead to each content category landing page. -->
    <div class="content-container">
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/reviews-banner.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>" class="overlay-button">Reviews</a>
            </div>
            <p>The content that started it all. Reviews are our in-depth thoughts and analysis of the books we read.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/conversations-thumb.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'conversations' ) ) ); ?>" class="overlay-button">Conversations</a>
            </div>
            <p>Our series of thought-provoking dialogues that range not just beyond books, but also our culture and our world.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/hands-on-thumb.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'hands-on' ) ) ); ?>" class="overlay-button">Hands On</a>
            </div>
            <p>Taking a deeper look at the physical pages and artwork of unique books and products.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/talk-banner.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'talks' ) ) ); ?>" class="overlay-button">Talks</a>
            </div>
            <p>The content that started it all. Reviews are our in-depth thoughts and analysis of the books we read.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/topic-banner.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'topics' ) ) ); ?>" class="overlay-button">Topics</a>
            </div>
            <p>Our series of thought-provoking dialogues that range not just beyond books, but also our culture and our world.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/tour-banner.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'tours' ) ) ); ?>" class="overlay-button">Tours</a>
            </div>
            <p>Taking a deeper look at the physical pages and artwork of unique books and products.</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>