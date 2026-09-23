<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Vinz_Ideas
 */

get_header();
?>

	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="entry-meta">
						<span class="posted-on">
							<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
						</span>
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<span class="cat-links">';
							foreach ( $categories as $category ) {
								echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
							}
							echo '</span>';
						}
						?>
						<span class="byline">
							by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php echo esc_html( get_the_author() ); ?>
							</a>
						</span>
					</div>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="featured-image">
						<?php the_post_thumbnail( 'large' ); ?>
					</div>
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vinz-ideas' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>
			<?php
		endwhile;
		?>
	</main>

<?php
get_footer();
