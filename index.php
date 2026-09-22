<?php
/**
 * Main Template File
 *
 * This is the fallback template for all archive pages and single posts
 *
 * @package VINZ_IDEAS
 */

get_header(); ?>

<main id="main" class="site-main">
	<div class="container">
		<?php
		if ( have_posts() ) {
			echo '<div class="posts-grid">';

			while ( have_posts() ) {
				the_post();
				?>
				<article <?php post_class( 'card' ); ?>>
					<?php
					if ( has_post_thumbnail() ) {
						echo '<a href="' . esc_url( get_permalink() ) . '">';
						the_post_thumbnail( 'featured-large' );
						echo '</a>';
					}
					?>
					<div class="card-body">
						<div style="margin-bottom: var(--spacing-sm);">
							<?php vinzideas_posted_meta(); ?>
						</div>
						<h3 class="card-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
						<a href="<?php the_permalink(); ?>" class="card-link">Read More →</a>
					</div>
				</article>
				<?php
			}

			echo '</div>';

			// Pagination
			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => esc_html__( '← Previous', 'vinzideas' ),
				'next_text' => esc_html__( 'Next →', 'vinzideas' ),
			) );
		} else {
			?>
			<div style="text-align: center; padding: var(--spacing-xxl) 0;">
				<h2><?php esc_html_e( 'No posts found', 'vinzideas' ); ?></h2>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'vinzideas' ); ?></p>
			</div>
			<?php
		}
		?>
	</div>
</main>

<?php
get_footer();
