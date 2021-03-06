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
                <div class="error-404text">
				    <header class="page-header">
					    <h1 class="page-title"><?php esc_html_e( 'Uh-Oh! ', 'coffee-can-theme' ); ?></h1>
				    </header><!-- .page-header -->

				    <div class="page-content">
					    <p>That page can&rsquo;t be found. It looks like nothing was found at this location.</p>
                        <button type="button" onclick="window.location.href = '<?php echo home_url();?>'">Back to homepage</button>
                    </div><!-- .page-content -->
                </div>
                <div class="error-404gif">
                    <img src="<?php echo get_images_from_media_library(); ?>">
                </div>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
