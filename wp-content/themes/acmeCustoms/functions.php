<?php 

function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/bootstrap/css/bootstrap.css' );
    wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
?>

<?php
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'FindlayTheme' ) );
        } endif;
?>

<?php // Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');
?>



