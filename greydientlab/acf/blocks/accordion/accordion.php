<?php
/**
 * Accordion Template.
 *
 * @package circles_x
 */

?>
<div class="accordion-block">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<?php
				// Check rows existexists.
				if ( have_rows( 'accordion' ) ) :
					?>
					<div class="accordion">
						<div class="accordion accordion-flush" id="accordion-faq">
							<?php
							// Loop through rows.
							while ( have_rows( 'accordion' ) ) :
								the_row();
								?>
									<div class="accordion-item">
										<div class="accordion-header" id="accordion-<?php echo esc_attr( get_row_index() ); ?>">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr( get_row_index() ); ?>" aria-expanded="true" aria-controls="collapse-<?php echo esc_attr( get_row_index() ); ?>">
												<?php the_sub_field( 'label' ); ?>
											</button>
										</div>

										<div id="collapse-<?php echo esc_attr( get_row_index() ); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion-faq">
											<div class="accordion-body">
												<div class="bullet"></div>
												<?php the_sub_field( 'content' ); ?>
											</div>
										</div>
									</div>
								<?php
							endwhile;
							?>
						</div>
					</div>
					<?php else : ?>
						<div class="accordion accordion-flush" id="accordion-faq">
							<div class="accordion-item">
								<div class="accordion-header" id="accordion-example">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-example" aria-expanded="true" aria-controls="collapse-example">
										<?php echo $block[ 'example' ]['attributes'][ 'data' ][ 'label' ]; ?>
									</button>
								</div>

								<div id="collapse-example" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion-faq">
									<div class="accordion-body">
										<div class="bullet"></div>
										<?php echo $block[ 'example' ][ 'attributes' ][ 'data' ][ 'content' ]; ?>
									</div>
								</div>
							</div>
						</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
</div>
