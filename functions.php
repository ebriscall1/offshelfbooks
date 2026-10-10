<?php
// Load the compiled theme assets and pass AJAX settings to the browser script.
function offshelfbooks_scripts() {
    $css_path = get_template_directory() . '/css/main.css';
    
    // Content hashes ensure browsers fetch updated files without manual version changes.
    $css_version = file_exists( $css_path ) ? hash_file( 'sha256', $css_path ) : '1.0.0';
    $js_path = get_template_directory() . '/js/main.js';
    $js_version = file_exists( $js_path ) ? hash_file( 'sha256', $js_path ) : '1.0.0';

    wp_enqueue_style( 
        'offshelfbooks-main-style', 
        get_template_directory_uri() . '/css/main.css', 
        array(), 
        $css_version 
    );

    wp_enqueue_script( 
        'offshelfbooks-main-script', 
        get_template_directory_uri() . '/js/main.js', 
        array(), 
        $js_version,
        true 
    );

    wp_localize_script(
        'offshelfbooks-main-script',
        'offshelfbooksLoadMore',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonces'  => array(
                'offshelfbooks_load_subcontent' => wp_create_nonce('offshelfbooks_load_subcontent'),
                'offshelfbooks_load_blog'       => wp_create_nonce('offshelfbooks_load_blog'),
            ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'offshelfbooks_scripts' );

// Let the browser discover the homepage's CSS background image before stylesheets load.
function offshelfbooks_preload_homepage_lcp_image() {
    if ( ! is_front_page() ) {
        return;
    }

    $image_url = get_template_directory_uri() . '/img/hero-content-banner.webp';
    printf(
        "<link rel=\"preload\" as=\"image\" href=\"%s\" fetchpriority=\"high\">\n",
        esc_url( $image_url )
    );
}
add_action( 'wp_head', 'offshelfbooks_preload_homepage_lcp_image', 1 );

// Establish Google Fonts connections early to reduce stylesheet and font latency.
function offshelfbooks_google_fonts_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' !== $relation_type ) {
        return $urls;
    }

    $urls[] = 'https://fonts.googleapis.com';
    $urls[] = array(
        'href'        => 'https://fonts.gstatic.com',
        'crossorigin' => 'anonymous',
    );

    return $urls;
}
add_filter( 'wp_resource_hints', 'offshelfbooks_google_fonts_resource_hints', 10, 2 );

// Return the next page of category-filtered content cards for the Load More control.
function offshelfbooks_load_subcontent() {
    check_ajax_referer('offshelfbooks_load_subcontent', 'nonce');

    $category_slug = isset($_POST['category']) ? sanitize_title(wp_unslash($_POST['category'])) : '';
    $page = isset($_POST['page']) ? absint($_POST['page']) : 0;

    if (!$category_slug || $page < 2 || !get_category_by_slug($category_slug)) {
        wp_send_json_error(array('message' => 'Invalid request for more cards.'), 400);
    }

    $subcontent_query = new WP_Query(array(
        'post_type'      => 'offshelf_cards',
        'post_status'    => 'publish',
        'category_name'  => $category_slug,
        'posts_per_page' => 16,
        'paged'          => $page,
    ));

    // Capture rendered card templates so the client can append them to the existing grid.
    ob_start();
    while ($subcontent_query->have_posts()) {
        $subcontent_query->the_post();
        get_template_part('template-parts/subcontent-card');
    }
    wp_reset_postdata();
    $cards_html = ob_get_clean();

    wp_send_json_success(array(
        'html'      => $cards_html,
        'hasMore'   => $page < $subcontent_query->max_num_pages,
    ));
}
add_action('wp_ajax_offshelfbooks_load_subcontent', 'offshelfbooks_load_subcontent');
add_action('wp_ajax_nopriv_offshelfbooks_load_subcontent', 'offshelfbooks_load_subcontent');

// Return the next batch of blog cards for the blog archive.
function offshelfbooks_load_blog() {
    check_ajax_referer('offshelfbooks_load_blog', 'nonce');

    $page = isset($_POST['page']) ? absint(wp_unslash($_POST['page'])) : 0;

    if ($page < 2) {
        wp_send_json_error(array('message' => 'Invalid request for more blog posts.'), 400);
    }

    $blog_query = new WP_Query(array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 16,
        'paged'          => $page,
        'ignore_sticky_posts' => true,
    ));

    // Reuse the archive card template to keep initial and AJAX-loaded cards consistent.
    ob_start();
    while ($blog_query->have_posts()) {
        $blog_query->the_post();
        get_template_part('template-parts/blog-card');
    }
    wp_reset_postdata();
    $cards_html = ob_get_clean();

    wp_send_json_success(array(
        'html'    => $cards_html,
        'hasMore' => $page < $blog_query->max_num_pages,
    ));
}
add_action('wp_ajax_offshelfbooks_load_blog', 'offshelfbooks_load_blog');
add_action('wp_ajax_nopriv_offshelfbooks_load_blog', 'offshelfbooks_load_blog');

// Apply the same batch size used by the blog Load More endpoint to the main archive query.
function offshelfbooks_blog_page_size($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_home()) {
        $query->set('posts_per_page', 16);
        $query->set('ignore_sticky_posts', true);
    }
}
add_action('pre_get_posts', 'offshelfbooks_blog_page_size');

// Register WordPress theme supports used throughout the templates.
function offshelfbooks_theme_setup() {
    // Enable featured images for supported posts and pages.
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'offshelfbooks_theme_setup' );


// Register the editorial content-card post type used by category landing pages.
function offshelfbooks_register_custom_post_type() {
    $labels = array(
        'name'               => 'Sub-Content Items',
        'singular_name'      => 'Sub-Content Item',
        'menu_name'          => 'Sub-Content',
        'all_items'          => 'All Items',
        'add_new_item'       => 'Add New Item',
        'edit_item'          => 'Edit Item',
        'new_item'           => 'New Item',
        'view_item'          => 'View Item',
        'search_items'       => 'Search Items',
        'not_found'          => 'No items found',
        'not_found_in_trash' => 'No items found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'exclude_from_search' => false,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-portfolio', // Changes the dashboard menu icon to a briefcase/folder
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // Enables titles, block editor, and featured images
        'hierarchical'        => false,
        'show_in_rest'        => true, // CRITICAL: Enables the modern Gutenberg block editor
        'taxonomies'          => array( 'category', 'post_tag' ), // Enables the existing categories and WordPress tags
    );

    // Using 'offshelf_cards' ensures there are no URL clashes with subcontent.php
    register_post_type( 'offshelf_cards', $args );

}
add_action( 'init', 'offshelfbooks_register_custom_post_type' );

function offshelfbooks_card_permalink( $post_link, $post ) {
    if ( 'offshelf_cards' !== $post->post_type ) {
        return $post_link;
    }

    // Nest each content card under its first category in the public URL.
    $categories = get_the_terms( $post->ID, 'category' );
    if ( empty( $categories ) || is_wp_error( $categories ) ) {
        return $post_link;
    }

    $category = reset( $categories );
    $path = $category->slug . '/' . $post->post_name;

    return home_url( user_trailingslashit( $path, 'single' ) );
}
add_filter( 'post_type_link', 'offshelfbooks_card_permalink', 10, 2 );

function offshelfbooks_card_rewrite_rules() {
    $categories = get_categories( array( 'hide_empty' => false ) );
    if ( empty( $categories ) ) {
        return;
    }

    // Match category/card paths and resolve them to the custom post type query.
    $category_slugs = array_map(
        function ( $category ) {
            return preg_quote( $category->slug, '#' );
        },
        $categories
    );

    add_rewrite_rule(
        '^(' . implode( '|', $category_slugs ) . ')/([^/]+)/?$',
        'index.php?offshelf_cards=$matches[2]&category_name=$matches[1]',
        'top'
    );
}
add_action( 'init', 'offshelfbooks_card_rewrite_rules', 20 );

// Keep generated excerpts a consistent length across the theme.
function offshelfbooks_custom_excerpt_length( $length ) {
    return 15; 
}
add_filter( 'excerpt_length', 'offshelfbooks_custom_excerpt_length', 999 );

// Replace WordPress's default excerpt suffix with a plain ellipsis.
function offshelfbooks_custom_excerpt_more( $more ) {
    return '...'; 
}
add_filter( 'excerpt_more', 'offshelfbooks_custom_excerpt_more' );