<?php
/**
 * Main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Vinz_Ideas
 */

get_header();
?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<div class="container">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</div>
		</header>
	<?php endif; ?>

	<?php if ( is_front_page() || ( is_home() && is_front_page() ) ) : ?>
		<!-- Hero Section -->
		<section class="hero">
			<div class="hero-content">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<p class="hero-tagline"><?php bloginfo( 'description' ); ?></p>
				<div class="hero-cta">
					<a href="#stories" class="btn btn-primary">Read Stories</a>
					<a href="<?php echo esc_url( home_url( '/work-with-us' ) ); ?>" class="btn btn-secondary">Work With Us</a>
				</div>
			</div>
		</section>

		<!-- Featured Stories Section -->
		<section id="stories" class="featured-section">
			<div class="container">
				<h2 class="section-title">Latest Stories</h2>
				<div class="stories-grid">
					<?php
					$featured_posts = new WP_Query( array(
						'posts_per_page' => 3,
						'orderby'        => 'date',
						'order'          => 'DESC',
					) );

					if ( $featured_posts->have_posts() ) :
						while ( $featured_posts->have_posts() ) :
							$featured_posts->the_post();
							?>
							<article class="story-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="story-image">
										<?php the_post_thumbnail( 'medium', array( 'class' => 'story-thumbnail' ) ); ?>
									</div>
								<?php else : ?>
									<div class="story-image story-image-placeholder">Featured Image</div>
								<?php endif; ?>

								<div class="story-content">
									<?php
									$categories = get_the_category();
									if ( ! empty( $categories ) ) {
										echo '<div class="story-category">' . esc_html( $categories[0]->name ) . '</div>';
									}
									?>
									<h3 class="story-title"><?php the_title(); ?></h3>
									<p class="story-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more">Read Story →</a>
								</div>
							</article>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- B2B Partnership Section -->
		<section class="b2b-section">
			<div class="container">
				<h2 class="section-title">Partnership Opportunities</h2>
				<p class="b2b-intro">Work with Vinz Ideas to reach engaged travel audiences and showcase your brand to budget-conscious explorers</p>

				<div class="b2b-grid">
					<div class="b2b-card">
						<div class="b2b-icon">🤝</div>
						<h3 class="b2b-title">Work With Us</h3>
						<p class="b2b-description">Explore partnership opportunities, sponsored content, and collaboration ideas</p>
						<a href="<?php echo esc_url( home_url( '/work-with-us' ) ); ?>" class="btn btn-primary">Learn More</a>
					</div>

					<div class="b2b-card">
						<div class="b2b-icon">📊</div>
						<h3 class="b2b-title">Media Kit</h3>
						<p class="b2b-description">Access our audience insights, advertising rates, and sponsorship packages</p>
						<a href="<?php echo esc_url( home_url( '/media-kit' ) ); ?>" class="btn btn-primary">View Kit</a>
					</div>

					<div class="b2b-card">
						<div class="b2b-icon">✉️</div>
						<h3 class="b2b-title">Get In Touch</h3>
						<p class="b2b-description">Ready to collaborate? Contact our team to discuss your partnership needs</p>
						<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Contact Us</a>
					</div>
				</div>
			</div>
		</section>

	<?php else : ?>
		<!-- Regular Post Archive/Search Layout -->
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
	<?php endif; ?>

<?php
get_footer();
