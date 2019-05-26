<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coffee_Can_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'coffee-can-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();?>
            <div class="site-branding__text">
			<?php if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$coffee_can_theme_description = get_bloginfo( 'description', 'display' );
			if ( $coffee_can_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $coffee_can_theme_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
            </div>

            <?php
            $twitter = get_theme_mod('twitter','');
            $facebook = get_theme_mod('facebook','');
            $instagram = get_theme_mod('instagram','');
            $youtube = get_theme_mod('youtube','');
            $media_array = array(
                $twitter,
                $facebook,
                $instagram,
                $youtube
            );

            $hide_div = true;

            foreach($media_array as $current){
                if($current !== ''){
                    $hide_div = false;
                }
            }
            unset($current);
            ?>

            <div class="social-media<?php if($hide_div){ echo " hidden"; } ?>">
                <?php
                if($twitter !== ''){
                    printf('<a href="%s" class="%s"></a>', $twitter, 'fab fa-twitter');
                }
                if($facebook !== ''){
                    printf('<a href="%s" class="%s"></a>', $facebook, 'fab fa-facebook-f');
                }
                if($instagram !== ''){
                    printf('<a href="%s" class="%s"></a>', $instagram, 'fab fa-instagram');
                }
                if($youtube !== ''){
                    printf('<a href="%s" class="%s"></a>', $youtube, 'fab fa-youtube');
                }
                ?>
            </div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '&#9776; Menu', 'coffee-can-theme' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
