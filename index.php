<?php get_header(); ?>
    <main>
      <section class="hero-content">
        <div class="text">
          <h1>Examine the credibility of Christianity</h1>
          <p class="description">
            Welcome to Off Shelf Books! We are an online platform dedicated to
            examining the credibility of Christianity and the reliability of
            Jesus through testimonies of various authors. Check out our content
            to learn more!
          </p>
          <a href="#" class="btn">Content</a>
        </div>
      </section>

      <section class="carousel">
        <h2>Latest Content</h2>
        <div class="scrolling-wrapper">
          <!-- Repeat this card as needed-->
          <div class="card">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp"
              alt="Mere Christianity Book Cover"
            />
            <h4>What All Christians Believe</h4>
          </div>
          <!-- end of card -->
          <div class="card">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/the-chosen-volume-one.webp"
              alt="The Chosen Volume 1 Book Cover"
            />
            <h4>Experiencing The Chosen Series In Comic Book Format</h4>
          </div>
          <!-- end of card -->
          <div class="card">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/what-are-some-of-your-favourite-authors-and-why.webp"
              alt="Favourite Authors thumbnail"
            />
            <h4>What Are Some of Your Favourite Authors and Why?</h4>
          </div>
          <!-- end of card -->
        </div>
      </section>

      <section class="hero-blog">
        <div class="text">
          <h1>Explore the reliability <br />of Jesus</h1>
          <p class="description">
            "Who do you say that I am?" is the famous question Jesus asked...
          </p>
          <a href="#" class="btn">Blog</a>
        </div>
      </section>

      <section class="carousel">
        <h2>Latest Blogs</h2>
        <div class="carousel">
          <!-- Repeat this card as needed-->
          <div class="card">
            <img src="img/" alt="Card Image" />
            <p>Card Title</p>
          </div>
          <!-- ... -->
        </div>
      </section>

      <section class="hero-shop">
        <div class="text">
          <h1>Discover our latest items</h1>
          <p class="description">
            Thoughtful accessories for readers, believers, and seekers...
          </p>
          <a href="#" class="btn">Shop</a>
        </div>
      </section>

      <section class="hero-about">
        <div class="text">
          <h1>Learn more about <br />Off Shelf Books</h1>
          <p class="description">
            Thoughtful accessories for readers, believers, and seekers...
          </p>
          <a href="#" class="btn">About</a>
        </div>
      </section>
    </main>
    <?php get_footer(); ?>