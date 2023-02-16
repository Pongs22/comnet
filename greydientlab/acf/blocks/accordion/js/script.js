/* global jQuery Swiper */
jQuery( function() {
	new Swiper( '.journey-block .journey', {
		slidesPerView: 3,
		centeredSlides: true,
		direction: 'vertical',
		pagination: {
			clickable: true,
			type: 'none',
		},
	} );
} );
