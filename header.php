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
          <button class="toggle-btn" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="site-navigation">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </button>
        </div>

        <nav class="main-nav" id="site-navigation">
          <ul class="main-menu">
            <li class="has-dropdown">
              <div class="dropdown-controls">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'content' ) ) ); ?>" class="dropdown-link desktop-dropdown-link">
                  Content <img class="desktop-chevron" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" />
                </a>
                <button type="button" class="dropdown-link mobile-dropdown-toggle" aria-label="Toggle Content submenu" aria-expanded="false" aria-controls="dropdownContent">
                  <img class="mobile-chevron" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" />
                </button>
              </div>
              <ul class="second-tier" id="dropdownContent">
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'reviews' ) ) ); ?>">Reviews</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'conversations' ) ) ); ?>">Conversations</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'hands-on' ) ) ); ?>">Hands On</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'topics' ) ) ); ?>">Topics</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'talks' ) ) ); ?>">Talks</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'tours' ) ) ); ?>">Tours</a></li>
              </ul>
            </li>
            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Blog</a></li>
            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'shop' ) ) ); ?>">Shop</a></li>
            <li class="has-dropdown">
              <div class="dropdown-controls">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>" class="dropdown-link desktop-dropdown-link">
                  About <img class="desktop-chevron" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" />
                </a>
                <button type="button" class="dropdown-link mobile-dropdown-toggle" aria-label="Toggle About submenu" aria-expanded="false" aria-controls="dropdownAbout">
                  <img class="mobile-chevron" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/down-chevron.svg" alt="" aria-hidden="true" />
                </button>
              </div>
              <ul class="second-tier" id="dropdownAbout">
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">Contact</a></li>
              </ul>
            </li>
            <li>
              <?php get_search_form(); ?>
            </li>
          </ul>
        </nav>
      </div>
    </header>
