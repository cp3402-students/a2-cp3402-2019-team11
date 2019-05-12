<?php
/**
 * Coffee Can Theme Theme Customizer
 *
 * @package Coffee_Can_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function coffee_can_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//custom settings
    $wp_customize->add_setting('header_background', array(
        'default' => '#FADA5E',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('body_foreground', array(
        'default' => '#FFD300',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('main_text', array(
        'default' => '#404040',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));


    //custom controls
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background', array(
                'label' => __('Header background colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'header_background'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_foreground', array(
                'label' => __('Body foreground colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'body_foreground'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'main_text', array(
                'label' => __('Main text colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'main_text'
            )
        )
    );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'coffee_can_theme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'coffee_can_theme_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'coffee_can_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function coffee_can_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function coffee_can_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function coffee_can_theme_customize_preview_js() {
	wp_enqueue_script( 'coffee-can-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'coffee_can_theme_customize_preview_js' );



if ( ! function_exists( 'coffee_can_theme_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see coffee_can_theme_custom_header_setup().
     */
    function coffee_can_theme_header_style() {
        $header_text_color = get_header_textcolor();
        $header_bg_color = get_theme_mod('header_background');
        $body_fg_color = get_theme_mod('body_foreground');
        $main_text_color = get_theme_mod('main_text');
        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) != $header_text_color ) {

            // If we get this far, we have custom styles. Let's do this.
            ?>
            <style type="text/css">
                <?php
                // Has the text been hidden?
                if ( ! display_header_text() ) :
                    ?>
                .site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px, 1px, 1px, 1px);
                }

                <?php
                // If the user has set a custom color for the text use that.
                else :
                    ?>
                .site-title a,
                .site-description {
                    color: #<?php echo esc_attr( $header_text_color ); ?>;
                }

                <?php endif; ?>
            </style>
            <?php
        }

        if('#FADA5E' != $header_bg_color) { ?>
            <style type="text/css">
                .site-header {
                    background-color: <?php echo esc_attr($header_bg_color); ?>;
                }
            </style>
        <?php
        }

        if('#FFD300' != $body_fg_color) { ?>
            <style type="text/css">
                .content-area {
                    background-color: <?php echo esc_attr($body_fg_color); ?>;
                }
            </style>
            <?php
        }

        if('#404040' != $main_text_color) { ?>
            <style type="text/css">
                body,
                button,
                input,
                select,
                optgroup,
                textarea {
                    background-color: <?php echo esc_attr($main_text_color); ?>;
                }
            </style>
            <?php
        }
    }
endif;