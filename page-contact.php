<?php get_header(); ?>

<section class="hero-contact-page">
    <h1>Contact</h1>
</section>

<section class="contact">
    <h2>Give us a shout!</h2>

        <!-- Render the Contact Form 7 layout directly -->
    <?php echo do_shortcode('[contact-form-7 id="2e65e00" title="Contact Form"]'); ?>
</section>

<?php get_footer(); ?>