<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greydientlab
 */

?>

	<footer id="colophon" class="site-footer border-top">
		<div class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-5">
						<?php dynamic_sidebar('footer-widget-col-one');?>
					</div>
					<div class="col-2">
						<?php dynamic_sidebar('footer-widget-col-two');?>
					</div>
					<div class="col-3">
						<?php dynamic_sidebar('footer-widget-col-three');?>
					</div>
					<div class="col-2">
						<?php dynamic_sidebar('footer-widget-col-four');?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row d-flex align-items-center">
					<div class="col">
						<p>&copy;<?php echo date('Y');?> <?php bloginfo('name');?></p>
					</div>
					<div class="col d-inline-block text-end">
						<?php dynamic_sidebar('terms-and-policy'); ?>
					</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
