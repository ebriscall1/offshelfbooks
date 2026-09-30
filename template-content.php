
<?php get_header(); ?>

<section class="hero-content-page">
    <h1>Content</h1>
</section>

<section class="content">
    <h2>Our Videos</h2>
    <div class="content-container">
        <div class="content-card">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Mere Christianity Book Cover" />
            <p>The content that started it all. Reviews are our in-depth thoughts and analysis of the books we read.</p>
        </div>
        <div class="content-card">
            <div class="image-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/the-chosen-volume-one.webp" alt="The Chosen Volume 1 Book Cover" />
                <a href="#" class="overlay-button">REVIEWS</a>
            </div>
            <p>Our series of thought-provoking dialogues that range not just beyond books, but also our culture and our world.</p>
        </div>
        <div class="content-card">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/what-are-some-of-your-favourite-authors-and-why.webp" alt="Favourite Authors thumbnail" />
            <p>Taking a deeper look at the physical pages and artwork of unique books and products.</p>
        </div>
    </div>


<?php get_footer(); ?>