<?php
/**
 * Vinz Ideas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vinz_Ideas
 */

if ( ! defined( 'VINZ_IDEAS_VERSION' ) ) {
	define( 'VINZ_IDEAS_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vinzideas_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/vinz-ideas
	 * If you're building a theme based on Vinz Ideas, use a find and replace
	 * to change 'vinz-ideas' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vinz-ideas', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Register a navigation menu location.
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'vinz-ideas' ),
			'footer'  => esc_html__( 'Footer Menu', 'vinz-ideas' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
}
add_action( 'after_setup_theme', 'vinzideas_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function vinzideas_enqueue_styles() {
	wp_enqueue_style( 'vinzideas-style', get_stylesheet_uri(), array(), VINZ_IDEAS_VERSION );

	// Enqueue navigation script
	wp_enqueue_script( 'vinzideas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VINZ_IDEAS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vinzideas_enqueue_styles' );

/**
 * Register custom page templates.
 *
 * @param array $templates Available templates.
 * @return array
 */
function vinzideas_register_page_templates( $templates ) {
	$templates['page-work-with-us.php']  = __( 'Work With Us', 'vinz-ideas' );
	$templates['page-media-kit.php']     = __( 'Media Kit', 'vinz-ideas' );

	return $templates;
}
add_filter( 'theme_page_templates', 'vinzideas_register_page_templates' );

/**
 * Display post metadata (date, author, category).
 */
function vinzideas_posted_meta() {
	?>
	<div class="entry-meta">
		<span class="posted-on">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark">
				<?php echo esc_html( get_the_date() ); ?>
			</a>
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
	<?php
}
