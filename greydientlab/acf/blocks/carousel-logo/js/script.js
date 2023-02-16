/* global jQuery */
( function( $ ) {
	const initializeBlock = function( $block ) {
		let sliders = $( '.carousel-logo-block .swiper-wrapper' );
		let sliderItems = sliders.children();
		let itemCount = sliderItems.length;

		if ( $block ) {
			sliders = $block.find( '.carousel-logo-block .swiper-wrapper' );
			sliderItems = sliders.children();
			itemCount = sliderItems.length;
		}

		if ( window.acf ) {
			if ( sliders.hasClass( 'slick-initialized' ) ) {
				sliders.slick( 'unslick' );
			}
		}

		sliders.slick( {
			slidesToShow: itemCount - 1,
			centerMode: true,
			variableWidth: true,
			autoplay: true,
			autoplaySpeed: 0,
			infinite: true,
			speed: 3000,
			cssEase: 'linear',
			pauseOnHover: false,
			arrows: false,
		} );
	};

	// Initialize each block on page load (front end).
	$( document ).ready( function() {
		initializeBlock();
	} );

	// Initialize dynamic block preview (editor).
	if ( window.acf ) {
		window.acf.addAction( 'render_block_preview/type=carousel-logo', initializeBlock );
	}
}( jQuery ) );
