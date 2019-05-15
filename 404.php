<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Coffee_Can_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Uh-Oh! ', 'coffee-can-theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<p><?php echo "That page can&rsquo;t be found. It looks like nothing <br> was found at this location."; ?></p>
                    <img src="<?php echo display_images_from_media_library(); ?>/images/sad-face.png"/>

                    <button onclick="location.href='<?php echo home_url(); ?>'">Back to Home</button>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
