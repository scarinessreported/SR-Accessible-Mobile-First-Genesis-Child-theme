<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'srstarter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'srstarter' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'SR Accessible Mobile First Starter Theme', 'srstarter' );
define( 'CHILD_THEME_URL', 'http://scarinessreported.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Styles and Scripts
add_action( 'wp_enqueue_scripts', 'genesis_sample_scripts' );
function genesis_sample_scripts() {

    $minnified = '.min';

    //* Remove default CSS
    wp_dequeue_style( 'sr-accessible-mobile-first-starter-theme' );

    //* Add compiled CSS
    wp_register_style( 'genesis-sample-styles', get_stylesheet_directory_uri() . '/style' . $minnified . '.css', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'genesis-sample-styles' );

    //* Add compiled JS
    wp_enqueue_script( 'genesis-sample-scripts', get_stylesheet_directory_uri() . '/js/project' . $minnified . '.js', array( 'jquery' ), CHILD_THEME_VERSION );

    //* Add css3 media queries
    wp_enqueue_script( 'css3-mediaqueries',  get_bloginfo( 'stylesheet_directory' ) . '/js/css3-mediaqueries'. $minnified . '.js', array( 'jquery' ), false, true );

    //* Enqueue Dashicons
        wp_enqueue_style( 'dashicons' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'mobile_first_remove_comment_form_allowed_tags' );
function mobile_first_remove_comment_form_allowed_tags( $defaults ) {

    $defaults['comment_notes_after'] = '';
    return $defaults;

}

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sr_custom_footer' );
function sr_custom_footer() {
    ?>
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo ( 'name' );  ?></a> &middot; <?php _e( 'All Rights Reserved &middot; Theme by','srstarter' ); ?>  <a href="http://scarinessreported.com/">Scariness Reported</a></p>
<?php
}