<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Meta Tags -->
    <meta name="author" content="Evan Briscall | ebriscall1 on GitHub" />

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <?php 
    // CRUCIAL: This allows WordPress to inject your compiled main.css file
    wp_head(); 
    ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="site-header">
      <div class="header-inner">
        <div class="header-bar">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <img
              src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/off-shelf-books-logo.svg"
              alt="Off Shelf Books Logo"
            />
          </a>
          <button class="toggle-btn" aria-label="Open menu">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/menu.svg" alt="Expand menu" />
          </button>
        </div>

        <nav class="main-nav">
          <ul class="main-menu">
            <li class="has-dropdown">
              <a href="#" class="dropdown-link" id="content-link">
                Content <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" />
              </a>
              <ul class="second-tier" id="dropdownContent">
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Conversations</a></li>
                <li><a href="#">Hands On</a></li>
                <li><a href="#">Topic</a></li>
                <li><a href="#">Talk</a></li>
                <li><a href="#">Tour</a></li>
              </ul>
            </li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Shop</a></li>
            <li class="has-dropdown">
              <a href="#" class="dropdown-link" id="about-link">
                About <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" />
              </a>
              <ul class="second-tier" id="dropdownAbout">
                <li><a href="#">Contact</a></li>
              </ul>
            </li>
            <li class="search-item">
              <!-- Replaced your static form with the native working WordPress form -->
              <?php get_search_form(); ?>
            </li>
          </ul>
        </nav>
      </div>
    </header>
