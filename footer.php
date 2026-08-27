<footer>
      <div class="footer-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/off-shelf-books-logo.svg" alt="Off Shelf Books Logo" />
        </a>
      </div>
      <div class="footer-columns">
        <div class="footer-menu">
          <div>
            <h4>Content</h4>
            <ul>
              <li>Reviews</li>
              <li>Conversations</li>
              <li>Hands On</li>
              <li>Topic</li>
              <li>Talk</li>
              <li>Tour</li>
            </ul>
          </div>
        </div>
        <div class="footer-links">
          <div>
            <h4>Resources</h4>
            <ul>
              <li>Contact</li>
            </ul>
          </div>
          <div>
            <h4>Follow Us</h4>
            <ul>
              <li>
                <a href="#"
                  ><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/facebook.svg" alt="Facebook Logo"
                /></a>
              </li>
              <li>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/x.svg" alt="X Logo" /></a>
              </li>
              <li>
                <a href="#"
                  ><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/instagram.svg" alt="Instagram Logo"
                /></a>
              </li>
              <li>
                <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/youtube.svg" alt="YouTube Logo" /></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <p>&copy; <?php echo date('Y'); ?> OFF SHELF BOOKS</p>
    </footer>

    <?php 
    // CRUCIAL: This allows WordPress to load your main.js file
    wp_footer(); 
    ?>
  </body>
</html>