<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vinz_Ideas
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>
