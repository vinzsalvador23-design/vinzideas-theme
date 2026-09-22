<?php
/**
 * Homepage Template
 *
 * Displays the VINZ IDEAS homepage with featured content,
 * travel stories, partnerships, and newsletter signup
 */

get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero Section -->
	<section class="hero-section">
		<div class="hero-content">
			<h1><?php echo get_bloginfo( 'name' ); ?></h1>
			<p class="tagline">Sustainable travel stories, partnerships, and experiences worth sharing</p>
			<div class="hero-cta">
				<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary">Read Stories</a>
				<a href="<?php echo esc_url( home_url( '/work-with-us' ) ); ?>" class="btn btn-outline">Work With Us</a>
			</div>
		</div>
	</section>

	<!-- Featured Travel Stories -->
	<section class="section bg-white">
		<div class="container">
			<div class="section-title">
				<h2>Featured Travel Stories</h2>
				<p class="section-subtitle">Inspiring narratives from destinations around the world</p>
			</div>

			<?php
			$featured_posts = new WP_Query( array(
				'posts_per_page' => 3,
				'meta_key'       => '_featured_post',
				'meta_value'     => '1',
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			if ( $featured_posts->have_posts() ) {
				echo '<div class="featured-grid">';

				while ( $featured_posts->have_posts() ) {
					$featured_posts->the_post();
					?>
					<div class="featured-item">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'featured-large' );
						} else {
							echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/placeholder.jpg' ) . '" alt="' . esc_attr( get_the_title() ) . '">';
						}
						?>
						<div class="featured-overlay">
							<div class="featured-content">
								<h3><?php the_title(); ?></h3>
								<p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-accent mt-lg">Read Story →</a>
							</div>
						</div>
					</div>
					<?php
				}

				echo '</div>';
				wp_reset_postdata();
			}
			?>
		</div>
	</section>

	<!-- Explore Destinations -->
	<section class="section bg-light-gray">
		<div class="container">
			<div class="section-title">
				<h2>Explore Destinations</h2>
				<p class="section-subtitle">Discover sustainable travel guides by region</p>
			</div>

			<?php
			$categories = get_categories( array(
				'orderby' => 'count',
				'order'   => 'DESC',
				'number'  => 6,
				'exclude' => 1,
			) );

			if ( ! empty( $categories ) ) {
				echo '<div class="featured-grid">';

				foreach ( $categories as $category ) {
					$cat_link = get_category_link( $category->term_id );
					$cat_image = get_term_meta( $category->term_id, 'category_image', true );
					?>
					<a href="<?php echo esc_url( $cat_link ); ?>" class="featured-item">
						<?php
						if ( $cat_image ) {
							echo '<img src="' . esc_url( $cat_image ) . '" alt="' . esc_attr( $category->name ) . '">';
						} else {
							echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/placeholder.jpg' ) . '" alt="' . esc_attr( $category->name ) . '">';
						}
						?>
						<div class="featured-overlay">
							<div class="featured-content">
								<h3><?php echo esc_html( $category->name ); ?></h3>
								<p><?php echo esc_html( $category->description ); ?></p>
							</div>
						</div>
					</a>
					<?php
				}

				echo '</div>';
			}
			?>
		</div>
	</section>

	<!-- Hotels & Experiences -->
	<section class="section bg-white">
		<div class="container">
			<div class="section-title">
				<h2>Hotels & Experiences</h2>
				<p class="section-subtitle">Handpicked accommodations and activities for conscious travelers</p>
			</div>

			<div class="featured-grid">
				<div class="card">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hotel-1.jpg' ); ?>" alt="Luxury Stay" class="card-image">
					<div class="card-body">
						<h3 class="card-title">Luxury Eco-Lodges</h3>
						<p class="card-text">Discover sustainable accommodations that don't compromise on comfort.</p>
						<a href="https://booking.com" data-affiliate="booking" target="_blank" class="card-link">Explore Now →</a>
					</div>
				</div>

				<div class="card">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/activities-1.jpg' ); ?>" alt="Guided Tours" class="card-image">
					<div class="card-body">
						<h3 class="card-title">Guided Tours & Activities</h3>
						<p class="card-text">Experience authentic cultural encounters with local guides and communities.</p>
						<a href="https://viator.com" data-affiliate="viator" target="_blank" class="card-link">Browse Tours →</a>
					</div>
				</div>

				<div class="card">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/transport-1.jpg' ); ?>" alt="Transport" class="card-image">
					<div class="card-body">
						<h3 class="card-title">Sustainable Transport</h3>
						<p class="card-text">Book eco-friendly transportation options for your next adventure.</p>
						<a href="https://getyourguide.com" data-affiliate="getyourguide" target="_blank" class="card-link">View Options →</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Work With Us / Partnership Section -->
	<section class="section bg-primary" style="background: linear-gradient(135deg, var(--color-primary) 0%, rgba(23, 61, 54, 0.85) 100%);">
		<div class="container text-center">
			<h2 style="color: var(--color-white); margin-bottom: var(--spacing-lg);">Partner With VINZ IDEAS</h2>
			<p style="color: rgba(255, 255, 255, 0.9); max-width: 600px; margin: 0 auto var(--spacing-lg);">
				Are you a tourism board, hotel, tour operator, or sustainability-focused brand?
				Let's create meaningful partnerships that inspire conscious travel.
			</p>
			<a href="<?php echo esc_url( home_url( '/work-with-us' ) ); ?>" class="btn btn-accent" style="margin-bottom: var(--spacing-xl);">Explore Partnership Opportunities</a>

			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-lg); margin-top: var(--spacing-xxl);">
				<div style="padding: var(--spacing-lg);">
					<h3 style="color: var(--color-white); font-size: 2rem; margin: 0;">50K+</h3>
					<p style="color: rgba(255, 255, 255, 0.8); margin: var(--spacing-sm) 0 0 0;">Monthly Readers</p>
				</div>
				<div style="padding: var(--spacing-lg);">
					<h3 style="color: var(--color-white); font-size: 2rem; margin: 0;">120</h3>
					<p style="color: rgba(255, 255, 255, 0.8); margin: var(--spacing-sm) 0 0 0;">Destinations Covered</p>
				</div>
				<div style="padding: var(--spacing-lg);">
					<h3 style="color: var(--color-white); font-size: 2rem; margin: 0;">15</h3>
					<p style="color: rgba(255, 255, 255, 0.8); margin: var(--spacing-sm) 0 0 0;">Active Partnerships</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Newsletter Signup -->
	<section class="section bg-light-gray">
		<div class="container" style="max-width: 600px;">
			<div class="newsletter-section">
				<h2>Subscribe to Our Newsletter</h2>
				<p>Get weekly travel stories, tips, and exclusive content delivered to your inbox.</p>

				<form class="newsletter-form" method="POST">
					<input
						type="email"
						placeholder="Enter your email"
						required
						aria-label="Email address"
					>
					<button type="submit" aria-label="Subscribe to newsletter">Subscribe</button>
				</form>

				<p style="font-size: 0.85rem; color: var(--color-dark-gray); margin-top: var(--spacing-md);">
					We respect your privacy. Unsubscribe at any time.
				</p>
			</div>
		</div>
	</section>

	<!-- Latest Blog Posts -->
	<section class="section bg-white">
		<div class="container">
			<div class="section-title">
				<h2>Latest From The Blog</h2>
				<p class="section-subtitle">Recent travel stories and insights</p>
			</div>

			<?php
			$latest_posts = new WP_Query( array(
				'posts_per_page' => 6,
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			if ( $latest_posts->have_posts() ) {
				echo '<div class="featured-grid">';

				while ( $latest_posts->have_posts() ) {
					$latest_posts->the_post();
					?>
					<article class="card">
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
								<a href="<?php the_permalink(); ?>" style="color: var(--color-primary); text-decoration: none;">
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
				wp_reset_postdata();
			}
			?>

			<div style="text-align: center; margin-top: var(--spacing-xxl);">
				<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary">View All Posts</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
