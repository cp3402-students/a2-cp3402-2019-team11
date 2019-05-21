<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Coffee_Can_Theme
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses coffee_can_theme_header_style()
 */
function coffee_can_theme_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'coffee_can_theme_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'DD3333',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'coffee_can_theme_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'coffee_can_theme_custom_header_setup' );

