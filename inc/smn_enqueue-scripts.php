<?php
/**
 * Enqueue scripts and styles.
 */

 function smn_scripts() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'coontigos-js', get_template_directory_uri() . '/assets/js/coontigos.js', array(), true );
	
	if ( has_block( 'cb/carousel' ) ) {
        wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/slick/slick.min.css' );
        wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), null, true );
        wp_enqueue_script( 'slick-init-js', get_template_directory_uri() . '/assets/slick/init.js', array('jquery'), null, true );
    }

}
add_action( 'wp_enqueue_scripts', 'smn_scripts' );

/** 
* Gutenberg scripts and styles
*/
function smn_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_stylesheet_directory_uri() . '/assets/js/editor.js', 
		array( 'wp-blocks', 'wp-dom', 'wp-dom-ready', 'wp-edit-post' ), 
		filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'smn_gutenberg_scripts' );


/**
 * GSAP script in WordPress
*/
// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js and gsap-st passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/assets/js/gsap-animations.js', array('gsap-js', 'gsap-st'), false, true );
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );