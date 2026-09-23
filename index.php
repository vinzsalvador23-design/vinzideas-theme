<?php
/**
 * Main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Vinz_Ideas
 */

get_header();
?>

	<?php if ( is_front_page() || ( is_home() && ! is_paged() ) ) : ?>
		<!-- SECTION 1: Hero Section -->
		<section class="hero">
			<div class="hero-content">
				<h1>Go Beyond the Familiar</h1>
				<p class="hero-tagline">Discover untold stories from Asia's most captivating destinations</p>
				<div class="hero-cta">
					<a href="<?php echo esc_url( home_url( '/#stories' ) ); ?>" class="btn btn-primary">Explore Destinations</a>
					<a href="<?php echo esc_url( home_url( '/work-with-us' ) ); ?>" class="btn btn-secondary">Work With Us</a>
				</div>
			</div>
		</section>

		<!-- SECTION 2: Featured Travel Stories -->
		<section id="stories" class="featured-section">
			<div class="container">
				<h2 class="section-title">Featured Travel Stories</h2>
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
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'large' ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="story-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
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

		<!-- SECTION 3: Explore Destinations -->
		<section class="destinations-section">
			<div class="container">
				<h2 class="section-title">Explore Destinations</h2>
				<div class="destinations-grid">
					<?php
					$categories = array( 'travel-in-philippines', 'thailand', 'vietnam', 'travel-in-singapore', 'cambodia', 'travel-in-malaysia' );
					foreach ( $categories as $cat_slug ) :
						$category = get_category_by_slug( $cat_slug );
						if ( $category ) :
							?>
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="destination-card">
								<div class="destination-icon">📍</div>
								<h3><?php echo esc_html( $category->name ); ?></h3>
								<p><?php echo esc_html( $category->description ); ?></p>
								<span class="post-count"><?php echo absint( $category->count ); ?> Articles</span>
							</a>
							<?php
						endif;
					endforeach;
					?>
				</div>
			</div>
		</section>

		<!-- SECTION 4: Hotels & Experiences -->
		<section class="hotels-section">
			<div class="container">
				<h2 class="section-title">Hotels & Experiences</h2>
				<p class="section-intro">Curated partnerships with trusted travel providers</p>
				<div class="hotels-grid">
					<a href="https://www.booking.com" target="_blank" rel="noopener noreferrer" class="hotel-card">
						<div class="hotel-icon">🏨</div>
						<h3>Luxury Eco-Lodges</h3>
						<p>Sustainable accommodations in exotic locations worldwide</p>
						<span class="partner-link">Visit Booking.com →</span>
					</a>

					<a href="https://www.viator.com" target="_blank" rel="noopener noreferrer" class="hotel-card">
						<div class="hotel-icon">🗺️</div>
						<h3>Guided Tours</h3>
						<p>Expert-led tours and experiences at your destination</p>
						<span class="partner-link">Visit Viator.com →</span>
					</a>

					<a href="https://www.getyourguide.com" target="_blank" rel="noopener noreferrer" class="hotel-card">
						<div class="hotel-icon">🚌</div>
						<h3>Sustainable Transport</h3>
						<p>Eco-friendly transportation options for conscious travelers</p>
						<span class="partner-link">Visit GetYourGuide.com →</span>
					</a>
				</div>
			</div>
		</section>

		<!-- SECTION 5: Partner With VINZ IDEAS -->
		<section class="partner-stats-section">
			<div class="container">
				<h2 class="section-title">Partner With VINZ IDEAS</h2>
				<p class="partner-intro">Join our growing network of partners and reach engaged travel audiences</p>
				<div class="stats-grid">
					<div class="stat-card">
						<div class="stat-number">50K+</div>
						<div class="stat-label">Monthly Readers</div>
						<p>Reach thousands of engaged travel enthusiasts every month</p>
					</div>
					<div class="stat-card">
						<div class="stat-number">120</div>
						<div class="stat-label">Destinations Covered</div>
						<p>In-depth guides and stories from around the world</p>
					</div>
					<div class="stat-card">
						<div class="stat-number">15+</div>
						<div class="stat-label">Active Partnerships</div>
						<p>Collaborating with leading travel and lifestyle brands</p>
					</div>
				</div>
				<div class="partner-cta">
					<a href="<?php echo esc_url( home_url( '/partner-inquiry' ) ); ?>" class="btn btn-primary">Become a Partner</a>
				</div>
			</div>
		</section>

		<!-- SECTION 6: Subscribe to Newsletter -->
		<section class="newsletter-section">
			<div class="container">
				<h2 class="section-title">Subscribe to Our Newsletter</h2>
				<p class="newsletter-intro">Get travel tips, destination guides, and exclusive stories delivered to your inbox</p>
				<form class="newsletter-form" method="post">
					<div class="form-group">
						<input
							type="email"
							name="email"
							placeholder="Enter your email address"
							required
							aria-label="Email address"
						>
						<button type="submit" class="btn btn-primary">Subscribe</button>
					</div>
				</form>
				<p class="newsletter-note">We respect your privacy. Unsubscribe at any time.</p>
			</div>
		</section>

		<!-- SECTION 7: Latest From The Blog -->
		<section class="blog-section">
			<div class="container">
				<h2 class="section-title">Latest From The Blog</h2>
				<div class="blog-grid">
					<?php
					$blog_posts = new WP_Query( array(
						'posts_per_page' => 5,
						'orderby'        => 'date',
						'order'          => 'DESC',
					) );

					if ( $blog_posts->have_posts() ) :
						while ( $blog_posts->have_posts() ) :
							$blog_posts->the_post();
							?>
							<article class="blog-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="blog-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'medium' ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="blog-content">
									<div class="blog-meta">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'M d, Y' ); ?></a>
									</div>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
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

	<!-- SECTION 8: Single Post Template -->
	<?php elseif ( is_single() ) : ?>
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

	<!-- SECTION 9: Archive/Category Template -->
	<?php else : ?>
		<main id="main" class="site-main archive-section">
			<header class="archive-header">
				<div class="container">
					<?php
					if ( is_category() ) :
						single_cat_title( '<h1 class="page-title">', '</h1>' );
						echo wp_kses_post( category_description() );
					elseif ( is_tag() ) :
						single_tag_title( '<h1 class="page-title">', '</h1>' );
						echo wp_kses_post( tag_description() );
					elseif ( is_search() ) :
						?>
						<h1 class="page-title">
							<?php
							printf( esc_html__( 'Search Results for: %s', 'vinz-ideas' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
						<?php
					else :
						?>
						<h1 class="page-title"><?php esc_html_e( 'Blog', 'vinz-ideas' ); ?></h1>
						<?php
					endif;
					?>
				</div>
			</header>

			<div class="container archive-content">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-card' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="archive-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium' ); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="archive-content-item">
								<h2 class="archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="archive-meta">
									<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
								</div>
								<div class="archive-excerpt">
									<?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
							</div>
						</article>
						<?php
					endwhile;

					// Pagination
					the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => esc_html__( 'Previous', 'vinz-ideas' ),
						'next_text' => esc_html__( 'Next', 'vinz-ideas' ),
					) );
				else :
					?>
					<p><?php esc_html_e( 'No posts found.', 'vinz-ideas' ); ?></p>
					<?php
				endif;
				?>
			</div>
		</main>
	<?php endif; ?>

<?php
get_footer();
