<?php
function offshelfbooks_scripts() {
    // 1. Core Path to your compiled file
    $css_path = get_template_directory() . '/css/main.css';
    
    // 2. Automatically generate a unique version number based on file save times
    $css_version = file_exists( $css_path ) ? filemtime( $css_path ) : '1.0.0';

    // 3. Load the stylesheet with the dynamic version tracker attached
    wp_enqueue_style( 
        'offshelfbooks-main-style', 
        get_template_directory_uri() . '/css/main.css', 
        array(), 
        $css_version 
    );

    // 4. Load your main.js mobile toggle script smoothly
    wp_enqueue_script( 
        'offshelfbooks-main-script', 
        get_template_directory_uri() . '/js/main.js', 
        array(), 
        '1.0.0', 
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'offshelfbooks_scripts' );

