<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'offshelfbooks' ); ?></span>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'offshelfbooks' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'offshelfbooks' ); ?>">
    <?php echo esc_html_x( 'Search', 'submit button', 'offshelfbooks' ); ?>
  </button>
</form>
