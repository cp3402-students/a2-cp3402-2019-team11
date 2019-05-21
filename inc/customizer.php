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
        'default' => '#FFD300',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('body_foreground', array(
        'default' => '#FFF4E2',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('main_text', array(
        'default' => '#2D2D2D',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('menu_text', array(
        'default' => '#FFFFFF',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('menu_background', array(
        'default' => '#FFBB00',
        'transport' => 'refresh',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('submenu_background', array(
        'default' => '#FFBB00',
        'transport' => 'refresh',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_setting('footer_background', array(
        'default' => '#FFD300',
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

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_text', array(
                'label' => __('Menu text colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'menu_text'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_background', array(
                'label' => __('Menu background colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'menu_background'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background', array(
                'label' => __('Submenu background colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'submenu_background'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background', array(
                'label' => __('Footer background colour', 'coffee-can-theme'),
                'section' => 'colors',
                'settings' => 'footer_background'
            )
        )
    );

    /*
     social media section
     */

    $wp_customize->add_section(
        'social-media',
        array(
                'title' => __('Social Media', 'coffee_can_theme'),
                'priority' => 30,
                'description' => __('Enter the URLs of your social media here to display them on the theme.', 'coffee_can_theme')
        )
    );

    //Twitter
    $wp_customize->add_setting('twitter', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'twitter',
            array(
                    'label' => __('Twitter', 'coffee_can_theme'),
                    'section' => 'social-media',
                    'settings' => 'twitter', )
        )
    );

    //Facebook
    $wp_customize->add_setting('facebook', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'facebook',
            array(
                'label' => __('Facebook', 'coffee_can_theme'),
                'section' => 'social-media',
                'settings' => 'facebook', )
        )
    );

    //Instagram
    $wp_customize->add_setting('instagram', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'instagram',
            array(
                'label' => __('Instagram', 'coffee_can_theme'),
                'section' => 'social-media',
                'settings' => 'instagram', )
        )
    );

    //YouTube
    $wp_customize->add_setting('youtube', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'youtube',
            array(
                'label' => __('YouTube', 'coffee_can_theme'),
                'section' => 'social-media',
                'settings' => 'youtube', )
        )
    );

    /*
     social media end
     */

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
        $menu_text_color = get_theme_mod('menu_text');
        $menu_bg_color = get_theme_mod('menu_background');
        $submenu_bg_color = get_theme_mod('submenu_background');
        $footer_bg_color = get_theme_mod('footer_background');

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

        if('#FFD300' != $header_bg_color) { ?>
            <style type="text/css">
                .site-header {
                    background-color: <?php echo esc_attr($header_bg_color); ?>;
                }

                .sticky {
                    background-color: <?php echo esc_attr($header_bg_color); ?>;
                }
            </style>
        <?php
        }

        if('#FFF4E2' != $body_fg_color) { ?>
            <style type="text/css">
                .content-area {
                    background-color: <?php echo esc_attr($body_fg_color); ?>;
                }
            </style>
            <?php
        }

        if('#2D2D2D' != $main_text_color) { ?>
            <style type="text/css">
                body,
                button,
                input,
                select,
                optgroup,
                textarea,
                .elementor-widget-text-editor {
                    color: <?php echo esc_attr($main_text_color); ?>;
                }
            </style>
            <?php
        }

        if('#FFFFFF' != $menu_text_color) { ?>
            <style type="text/css">
                .main-navigation a {
                    color: <?php echo esc_attr($menu_text_color); ?>;
                }
            </style>
            <?php
        }

        if('#FFBB00' != $menu_bg_color) { ?>
            <style type="text/css">
                .main-navigation a:hover {
                    background-color: <?php echo esc_attr($menu_bg_color); ?>;
                }
            </style>
            <?php
        }

        if('#FFBB00' != $submenu_bg_color) { ?>
            <style type="text/css">
                .main-navigation ul li:hover > ul, .main-navigation ul li ul:hover, .main-navigation ul li:hover > a {
                    background-color: <?php echo esc_attr($submenu_bg_color); ?>;
                }
            </style>
            <?php
        }

        if('#FFD300' != $footer_bg_color) { ?>
            <style type="text/css">
                .site-footer {
                    background-color: <?php echo esc_attr($footer_bg_color); ?>;
                }
            </style>
            <?php
        }
    }
endif;
