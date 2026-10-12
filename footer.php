<footer>
    <div class="footer-container">
      <!-- Site identity links back to the homepage. -->
      <div class="footer-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
          <img class="logo-light" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/off-shelf-books-logo.svg" alt="Off Shelf Books Logo" />
          <img class="logo-dark" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/off-shelf-books-logo-white.svg" alt="" aria-hidden="true" />
        </a>
      </div>
      <!-- Footer navigation mirrors the site's main content and About sections. -->
      <div class="footer-columns">
        <div class="footer-menu">
          <div>
            <h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'content' ) ) ); ?>">Content</a></h3>
            <ul>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">Reviews</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'conversations' ) ) ); ?>">Conversations</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'hands-on' ) ) ); ?>">Hands On</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'topics' ) ) ); ?>">Topics</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'talks' ) ) ); ?>">Talks</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'tours' ) ) ); ?>">Tours</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-links">
          <div>
            <h3><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>">About</a></h3>
            <ul>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">Contact</a></li>
            </ul>
          </div>
          <div>
            <h4>Follow Us</h4>
            <ul>
              <li>
                <a href="https://www.facebook.com/offshelf" target="_blank" rel="noopener" class="social-icon social-facebook"
                  ><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/facebook.svg" alt="Facebook Logo"
                /></a>
              </li>
              <li>
                <a href="https://x.com/_offshelf" target="_blank" rel="noopener" class="social-icon social-x"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/x.svg" alt="X Logo" /></a>
              </li>
              <li>
                <a href="https://www.instagram.com/_offshelf/" target="_blank" rel="noopener" class="social-icon social-instagram"
                  ><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/instagram.svg" alt="Instagram Logo"
                /></a>
              </li>
              <li>
                <a href="https://www.youtube.com/@offshelfbooks" target="_blank" rel="noopener" class="social-icon social-youtube"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/youtube.svg" alt="YouTube Logo" /></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Keep the copyright year current automatically. -->
      <p>&copy; <?php echo date('Y'); ?> OFF SHELF BOOKS</p>
    </div>
    </footer>

    <?php 
    // CRUCIAL: This allows WordPress to load your main.js file
    wp_footer(); 
    ?>
  </body>
</html>