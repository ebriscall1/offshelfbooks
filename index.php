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
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'content' ) ) ); ?>">Content</a>
        </div>
      </section>

      <section class="carousel">
        <h2>Latest Content</h2>
        <div class="scrolling-wrapper">
          <?php
          $latest_content_query = new WP_Query( array(
              'post_type'      => 'offshelf_cards',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
          ) );

          if ( $latest_content_query->have_posts() ) :
              while ( $latest_content_query->have_posts() ) : $latest_content_query->the_post(); ?>
                  <div class="card">
                    <a href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Default content thumbnail" />
                      <?php endif; ?>
                      <h4><?php the_title(); ?></h4>
                    </a>
                  </div>
              <?php endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
      </section>

      <section class="hero-blog">
        <div class="text">
          <h1>Explore the reliability <br />of Jesus</h1>
          <p class="description">
            "Who do you say that I am?" is the famous question Jesus asked...
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Blog</a>
        </div>
      </section>

      <section class="carousel">
        <h2>Latest Blogs</h2>
        <div class="scrolling-wrapper">
          <?php
          $latest_blog_query = new WP_Query( array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
          ) );

          if ( $latest_blog_query->have_posts() ) :
              while ( $latest_blog_query->have_posts() ) : $latest_blog_query->the_post(); ?>
                  <div class="card">
                    <a href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="Default blog thumbnail" />
                      <?php endif; ?>
                      <h4><?php the_title(); ?></h4>
                    </a>
                  </div>
              <?php endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
      </section>

      <section class="hero-shop">
        <div class="text">
          <h1>Discover our latest items</h1>
          <p class="description">
            Thoughtful accessories for readers, believers, and seekers...
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'shop' ) ) ); ?>">Shop</a>
        </div>
      </section>

      <section class="hero-about">
        <div class="text">
          <h1>Learn more about <br />Off Shelf Books</h1>
          <p class="description">
            Thoughtful accessories for readers, believers, and seekers...
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>">About</a>
        </div>
      </section>
    </main>
    <?php get_footer(); ?>