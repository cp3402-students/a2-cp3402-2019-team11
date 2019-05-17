/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//customization visualizers
	wp.customize( 'header_background', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( {
				'background-color': to
			} );
		} );
	} );
	wp.customize( 'body_foreground', function( value ) {
		value.bind( function( to ) {
			$( '.content-area' ).css( {
				'background-color': to
			} );
		} );
	} );
	wp.customize( 'main_text', function( value ) {
		value.bind( function( to ) {
			$( 'body, button, input, select, optgroup, textarea, .elementor-widget-text-editor' ).css( {
				'color': to
			} );
		} );
	} );
	wp.customize( 'menu_text', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation a' ).css( {
				'color': to
			} );
		} );
	} );/*
	wp.customize( 'submenu_background', function( value ) {
		value.bind( function( to ) {
			$( 'ul li:hover > ul, ul li ul:hover' ).css( {
				'background-color': to
			} );
		} );
	} );*/
	wp.customize( 'footer_background', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer' ).css( {
				'background-color': to
			} );
		} );
	} );

} )( jQuery );
