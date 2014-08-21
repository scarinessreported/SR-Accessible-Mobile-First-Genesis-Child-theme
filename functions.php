<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'srstarter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'srstarter' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'SR Accessible Mobile First Starter Theme', 'srstarter' );
define( 'CHILD_THEME_URL', 'http://scarinessreported.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Add responsive menu script
add_action( 'wp_enqueue_scripts', 'sr_starter_scripts' );
function sr_starter_scripts() {
    wp_enqueue_script( 'sr_starter-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
}

//* Enqueue Dashicons
add_action( 'wp_enqueue_scripts', 'enqueue_dashicons' );
function enqueue_dashicons() {
    wp_enqueue_style( 'dashicons' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sr_custom_footer' );
function sr_custom_footer() {
    ?>
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo ( 'name' );  ?></a> &middot; <?php _e( 'All Rights Reserved &middot; Theme by','srstarter' ); ?>  <a href="http://scarinessreported.com/">Scariness Reported</a></p>
<?php
}