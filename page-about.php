<?php get_header(); ?>

<section class="hero-about-page">
    <h1>About</h1>
</section>

<section class="about">
    <!-- The about text and image are maintained directly in this page template. -->
    <h2>Our Short Story</h2>
    <div class="about-container">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="" />
        <p>What started out as a problem of having too many unread books on my shelf, has now turned into a mission to both reading these books and actually remembering what I learned from these authors.
        </p>
        <p>To help remember what I learned, I started writing out my thoughts in a journal. As time went on, I did not want to lose my writings, so I created an online blog as a way to embrace both reading and writing. It was then the blog, “Off Shelf Book Reviews” was born.
        </p>
        <p>While the content was book reviews, I did not want to limit my content only to that type. I wanted have more flexibility and different ways to explore faith based books. The name was then altered to “Off Shelf Books”.
        </p>
        <p>Today, Off Shelf Books has become a platform that explores faith based books where I get to share what I am learning while keeping books off my shelf rather than on it.
        </p>
    </div>
</section>

<section class="faq">
    <h2>FAQ</h2>
    <!-- Native details/summary elements provide accessible, no-JavaScript accordions. -->
    <div class="faq-container">
        <details class="faq-item">
            <summary>Why "Off Shelf Books"?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>The name comes from having too many unread books on my book shelf. Books are never read if they are sitting on the shelf. So the more I read, the more I keep books off my shelf rather than on it. So once a book was read, it would be taken “off the book shelf”. Off Shelf just sounded better.</p>
        </details>
        <details class="faq-item">
            <summary>Will You review my book?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>Not likely. You can always suggest a book, but do not expect it to be reviewed. With so many books out there, we are very selective in our choices. If our platform grows in size, then that may be a possibility. But as of now, we accept suggestions; not submissions.</p>
        </details>
        <details class="faq-item">
            <summary>Do you accept free books to review?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>We sometimes accept free books, but ONLY from established publishers. Generally we buy our books in order to freely give our own honest opinion without any obligation or pressure of having to give a favorable one.</p>
        </details>
        <details class="faq-item">
            <summary>Do you focus on books outside of 'Faith Based'?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>Our tagline is, "Exploring Faith Based Books". So we generally do not. But we believe every person, let alone author, places their faith in something or someone. We explore what that is.</p>
        </details>
        <details class="faq-item">
            <summary>Do you explore other faiths aside from Christianity?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>Yes. While the Christian faith is the one we overwhelmingly explore, we do want to explore other faiths.</p>
        </details>
        <details class="faq-item">
            <summary>Do you have a bias towards Christianity?<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" /></summary>
            <p>Everyone has a bias. We along with everyone should strive to remove as much bias as possible and seek truth above all.</p>
        </details>
    </div>
</section>

<?php get_footer(); ?>