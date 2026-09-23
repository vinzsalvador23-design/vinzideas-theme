<?php
/**
 * Header Template
 *
 * Displays the header and navigation for VINZ IDEAS
 *
 * @package VINZ_IDEAS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				// Custom Logo
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<?php
				}

				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) {
					?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php
				}
				?>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e( 'Menu', 'vinzideas' ); ?>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'wp_page_menu',
				) );
				?>
			</nav>
		</div>
	</header>
