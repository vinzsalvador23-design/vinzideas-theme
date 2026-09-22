<?php
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vinz_Ideas
 */

get_header();
?>

	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			while ( have_posts() ) :
				the_post();

				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php
									echo esc_html( get_the_date() );
								?>
							</div>
							<?php
						endif;
						?>
					</header>

					<div class="entry-content">
						<?php
						if ( is_singular() ) :
							the_content();
						else :
							the_excerpt();
						endif;
						?>
					</div>
				</article>
				<?php
			endwhile;

		else :
			?>
			<article class="no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Nothing here', 'vinz-ideas' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria. Try another search.', 'vinz-ideas' ); ?></p>
				</div>
			</article>
			<?php
		endif;
		?>

	</main>

<?php
get_footer();
