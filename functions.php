<?php
/**
 * Vinz Ideas Travel Theme Functions
 */

function vinzideas_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'vinz-ideas-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'vinzideas_theme_setup' );

function vinzideas_enqueue_styles() {
    wp_enqueue_style( 'vinzideas-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'vinzideas_enqueue_styles' );

function vinzideas_posted_meta() {
    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'vinz-ideas-theme' ),
        '<a href="' . esc_url( get_permalink() ) . '">' . get_the_date() . '</a>'
    );

    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'vinz-ideas-theme' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
}

function vinzideas_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'vinzideas_excerpt_length' );

if ( ! isset( $GLOBALS['content_width'] ) ) {
    $GLOBALS['content_width'] = 1200;
}
?>
