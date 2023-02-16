<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greydientlab
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'greydientlab' ); ?></a>

	<header id="masthead" class="site-header border-bottom">
		
		<div class="row marg">
			<div class="col-2 d-lg-none p-0 d-flex">
				<button class="menu-toggle btn d-lg-none p-0" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'greydientlab' ); ?><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="6" y="20.8887" width="20" height="1.61111" fill="#D92E27"/>
<rect x="6" y="14.4443" width="20" height="1.61111" fill="#D92E27"/>
<rect x="6" y="8" width="20" height="1.61111" fill="#D92E27"/>
</svg></button>
			</div>
		<div class="col site-branding justify-content-start align-items-center d-flex p-0">
		
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$greydientlab_description = get_bloginfo( 'description', 'display' );
			if ( $greydientlab_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $greydientlab_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
<div class=" col d-flex justify-content-end align-items-end p-0">
		<nav id="site-navigation" class="main-navigation">
			
			<div class="d-none d-lg-block ">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?></div>
			<a class="btn p-0  justify-content-end align-items-end d-flex" onclick="openNav()" ><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.5007 16.6635H18.6257V16.5385C18.6257 13.5634 21.0481 11.125 24 11.125C26.9519 11.125 29.3743 13.5634 29.3743 16.5385V16.6635H29.4993H33.1655C33.5849 16.6635 33.9322 16.9927 33.9572 17.4179C33.9572 17.4181 33.9572 17.4182 33.9572 17.4183L34.8737 34.0333L34.8738 34.0335C34.8861 34.2516 34.8053 34.4702 34.6575 34.6253L34.6558 34.6271C34.5088 34.7874 34.2994 34.875 34.082 34.875H13.918C13.7006 34.875 13.4912 34.7874 13.3442 34.6271L13.3442 34.6271L13.3425 34.6253C13.1947 34.4702 13.1139 34.2516 13.1262 34.0335L13.1263 34.0333L14.0428 17.4183C14.0428 17.4183 14.0428 17.4182 14.0428 17.4181C14.0677 16.9928 14.415 16.6635 14.8345 16.6635H18.5007ZM27.6662 16.6635H27.7912V16.5385C27.7912 14.4366 26.0891 12.7212 24 12.7212C21.9109 12.7212 20.2088 14.4366 20.2088 16.5385V16.6635H20.3338H27.6662ZM15.701 18.2596H15.5826L15.5761 18.3778L14.767 33.147L14.7598 33.2788H14.8918H33.1082H33.2402L33.233 33.147L32.4239 18.3778L32.4174 18.2596H32.299H29.4993H29.3743V18.3846V21.9519H27.7912V18.3846V18.2596H27.6662H20.3338H20.2088V18.3846V21.9519H18.6257V18.3846V18.2596H18.5007H15.701Z" fill="#8797A5" stroke="white" stroke-width="0.25"/>
</svg>
			</a>
		</nav><!-- #site-navigation -->
	</div>
</div>
	</header><!-- #masthead -->

	<div id="mySidenav" class="sidenav">
		<div class="row d-flex justify-content-start py-2 align-items-center cart-icon-header">
				<div class="col title margin-header-cart p-0">
					<span class ="title" style="color:white">Shopping Cart</span>
				</div>
				<div class="col close justify-content-end align-items-end text-end margin-header-cart p-0">
					<a class="closebtn btn p-0" onclick="closeNav()">
						<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14 14L34 34" stroke="white" stroke-width="1.25"/>
						<path d="M34 14L14 34" stroke="white" stroke-width="1.25"/>
					</svg>
			</a>
			</div>
		</div>
		<div class="div">
		<?php
		defined( 'ABSPATH' ) || exit;

				do_action( 'woocommerce_before_mini_cart' ); ?>

						<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php else : ?>
						<a href="<?php echo esc_url( $product_permalink ); ?>">
							<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					<?php endif; ?>
					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
		</div>

</div>

