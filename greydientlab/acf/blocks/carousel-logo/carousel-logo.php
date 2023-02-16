<?php
/**
 * Carousel Logo Template.
 *
 * @package circles_x
 */
?>
<div class="carousel-logo-block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<h3 class="title"><?php the_field( 'title' ); ?></h3>
			</div>
		</div>
	</div>

	<?php if ( have_rows( 'logos' ) ) : ?>
		<div class="swiper logos">
			<div class="swiper-wrapper">
				<?php
				while ( have_rows( 'logos' ) ) :
					the_row();
					?>
					<div class="swiper-slide logo"><img src="<?php the_sub_field( 'logo' ); ?>" alt="logo"></div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
