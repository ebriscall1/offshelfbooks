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
        <div class="scrolling-wrapper" id="latest-content-carousel">
          <?php
          // Fetch the ten newest content cards for the homepage carousel.
          $latest_content_query = new WP_Query( array(
              'post_type'      => 'offshelf_cards',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
          ) );

          // Render the shared card structure, then restore the main page query.
          if ( $latest_content_query->have_posts() ) :
              while ( $latest_content_query->have_posts() ) : $latest_content_query->the_post(); ?>
                  <article class="card">
                    <a href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mere-christianity.webp" alt="Default content thumbnail" />
                      <?php endif; ?>
                      <h3><?php the_title(); ?></h3>
                    </a>
                  </article>
              <?php endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
        <!-- The custom scrollbar is linked to the overflow container by aria-controls. -->
        <div class="carousel-scrollbar" role="scrollbar" aria-label="Latest content carousel position" aria-controls="latest-content-carousel" aria-orientation="horizontal" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" tabindex="0">
          <div class="carousel-scrollbar-thumb"></div>
        </div>
      </section>

      <section class="hero-blog">
        <div class="text">
          <h2>Explore the reliability <br />of Jesus</h2>
          <p class="description">
            "Who do you say that I am?" is the famous question Jesus asked his disciples. So who do you think he is?
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Blog</a>
        </div>
      </section>

      <section class="carousel">
        <h2>Latest Blogs</h2>
        <div class="scrolling-wrapper" id="latest-blogs-carousel">
          <?php
          // Fetch the ten newest standard posts for the second homepage carousel.
          $latest_blog_query = new WP_Query( array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'orderby'        => 'date',
              'order'          => 'DESC',
          ) );

          // Render blog cards and restore the main page query when complete.
          if ( $latest_blog_query->have_posts() ) :
              while ( $latest_blog_query->have_posts() ) : $latest_blog_query->the_post(); ?>
                  <article class="card">
                    <a href="<?php the_permalink(); ?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium' ); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/about-page.webp" alt="Default blog thumbnail" />
                      <?php endif; ?>
                      <h3><?php the_title(); ?></h3>
                    </a>
                  </article>
              <?php endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
        <!-- Keep the blogs scrollbar independently connected to its own carousel. -->
        <div class="carousel-scrollbar" role="scrollbar" aria-label="Latest blogs carousel position" aria-controls="latest-blogs-carousel" aria-orientation="horizontal" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" tabindex="0">
          <div class="carousel-scrollbar-thumb"></div>
        </div>
      </section>

      <section class="hero-shop">
        <div class="text">
          <h2>Discover our <br />latest items</h2>
          <p class="description">
            Thoughtful accessories for readers, believers, and seekers.
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'shop' ) ) ); ?>">Shop</a>
        </div>
      </section>

      <section class="hero-about">
        <div class="text">
          <h2>Learn more about <br />Off Shelf Books</h2>
          <p class="description">
            Learn a little bit more about the mission of Off Shelf Books, and how the vision all started.
          </p>
          <a class="primary-btn" href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>">About</a>
        </div>
      </section>
    </main>
    <?php get_footer(); ?>